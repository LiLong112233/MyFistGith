<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/27
 * Time: 11:33
 */
namespace app\index\controller;
use core\Library\Controller;
use core\Library\DB;
class Login extends Controller {
    public function login(){
        $this->display();
    }
    public function save(){
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
             $this->success('登录成功','/index.php/index/Index/book');
         }else{
             $this->error('登录失败','/index.php/index/Login/login');
         }

    }
}