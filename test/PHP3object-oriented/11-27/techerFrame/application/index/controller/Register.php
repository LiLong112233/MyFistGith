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
 class Register extends Controller{

     //注册的显示页面
     public function register(){

         $this->display();
     }
     //注册的操作方法
     public function save(){

         $data = $_POST;
         $db = new DB();
         $data['pwd'] = md5($data['pwd']);
         $res =$db->insert('login',$data);
         if ($res){
             $this->success('注册成功','\index.php\index\Login\login');
         }else{
             $this->error('注册失败','\index.php\index\Register\register');
         }
     }
 }