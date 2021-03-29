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
        include(APP.'\index\view\index\create.html');
    }

    public function save(){

        $data = $_POST;
//        dump($data);

        //php验证

        //让数据入库

        $db = new DB();
        $res =$db->insert('user',$data);
        dump($res);
    }





}