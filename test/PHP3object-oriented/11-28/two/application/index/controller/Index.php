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
        $db=new DB();
        $arr=$db->findAll('woketype');
        $this->assign('arr',$arr);
         $this->display('employee');
    }
    public function save(){
        $data=$_POST;
        $db=new DB();
        $res=$db->insert('employee',$data);
        if ($res){
            $this->success('添加成功','/index.php/index/Index/emlist');
        }else{
            $this->error('添加失败','/index.php/index/Index/employee');
        }
    }
    public function  emlist(){
     $p=empty($_GET['p'])?1:$_GET['p'];
     $p_num=2;



   $db=new DB();
        $sum=$db->sum('employee','age');
        $this->assign('sum',$sum);
        $max=$db->max('employee','age');
        $this->assign('max',$max);
        $min=$db->min('employee','age');
        $this->assign('min',$min);
        $avg=$db->avg('employee','age');
        $this->assign('avg',$avg);
   $arr=$db->join('woketype','employee.w_id=woketype.w_id')->page($p,$p_num)->findAll('employee');
   $count=$db->join('woketype','employee.w_id=woketype.w_id')->count('employee');
   $this->assign('count',$count);
   $page=new Page();
   $str=$page->p_page($count,$p_num);
   $where=[['sex','=','男']];
   $man_num=$db->where($where)->count('employee');
   $this->assign('man_num',$man_num);
   $where=[['sex','like','女']];
   $wan_num=$db->where($where)->count('employee');
   $this->assign('wan_num',$wan_num);
   $this->assign('str',$str);
  $this->assign('arr',$arr);
  //年龄小于40；
        //
        //
        //

        $where=[['age','<',40]];
        $xy40=$db->join('woketype','employee.w_id=woketype.w_id')->where($where)->findAll('employee');
        $this->assign('xy40',$xy40);

        //姓李员工；
        $where=[['name','like',"%李%"]];
        $na=$db->join('woketype','employee.w_id=woketype.w_id')->where($where)->findAll('employee');
        $this->assign('na',$na);
     //
    //









   $this->display();
    }


}