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
class Login extends Controller{
    public function login(){
        $this->display();
    }
    public function  save(){
        $username=$_POST['username'];
        $pwd=md5($_POST['pwd']);
        $where=[
            ['username','=',$username],
            ['pwd','=',$pwd]
        ];
        $db=new DB();
        $res=$db->where($where)->find('user');
        if ($res){
            $_SESSION['username']=$username;
            $this->success('登录成功','/index.php/index/Index/noticelist');
        }else{
            $this->error('登录失败','/index.php/index/Login/login');
        }

    }
}