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
class Index extends Controller{

  public function index(){
      $db=new DB();
      $arr=$db->findAll('g_type');
      $this->assign('arr',$arr);
      $this->display('goods');
  }
  public function save(){
       $data=$_POST;
      $g_photo=$_FILES['g_img'];
      $file=new UploadFile();
      $file->dir="img";
      $file->type=['jpg','jpeg','png','gif'];
      $file->size=6;
       $path=$file->move($g_photo);
       if ($path){
           $data['g_photo']=$path;
       }else{
           $this->error($file->error);
           exit ;
       }
       $db=new DB();
       $res=$db->insert('g_goods',$data);
       if ($res){
           $this->success('添加成功','/index.php/index/Index/goodslist');
       }else{
           $this->error('添加失败','/index.php/index/Index/index');
       }
      $this->display();
  }

    public function goodslist(){
      $g_name=empty($_GET['g_name'])?'':$_GET['g_name'];
      $this->assign('g_name',$g_name);
      $g_id=empty($_GET['g_id'])?'':$_GET['g_id'];
      $this->assign('g_id',$g_id);
      $g_up=empty($_GET['g_up'])?'':$_GET['g_up'];
      $this->assign('g_up',$g_up);
      $where=[];
      if (!empty($g_name)){
          $where[]=['g_name','like',"%$g_name%"];
      }
      if (!empty($_GET['g_id'])){
          $where[]=['g_goods.g_id','=',$g_id];
      }
      if (!empty($g_up)){
          $where[]=['g_up','=',$g_up];
      }

      $p=empty($_GET['p'])?1:$_GET['p'];
      $p_num=2;
      $db=new DB();
      $raa=$db->findAll('g_type');
      $this->assign('raa',$raa);
      $arr=$db->join('g_type','g_goods.g_id=g_type.g_id')->where($where)->page($p,$p_num)->findAll('g_goods');
      if (empty($arr)){
          $arr=[];
      }
      $count=$db->join('g_type','g_goods.g_id=g_type.g_id')->where($where)->count('g_goods');
      $page=new Page();
      $str=$page->p_page($count,$p_num);
      $this->assign('str',$str);
      $this->assign('arr',$arr);
      $this->display();
    }
    public function delete(){
      $id=$_GET['id'];
      $where=[['id','=',$id]];
      $db=new DB();
      $res=$db->where($where)->delete('g_goods');
      if ($res){
          $this->success('删除成功','/index.php/index/Index/goodslist');
      }else{
          $this->error('删除失败','/index.php/index/Index/goodslist');
      }
    }


}