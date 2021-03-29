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
        $arr=$db->findAll('p_type');
        $this->assign('arr',$arr);
       $this->display('program');
    }
    public function ajax(){
        $p_name=$_GET['p_name'];
//        dump($c_name);
        $where=[['p_name','=',$p_name]];
        $db=new DB();
        $res=$db->where($where)->find('program');
        if ($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }
    public function save(){
        $data=$_POST;
        $p_img=$_FILES['p_img'];
        $file=new UploadFile();
        $file->size=6;
        $file->type=['jpg','jpeg','png'];
        $file->dir="img";
        $path=$file->move($p_img);
        if ($path){
            $data['p_img']=$path;
        }else{
            $this->error($file['error']);
        }
        $db=new DB();
        $res=$db->insert('program',$data);
        if ($res){
            $this->success('添加成功','/index.php/index/Index/programlist');
        }else{
            $this->error('添加失败','/index.php/index/Index/index');
        }
    }
    public function programlist(){
        $p_name=empty($_GET['p_name'])?'':$_GET['p_name'];
        $this->assign('p_name',$p_name);
        $t_id=empty($_GET['t_id'])?'':$_GET['t_id'];
        $this->assign('t_id',$t_id);
        $p_status=empty($_GET['p_status'])?'':$_GET['p_status'];
        $this->assign('p_status',$p_status);

        $where=[];
        if (!empty($p_name)){
            $where[]=['p_name','like',$p_name];
        }
        if (!empty($t_id)){
            $where[]=['program.t_id','=',$t_id];
        }
        if (!empty($p_status)){
            $where[]=['p_status','=',$p_status];
        }

        $p=empty($_GET['p'])?1:$_GET['p'];
        $p_num=2;
        $db=new DB();
        $res=$db->findAll('p_type');
        $arr=$db->join('p_type','program.t_id=p_type.t_id')->where($where)->page($p,$p_num)->findAll('program');
        if (empty($arr)){
            $arr=[];
        }
        $count=$db->join('p_type','program.t_id=p_type.t_id')->where($where)->count('program');
        $page=new Page();
        $str=$page->p_page($count,$p_num);
        $this->assign('res',$res);
        $this->assign('str',$str);
        $this->assign('arr',$arr);
        $this->display();
    }
    public function  delete (){
        $p_id=$_GET['p_id'];
        $where=[['p_id','=',$p_id]];
        $db=new DB();
        $arr=$db->where($where)->find('program');
        $res=$db->where($where)->delete('program');
        if ($res){
            unlink($arr['p_img']);
            $this->success('删除成功','/index.php/index/Index/programlist');
        }else{
            $this->error('删除失败','/index.php/index/Index/programlist');
        }
    }
    public function  update(){
        $p_id=$_GET['p_id'];
        $where=[['p_id','=',$p_id ]];
        $db=new DB();
        $res=$db->findAll('p_type');
        $this->assign('res',$res);
        $arr=$db->where($where)->find('program');
        $this->assign('arr',$arr);
    $this->display();
    }
    public function updatedo(){
        $p_id=$_POST['p_id'];
        $where=[['p_id','=',$p_id]];
        $data=$_POST;
        $p_img=$_FILES['p_img'];
        if ($p_img['error']==0) {
            $file = new UploadFile();
            $file->size = 6;
            $file->type = ['jpg', 'jpeg', 'png'];
            $file->dir = 'img';
            $path = $file->move('$p_img');
            $data['p_img']=$path;
        }
    $db=new DB();
        $res=$db->where($where)->update('program',$data);
        if ($res==1){
            $this->success('修改成功','/index.php/index/Index/programlist');
        }else if ($res==0) {
            $this->error('未修改','/index.php/index/programlist');
        }else{
            $this->error('修改失败');
        }
    }




}