<?php
if(is_file('./install.php')){
header('Location: install.php');};
/* Запускаем сессии сеанса */
session_start();


/* Уровень вывода ошибок */
error_reporting(E_ALL & ~E_NOTICE);

/* Необходимые константы для работы скрипта */
define('pepper', true);
define('DIRECTORY', str_replace('\\', '/', dirname(__FILE__)) . '/');
define('SYSPATH', DIRECTORY . '_system/');
/* Подключение к базе данных MYSQL */
$db = mysql_connect('mysql.h7w.ru', $database['user'], $database['password']) or die('MYSQL сервер сейчас недоступен');
mysql_select_db($database['name'], $db) or die('Не могу подключиться к базе данных');

mysql_unbuffered_query('SET NAMES `UTF8`', $db);


/* Подключаем файл с функциями */
if (file_exists(DIRECTORY . 'function.php')) {
	require_once (DIRECTORY . 'function.php');
} else {
	exit('Не могу подключить файл с функциями');
}

/* Авторизация пользователя */
if (isset($_SESSION['id'], $_SESSION['password'])) {
	$user = authenticate($_SESSION['id'], $_SESSION['password']);
	
  if($user != false && $user['online'] <= time()-10)
  {
   mysql_query("UPDATE `users` SET `online`='".time()."' WHERE `id`='$user[id]' ");
  }
   
} else {
	$user = false;
}

/* Получаем/проверяем/фильтруем нужные нам GET переменные */
$id = isset($_GET['id']) ? abs(intval($_GET['id'])) : 0;
$page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 0;
$act = isset($_GET['act']) ? urldecode(trim($_GET['act'])) : '';
$action = isset($_GET['action']) ? urldecode(trim($_GET['action'])) : 'index';

/* Подключаем нужную нам страницу */
if (file_exists(SYSPATH . 'pages/'.$action.'.php')) {
	require_once (SYSPATH . 'pages/'.$action.'.php');
} else {
	require_once (SYSPATH . 'pages/index.php');
}


?>