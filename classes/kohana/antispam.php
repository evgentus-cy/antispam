<?php 
defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Antispam module
 *
 * Kohana 3.2 module
 *
 * @package    Antispam
 * @author     Кузнецов Евгений
 * @email      evgentus88@mail.ru
 */
class Kohana_Antispam {

	protected static $botobor_class;
	protected static $config;
	
	// В стиле Kohana 3.2
	public static function factory($html = NULL){
		return new Antispam($html);
	}
	
	
	public function __construct($html = NULL){
		// Подгружаем класс Botobor 0.3.0		
        if ( ! Antispam::$botobor_class){
            require Kohana::find_file('vendor', 'botobor', 'php');
        }
        Antispam::$botobor_class = new Botobor_Form($html);
		Antispam::$config = Kohana::$config->load('antispam');
		foreach (Antispam::$config['checks'] as $type => $val){
			Antispam::$botobor_class->setCheck($type, $val);
		}
		Antispam::$botobor_class->setDelay(Antispam::$config['delay']);
		Antispam::$botobor_class->setLifetime(Antispam::$config['lifetime']);
		Antispam::$botobor_class->addHoneypot(Antispam::$config['honeypots']);
		Botobor::setSecret(Antispam::$config['secret_key']);
	}
	
	// Получаем измененный код формы
	public static function getForm(){
		return Antispam::$botobor_class->getCode();
	}
	
	// Проверка на "человечность"
	public static function isHuman()
	{
		return Botobor_Keeper::isHuman();
	}
	
}