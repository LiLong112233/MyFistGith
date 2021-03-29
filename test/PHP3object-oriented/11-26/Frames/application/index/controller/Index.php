<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 10:05
 */
namespace app\index\controller;
use core\Library\Controller;
use core\Library\DB;
use core\Library\UploadFile;
use core\Library\Page;
class Index extends Farther {

    public function index (){

    }
    public function notice() {
        $db=new DB();
        $arr=$db->findAll('class');
        $n_man=$_SESSION['username'];
        $this->assign('arr',$arr);
        $this->assign('n_man',$n_man);
        $this->display();
    }
    public function insert(){
    $data=$_POST;
    $n_img=$_FILES['n_img'];
     $file=new UploadFile();
     $file->size=6;
     $file->dir="img";
     $file->type=['png','jpeg','jpg','gif'];
     $ref=$file->move($n_img);
     $data['n_img']=$ref;
     $db=new DB();
     $res=$db->insert('notice',$data);
     if ($res){
         $this->success('添加成功','/index.php/index/Index/noticelist');
     }else{
         $this->error('添加失败','/index.php/index/Index/notice');
     }
    }


    public function noticelist(){
        $n_title=empty($_GET['n_title'])?'':$_GET['n_title'];
        $c_id=empty($_GET['c_id'])?'':$_GET['c_id'];
        $where=[];
        if (!empty($n_title)){
            $where[]=['n_title','like',"%$n_title%"];
        }
        if (!empty($c_id)){
            $where[]=['notice.c_id','=',$c_id];
        }
        $p=empty($_GET['p'])?1:$_GET['p'];
        $p_num=2;
      $db=new DB();
      $ree=$db->findAll('class');
      $arr=$db->join('class','notice.c_id=class.c_id')->where($where)->page($p,$p_num)->findAll('notice');
      if (empty($arr)){
          $arr=[];
      }
      $count=$db->join('class','notice.c_id=class.c_id')->where($where)->count('notice');
      $page=new Page();
      $str=$page->p_page($count,$p_num);
      $this->assign('n_title',$n_title);
      $this->assign('c_id',$c_id);
      $this->assign('ree',$ree);
      $this->assign('str',$str);
      $this->assign('arr',$arr);
      $this->display();

    }
    public function out(){
        unset($_SESSION['username']);
        if (empty($_SESSION['username'])){
            $this->success('退出成功','/index.php/index/Login/login');
        }else{
            $this->error('退出失败');
        }
    }
}