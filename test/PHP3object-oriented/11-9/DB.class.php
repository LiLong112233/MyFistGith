<?php 

    class DB{

    	public $link;//数据库的链接对象


    
        //链接数据库
        // public function connect(){

        // 	$link =mysqli_connect('127.0.0.1','root','root','cms');

        // 	// var_dump($link);
 

           
        //     $this->link = $link;
        // }

        public function __construct(){
             $config=include('config.php');
        	 $link =mysqli_connect($config['host'],$config['account'],$config['pwd'],$config['database']);
             $this->link = $link;
        }

        //插入单条数据
        public function insert($table,$arr){

          //做链接操作
           // var_dump($this->link);exit;
          //写sql
//            print_r($arr);
            $key_str="";//用来接收了列名
            $val_str="";//用来接收值
            foreach ($arr as $k=>$v){
                $key_str .= '`'.$k.'`'.',';
                $val_str .= "'".$v."'".',';
            }

            $key_str = rtrim($key_str,',');
            $val_str = rtrim($val_str,',');
//            echo $key_str."<br>";
//            echo $val_str; exit;
        	$time = date('Y-m-d H:i:s',time());
//            insert into cate (news_title,news_man,`desc`) values('社会新闻','王庆凯',date('Y-m-d H:i:s',time()))

        	$sql = "insert into `$table` ($key_str) values($val_str)";
          //执行sql
           // echo $sql;exit;
        	$query = mysqli_query($this->link,$sql);

            $id = mysqli_insert_id($this->link);
            if ($id){
                return true;
            }else{
                return false;
            }
//            echo $id;
        	// if ($query) {
        	// 	echo ;
        	// }

//        	var_dump($query);
        }

        //插入多条数据
        public function insertAll($table,$arr){

            foreach ($arr as $k=>$v){
                $key_str = "";
                $val_str = "";
                foreach ($v as $k1=>$v1){
                     $key_str .= '`'.$k1.'`'.',';
                     $val_str .= "'".$v1."'".',';
                }
                $key_str = rtrim($key_str,',');
                $val_str = rtrim($val_str,',');
                $sql = "insert into `$table`($key_str) values($val_str)";

                $query = mysqli_query($this->link,$sql);
                $id = mysqli_insert_id($this->link);

            }
        }

    }

 


   $db = new DB();//构造方法是实例化时自动触发
   
   // $db->connect();
//   $arr =['news_title'=>'美国新闻','news_man'=>'顾生壮','news_time'=>'2020-11-09'];
//   $db->insert('cate',$arr);
    //插入单条数据
//    $arr = ['username'=>'杨坤','phone'=>'1232321323','time'=>'2030'];
//    $aa = $db->insert('denglu',$arr);
//    if ($aa){
//        echo "插入成功";
//    }

     //插入多条数据
    $arr = array(
        array('news_title'=>'国际新闻4','news_man'=>'顾生壮1','news_time'=>'2020-11-09'),
        array('news_title'=>'国际新闻5','news_man'=>'顾生壮2','news_time'=>'2020-11-09'),
        array('news_title'=>'国际新闻6','news_man'=>'顾生壮3','news_time'=>'2020-11-09'),
    );
    $res =$db->insertAll('cate',$arr);
    var_dump($res);

 ?>