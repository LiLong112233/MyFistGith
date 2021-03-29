<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/27
 * Time: 9:34
 */

 namespace app\index\controller;
 use core\Library\Controller;
 use core\Library\DB;
 class Login extends Controller{

     //登录的显示页面
     public function login(){
//         echo "来到登录页面";
         $this->display();
     }

     //登陆的操作方法
     public function save(){

         $data = $_POST;
         //用户名
         $username = $data['username'];
         //密码
         $pwd = md5($data['pwd']);
         $db = new DB();
         $where = [
             ['username','=',$username],
             ['pwd','=',$pwd]
         ];
         $res = $db->where($where)->find('login');
         if ($res){
             $_SESSION['id']=$res['id'];
             $_SESSION['username']=$res['username'];
             $this->success('登陆成功','\index.php\index\Index\index');
         }else{
             $this->error('登陆失败','\index.php\index\Login\login');
         }
     }

 }