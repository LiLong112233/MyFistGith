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

    //插入页面显示
 public function index(){

     $db = new DB();
     $res =$db->findAll('brandb');
     $this->assign('res',$res);
     $this->display('game');

 }
//添加数据
 public function save(){

     $data = $_POST;
     $g_img = $_FILES['g_img'];
     //验证
     $upload = new UploadFile();
     $upload->size=3;
     $upload->type=['png','jpeg','jpg','gif'];
     $upload->dir="img";
     $path =$upload->move($g_img);
     if ($path ==false){
         echo $this->error();
     }

     $db=new DB();

     $data['g_img']=$path;
     $res = $db->insert('game',$data);
     if ($res){
         $this->success('插入成功','\index.php\index\Index\gameList');
     }else{
         $this->error('插入失败');
     }

 }

 //列表展示（分页搜索）
 public function gameList(){

     $g_name = empty($_GET['g_name'])?"":$_GET['g_name'];
     $g_price = empty($_GET['g_price'])?"":$_GET['g_price'];

     $where =[];
     if (!empty($g_name)){
         $where[] = ['g_name','like',"%$g_name%"];
     }
     if (!empty($g_price)){
         $where[] =['g_price','like',"%$g_price%"];
     }
     $p=empty($_GET['p'])?1:$_GET['p'];
     $p_num=2;
     $db = new DB();
     $res =$db->join('brandb','brandb.b_id = game.b_id')->where($where)->page($p,$p_num)->findAll('game');
     $count = $db->join('brandb','brandb.b_id = game.b_id')->where($where)->count('game');
     $page= new Page();
     $str =$page->p_page($count,$p_num);
     $this->assign('str',$str);
     $this->assign('res',$res);
     $this->display('game_list');
 }

 //删除
 public function delete(){

      $g_id = $_GET['g_id'];
      $db = new DB();
      $where = [
          ['g_id','=',$g_id]
      ];
      $res =$db->where($where)->delete('game');
      if ($res==1){
          $this->success("删除成功",'\index.php\index\Index\gameList');
      }else{
          $this->error("删除失败",'\index.php\index\Index\gameList');
      }

 }

 //修改的编辑页面
 public function edit(){

     $g_id = $_GET['g_id'];
     $db = new DB();
     $res =$db->findAll('brandb');//品牌表
     $where =[
       ['g_id','=',$g_id]
     ];
     $arr = $db->where($where)->find('game');
     $this->assign('res',$res);
     $this->assign('arr',$arr);
     $this->display();
 }

//修改
 public function update(){

      $data = $_POST;

      //验证
     //文件上传
     $g_img = $_FILES['g_img'];

     //验证
     if (!empty($g_img)){
         $upload = new UploadFile();
         $upload->size=3;
         $upload->type=['png','jpeg','jpg','gif'];
         $upload->dir="img";
         $path =$upload->move($g_img);
         if ($path ==false){
             echo $this->error();
         }
         $data['g_img']=$path;
     }

     $db = new DB();
     $g_id = $data['g_id'];
     $where = [
       ['g_id','=',$g_id]
     ];
     $res = $db->where($where)->update('game',$data);
     if ($res==1){
         $this->success("修改成功",'\index.php\index\Index\gameList');
     }elseif($res ==0){
         $this->success("未修改",'\index.php\index\Index\gameList');
     }else{
         $this->error("修改失败",'\index.php\index\Index\gameList');

     }
 }







}