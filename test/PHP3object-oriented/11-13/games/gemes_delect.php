<?php 

   $id = $_GET['id'];
    include("../../demo/DB.class.php");
    $db = new DB();
    $where =[
      ['gid','=',$id]
    ];
    $res = $db->where($where)->delete('games');
    if ($res){
        echo "删除成功";
        header("refresh:2;url=games_list.php");
        exit;
    }else{
        echo "删除失败";
        header("refresh:2;url=games_list.php");
        exit;
    }



 ?>
