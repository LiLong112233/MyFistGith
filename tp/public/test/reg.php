<?php
$user_name=$_POST['user_name'];
$email=$_POST['email'];
$tel=$_POST['tel'];
$pass = password_hash($_POST['pass'],PASSWORD_BCRYPT);
$time=time();
$user = 'root';
$pass='123456';
$host='127.0.0.1';
$db ='edu2008';
$mysqli =new mysqli($host,$user,$pass,$db);
$sql ="insert into p_users (user_name,email,tel,pass,reg_time) values ('$user_name','$email','$tel','$pass','$time')";
echo $sql;
$res=$mysqli->prepare($sql);
var_dump($res);
$data=$res->execute();
$row=$res->affected_rows;
if ($row){
    echo "注册成功";
}




////预处理
//$res= $mysqli->prepare($sql);
////var_dump($res);
////执行
//$data= $res->execute();
////var_dump($data);
////echo"<br>";
//
////检测sql执行影响的行数
//$row =$res-> affected_rows;
//echo"影响行数" .$row;