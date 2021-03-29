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

    //博文的页面
 public function create(){

     $db = new DB();
     $res =$db->findAll('category');
     $this->assign('cate',$res);
     $this->display();
 }

 //博文的添加操作
 public function save(){

     $data = $_POST;
     $b_img = $_FILES['b_img'];


     if (!empty($b_img)){

         $upload = new UploadFile();
         $upload->dir='img';
         $upload->size=3;
         $upload->type=['jpeg','jpg','png'];
         $path = $upload->move($b_img);
         if ($path==false){
             $this->error($upload->error);
         }
         $data['b_img']=$path;
     }
     $data['b_time']=date('Y-m-d H:i:s',time());
     $db = new DB();
     $res = $db->insert('blog',$data);
     if ($res){
         $this->success("添加成功",'\index.php\admin\Blog\blogList');
     }else{
         $this->error("添加失败",'\index.php\admin\Blog\create');

     }



 }
 //博文列表展示
    public function blogList(){

     $b_name = empty($_GET['b_name'])?'':$_GET['b_name'];
     $c_id = empty($_GET['c_id'])?"":$_GET['c_id'];
     $where =[];
     if (!empty($b_name)){
         $where[]= ['b_name','like',"%$b_name%"];
     }
     if (!empty($c_id)){
         $where[] = ['blog.c_id','=',"$c_id"];
     }
     $p=empty($_GET['p'])?1:$_GET['p'];
     $p_num =2;
     $db = new DB();
     $res =$db->join('category','category.c_id=blog.c_id')->where($where)->page($p,$p_num)->findAll('blog');
     if (empty($res)){
         $res =[];
     }
//     dump($res);die;
      $count = $db->join('category','category.c_id=blog.c_id')->where($where)->count('blog');
      $page = new Page();
      $str=$page->p_page($count,$p_num);
       //获取分类的所有信息
        $category =$db->findAll('category');
        $this->assign('cate',$category);
        $this->assign("str",$str);
        $this->assign('res',$res);
        $this->assign('b_name',$b_name);
        $this->assign('c_id',$c_id);
     $this->display();
    }
}