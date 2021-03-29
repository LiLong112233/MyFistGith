<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12
 * Time: 14:14
 */

   $data = $_POST;
   $c_img = $_FILES['c_img'];
//   print_r($data);exit;

   /**
    * 略
    */

    include("../../UploadFile.class.php");
    $update = new UploadFile();
    $update->size=3;
    $update->type=['jpeg','png','jpg','gif'];
    $update->dir="img";
    $new_path =  $update->move($c_img);//在没有报错的情况下返回的是 文件存储路径，否则false
    if ($new_path == false){
        echo $update->error;
    }

    //完善数组
    $data['c_img']=$new_path;
    $data['c_time']=date("Y-m-d H:i:s",time());
    include("../../DB.class.php");
    $db = new DB();
    $arr =$db->insert('car',$data);
    if ($arr){
        echo "添加成功";
        header("refresh:2;url=car_list.php");
        exit;
    }else{
        echo "添加失败";
        header("refresh:2;url=car.php");
        exit;
    }

