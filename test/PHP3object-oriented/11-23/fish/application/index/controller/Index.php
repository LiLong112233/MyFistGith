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
  public function  index(){
      $db=new DB();
      $res=$db->findAll('type');
      $this->assign('res',$res);
      $this->display('fish');
  }
  public function save(){
$data=$_POST;
$f_img=$_FILES['f_img'];
$file=new UploadFile();
$file->size=6;
$file->type=['png','jpg','jpeg','gif'];
$file->dir="img";
$path=$file->move($f_img);
if ($path==false){
    echo $this->error();
}
$data['f_img']=$path;
$db=new DB();
$res=$db->insert('fish',$data);
if ($res){
    $this->success('插入成功','\index.php\index\Index\fishlist');
}else{
    $this->error('插入失败');
}
  }
public function fishlist(){
$f_name=empty($_GET['f_name'])?"":$_GET['f_name'];
//$t_id =empty($_GET['t_id'])?"":$_GET['t_id'];
$where=[];
if (!empty($f_name)){
    $where[]=['f_name','like',"%$f_name%"];
}
//if (!empty($t_id)){
//    $where[]=['t_id','like','%$t_id%'];
//}
$p=empty($_GET['p'])?1:$_GET['p'];
$p_num=2;
      $db=new DB();
      $res=$db->join('type','fish.t_id=type.t_id')->where($where)->page($p,$p_num)->findAll('fish');
       $count=$db->join('type','fish.t_id=type.t_id')->where($where)->count('fish');
       $page=new Page();
       $str=$page->p_page($count,$p_num);
       $this->assign('str',$str);
      $this->assign('res',$res);
      $this->display('fishlist');
}
public function  delete(){
      $f_id=$_GET['f_id'];
      $db=new DB();
      $where =[
          ['f_id','=',$f_id]
      ];
      $res=$db->where($where)->delete('fish');
      if ($res==1){
          $this->success("删除成功",'\index.php\index\Index\fishlist');
      }else{
          $this->error("删除失败",'\index.php\index\Index\fishlist');
      }
}
public function  edit(){
      $f_id=$_GET['f_id'];
      $db=new DB();
      $res=$db->findAll('type');
      $where=[['f_id','=',$f_id]];
      $arr=$db->where($where)->find('fish');
      $this->assign('res',$res);
      $this->assign('arr',$arr);
      $this->display();
}
public function update(){
      $data=$_POST;
      $f_img=$_FILES['f_img'];
//      print_r($f_img);
      if ($f_img['error']!=4){
          $file=new UploadFile();
          $file->size=6;
          $file->type=['png','jpg','jpeg','gif'];
          $file->dir="img";
          $path=$file->move($f_img);
          if ($path==false){
              echo $file->error;
          }else{
              $data['f_img']=$path;
          }

      }

    $f_id=$data['f_id'];
    $where=[['f_id','=',$f_id]];
//print_r($data);
      $db=new DB();
      $res=$db->where($where)->update('fish',$data);
      echo $res;
      if ($res==1){
          $this->success("修改成功",'\index.php\index\Index\fishlist');
      }else if ($res==0) {
          $this->success("未修改",'\index.php\index\Index\fishlist');
      }else{
          $this->error( "修改失败",'\index.php\index\Index\fishlist');
      }
}



}
update `program` set `p_id`='2',`p_name`='晴天',`t_id`='
Notice: Undefined index: p_id in D:\phpstudy_pro\WWW\PHP3object-oriented\11-23\prefor\application\index\view\index\edit.html on line 26
',`p_man`='周杰伦',`p_status`='1' where p_id = '2' 修改失败