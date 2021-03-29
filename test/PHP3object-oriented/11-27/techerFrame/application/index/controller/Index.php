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

     $b_name = empty($_GET['b_name'])?'':$_GET['b_name'];
     $t_id = empty($_GET['t_id'])?'':$_GET['t_id'];

     $where =[];
     if (!empty($b_name)){
         $where[] = ['b_name','like',"%$b_name%"];
     }
     if (!empty($t_id)){
         $where[] = ['book.t_id','=',$t_id];
     }

     $p= empty($_GET['p'])?1:$_GET['p'];
     $p_num =3;
     $db = new DB();
     $cate = $db->findAll('b_type');
     $res = $db->join('b_type','book.t_id=b_type.t_id')->where($where)->page($p,$p_num)->findAll('book');

     $count =  $db->join('b_type','book.t_id=b_type.t_id')->where($where)->count('book');
     $page = new Page();
     $page_str =$page->p_page($count,$p_num);
     $this->assign('res',$res);
     $this->assign('cate',$cate);
     $this->assign('t_id',$t_id);
     $this->assign('b_name',$b_name);
     $this->assign('p_str',$page_str);
     $this->display();
 }

 public function delete(){

       $b_id = $_GET['b_id'];

       $where = [
           ['b_id','=',$b_id]
       ];
       $db = new DB();
       $img = $db->where($where)->find('book');
       $res = $db->where($where)->delete('book');
       if ($res){
           unlink($img['b_img']);
           $this->success('删除成功','\index.php\index\Index\bookList');
       }else{
           $this->error('删除失败','\index.php\index\Index\bookList');
       }
 }

 //编辑
 public function edit(){

     $b_id = $_GET['b_id'];
     $where = [
         ['b_id','=',$b_id]
     ];

     $db = new DB();
     $arr = $db->findAll('b_type');
     $res = $db->where($where)->find('book');
     $this->assign('res',$res);
     $this->assign('arr',$arr);
     $this->display();
 }

//修改
 public function update(){
      $data = $_POST;
//      dump($data);

     $b_img = $_FILES['b_img'];
     if (!empty($b_img)){
         $upload = new UploadFile();
         $upload->size=3;
         $upload->type=['jpeg','png','jpg'];
         $upload->dir='img';
         $path = $upload->move($b_img);
         if ($path ==false){
             $this->error($upload->error);
         }
         $data['b_img']= $path;
     }

     $db = new DB();
     $b_id = $data['b_id'];
     $where = [
         ['b_id','=',$b_id]
     ];

     $res = $db->where($where)->update('book',$data);
     if ($res==1){
         $this->success("修改成功",'\index.php\index\Index\bookList');
     }else if($res ==0){
         $this->success("未修改",'\index.php\index\Index\bookList');
     }else{
         $this->error("修改失败",'\index.php\index\Index\bookList');

     }

 }












}