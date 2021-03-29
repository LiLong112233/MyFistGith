<?php
$user_name=$_POST['user_name'];
$password=$_POST['pass'];

$dsn='mysql:host=127.0.0.1;dbname=edu2008';
$user='root';
$pass ='123456';
$dbh= new PDO($dsn,$user,$pass);
//设置编码
$dbh->query('set name utf8');

$sql="select*from p_users where user_name='$user_name' ";
//echo '<pre>';print_r($sql);echo'</pre>';
//预执行
$res =$dbh->query($sql);
//var_dump($res);
//执行sql语句
$data=$res->fetch(PDO::FETCH_ASSOC);
//echo '<pre>';print_r($data);echo'</pre>';
//echo  $data[0]['pass'];
//echo $pass;
if($data) {
    if (password_verify($password,$data['pass'])) {
        echo "登录成功";
    } else {
        echo "登录失败";
    }
}

























