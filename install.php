<?php
echo '<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><link rel="shortcut icon" href="/favicon.ico"/><title>Подключения БД</title><style type="text/css">body {background-color: #fff;
color: #000;
padding: 2px;
margin: 5px;}
a:link,a:visited {color: #00f; text-decoration: none;}
.l1
{background: #cfc; color: green; border-bottom: solid 1px #aaf; padding-bottom: 2px; padding-top: 2px;}
.l1 a:link,a:visited {color: #00f; text-decoration: none;}</style></head><body>';
ini_set('display_errors','0');
$name=$_POST['name'];
$user=$_POST['user'];
$pass=$_POST['pass'];
if($name or $user or $pass){ $cop='Не все поля заполнены!<br/>';
if($name and $user and $pass){
$cop='Нет соединения с БД!<br/>';
$ddbb=mysql_connect('mysql.h7w.ru',$user,$pass);
if(mysql_select_db($name,$ddbb)){
$tab=mysql_query('SHOW TABLES FROM '.$name,$ddbb);
while($row=mysql_fetch_row($tab)){
mysql_query
('DROP TABLE '.$row[0],$ddbb);};
$db=new mysqli('mysql.h7w.ru',$user,$pass,$name);
$db->set_charset('utf8');
$db->multi_query(file_get_contents('test10.sql'));
file_put_contents('index.php','<?php
$database=array(\'user\'=>\''.$user.'\',\'password\'=>\''.$pass.'\',\'name\'=>\''.$name.'\');'.substr(file_get_contents('index.php'),5));
header('Location: install.php?mysql=ok');}; }; };
if($_GET['mysql']!='ok'){
echo '<div class="l1"></div><div class="l1"><br/>Ниже вы должны ввести данные соединения с базой данных MySQL.<br/><br/></div><div class="l1"><font color="red">'.$cop.'</font><br/><form action="install.php" method="post"> Имя БД<br/><input name="name" type="text" maxlength="30" value="'.$name.'"><br/> Пользователь БД<br/><input name="user" type="text" maxlength="30" value="'.$user.'"><br/> Пароль БД<br/><input name="pass" type="text" maxlength="30" value="'.$pass.'"><br/><input type="submit"  value="Проверить"></form><br/>';} else {
echo '<div class="l1"></div><div class="l1"><br/>Импорт таблиц в БД удачно завершон!<br/>Данные администратора логин: Admin пароль: 123abc<br/><br/><a href="/">Перейти на главную</a><br/><br/>';
unlink('install.php');};
echo '</div></body></html>';
?>