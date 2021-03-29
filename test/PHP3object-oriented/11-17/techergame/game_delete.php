<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/17
 * Time: 9:42
 */

 $g_id = $_GET['g_id'];

 include("../DB.class.php");

 $db = new DB();
 $where = [
     ['g_id','=',$g_id]
 ];
 //删除图片， 必须做到先查后删
 $res = $db->where($where)->find('game');
 $result = $db->where($where)->delete("game");
 if ($result){
     echo "删除成功";
     unlink($res['g_img']);
     header("refresh:2;url=game_list.php");
     exit;
 }else{
     echo "删除失败";
     header("refresh:2;url=game_list.php");
     exit;
 }
