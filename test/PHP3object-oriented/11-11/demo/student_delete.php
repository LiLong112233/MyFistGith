<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:42
 */

    $s_id = $_GET['s_id'];
    include("../DB.class.php");
    $db = new DB();
    $where =[
      ['s_id','=',$s_id]
    ];
    $res = $db->where($where)->delete('student');
    if ($res){
        echo "删除成功";
        header("refresh:2;url=student_list.php");
        exit;
    }else{
        echo "删除失败";
        header("refresh:2;url=student_list.php");
        exit;
    }