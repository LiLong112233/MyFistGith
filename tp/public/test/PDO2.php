<?php
$dsn='mysql:host=127.0.0.1;dbname=edu2008';
$user='root';
$pass ='123456';
$dbh= new PDO($dsn,$user,$pass);
//设置编码
$dbh->query('set name utf8');
//查询数据
$sql=' delete  from order_info where order_id='.$_GET['id'];
 echo $sql;echo'<br>';
//预处理器
$res=$dbh->prepare($sql);
//执行 增删改
 $data= $res->execute();
echo '<pre>';var_dump($data);echo'</pre>';
//检测影响的行数\
$row=$res ->rowCount();
echo"影响行数".$row;


