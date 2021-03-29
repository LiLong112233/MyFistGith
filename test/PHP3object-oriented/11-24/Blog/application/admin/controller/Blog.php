<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 10:05
 */
namespace app\admin\controller;
use core\Library\Controller;
use core\Library\DB;
use core\Library\UploadFile;
use core\Library\Page;
class Blog extends Father {
    //博文页面
    public  function  blog(){

        $man=$_SESSION['username'];
        $db=new DB();
        $arr=$db->findAll('cate');




        $this->assign('arr',$arr);
        $this->assign('b_man',$man);
        $this->display();



    }

    public function save(){
    $data=$_POST;
    $b_img=$_FILES['b_img'];
    $file=new UploadFile();
    $file->dir='img';
    $file->size=6;
    $file->type=['png','jpg','jpeg','gif'];
    $re=$file->move($b_img);
    if ($re){
        echo $file->error;
    }
    $data['b_img']=$re;
    $db=new DB();
    $res=$db->insert('blog',$data);
    if ($res){
        $this->success('添加成功','/index.php/admin/Blog/bloglist');
    }else{
        $this->error('添加失败','/index.php/admin/Blog/blog');
    }
    }


    public function  bloglist(){
        $b_name=empty($_GET['b_name'])?'':$_GET['b_name'];
        $c_id=empty($_GET['c_id'])?'':$_GET['c_id'];
        $where=[];
        if (!empty($b_name)){
           $where[]=['b_name','like',"%$b_name%"];
        }
        if (!empty($c_id)){
            $where[]=['blog.c_id','=',$c_id];
        }



        $p=empty($_GET['p'])?1:$_GET['p'];
        $p_num=2;
        $db=new DB();
        $arr=$db->join('cate','blog.c_id=cate.c_id')->where($where)->page($p,$p_num)->findAll('blog');
        if (empty($arr)){
            $arr=[];
        }
        $count=$db->join('cate','blog.c_id=cate.c_id')->where($where)->count('blog');
        $page=new Page();
        $str=$page->p_page($count,$p_num);


        $cate=$db->findAll('cate');
        $this->assign('b_name',$b_name);
        $this->assign('c_id',$c_id);
        $this->assign('cate',$cate);
        $this->assign('str',$str);
        $this->assign('arr',$arr);
        $this->display();
    }



}