<?php
    require_once('connect.php');
    //把传递过来的信息入库，在入库之前对所有信息进行校验。
    //print_r($_POST);
    if (!(isset($_POST['title'])&&(!empty($_POST['title'])))) {
        echo '{"必须填写标题"}';
    }
    if (!(isset($_POST['tag'])&&(!empty($_POST['tag'])))) {
        echo '{"必须填写标签"}';
    }
    if (!(isset($_POST['question'])&&(!empty($_POST['question'])))) {
        echo '{"必须填写内容"}';
    }
    $title = $_POST['title'];
    $tag = $_POST['tag'];
    $username = $_POST['username'];
    $question = $_POST['question'];
    $dateline = time();
    $insertsql = "insert into question(title,tag,username,question,dateline) values(?,?,?,?,?)";
    $mysqli_stmt=$mysqli->prepare($insertsql);
    $mysqli_stmt->bind_param('ssssi', $title ,$tag, $username,$question,$dateline);
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