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
        include (APP.'\index\view\create.html');
    }
    public  function  save(){
        $data=$_POST;
//        dump($data);
        //php验证


        //插入数据库


        $db=new DB ();
        $res=$db->insert('create',$data);
        dump($res);
        if ($res){
//            echo '插入成功';
//            header("refresh:2;url='/index.php/index/Index/userList'");
            $this->sueccess("插入成功",'/index.php/index/Index/userList');
        }else{
//            echo"插入失败";
//            header("refresh:2;='/index.php/index/Index/imdex'");

            $this->error("插入失败",'/index.php/index/Index/imdex');
        }

    }
    public function userList(){
        $db= new DB();
        $arr=$db->findAll('create');
//         dump($arr);
//        $str=(APP."\index".'\\'."view\userList.html");
//        dump($str);
        include APP.'\index\view\userList.html';
    }


}