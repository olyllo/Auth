<?php
/**
 * Конфигурация сайта
 *
 *
 */

const CMS_FULL_PATH = __DIR__;
const CMS_CACHE_PATH = __DIR__ . '/cache/';
const CMS_MODULES_PATH = __DIR__ . '/modules/';

//const CMS_BASE_URL = 'http://localhost/Auth/auth/';
//const CMS_FILE_URL = 'http://localhost/Auth/auth/files/';
const CMS_BASE_URL = 'http://www.auth.local/';
const CMS_FILE_URL = 'http://www.auth.local/files';

const DB_HOST = 'localhost';
const DB_PORT = 3306;
const DB_USER = 'root';
const DB_PSWD = '';
const DB_NAME = 'store';
const formRu = array('SIGN_UP'=>'Регистрация','SIGN_IN'=>'Авторизация','LOGIN'=>'Логин', 'NAME'=>'Имя','LASTNAME'=>'Фамилия','EMAIL'=>'E-mail',
								'PSWD'=>'Пароль','CONFPSWD'=>'Потверждение Пароля','PHONE'=>'Телефон', 'REGBTN'=>'Зарегестрироваться',
								'LOGIN_PH'=>'Логин (Будет отображаться на сайте)','NAME_PH'=>'Имя (Ваше реальное Имя, не может содержать цифры)', 'LASTNAME_PH'=>'Фамилия (Ваша фамилия, не может содержать цифры)','EMAIL_PH'=>'Email',
								'PSWD_PH'=>'Введите пароль','CONFPSWD_PH'=>'Введите пароль еще раз','PHONE_PH'=>'+38(0--)--- -- --','KEEP'=>'Запомнить меня','ENG_L'=>'ENG','RU_L'=>'РУС',
                                'LOG_IN'=>'Вход','FOGOTPSWD'=>'Забыли пароль','LANG'=>'RU','FILE'=>'Выберите изображение для вашего аккаунта (Разрешенные форматы jpg, png, gif, jpeg)', 'RECUIRED'=>'Заполнете пожалуйсто это поле','FP'=>'Забыли пароль?');

const formEng = array('SIGN_UP'=>'sign up','SIGN_IN'=>'sign in','LOGIN'=>'Login', 'NAME'=>'Name','LASTNAME'=>'Lastname','EMAIL'=>'E-mail',
								'PSWD'=>'Passworld','CONFPSWD'=>'Confirm Password','PHONE'=>'Phone', 'REGBTN'=>'Register',
								'LOGIN_PH'=>'Login (Will Be Shown At Site)','NAME_PH'=>'Name (Real name, with out numbers)', 'LASTNAME_PH'=>'Lastname (Real Lastname, with out numbers)','EMAIL_PH'=>'Email',
								'PSWD_PH'=>'Enter passworld','CONFPSWD_PH'=>'Enter you password again','PHONE_PH'=>'+38(0--)--- -- --','KEEP'=>'Keep Me Signed In', 'ENG_L'=>'ENG','RU_L'=>'РУС',
								'LOG_IN'=>'Log in','FOGOTPSWD'=>'Fogot Password', 'LANG'=>'EN','FILE'=>'Select image for you acount (aloved format jpg, png, gif, jpeg)', 'RECUIRED'=>'Please fill this fild','FP'=>'Forgot password');

