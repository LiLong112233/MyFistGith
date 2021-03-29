<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/19
 * Time: 9:53
 */
namespace app\index\controller;
use core\Library\Controller;
use core\Library\DB;
class Index extends Controller {

    public function index(){
        include (APP.'\index\view\game.html');
    }
    public  function  save(){
        $data=$_POST;
//        dump($data);
        //php验证


        //插入数据库


        $db=new DB ();
        $res=$db->insert('game',$data);
        dump($res);
        if ($res){
//            echo '插入成功';
//            header("refresh:2;url='/index.php/index/Index/userList'");
            $this->success("插入成功",'/index.php/index/Index/userList');
        }else{
//            echo"插入失败";
//            header("refresh:2;='/index.php/index/Index/imdex'");

            $this->error("插入失败",'/index.php/index/Index/imdex');
        }

    }
    public function userList(){
        $db= new DB();
        $arr=$db->findAll('game');

//         dump($arr);
//        $str=(APP."\index".'\\'."view\userList.html");
//        dump($str);
        include APP.'\index\view\userList.html';
    }
   //数据删除
   public function  delete(){
   $gid=$_GET['gid'];
   $where=[['gid','=',$gid]];
   $db=new  DB();
   $res=$db->where($where)->delete('game');
   if ($res==1){
       $this->success( '删除成功','\index.php\index\Index\userList');
   }else if ($res==0){
       $this->error('删除失败','\index.php\index\Index\userList');
   }else{
       $this->error('删除失败','\index.php\index\Index\userList');
   }
   }
   public function  edit(){
        $gid=$_GET['gid'];
        $where=[['gid','=',$gid]];
        $db=new DB();
        $res=$db->where($where)->find('game');
        $this->assign('arr',$res);
        $this->display('edit');
   }





}