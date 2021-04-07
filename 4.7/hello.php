<?php
//echo "hello word";

$data =[
    "name"=>"张三",
    "age"=>55,
    "email"=>"zhangsan@163.com"
  ];
//  将数组转化为JSON字符串
echo json_encode($data)


?>