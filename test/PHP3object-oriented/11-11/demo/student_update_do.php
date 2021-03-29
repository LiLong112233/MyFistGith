<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 14:55
 */

       $data = $_POST;
//       print_r($data);

      //


     include("../DB.class.php");

     $db = new DB();

     $res = $db->where([['s_id','=',$data['s_id']]])->update('student',$data);
     if ($res){
         echo "修改成功";
         header("refresh:2;url=student_list.php");
         exit;
     }else{
         echo "修改失败";
         header("refresh:2;url=student_list.php");
         exit;
     }
