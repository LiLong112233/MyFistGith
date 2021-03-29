<?php
$dsn='mysql:host=127.0.0.1;dbname=edu2008';
$user='root';
$pass ='123456';
$dbh= new PDO($dsn,$user,$pass);
//转码
$dbh->query('set name utf8');

$sql='select*from p_users where uid='.$_GET['id'];
echo '<pre>';print_r($sql);echo'</pre>';
$res =$dbh->query($sql);
var_dump($res);
$data=$res->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';print_r($data);echo'</pre>';
