<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/16
 * Time: 11:30
 */

  $g_name = $_GET['g_name'];

  include('../demo/DB.class.php');

  $db = new DB();
  $where=[
    ['gname','=',$g_name]
  ];
  $res =$db->where($where)->find('games');
  if ($res){
     echo 'yes';
  }else{
      echo 'no';
  }