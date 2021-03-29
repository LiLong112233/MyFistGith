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

 public function index(){

         //查询所有的分类信息
         $db = new DB();
         $cate = $db->findAll('category');
         $this->assign('cate',$cate);

         //文章推荐
         $where = [
           ['b_is','=',1]
         ];
         $res1 = $db->where($where)->findAll('blog');
         $this->assign('res1',$res1);

         //最新文章
         $res2 =$db->order('b_time','desc')->findAll('blog');
         dump($res2);

//         dump($res);
//         $this->display();

 }
public function xsb(){
     echo "这是新随笔";
}
 public function indexList(){
     $this->display();
 }

 public function detail(){
     $this->display();
 }

}