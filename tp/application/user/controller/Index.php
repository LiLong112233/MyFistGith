<?php
namespace app\user\controller;
use think\Db;
use think\Request;
use think\Session;
use think\Controller;
use think\response\Redirect;
use app\model\User;
class Index extends Controller{
    public function index()
    {
        return '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px;} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:) </h1><p> ThinkPHP V5.1<br/><span style="font-size:30px">12载初心不改（2006-2018） - 你值得信赖的PHP框架</span></p></div><script type="text/javascript" src="https://tajs.qq.com/stats?sId=64890268" charset="UTF-8"></script><script type="text/javascript" src="https://e.topthink.com/Public/static/client.js"></script><think id="eab4b9f840753f8e7"></think>';

    }
    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
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
            header('refresh:2;url=?s=/user/Index/login');
        }else{
            echo "添加失败";
            echo "<script>setTimeout('history.go(-1)',2000)</script>";
            exit;
        }
    }
    public function login(){

      if (session('uid')){
      $this->success('您已登录，正在跳转至个人中心','/index.php?s=user/Index/center');
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
//         header('refresh:2;url=?s=/user/Index/ulist');
//
//        }else if(!empty($ress &&!empty($bbb) )){
//            $_SESSION['user_name']=$ress['user_name'];
//            header('refresh:2;url=?s=/user/Index/ulist');
//         echo "登陆成功";
//        }else if(!empty($reess&&!empty($ccc))){
//            $_SESSION['user_name']=$reess['user_name'];
//
//            header('refresh:2;url=?s=/user/Index/ulist');
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
                $this->error('您的账户由于登录失败次数过多，已将您的账户冻结，请一小时后再试','/index.php?s=user/Index/login');
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
             session('uid',$res['uid']);
             session('user_name',$res['user_name']);
             session('login_time',$last_time);
             $this->success('登录成功','/index.php?s=user/Index/center');
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
    public function center() {
        $aaa=session('uid');
        if (!isset($aaa)){
            echo "您未登录请您登录后查看";
            header('refresh:2;url=index.php?s=/user/Index/login');
            exit();
        }
      $arr=Db::table('p_users')->where('uid',session('uid'))->find();
        $today= strtotime(date('Y-m-d'));

       $res=Db::table('p_qiandao')->where('uid','=',$aaa)
              ->where("qiandao_time",'>=',$today)->find();

       if ($res){
           $res['qiandao_time']=date('Y-m-d H:i:d',$res['qiandao_time']);
           $arr['res']=$res;
       }else{
          $arr['res'] =[];
       }
       $photo=$arr['photo'];
    return view('center',$arr );

}
    public function update(){

        $arr=Db::table('p_users')->where('uid',session('uid')) ->find();
         return view('update',$arr );
}
   public function updatedo(){
  $data=$_POST;
  $uid=$data['uid'];
       $arr=Db::table('p_users')->where('uid',session('uid')) ->find();
//  echo"<pre>";print_r($data);echo"</pre>";die;
  $res=Db::name('p_users')->where('uid',$uid)->update($data);
//       echo Db::getLastSql($res);

  if ($res==1){
      $this->success('修改成功','/index.php?s=user/Index/center');
  }else if ($res==0){
      $this->success('未修改' ,'/index.php?s=user/Index/center');
  }else{
      $this->error('修改失败','/index.php?s=user/Index/center');
  }
}
   public function qiandao(){

        $data=[
          'uid'=>$_POST['uid'],
          'qiandao_time'=>time()
        ];
//        $bb=['integral'=>$integral];
    $res=Db::name('p_qiandao')->insert($data);
//    $aa=Db::table('p_qiandao')->where('uid',$data['uid'])->find();
//    $integral=$aa['integral']+10;
//    $cc=Db::name('p_qiandao')->where('uid',$data['uid'])->update(['integral'=>$integral]);
    Db::table('p_users')->where('uid','=',$data['uid'])->setInc('integral',10);
        if ($res){
            $this->success('签到成功','/index.php?s=user/Index/center');
        }else{
            $this->error('签到失败','/index.php?s=user/Index/center');
        }
}
    public function changepass(){
        return view();
    }
    public function changepassdo(){
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
                     $this->success('密码修改成功','/index.php?s=user/Index/out');
                 }else{
                     $this->error('修改失败','/index.php?s=user/Index/center');
                 }

            }else{
                $this->error('确认密码错误','/index.php?s=user/Index/center');
            }
         }else{
             $this->error('原密码错误','/index.php?s=user/Index/center');
         }



    }
    public function uplode(){
        return view();
    }
    public function uploaddo(){
        $file=request()->file('image');
        $filename='photo/';
            $into=$file->move($filename);
            if($into){
                echo $into->getExtension();
                echo $into->getSaveName();
                echo $into->getFilename();
                $the=$filename.$into->getSaveName();
                $res=Db::table('p_users')->where('uid',session('uid'))->update(['photo'=>$the]);
                echo Db::getLastSql($res);
                if ($res){
                $this->success('上传成功','/index.php?s=user/Index/center');
            }else{
                $this->error('上传失败','/index.php?s=user/Index/center');
            }
            }else{
                echo $file->getError();
            }

////
////            echo"<pre>";print_r($res);echo"</pre>";die;
//
    }
   public function out(){
    session('uid',null);
    session('user_name',null);
    session('login_time',null);
    return redirect('/index.php?s=user/Index/login');
}
   public function goodslist(){
    $p_num=10;
//    $arr=Db::table('p_goods')->limit($offer,$p_num)->select();
//    echo"<ul>";
//    foreach ($arr as $k => $v){
//        echo "<li>";
//        echo "商品Id:".$v['goods_id'];
//      echo "商品名称：".$v['goods_name'];
//      echo "</li>";
//    }
//       echo"</ul>";
//    $count_num=Db::table('p_goods')->all();
//    $count=count($count_num);
//    $page=ceil($count/$p_num);
//    $str="";
//    for ($i=1;$i<=$page;$i++){
//        $str .=" <a href='index.php?s=user/Index/goodslist&page=$i'>$i</a> &nbsp; ";
//    }
//     echo"<pre>";echo$str;echo"</pre>";
   $list = Db::name('p_goods')->paginate($p_num,false,[
       'query'=> [
           's'=>'user/Index/goodslist'
           ]]);
//   echo Db::getLastSql();
//    echo"<pre>";print_r($list);echo"</pre>";
       $page=$list->render();
   $this->assign('list',$list);
   $this->assign('page',$page);
   return $this->fetch();

   }
   public function json(){
        $page=empty($_GET['page'])?1:$_GET['page'];
        $p_num=10;
        $offert=($page-1)*$p_num;
        $arr=Db::table('p_goods')->limit($offert,10)->select();

        echo json_encode($arr);
   }
   public function ajax(Request $request){
   $user_name=$request->get('user_name');
   $email=$request->get('email');
   $tel=$request->get('tel');
   if ($user_name){
       $u=Db::table('p_users')->where("user_name",$user_name)->find();
       if ($u){
           $request=[
             'error'=>99,
             'msg'=>'用户名已存在'
           ];

       }else{
           $request=[
               'error'=>0,
               'msg'=>'用户名可以使用'
           ];
       }
       echo json_encode($request);
   }
   if ($email){
       $u=Db::table('p_users')->where("email",$email)->find();
       if ($u){
           $request=[
             'error'=>999,
             'msg'=>'该邮箱已存在'
           ];
       }else{
           $request=[
               'error'=>0,
               'msg'=>'邮箱可以使用'
           ];
       }
       echo json_encode($request);
   }
   if ($tel){
       $u=Db::table('p_users')->where("tel",$tel)->find();
       if ($u){
           $request=[
             'error'=>999,
             'msg'=>'手机号已存在'
           ];
       }else{
           $request=[
               'error'=>0,
               'msg'=>'手机号可以使用'
           ];
       }
       echo json_encode($request);
   }




   }
   public function toupiao(){
       $id=$_SERVER['REMOTE_ADDR'];
       $data=Db::table('toupiao')->where('ip',$id)->all();
       if ($data){
           $this->error('您已参与投票，3秒后退出投票系统');
       }
        return view();
   }
   public function toupiaodo(){
       $id=$_SERVER['REMOTE_ADDR'];
       $data=Db::table('toupiao')->where('ip',$id)->all();
       if ($data){
           $this->error('您已参与投票，3秒后退出投票系统');
       }
        $user_name=session('user_name');
       if ($user_name){
           $food=$_POST['food'];
           $ip=$_SERVER["REMOTE_ADDR"];
           $data=[
               'ip'=>$ip, 'food'=>$food,'user_name'=>$user_name
           ];
           $arr=Db::table('toupiao')->insert($data);
           if ($arr){
               $this->success('投票成功','/index.php?s=user/Index/toupiaolist');
           }
       }else{
           $food=$_POST['food'];
           $ip=$_SERVER["REMOTE_ADDR"];
           $data=[
               'ip'=>$ip, 'food'=>$food
           ];
           $arr=Db::table('toupiao')->insert($data);
           if ($arr){
               $this->success('投票成功','/index.php?s=user/Index/toupiaolist');
           }
       }

   }
   public function toupiaolist(){
        $user_name=session('user_name');
        if ($user_name){
            $user_name=$user_name;
            $tomato=Db::table('toupiao')->where('food',1)->count();
            $eggplant=Db::table('toupiao')->where('food',2)->count();
            $potato=Db::table('toupiao')->where('food',3)->count();
            $onion=Db::table('toupiao')->where('food',4)->count();
            $data=[

                'user_name'=>$user_name,
              'tomato'=>$tomato,
                'eggplant'=>$eggplant,
                'potato'=>$potato,
                'onion'=>$onion,

            ];

            return view('toupiaolist',$data);
        }else{
            $tomato=Db::table('toupiao')->where('food',1)->count();
            $eggplant=Db::table('toupiao')->where('food',2)->count();
            $potato=Db::table('toupiao')->where('food',3)->count();
            $onion=Db::table('toupiao')->where('food',4)->count();
            $data=[
                [
                'tomato'=>$tomato,
                'eggplant'=>$eggplant,
                'potato'=>$potato,
                'onion'=>$onion,
                'user_name'=>"匿名"
                    ]
            ];
            return view('toupiaolist',$data);
        }

   }
   public function reserve1(){
        $user_name=session('user_name');
       if (!isset($user_name)){
           $this->error('您未登录请您登录后预订餐桌','/index.php?s=/user/Index/login');
       }
        $list=Db::table('reserve')->all();
        $data=[
            'user_name'=>$user_name,
            'list'=> $list,
        ];
        //echo"<pre>";print_r($data);echo"</pre>";
       return view('reserve1',$data);
   }
   public function reservedo(Request $request){
     $id=$request->post('id');
     $tel=$request->post('tel');
     $email=$request->post('email');
     $IDnumber=$request->post('IDnumber');
     $user_name=session('user_name');
      $data=[
          'tel'=>$tel,
          'email'=>$email,
          'IDnumber'=>$IDnumber,
          'user_name'=>$user_name,
          'state'=>1
      ];
      $res=Db::table('reserve')->where('id',$id)->update($data);
      if ($res){
          $request=[
            'error'=>0,
              'mgs'=>"预订成功"
          ];
      }else{
          $request=[
            'error'=>999,
            'mgs'=>"预订失败"
          ];
      }
      echo json_encode($request);
   }
//预订
    public function reserve_ajax(Request $request){
        $id=$request->post('id');
        $u=Db::table('reserve')->where("id",$id)->update(['state'=>1]);
    }
    public function is_login(){
        $aaa=session('uid');
        if (!isset($aaa)){
            echo "您未登录请您登录后查看";
            header('refresh:2;url=index.php?s=/user/Index/login');
            exit();
        }
    }

}