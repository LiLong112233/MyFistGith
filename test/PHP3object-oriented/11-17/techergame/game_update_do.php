<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/17
 * Time: 10:03
 */
 $data = $_POST;
 $file = $_FILES['g_img'];
 $g_id = $data['g_id'];//获取g_id的值

// print_r($data);
//验证自己写

include("../DB.class.php");
include("../UploadFile.class.php");

$upload = new UploadFile();
$upload->size=3;
$upload->type=['jpeg','png','jpg'];
$upload->dir="img";

$path =$upload->move($file);
if ($path ==false){
    echo $upload->error;
    header("refresh:2;url=game_update.php?g_id=$g_id");
    exit;
}

$db = new DB();

$where = [
  ['g_id','=',$g_id]
];
$data['g_img']=$path;
$res = $db->where($where)->update('game',$data);
if ($res){
    echo "修改成功";
    header("refresh:2;url=game_list.php");
    exit;
}else{
    echo "修改失败";
    header("refresh:2;url=game_update.php?g_id=$g_id");
    exit;
}
