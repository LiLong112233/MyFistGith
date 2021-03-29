<?php

$user = 'root';
$pass='123456';
$host='127.0.0.1';
$db ='edu2008';

$mysqli =new mysqli($host,$user,$pass,$db);

//$sql="delete from order_info where order_id=".$_GET['id'];
//echo $sql."<br>";
////预处理
//$res= $mysqli->prepare($sql);
////var_dump($res);
////执行
//$data= $res->execute();
//var_dump($data);
//echo"<br>";

////检测sql执行影响的行数
//$row =$res-> affected_rows;
//echo"影响行数" .$row;
/***********添加**************/
//$sql="insert into p_users ( user_name  ) value('111' )";
////预处理
//$res =$mysqli->prepare($sql);
//var_dump($res);
////执行
//$data=$res->execute();
////反馈
//$row=$res->affected_rows;
//echo"影响行数" .$row;
/**********修改*************/
$sql ="update p_user set reg_time='456156565665' where uid =".$_GET['id'];
echo $sql;
$res =$mysqli->prepare($sql);
$data=$res->execute();
$row=$res->affected_rows;
echo"影响行数" .$row;

