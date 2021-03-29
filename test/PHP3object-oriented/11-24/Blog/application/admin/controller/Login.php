<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/24
 * Time: 16:50
 */
namespace app\admin\controller;
use app\index\controller\Index;
use core\Library\Controller;
use core\Library\DB;
use core\Library\UploadFile;
use core\Library\Page;
class Login  extends Controller{
    //博文分类页面
    public  function  login(){
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
         $_SESSION['admin_id']=$res['id'];
         $this->success("登录成功",'/index.php/admin/Cate/cate');
     }else{
         $this->error("登录失败",'/index.php/admin/Login/login');
     }

    }





}