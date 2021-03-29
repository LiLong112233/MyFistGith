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
class Login extends Controller {
    public function login(){

        $this->display('login');
    }


    public function  logindo(){
    $username=$_POST['username'];
    $pwd=md5($_POST['pwd']);
    $db=new DB();
    $where=[
        ['username','=',$username],
        ['pwd','=',$pwd]
    ];
    $res=$db->where($where)->find('user');
    if ($res){
        $_SESSION['username']=$username;
        $this->success('登录成功','/index.php/index/Index/booklist');
    }else{
        $this->error('登录失败','/index.php/index/Login/login');
    }


    }




}