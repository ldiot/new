<?php
header('content-type:text/html;charset=utf-8');
$mysqli=new mysqli('localhost','root','still','segmentfault');
if ($mysqli->errno) {
	die('Connect Error'.$mysqli->error);
}
$mysqli->set_charset('UTF8');