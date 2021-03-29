<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\View;
use app\model\User;
session_start();
class Index extends Controller
{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';

    }
    public function login()
    {
      return view();
    }
    public function logindo(Request $request){
        $user_name=$request->post('user_name');
        $pass=$request->post('pass');
         $res=Db::table('user')->where('user_name',$user_name)->where('pass',$pass)->find();

         if ($res){
             $_SESSION['user_name'] =$user_name;
             $_SESSION['u_id']=$res['u_id'];
             $this->success('登录成功 正在跳转增加页面','/index.php?s=admin/Index/insert');
         }else{
             $this->error('登录失败');
         }
    }
    public function insert(){

        if (isset($_SESSION['user_name'])){
            $aa=$_SESSION['user_name'];
        }else{
            $this->error('您未登录，请您登录后访问','/index.php?s=admin/Index/login');
        }
        $arr=Db::table('type')->all();
        $data['user_name']=$aa;
        $data['type']=$arr;
        return view('insert',$data);
    }
    public function insertdo(Request $request){
       $data['n_name']=$request->post('n_name');
       $data['n_desc']=$request->post('n_desc');
       $data['n_man']=$request->post('n_man');
       $data['n_type']=$request->post('n_type');
//       echo"<pre>";print_r($data);echo"<pre>";
    $res=Db::table('news')->insert($data);
      if ($res){
       $this->success('新闻添加成功','/index.php?s=admin/Index/newslist');
      }else{
          $this->error('新闻添加失败');
      }
    }
   public function newslist(Request $request){

       if (isset($_SESSION['u_id'])){
           $aa=$_SESSION['u_id'];
       }else{
            $this->error('您未登录，请您登录后访问','/index.php?s=admin/Index/login');
       }
       $arr=Db::table('news')->
       paginate(4,true,[
           'path'=>'index.php?s=admin/Index/newslist'
       ]);
       $this->assign('list',$arr);
       return $this->fetch();
   }
   public function delect(Request $request){
       if (isset($_SESSION['u_id'])){
           $aa=$_SESSION['u_id'];
       }else{
           $this->error('您未登录，请您登录后访问','/index.php?s=admin/Index/login');
       }
        $n_id=$request->get('n_id');
       $res=Db::table('news')->where('n_id',$n_id)->delete();
       if ($res){
           $this->success('删除成功');
       }else{
           $this->error('删除失败');
       }
   }



}
