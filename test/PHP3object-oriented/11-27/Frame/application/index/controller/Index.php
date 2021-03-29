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

    //插入页面显示
 public function index(){

     $db = new DB();
     $arr =$db->findAll('b_type');
     $b_man = $_SESSION['username'];
     $this->assign('arr',$arr);
     $this->assign('b_man',$b_man);
     $this->display();
 }

 //图书名称的验证方法
    public function check_name(){

       $b_name = $_GET['b_name'];

       $db = new DB();
       $where =[
           ['b_name','=',$b_name]
       ];
       $res =$db->where($where)->find('book');
       if ($res){
           echo "yes";
       }else{
           echo "no";
       }
    }
 //图书的添加方法
 public function save(){

     $data = $_POST;
     $b_img = $_FILES['b_img'];

     $b_name = $data['b_name'];
     $reg_name = '/^[\x{4e00}-\x{9fa5}]{2,10}$/u';
     if (preg_match($reg_name,$b_name)<1){
         $this->error("标题验证没通过",'\index.php\index\Index\index');
     }


     if (!empty($b_img)){
         $upload = new UploadFile();
     $upload->size=3;
     $upload->type=['jpg','jpeg','png'];
     $upload->dir='img';
     $path = $upload->move($b_img);
     if ($path == false){
         $this->error($upload->error);
     }
          $data['b_img'] = $path;

     }
     $db = new  DB();
     $res = $db->insert('book',$data);
     if ($res){
         $this->success('添加成功','\index.php\index\Index\bookList');
     }else{
         $this->error("添加失败",'\index.php\index\Index\index');
     }

 }

 public function bookList(){
     echo "这里是列表";
 }











}