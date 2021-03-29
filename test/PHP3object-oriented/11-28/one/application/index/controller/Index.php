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
         $arr=$db->findAll('movietype');
        $this->assign('arr',$arr);
        $this->display('tv');
    }
    public function ajax(){
        $c_name=$_GET['c_name'];
        $where=[['c_name','=',$c_name]];
        $db=new DB();
        $res=$db->where($where)->find('movie');
        if ($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }
    public function save(){
        $data=$_POST;
        $c_img=$_FILES['c_img'];
        $file=new UploadFile();
        $file->size=6;
        $file->type=['jpg','jpeg','png'];
        $file->dir="img";
        $path=$file->move($c_img);
        $data['c_img']=$path;
        $db=new DB();
        $res=$db->insert('movie',$data);
        if ($res){
            $this->success('添加成功','/index.php/index/Index/tvlist');
        }else{
            $this->error('添加失败','/index.php/index/Index/inde');
        }
    }
    public function tvlist(){
        $c_name=empty($_GET['c_name'])?'':$_GET['c_name'];
        $t_id=empty($_GET['t_id'])?'':$_GET['t_id'];

        $where=[];
        if (!empty($c_name)){
            $where[]=['c_name','like',"%$c_name%"];
        }
        if (!empty($t_id)){
            $where[]=['movie.t_id','=',$t_id];
        }
        $this->assign('c_name',$c_name);




        $p=empty($_GET['p'])?1:$_GET['p'];
        $p_num=2;
        $db=new DB();
        $arrr=$db->findAll('movietype');
        $arr=$db->join('movietype','movie.t_id=movietype.t_id')->where($where) ->page($p,$p_num)->findAll('movie');
        if (empty($arr)){
            $arr=[];
        }
        $count=$db->join('movietype','movie.t_id=movietype.t_id')->where($where)->count('movie');
        $page=new Page();
        $str=$page->p_page($count,$p_num);
        $this->assign('arrr',$arrr);
        $this->assign('t_id',$t_id);
        $this->assign('str',$str);
        $this->assign('arr',$arr);
        $this->display();
    }
public function delete()
{
    $id = $_GET['id'];
    $where = [['id', '=', $id]];
    $db = new DB();
    $res = $db->where($where)->delete('movie');
    if ($res) {
        $this->success('删除成功', '/index.php/index/Index/tvlist');
    } else {
        $this->error('删除失败', '/imdex.php/index/Index/tvlist');
    }
}
public function update(){
        $id=$_GET['id'];
     $where = [['id', '=', $id]];
     $db = new DB();
     $res=$db->findAll('movietype');
     $arr=$db->where($where)->find('movie');
     $this->assign('res',$res);
     $this->assign('arr',$arr);
    $this->display();
}
public function updatedo(){
        $data=$_POST;
        $id=$data['id'];
        $where=[['id','=',$id]];
    $c_img=$_FILES['c_img'];
    if ($c_img['error']!=4){
    $file=new UploadFile();
    $file->size=6;
    $file->type=['jpg','jpeg','png'];
    $file->dir="img";
    $path=$file->move($c_img);
    if ($path){
       echo $this->error($file->error);
    }
    $data['c_img']=$path;

}
    $db=new DB();
    $res=$db->where($where)->update('movie',$data );
    if ($res== 1){
        $this->success('修改成功','/index.php/index/Index/tvlist');
    }else if($res==0){
        $this->error('未修改','/index.php/index/Index/tvlist');
    }else{
        $this->error('修改失败');
    }


}









}