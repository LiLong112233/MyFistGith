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
class Index extends Father {

    public function book(){
        $db=new DB();
        $aa=$db->findAll('bookcate');
        $this->assign('aa',$aa);
        $this->display();
    }

    public function ajax(){
    $b_name=$_GET['b_name'];
    $where=[['b_name','=',$b_name]];
    $db=new DB();
    $res=$db->where($where)->find('book');
    if ($res){
        echo 'yes';
    }else{
        echo 'no';
    }
    }

  public function  save(){
    $data=$_POST;
    $b_img=$_FILES['b_img'];
    $file=new UploadFile();
    $file->size=6;
    $file->type=['png','jpeg','jpg','gif'];
    $file->dir="img";
    $img=$file->move($b_img);
    if (empty($img)){
        $this->error($file->error);
    }
    $data['b_img']=$img;
    $db=new DB();
    $res =$db->insert('book',$data);
    if ($res){
        $this->success('添加成功','/index.php/index/Index/booklist');
    }else{
        $this->error('添加失败','/index.php/index/Index/index');
    }

  }

  public function booklist(){
        $b_name=empty($_GET['b_name'])?'':$_GET['b_name'];
        $b_id=empty($_GET['b_id'])?'':$_GET['b_id'];
        $where=[];
        if (!empty($b_name)){
            $where[]=['b_name','like',$b_name];
        }
        if (!empty($b_id)){
            $where[]=['book.b_id','=',$b_id];
        }
        $p=empty($_GET['p'])?1:$_GET['p'];
        $p_num=2;

        $db=new DB();
        $res=$db->findAll('bookcate');
        $arr=$db->join('bookcate','book.b_id=bookcate.b_id')->where($where)->page($p,$p_num)->findAll('book');
        if (empty($arr)){
            $arr=[];
        }
        $conut=$db->join('bookcate','book.b_id=bookcate.b_id')->where($where)->count('book');

        $page=new Page();
        $str=$page->p_page($conut,$p_num);

        $this->assign('b_name',$b_name);
        $this->assign('b_id',$b_id);
        $this->assign('res',$res);
        $this->assign('arr',$arr);
        $this->assign('str',$str);
        $this->display();
  }

public function delete(){
        $id=$_GET['id'];
        $where=[['id','=',$id]];
   $db=new DB();
   $arr=$db->where($where)->find('book');
   $img=$arr['b_img'];
   $res=$db->where($where)->delete('book');
   if ($res){
       unlink($img);
       $this->success('删除成功','/index.php/index/Index/booklist');
   }else{
       $this->error('删除失败','/index.php/index/Index/booklist');
   }
}

public function update(){
        $id=$_GET['id'];
        $where=[['id','=',$id]];
        $db=new DB();
        $res=$db->findAll('bookcate');
        $arr=$db->where($where)->find('book');

        $this->assign('arr',$arr);
        $this->assign('res',$res);
       $this->display();
}

public function updo(){
$data=$_POST;
$id=$data['id'];
$where=[['id','=',$id]];
$b_img=$_FILES['b_img'];
if ($b_img['error']!=4){
    $file=new UploadFile();
    $file->size=6;
    $file->type=['png','jpeg','jpg','gif'];
    $file->dir="img";
    $img=$file->move($b_img);
    if (empty($img)){
        $this->error($file->error);
    }
    $data['b_img']=$img;
}

$db=new DB();
$arr=$db->where($where)->update('book',$data);
if ($arr==1){
    $this->success('修改成功','/index.php/index/Index/booklist');
}else if ($arr==2){
    $this->error('未修改','/index.php/index/Index/booklsit');
}



}

}