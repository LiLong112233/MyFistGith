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

   public function norice(){
       $n_man =$_SESSION['username'];
       $this->assign('n_man',$n_man);
       $db=new DB();
       $arr=$db->findAll('class');
       $this->assign('arr',$arr);
       $this->display();
   }
   public function  res(){
       $data=$_POST;
       $n_img=$_FILES['n_img'];
       if ($n_img['error']!=4){
           $file=new UploadFile();
           $file->size=6;
           $file->type=['png','jpg','jpeg','gif'];
           $path=$file->move($n_img);
           $data['n_img']=$path;
           }
       $db=new DB();
       $res= $db->insert('notice',$data);
       if ($res){
           $this->success('添加成功','/index.php/index/Index/noricelist');
       }else{
           $this->error('添加失败','/index.php/index/Index/norice');
       }
       }
    public function noricelist(){
     $n_title=empty($_GET['n_title'])?'':$_GET['n_title'];
     $c_id=empty($_GET['c_id'])?'':$_GET['c_id'];
     $where=[];
     if (!empty($n_title)){
         $where[]=['n_title','=',$n_title];
     }
     if (!empty($c_id)){
         $where[]=['class.c_id','=',$c_id];
     }
      $p=empty($_GET['p'])?1:$_GET['p'];
      $p_num=2;
       $db=new DB();
       $arrr=$db->findAll('class');
       $arr=$db->join('class','notice.c_id=class.c_id')->where($where)->page($p,$p_num) ->findAll('notice');
       if(empty($arr)){
           $arr=[];
       }
       $count=$db->join('class','notice.c_id=class.c_id')->where($where)->count('notice');
       $page=new Page();
       $str=$page->p_page($count,$p_num);


       $this->assign('arrr',$arrr);
       $this->assign('str',$str);
       $this->assign('arr',$arr);
       $this->display();
    }
    public function delete(){
       $db=new DB();
       $n_id=$_GET['n_id'];
       $where=[['n_id','=',$n_id]];
       $res=$db->where($where)->delete('notice');
       if ($res){
           $this->success('删除成功','/index.php/index/Index/noricelist');
       }else{
           $this->error('删除失败','/index.php/index/Index/noricelist');
       }
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

