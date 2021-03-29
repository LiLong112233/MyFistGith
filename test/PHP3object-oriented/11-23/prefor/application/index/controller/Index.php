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
    public function  index(){
        $db=new DB();
        $arr=$db->findAll('p_type');
        $this->assign('arr',$arr);
        $this->display('program');
    }
    public function save(){
    $data=$_POST;
    $p_img=$_FILES['p_img'];
//    print_r($p_img);
        $aa = new UploadFile();
        $aa->size = 6;
        $aa->type = ['png', 'jpg', 'jpeg', 'gif'];
        $aa->dir="file";
        $path = $aa->move($p_img);
//       echo $path;
        if($path==false){
            echo $aa->error;
        }
        $data['p_img']=$path;

     $db=new DB();
    $res=$db->insert('program',$data);
    if ($res){
        $this->success('插入成功','\index.php\index\Index\programlist');
    }else{
        $this->error('插入失败','\index.php\index\Index\program');
    }
    }
    public function programlist(){
        $p_name=empty($_GET['p_name'])?'':$_GET['p_name'];
        $where=[];
        if (!empty($p_name)){
            $where[]=['p_name','like',"%$p_name%"];
        }
        $p=empty($_GET['p'])?1:$_GET['p'];
        $p_num=2;
        $db=new DB();
        $arr=$db->join('p_type','p_type.t_id=program.t_id')->where($where)->page($p,$p_num)->findAll('program');
        $count=$db->join('p_type','p_type.t_id=program.t_id')->where($where)->count('program');
        $page=new Page();
        $str=$page->p_page($count,$p_num);

        $this->assign('str',$str);
        $this->assign('arr',$arr);
        $this->display('programlist');
    }
      public function delete(){
        $p_id=$_GET['p_id'];
        $db=new DB();
        $where=[['p_id','=',$p_id]];
        $res=$db->where($where)->delete('program');
        if ($res==1){
            $this->success('删除成功','\index.php\index\Index\programlist');
        }else{
            $this->error("删除失败",'\index.php\index\Index\programlist');
        }
      }
      public function edit(){
     $p_id=$_GET['p_id'];
     $db=new DB();
     $where=[['p_id','=',$p_id]];
     $res=$db->findAll('p_type');
     $arr=$db->where($where)->find('program');

     $this->assign('arr',$arr);
     $this->assign('res',$res);
     $this->display();
      }
      public function update(){
     $data=$_POST;
     $p_img=$_FILES['p_img'];
     if ($p_img['error']!=4){
        $file=new UploadFile();
        $file->size=6;
        $file->type=['png','jpg','jpeg','gif'];
        $file->dir="file";
        $path=$file->move($p_img);
        if ($path==false){
            echo $file->error;
        }else{
            $data['p_img']=$path;
        }
     }
     $p_id=$data['p_id'];
     $where=[['p_id','=',$p_id]];
     $db=new DB();
     $res=$db->where($where)->update('program',$data);
          if ($res==1){
              $this->success("修改成功",'\index.php\index\Index\programlist');
          }else if ($res==0) {
              $this->success("未修改",'\index.php\index\Index\programlist');
          }else{
              $this->error( "修改失败",'\index.php\index\Index\programlist');
          }
      }
















}