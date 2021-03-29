<?php
namespace app\course\controller;
use think\Db;
use think\Request;
use think\Session;
use think\Controller;
use think\response\Redirect;
use app\model\User;
use function Couchbase\passthruEncoder;

class Index extends Controller{
    public function index()
    {
    }
    //课程页面
    public function detail(Request $request){
        $uid=session('uid');
        $user_name=session('user_name');
        $course_id=$request->get('course_id');
        $data=Db::table('p_course')->where('course_id',$course_id)->find();
        $sta=Db::table('my_course')->where('course_id',$course_id)->where('uid',$uid)->find();
        if ($sta){$sta=$sta;}else{$sta['id']=0;}
        $fav=Db::table('p_course_fav')->where('course_id',$course_id)->where('uid',$uid)->find();
        if ($fav){$fav=$fav;}else{$fav['id']=0; }
        $data['fav']=$fav['id'];
        $data['sta']=$sta['id'];
        $data['uid']= $uid;
        $data['user_name'] = $user_name;

        return view('detail',$data);

    }
    //加入学习，开始学习
    public function detaildo(Request $request){
        $uid=session('uid');
        $user_name=session('user_name');
        $course_id=$request->get('course_id');
        $aaa=[
            'uid'=>$uid,
            'course_id'=>$course_id,
            'add_time'=>time()
        ];
        $data=Db::table('p_course')->where('course_id',$course_id)->find();
        $arr=Db::table('my_course')->where('uid',$uid)->where('course_id',$course_id)->find();
        if ($arr){

        }else{
            Db::table('my_course')->insert($aaa);
        }

        $data['uid']= $uid;
        $data['user_name'] = $user_name;
        return view('detaildo',$data);
    }
    //课程页面 收藏问题的ajax
    public function collectajax(Request $request){
        $uid=session('uid');
        if (!isset($uid)){
            $this->error( "您未登录请您登录后查看" ,'index.php?s=teach/Index/login');

        }
        $course_id=$request->post('course_id');
        $data=[
            'course_id'=>$course_id,
            'uid'=>$uid,
            'add_time'=>time()
        ];
      $ree=Db::table('p_course_fav')->where('course_id',$course_id)->where('uid',$uid)->find();
      if ($ree){
          $response=[
           'erron'=>445,
              'msg'=>"您已收藏该课程"
          ];
      }else{
          $res=Db::table('p_course_fav')->insert($data);
          if ($res){
              $response=[
                  'error'=>0,
                  'msg'=>'ok'
              ];
          }else{
              $response=[
                  'error'=>303,
                  'msg'=>'收藏失败'
              ];
          }
      }


      return json($response);
    }
   public function deleteajax(Request $request){
       $uid=session('uid');
       if (!isset($uid)){
           $this->error( "您未登录请您登录后查看" ,'index.php?s=teach/Index/login');

       }
        //课程id
        $id=$request->post('id');
        $res=Db::table('p_course_fav')->where('uid',$uid)->where('course_id',$id)->delete();
        if ($res){
            $response=[
                'error'=>0,
                'msg'=>'ok'
            ];
        }else{
            $response=[
                'error'=>450,
                'msg'=>'收藏失败'
            ];
        }
        return json_encode($response);
   }
    //课程详情
    public function video(Request $request){
        $uid=session('uid');
        $user_name=session('user_name');
        $course_id=$request->get('course_id');
        $data=Db::table('p_course')->where('course_id',$course_id)->find();
        $data['uid']= $uid;
        $data['user_name'] = $user_name;
        print_r($data);
        return view('video',$data);
    }


}