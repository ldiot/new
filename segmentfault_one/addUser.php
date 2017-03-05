<?php
//接收页面
require_once('connect.php');
$email = $_POST['email'];
$username = $_POST['username'];
$username = $mysqli->escape_string($username);
$password = md5($_POST['password']);
$dateline = time();
$act = $_GET['act'];
switch ($act) {
	case 'addUser':
		//echo '添加用户的操作';
	    $sql="INSERT login(email,username,password,dateline) VALUES('{$email}','{$username}','{$password}','{$dateline}')";
	    $res = $mysqli->query($sql);
	    if ($res) {
	    	echo '成功';
	    }
		break;
}
