<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/16
 * Time: 11:30
 */

  $g_name = $_GET['g_name'];

  include('../DB.class.php');

  $db = new DB();
  $where=[
    ['g_name','=',$g_name]
  ];
  $res =$db->where($where)->find('game');
  if ($res){
     echo 'yes';
  }else{
      echo 'no';
  }