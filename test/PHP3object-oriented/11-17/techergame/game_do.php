<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/16
 * Time: 14:28
 */

  $data = $_POST;

  include("../DB.class.php");
  $db = new DB();
  if (empty($data['g_name'])){
      echo "游戏名称不能为空";
      header("refresh:2;url=game.php");
      exit;
  }else{
      $preg_name = '/^[\x{4e00}-\x{9fa5}]{2,4}$/u';//必须为中文且2-4位
      if (preg_match($preg_name,$data['g_name'])<1){
          echo "游戏名称必须为中文且2-4位";
          header("refresh:2;url=game.php");
          exit;
      }else{
          $where =[
            ['g_name','=',$data['g_name']]
          ];
          $res =$db->where($where)->find('game');
          if ($res){
              echo "游戏名称已存在";
              header("refresh:2;url=game.php");
              exit;
          }
      }

  }

  if (empty($data['g_price'])){
      echo "游戏价格不能为空";
      header("refresh:2;url=game.php");
      exit;
  }else{
      $reg_price = "/^[1-9]\d{2,6}$/"; //价格必须在3-7位之间且首位不能为0
      if (preg_match($reg_price,$data['g_price'])<1){
          echo "游戏价格必须在3-7位之间，首位不能为0";
          header("refresh:2;url=game.php");
          exit;
      }
  }

   include("../UploadFile.class.php");
   $g_img = $_FILES['g_img'];

   $upload = new UploadFile();
   $upload->size=3;
   $upload->type=['png','jpeg','jpg','gif'];
   $upload->dir ="img";
   $path = $upload->move($g_img);
   if ($path == false){
       echo $upload->error;
       header("refresh:2;url=game.php");
       exit;
   }
   $data['g_img']=$path;
   $result = $db->insert('game',$data);
   if ($result){
       echo "添加成功";
       header("refresh:2;url=game_list.php");
       exit;
   }else{
       echo "添加失败";
       header("refresh:2;url=game.php");
       exit;
   }

