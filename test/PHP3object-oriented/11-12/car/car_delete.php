<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/12
 * Time: 14:58
 */

   $c_id = $_GET['c_id'];

   include("../../DB.class.php");
   $db = new DB();
   $where = [
       ['c_id','=',$c_id]
   ];
   $res =$db->where($where)->delete('car');
   if ($res){
       echo "删除成功";
       header("refresh:2;url=car_list.php");
       exit;
   }else{
       echo "删除失败";
       header("refresh:2;url=car_list.php");
       exit;
   }