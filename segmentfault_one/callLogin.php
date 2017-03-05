<?php
require_once('connect.php');
    if (!(isset($_POST['call_number'])&&(!empty($_POST['call_number'])))) {
    	echo '{"这是必填字段"}';
    }
    if (!(isset($_POST['password'])&&(!empty($_POST['password'])))) {
    	echo '{"这是必填字段"}';
    }
$call_number = $_POST['call_number'];
$password = md5($_POST['password']);
$sql = "SELECT *FROM user_info WHERE call_number=?";
$sql = "SELECT *FROM login WHERE password=?";
$mysqli_stmt=$mysqli->prepare($sql);
$mysqli_stmt->bind_param('d',$call_number);
$mysqli_stmt->bind_param('s',$password);
if($mysqli_stmt->execute()){
	$mysqli_stmt->store_result();
	if($mysqli_stmt->num_rows>0){
        echo 'success';
	}else{
		echo '用户不存在';
	}
}else{
	echo '用户不存在';
}
//释放结果集
$mysqli_stmt->free_result();
//关闭预处理语句
$mysqli_stmt->close();
$mysqli->close();