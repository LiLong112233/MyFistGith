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
        $arr=$db->findAll('type');
        $this->assign('arr',$arr);
     $this->display('type');
    }
    public function typelist(){
       $t_id=$_GET['t_id'];
       $where=[['type.t_id','=',$t_id]];
       $db=new DB();



       $count=$db->where([['t_id','=',$t_id]])->count('blog');
        $this->assign('count',$count);
        $num=$db->where([['b_num','>=',1],['b_num','<',500],['t_id','=',$t_id]])->count('blog');
        $this->assign('num',$num);
        $num2=$db->where([['b_num','>=',500],['b_num','<',1000],['t_id','=',$t_id]])->count('blog');
        $this->assign('num2',$num2);
        $num3=$db->where([['b_num','>=',1000],['t_id','=',$t_id]])->count('blog');
        $this->assign('num3',$num3);
        $type=$db->where($where)->find('type');
        $this->assign('type',$type);
        $arr=$db->join('blog','type.t_id=blog.t_id')->where($where)->findAll('type');
        if (empty($arr)){
            $arr=[];
        }
       $this->assign('arr',$arr);
        $this->display();
    }
    public function delete(){
        $t_id=$_GET['t_id'];
        $where=[['t_id','=',$t_id]];
        $db=new DB();
        $res=$db->where($where)->delete('type');
        if ($res){
            $this->success('删除成功','/index.php/index/Index/index');
        }else{
            $this->error('删除失败','/index.php/index/Index/index');
        }
    }







}