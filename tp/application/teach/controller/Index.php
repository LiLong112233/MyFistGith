<?php
namespace app\teach\controller;
use think\Db;
use think\Request;
use think\Session;
use think\Controller;
use think\response\Redirect;
use app\model\User;
class Index extends Controller{
    //注册
    public function reg(){
       return view ('reg' );
    }
    public function regdo(){
        //接收数据
        $user_name=$_POST['user_name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];
        $tel=$_POST['tel'];
        //时间戳
        $reg_time= date('Y-m-d H:i:s');
        //组成添加数组
        $data=  ['user_name' =>$user_name, 'email' => $email, 'tel' =>$tel, 'pass' =>$pass,'reg_time'=>$reg_time ];
       //用户名判断
        $res=Db::table('p_users')->where('user_name',$data['user_name'])->find();

       if (!empty($res)){
           echo "用户名已存在";
           echo "<script>setTimeout('history.go(-1)',2000)</script>";
           exit;
       }
       //邮箱判断
       $ress=Db::table('p_users')->where('email',$data['email'])->find();
       if (!empty($ress)){
           echo "该邮箱已存在";
           echo "<script>setTimeout('history.go(-1)',2000)</script>";
           exit;
       }
       //电话号码判断
       $reess=Db::table('p_users')->where('tel',$data['tel'])->find();
         session('null');

       if (!empty($reess)){
           echo "该电话已存在";
           echo "<script>setTimeout('history.go(-1)',2000)</script>";
           exit;
       }
       //密码6位判定
       if (strlen($data['pass'])<6){
           echo "密码不能小于6位";
           echo "<script>setTimeout('history.go(-1)',2000)</script>";
           exit;
       }
       //密码与确认密码的判断
       if($data['pass']!=$pass){
          echo "密码与确密码不符请再次输入";
           echo "<script>setTimeout('history.go(-1)',2000)</script>";
           exit;
       }
//
        $data['pass'] = password_hash($data['pass'],PASSWORD_BCRYPT);
//
//        $aaa=Db::name('p_users')->insert($data);/
           $aaa =User::create($data);
        if ($aaa){
            echo "添加成功";
            header('refresh:2;url=?s=/teach/Index/login');
        }else{
            echo "添加失败";
            echo "<script>setTimeout('history.go(-1)',2000)</script>";
            exit;
        }
    }
    //登录
    public function login(){

      if (session('uid')){
      $this->success('您已登录，正在跳转至个人中心','/index.php?s=teach/Index/mycourse');
      }else{
          return view ('login' );
      }
  }
    public function logindo(){
        $user_name=$_POST['user_name'];
        $pass=$_POST['pass'];
        $new=time();
//     print_r($data);
//
//      $res=Db::table('p_users')->where('user_name',$data['user_name'])->find();
//      print_r($res);
//        if (!empty($res)){
//            $aaa=password_verify($data['pass'],$res['pass']);}
//      $ress=Db::table('p_users')->where('email',$data['user_name'])->find();
//        if (!empty($ress)) {
//            $bbb = password_verify($data['pass'], $ress['pass']);
//        }
//      $reess=Db::table('p_users')->where('tel',$data['user_name'])->find();
//        if (!empty($reess)){
//            $ccc=password_verify($data['pass'],$reess['pass']);
//        }
//        if (!empty($res)&&!empty($aaa) ){
//            $_SESSION['user_name']=$res['user_name'];
//         echo "登录成功";
//         header('refresh:2;url=?s=/teach/Index/ulist');
//
//        }else if(!empty($ress &&!empty($bbb) )){
//            $_SESSION['user_name']=$ress['user_name'];
//            header('refresh:2;url=?s=/teach/Index/ulist');
//         echo "登陆成功";
//        }else if(!empty($reess&&!empty($ccc))){
//            $_SESSION['user_name']=$reess['user_name'];
//
//            header('refresh:2;url=?s=/teach/Index/ulist');
//         echo "登录成功";
//        }else{
//          echo "登录失败";
//        }

      $res=Db::table('p_users')
         ->where(['user_name'=>$user_name])
          ->whereOr(['email'=>$user_name])
         ->whereOr(['tel'=>$user_name])
         ->find();
//      $gg=Db::table('p_login_history')->where('uid',$res['uid'])->find();
//      if (!empty($gg)){
//
//        if ($gg['error_num']==3){
//            $num=($gg['login_time']+3600)-time();
//            if ($num<=0){
//               Db::table('p_login_history')->where('uid',$gg['uid'])->update(['error_num'=>0]);
//            }
//            echo "您已登录错误超过3次,请一小时后登录该账户";
//            echo "<script>setTimeout('history.go(-1)',2000)</script>";
//            exit;
//        }
//      }

       $time=time();
//        echo $time;
// echo"<pre>";print_r($new-3600);echo"</pre>";die;
        if (!empty($res)){
            $aaaa=Db::table('p_login_history')->where('uid',$res['uid'])
                ->where('status',0)
                ->where('login_time','>',$new-3600 )
                ->order('id','desc')->all();
//      echo Db::getLastSql($aaaa);
            if (count($aaaa)>=3){
                $this->error('您的账户由于登录失败次数过多，已将您的账户冻结，请一小时后再试','/index.php?s=teach/Index/login');
                exit();
            }
        }
//    echo"<pre>";print_r($res);echo"</pre>";
      if ($res){
         if ( password_verify($pass, $res['pass'])){
             $last_time= time();
             $dd=[
                 'uid'=>$res['uid'],
                 'user_name'=>$res['user_name'],
                 'login_time'=>$last_time,
                 'status'=>1
             ];
             $pp= Db::table('p_login_history')->where('uid',$dd['uid'])->insert($dd);
             $last= date('Y-m-d H:i:s');
//             User::create([  'last_login'=>$last            ]);
              User::where('uid',$res['uid'])->update(['last_login'=>$last]);


             session('uid',$res['uid']);
             session('user_name',$res['user_name']);
             session('login_time',$last_time);
             $this->success('登录成功','/index.php?s=teach/Index/mycourse');
         }else{
             echo "密码错误登录失败";
             $last_time= time();
             $dd=[
               'uid'=>$res['uid'],
               'user_name'=>$res['user_name'],
               'login_time'=>$last_time,
                 'status'=>0
             ];
//            if (empty($gg)){
//                $gg['uid']=0;
//            }
//             if ($res['uid']!=$gg['uid']){
//                 Db::table('p_login_history')->insert($dd);
//             }
             $pp= Db::table('p_login_history')->where('uid',$dd['uid'])->insert($dd);

             echo "<script>setTimeout('history.go(-1)',2000)</script>";
             exit;
                }
      }else{
          echo "用户名错误 登录失败";
          echo "<script>setTimeout('history.go(-1)',2000)</script>";
          exit;
      }

  }
   //退出
    public function out(){
    session('uid',null);
    session('user_name',null);
    session('login_time',null);
    return redirect('/index.php?s=teach/Index/login');
}
   //个人中心
    public function mycourse() {
        $uid=session('uid');
        //防违法登录
        if (!isset($uid)){
            $this->error( "您未登录请您登录后查看" ,'index.php?s=teach/Index/login');
        }
        $arr['uid']=$uid;
        //查找用户信息
      $arr=Db::table('p_users')->where('uid',session('uid'))->find();
      //查找学习中的课程
     $stu= Db::table('p_course')->join('my_course','p_course.course_id = my_course.course_id')
          ->where('uid',$uid)->select();
     //查找收藏课程
     $fav= Db::table('p_course')->join('p_course_fav','p_course.course_id = p_course_fav.course_id')
          ->where('uid',$uid)->select();
      //echo '<pre>';print_r($stu);die;

     $data=[
       'arr'=>$arr,
       'stu'=>$stu,
         'fav'=>$fav
     ];

    return view('mycourse',$data );

}
    //首页
    public function index()
    {
        $uid=session('uid');
        if ($uid){
            $user_name=session('user_name');
            $data=[
              'uid'=>$uid,
                'user_name'=>$user_name,
            ];
        }else{
            $data=[
                'uid'=>''
            ];
        }
       $php_list=Db::table('p_course')->where('cat_id','1') ->limit(6)->select();
//        print_r($data);
//        print_r($data);/
//        $sub= substr($data[0]['goods_name'],10) ;
//        print_r($data);
      foreach ($php_list as $k=>&$v){
           $v['course_name'] =mb_substr($v['course_name'],0,15) . '...';
      }
      $data=[
       'php_list'=>$php_list,
      ];
        return view('index',$data);
    }
    //修改信息
    public function update_user(){
         $uid = session('uid');
       $data= Db::table('p_users')->where('uid',$uid)->find();
       return view('update_user',$data);
    }
    public function update_userdo(){
        $uid=session('uid');
        $arr=Db::table('p_users')->where('uid',$uid)->find();
        $data=$_POST;
        $img=$_FILES['photo'];
       if ($img['error']==4){
         $data['photo']=$arr['photo'];
       }else{
           $file=request()->file('photo');
           $filename='photo/';
           $into=$file->move($filename);
           $images=$filename.$into->getSaveName();
           $data['photo']=$images ;
       }

       $res =User::where('uid',$arr['uid'])->update($data);
       if ($res==1){
           $this->success('修改成功','/index.php?s=teach/Index/mycourse');
       }else if($res==0) {
           $this->error('未修改','/index.php?s=teach/Index/mycourse');
       }else{
           $this->error('修改失败','/index.php?s=teach/Index/mycourse');
       }
    }
     //修改密码
    public function myrepassword(){
       return view();
    }
    public function myrepassworddo(){
        $uid=session('uid');
        $pass=$_POST['pass'];
        $newpass=$_POST['newpass'];
        $newpassdo=$_POST['newpassdo'];

        $res=Db::table('p_users')->where('uid',$uid)->find();
        if (password_verify($pass, $res['pass'])){
            if ($newpass==$newpassdo){
                $data['pass'] = password_hash($newpass,PASSWORD_BCRYPT);
                $aaa=Db::table('p_users')->where('uid',$uid)->update($data);
                if ($aaa==1){
                    $this->success('密码修改成功','/index.php?s=teach/Index/out');
                }else{
                    $this->error('修改失败');
                }

            }else{
                $this->error('确认密码错误');
            }
        }else{
            $this->error('原密码错误');
        }
    }




}