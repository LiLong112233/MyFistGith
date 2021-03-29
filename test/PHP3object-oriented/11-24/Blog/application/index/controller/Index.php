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
use core\Library\UploadFile;
use core\Library\Page;
class Index extends Controller{
public  function  index(){
    //查询所有分类信息
    $db=new DB();
    $arr=$db->findAll('cate');
    $this->assign('arr',$arr);
    $where=[['b_id','=',1]];
    $res1=$db->where($where)->find('blog');
    $this->assign('res',$res1);
    //当前文章
    $res2=$db->order('b_time','desc')->findAll('blog');
    dump($res2);


    $this->display();
}
public function  indexlist(){
    $db=new DB();
    $arr=$db->findAll('cate');
    $this->assign('arr',$arr);
    $this->display();
}
public  function detail(){
    $db=new DB();
    $arr=$db->findAll('cate');
    $this->assign('arr',$arr);
    $this->display();
}


}