<?php
function require_header ($title = '') {
 global $user;
	ob_start();

	require_once (SYSPATH . 'route/header.php');
}

function require_footer () {
 global $user;
	ob_end_flush();
	
	require_once (SYSPATH . 'route/footer.php');
	exit;
}


function authenticate ($id, $password) {

	return mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id`='".abs(intval($id))."' AND `password`='".mysql_real_escape_string($password)."' "));
}



function mailto ($email, $theme, $message) {
	$headers = "From: robot@".$_SERVER['HTTP_HOST']."\n";
	$headers .= "Content-Type: text/plain; charset=utf-8\n";

	return mail($email, $theme, $message, $headers);
}


function pepper ($mm) {
   
	echo'<div class="quick"><br/><center><img src="/images/pepper.png" alt="pepper"  /><br/><i>Перец <b>'.($mm/10).'</b> sm, в топе <b>'.ceil(mysql_result(mysql_query("SELECT COUNT(*) FROM `users` WHERE `mm` >= '$mm'"), 0)).'</b> место.</i></center></div>';
}

function page ($k_page = 1, $page = 1) {
	$page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 1;

	if ($page < 1) {
		$page = 1;
	}

	if ($page > $k_page) {
		$page = $k_page;
	}	
	return $page;
}

function k_page ($k_post = 0, $k_p_str = 10) {
	return $v_pages = ($k_post != 0) ? ceil($k_post / $k_p_str) : 1;
}

function navigation ($link = null, $k_page = 1, $page = 1, $dop = '') {
	echo '<img class="pepper_mini" src = "/images/pepper_mini.png" alt="pepper"/>
<div class="info"> Странички... <br/> <br/>'.(($page != 1) ? '<a href="'.$link.'page.1'.$dop.'">1</a>' : '<span>1</span>');

	for ($i =- 3; $i <= 3; $i ++) {
		if ($page + $i > 1 && $page + $i < $k_page) {
			if ($i ==- 3 && $page + $i > 2) {
				echo ' ..'; 
			}
			
			echo ($i != 0) ? ' <a href="'.$link.'page.'.($page + $i) . $dop.'">'.($page + $i).'</a>' : ' <span>'.($page + $i).'</span>';
			
			if ($i == 3 && $page + $i < $k_page - 1) {
				echo ' ..';
			}
		}
	}
		
	echo (($page != $k_page) ? ' <a href="'.$link.'page.'.$k_page . $dop.'">'.$k_page.'</a>' : ' <span>'.$k_page.'</span>').'<br/></div>';
}



function smiles($str) {
	$str = preg_replace('/\:\)|:-\)|:smile:/', '<img src="/images/smiles/smiley-smile.png" alt="Smile" />', $str);
	$str = preg_replace('/:D|:-D/', '<img src="/images/smiles/smiley-grin.png" alt="Smile" />', $str);
	$str = preg_replace('/\:\(|:-\(/', '<img src="/images/smiles/smiley-sad.png" alt="Smile" />', $str);
	$str = preg_replace('/\;-\(|\;\(/', '<img src="/images/smiles/smiley-cry.png" alt="Smile" />', $str);
	$str = preg_replace('/\;\)|\;-\)/', '<img src="/images/smiles/smiley-wink.png" alt="Smile" />', $str);
	$str = preg_replace('/8\)|8-\)/', '<img src="/images/smiles/smiley-cool.png" alt="Smile" />', $str);
	$str = preg_replace('/=O|O_O/', '<img src="/images/smiles/smiley-eek.png" alt="Smile" />', $str);
	$str = str_replace('$)', '<img src="/images/smiles/smiley-money.png" alt="Smile" />', $str);
	$str = str_replace(':*', '<img src="/images/smiles/smiley-kiss.png" alt="Smile" />', $str);
	$str = preg_replace('/:P/', '<img src="/images/smiles/smiley-razz.png" alt="Smile" />', $str);
	$str = str_replace(':|', '<img src="/images/smiles/smiley-netural.png" alt="Smile" />', $str);
	$str = preg_replace('/:Z/', '<img src="/images/smiles/smiley-sleep.png" alt="Smile" />', $str);
	$str = preg_replace('/:lol:/', '<img src="/images/smiles/smiley-lol.png" alt="Smile" />', $str);
	$str = preg_replace('/:rofl:/', '<img src="/images/smiles/smiley-yell.png" alt="Smile" />', $str);
	$str = str_replace(':&', '<img src="/images/smiles/smiley-confuse.png" alt="Smile" />', $str);
	$str = str_replace(':>', '<img src="/images/smiles/smiley-evil.png" alt="Smile" />', $str);
	$str = str_replace(':@', '<img src="/images/smiles/smiley-mad.png" alt="Smile" />', $str);
	$str = preg_replace('/:angel:/', '<img src="/images/smiles/smiley-angel.png" alt="Smile" />', $str);
	$str = preg_replace('/:bla:/', '<img src="/images/smiles/smiley-draw.png" alt="Smile" />', $str);
	$str = preg_replace('/:fat:/', '<img src="/images/smiles/smiley-fat.png" alt="Smile" />', $str);
	$str = preg_replace('/:kitty:/', '<img src="/images/smiles/smiley-kitty.png" alt="Smile" />', $str);
	$str = preg_replace('/:green:/', '<img src="/images/smiles/smiley-mr-green.png" alt="Smile" />', $str);
	$str = str_replace('%)', '<img src="/images/smiles/smiley-nerd.png" alt="Smile" />', $str);
	$str = preg_replace('/:red:/', '<img src="/images/smiles/smiley-red.png" alt="Smile" />', $str);
	$str = preg_replace('/:roll:/', '<img src="/images/smiles/smiley-roll.png" alt="Smile" />', $str);
	$str = preg_replace('/:sweat:/', '<img src="/images/smiles/smiley-sweat.png" alt="Smile" />', $str);
	$str = preg_replace('/:slim:/', '<img src="/images/smiles/smiley-slim.png" alt="Smile" />', $str);
	$str = preg_replace('/:surprise:/', '<img src="/images/smiles/smiley-surprise.png" alt="Smile" />', $str);
    $str = preg_replace('/:wink:/', '<img src="/images/smiles/smiley-wink.png" alt="Smile" />', $str);
	$str = str_replace('<)', '<img src="/images/smiles/smiley-twist.png" alt="Smile" />', $str);
	$str = str_replace(':]', '<img src="/images/smiles/smiley-zipper.png" alt="Smile" />', $str);
	return $str;
	}
	
	function br($str,$br='<br />'){return preg_replace("#((<br( ?/?)>)|\n|\r)+#i",$br, $str);} // переносы строк

function output_text($str){
	$str = preg_replace('/\[b\](.+)\[\/b\]/isU', '<b>$1</b>', $str); 
    $str = preg_replace('/\[u\](.+)\[\/u\]/isU', '<span style="text-decoration:underline;">$1</span>', $str); 
    $str = preg_replace('/\[s\](.+)\[\/s\]/isU', '<s>$1</s>', $str); 
    $str = preg_replace('/\[i\](.+)\[\/i\]/isU', '<i>$1</i>', $str); 
    $str = preg_replace('/\[big\](.+)\[\/big\]/isU', '<span style="font-size:large;">$1</span>', $str); 
    $str = preg_replace('/\[small\](.+)\[\/small\]/isU', '<span style="font-size:small;">$1</span>', $str); 
    $str = preg_replace('/\[color=(.+)\](.+)\[\/color\]/isU', '<span style="color:$1;">$2</span>', $str); 
	
   $str = preg_replace("/(http:\/\/)?([[:alnum:]]|\_){3,30}(\s+)?(\.|,)(\s+)?([[:alnum:]]|){3,30}(\s)?(\.|,)?(\s)?([[:alnum:]]){2,4}/i", "", $str);

   
	$str = smiles($str); // смайлы
    $str = br($str); // переносы строк


	return $str;
	}
	
function user_status ($id) {
 global $user;
 
if($user['id'] != $id)
{
  $ank = mysql_fetch_array(mysql_query("SELECT `access` FROM `users` WHERE `id` = '$id'"));
  
	switch ($ank['access']){
		
		case '1':
			return '<small><i> он <font color="red">Администратор</font></i></small>';
		break;
	}
}
}

function user($id)
{
 global $user;

if($user['id'] != $id)
{
$ank = mysql_fetch_array(mysql_query("SELECT `nick`, `online` FROM `users` WHERE `id` = '$id'"));

if($ank['online'] < (time() - 2400)) $tut = NULL;
else if($ank['online'] < (time() - 120))
{
$tut='<i>*</i>';
}else{
$tut = NULL;
} 


return " <a href='/user.html/id.$id'>$ank[nick]</a>".$tut;
}else{

return " <span><b>Я</b></span>";
}
}
function online($id)
{

$ank = mysql_fetch_array(mysql_query("SELECT `online` FROM `users` WHERE `id` = '$id'"));
 global $user;
 if($user['id'] != $id)
{

if($ank['online'] > (time() - 2400))
{
 $onl = '<font color="green">В игре</font>';
}else{
 $onl = '<font color="red">Не в игре</font>';
}

return $onl;

}else{

return "Тут";
}
}


function maketime($tl)
{
$d=3600*24;
$day=floor($tl/$d);
$tl=$tl-($d*$day);

$hour=floor($tl/3600);
$tl=$tl-(3600*$hour);

$minute=floor($tl/60);
$tl=$tl-(60*$minute);

$second=floor($tl);

$dayt = ($day > '0'?"$day дн. ":null);
$hourt = ($hour > '0'?"$hour ч. ":null);
$minutet = ($minute > '0'?"$minute м. ":null);
$secondt = ($second > '0'?"$second с. ":null);
if($day > '0')
{
$minutet=NULL;
$secondt=NULL;
}
if($hour > '0' && $day == '0')
{
$secondt=NULL;
$dayt=NULL;
}
return "$dayt$hourt$minutet$secondt";
}

///////////////////////
function cache ($path = '', $lifetime = 1800) {
	if (!is_file($path)) {
		return false;
	}
	
	if (filemtime($path) < (time() - $lifetime)) {
		delete_cache($path);
		return false;
	}
	
	if (!$cache = file_get_contents($path)) {
		return false;
	}
	
	return $cache;
}

function save_cache ($path = '', $text = '', $echo = false) {
	if (trim($text)) {
		file_put_contents($path, trim($text));
		
		if ($echo) {
			echo $text;
		} else {
			return $text;
		}
	} else {
		return false;
	}
}


function delete_cache ($path = '') {
	if (is_file($path)) {
		chmod($path, 0777);
		unlink($path);
		return true;
	}
	
	return false;
}


?>