<?php
namespace app\index\controller;
//use http\Client\Curl\User;
use think\Controller;
use think\Db;
use app\model\User;
use app\model\Order_info;
use app\model\Order_goods;
class Index extends Controller
{
    //首页
    public function index()
    {
        $uid=session('uid');
        if ($uid){
            $user_name=session('user_name');
        }else{
                $uid='';
        }
        $php_list=Db::table('p_course')->where('cat_id','1') ->limit(6)->select();
        $js_list=Db::table('p_course')->where('cat_id','2') ->limit(6)->select();
        $nginx_list=Db::table('p_course')->where('cat_id','3') ->limit(6)->select();
        $java_list=Db::table('p_course')->where('cat_id','4') ->limit(6)->select();
//        print_r($data);
//        print_r($data);/
//        $sub= substr($data[0]['goods_name'],10) ;
//        print_r($data);
        foreach ($php_list as $k=>&$v){
            $v['course_name'] =mb_substr($v['course_name'],0,15) . '...';
        }
        if ($uid){
            $data=[
                'uid'=>$uid,
                'user_name'=>$user_name,
                'php_list'=>$php_list,
                'js_list'=>$js_list,
                'nginx_list'=>$nginx_list,
                'java_list'=>$java_list
            ];
        }else{
           $data=[
               'uid'=>'',
              'user_name'=>'' ,
               'php_list'=>$php_list,
               'js_list'=>$js_list,
               'nginx_list'=>$nginx_list,
               'java_list'=>$java_list
           ] ;
        }

        return view('index',$data);
    }











}
