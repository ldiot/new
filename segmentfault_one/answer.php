<?php
require_once('connect.php');
$username = $_POST['username'];
$answer = $_POST['answer'];
$dataline = time();
$sql = "INSERT answer(username,answer,dataline) VALUES(?,?,?);";
$mysqli_stmt=$mysqli->prepare($sql);
$mysqli_stmt->bind_param('ssi',$username,$answer,$dataline);
$mysqli_stmt->execute();