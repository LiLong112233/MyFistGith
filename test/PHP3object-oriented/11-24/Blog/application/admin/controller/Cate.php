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
class Cate  extends Father {
    //博文分类页面
public  function  cate(){
     $c_man =$_SESSION['username'];

    $this->assign('arr',$c_man);
    $this->display();

}
public function save()
{
    $data = $_POST;

    $db = new DB();
    $res = $db->insert('cate', $data);
    if ($res) {
        $this->success("添加成功", '/index.php/admin/Cate/catelist');
    } else {
        $this->error("添加失败", '/index.php/admin/Cate/cate');
    }
}
public function  catelist(){
    $db=new DB();
    $arr=$db->findAll('cate');
    $this->assign('arr',$arr);






    $this->display();
}





}