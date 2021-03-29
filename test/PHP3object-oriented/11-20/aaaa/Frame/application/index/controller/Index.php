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

class Index extends Controller{

    //插入页面
    public function index(){

        $this->display('create');
    }

    public function save(){

        $data = $_POST;

        //php验证

        //让数据入库

        $db = new DB();
        $res =$db->insert('user',$data);
        dump($res);
        if ($res){
            $this->success('插入成功','/index.php/index/Index/userList');
        }else{
            $this->error('插入失败');
        }
    }

    public function userList(){

        $db = new DB();
        $arr =$db->findAll('user');
//        dump($arr);
//        $str =APP."\index".'\\'."view\index\list.html";
//        echo $str;die;
//        include(APP.'\index\view\index\list.html');//单引号，避免\v实意化
        $this->assign('arr',$arr);
        $this->display('list');

    }





}