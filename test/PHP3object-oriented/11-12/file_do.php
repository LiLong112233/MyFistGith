<?php

    $file = $_FILES['myFile'];
//    print_r($file);

    //使用上传文件类
    include('UploadFile.class.php');
    $upload = new UploadFile();
    $upload->size=6;//M数
//    $upload->type=  ['image/jpeg','image/png','image/jpg','image/gif'];
    $upload->type=  ['jpeg','png','jpg','gif'];
    $upload->dir="img";//文件夹名
    $result = $upload->move($file);//上传

    if ($result == false){
        echo $upload->error;
    }

    echo $result;


