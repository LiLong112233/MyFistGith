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

    public  function book(){
        $db=new DB();
        $arr=$db->findAll('bookcate');
        $b_man=$_SESSION['username'];
        $this->assign('arr',$arr);
        $this->assign('b_man',$b_man);
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


}