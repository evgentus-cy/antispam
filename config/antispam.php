<?php defined('SYSPATH') or die('No direct script access.');

return array(
	// Проверки
	'checks'						=> array(
												// Создавать поля-приманки
												'honeypots'						=> true, // bool
												
												// Учитывать верхний предел заполнения формы
												'lifetime'						=> true, // bool
												
												// Учитывать нижний предел заполнения формы
												'delay'							=> true, // bool
												
												// Проверять реферер
												'referer'						=> true, // bool
											),
	// Секретный ключ для подписывания мета-данных
	'secret_key'					=> 'ololo',
	
	// Имена полей, для замены на случайное значение (поля-приманки)
	'honeypots'				=> array(
												'email',
												'name',
												'contact-name',
												'contact-email',
                                                'contact-text',
                                                'contact-company',
                                                'contact-phone',
											),
	
	// Нижний предел заполнения формы
	'delay'				=> 2, // sec
	
	// Верхний предел заполнения формы
	'lifetime'			=> 60*60, // sec
	
);
