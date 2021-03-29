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
class Register extends Controller{

    public function register(){
        $this->display();
    }
    public function save(){
    $data=$_POST;
    $db=new DB();
    $res=$db->insert('user',$data);
    if ($res){
        $this->success('注册成功','/index.php/index/Login/login');
    }else{
        $this->error('注册失败','/index.php/index/Register/register');
    }

    }



}