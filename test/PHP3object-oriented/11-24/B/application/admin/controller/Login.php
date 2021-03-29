<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 10:05
 */
namespace app\admin\controller;
use core\Library\Controller;
use core\Library\DB;
use core\Library\UploadFile;
use core\Library\Page;
class Login extends Controller{

    //博文的页面
 public function login(){

     $this->display();
 }

 public function save(){

     $data = $_POST;
     $username = $data['username'];
     $pwd = md5($data['pwd']);
     $db = new DB();
     $where =[
       ['username','=',$username],
         ['pwd','=',$pwd]
     ];
     $res = $db->where($where)->find('login');
     if ($res){
         $_SESSION['admin_id']=$res['id'];//用户id
         $_SESSION['username']=$res['username'];//用户名
         $this->success("登录成功",'/index.php/admin/Cate/create');
     }else{
         $this->error("登录失败",'/index.php/admin/Login/login');
     }

 }


}