<?php

$user = 'root';
$pass='123456';
$host='127.0.0.1';
$db ='edu2008';

$mysqli =new mysqli($host,$user,$pass,$db);

$sql="select*from p_users where uid=".$_GET['uid'];
$sql="select*from p_users ";
echo $sql."<br>";

$res= $mysqli->query($sql);
var_dump($res);
echo"<br>";

$data= $res->fetch_all(MYSQLI_ASSOC);

print_r($data);
