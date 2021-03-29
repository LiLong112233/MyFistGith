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
class Cate extends Father {



    //博文的分类页面
 public function create(){

     $this->display();
 }

    /**
     * 添加操作
     */
 public function save(){

     $data = $_POST;

     $db = new DB();
     $data['c_time']=time();
     $res = $db->insert('category',$data);

     if ($res){
         $this->success("分类添加成功",'/index.php/admin/Cate/cateList');
     }else{
         $this->error("分类添加失败",'/index.php/admin/Cate/create');
     }
 }

 //博文分类列表展示
    public function cateList(){

     $p =empty($_GET['p'])?1:$_GET['p'];
     $p_num = 2;
     $db = new DB();
     $res = $db->page($p,$p_num)->findAll('category');

     $count = $db->count('category');
     $page = new Page();
     $str =$page->p_page($count,$p_num);
     $this->assign('str',$str);
     $this->assign('arr',$res);

     $this->display();
    }
}