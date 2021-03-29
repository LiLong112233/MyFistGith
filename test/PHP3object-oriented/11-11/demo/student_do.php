<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 13:49
 */

   $data = $_POST;
   //非空

   //唯一性验证


include("../DB.class.php");
$db = new DB();
$res =$db->insert('student',$data);
if ($res){
    echo "添加成功";
    header("refresh:2;url=student_list.php");
    exit;
}else{
    echo "添加失败";
    header("refresh:2;url=student.php");
    exit;
}
