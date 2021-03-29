<?php 

    class DB{

    	public $link;//数据库的链接对象
        public $data=[];//这里用来存储 where order limit值
//        ['where'=>$str,'order'=>'order by c_id desc','limit'=>'s']


        /** 构造方法 创建数据库对象
         * DB constructor.
         */
        public function __construct(){
             $config=include('config.php');
        	 $link =mysqli_connect($config['host'],$config['account'],$config['pwd'],$config['database']);
             $this->link = $link;
        }

        /**
         * 插入单条数据的封装
         * @param $table
         * @param $arr 传入的数组参数
         * @return bool
         */
        public function insert($table,$arr){

            $key_str="";//用来接收了列名
            $val_str="";//用来接收值
            foreach ($arr as $k=>$v){
                $key_str .= '`'.$k.'`'.',';
                $val_str .= "'".$v."'".',';
            }
            $key_str = rtrim($key_str,',');
            $val_str = rtrim($val_str,',');

        	$time = date('Y-m-d H:i:s',time());

        	$sql = "insert into `$table` ($key_str) values($val_str)";
          //执行sql
        	$query = mysqli_query($this->link,$sql);

            $id = mysqli_insert_id($this->link);
            if ($id){
                return true;
            }else{
                return false;
            }
        }

        /**插入多条数据的封装
         * @param $table
         * @param $arr
         * @return bool
         */
        public function insertInAll($table,$arr){

             foreach ($arr as $k=>$v){

                 $key_str = "";
                 $val_str ="";
                 foreach ($v as $k1=>$v1){
                    $key_str .= '`'.$k1.'`'.',';  //$k=0  $key_str =`news_title`,`news_man`,`news_time`,
                    $val_str .= "'".$v1."'".',';  //$k=0  $val_str = '国际新闻7','顾生壮1'，'2020-11-09',
                 }
                 $key_str = rtrim($key_str,',');
                 $val_str = rtrim($val_str,',');
                 $sql = "insert into `$table`($key_str) values($val_str)";
                 $query = mysqli_query($this->link,$sql);
                 $id = mysqli_insert_id($this->link);
             }
             if ($id){
                 return true;
             }else{
                 return false;
             }
        }

        /**
         * where条件处理
         */
        public function where($where){
            if (!empty($where)){
                $str ="where ";
                foreach ($where as $k=>$v){
                    foreach ($v as $key=>$value){
                        if ($key ==2){
                            $str .= "'$value' ";
                        }else{
                            $str .= "$value ";
                        }
                    }
                    $str .="and ";
                }
                $str = rtrim($str,'and ');
                $this->data['where']=$str;
                return $this;

//                $data = ['a'=>1,'b'=>2]; $this->data
//                $data['a']=3;
            }
        }

        /**封装排序方法
         * @param $field  排序的字段
         * @param string $status  排序的关键字 默认 asc
         */
        public function order($field,$status='asc'){

              if (!empty($field)){
                  $order = "order by $field $status";
//                  echo $order;
                  $this->data['order'] = $order;
                  return $this;
              }
        }

    /**limit限制条数
     * @param $length
     * @param int $start
     * @return $this
     */
        public function limit($length,$start=0){

            if (!empty($length)){
                $limit = "limit $start,$length";
                $this->data['limit']=$limit;
                return $this;
            }
        }

        public function handle(){

            $handle = $this->data;
//            print_r($handle);
            if (!empty($handle)){
                $str ='';
                foreach ($handle as $k=>$v){
                    $str .= $v.' ';
                }
                return $str;//获取共有属性data中的内容
            }

        }
        /**查询单条数据
         * @param $table
         * @param $where
         */
        public function find($table)
        {
            $str = $this->handle();
            $sql = "select *from `$table` $str  limit 1";
//            echo $sql;die;
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_assoc($query);//返回一条数据
            if (!empty($res)){
                return $res;
            }else{
                return false;
            }
        }

        /**
         * 查询多条数据
         */
        public function findAll($table){
             $str = $this->handle();
//             print_r($this->data);die;
//             $where = $this->data['where'];
//             $order = $this->data['order'];
//             $limit = $this->data['limit'];
            $sql = "select *from `$table` $str";

//            echo $sql;exit;
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_all($query,1);
            if (!empty($res)){
                return $res;
            }else{
                return false;
            }
        }

    /**删除操作
     * @param $table
     * @return int
     */
        public function delete($table){
            $str = $this->handle();
            $sql = "delete from `$table` $str ";
//            echo $sql;exit;
            $query = mysqli_query($this->link,$sql);
            $num = mysqli_affected_rows($this->link);
            return $num;
        }

        public function update($table,$arr){
            $where = $this->handle();

                $str ="";
                foreach ($arr as $key=>$val){
                   $str .= '`'.$key.'`'.'='."'$val'".',';
                }
                $str = rtrim($str,',');
            $sql = "update `$table` set $str $where";
            echo $sql;
            $query = mysqli_query($this->link,$sql);
            $num = mysqli_affected_rows($this->link);
            return $num;
        }

    }

 

      $db = new DB();//构造方法是实例化时自动触发
      $where =[
          ['news_title','like','%体育%'],
      ];
//"select *from cate where news_title like '%社会%' and news_man='李子超' order by id desc limit 3
//      $db->where($where);
//      $db->where($where);

//    $res =   $db->where($where)->order('c_id','desc')->find('cate');
//     $res =   $db->where($where)->delete('cate');

//echo "<hr>";
//    print_r($res);
//     $res = $db->where($where)->order('c_id','desc')->limit(5)->findAll('cate');
//     print_r($res);
//     $db->order('age');
        $update_arr=[
            'news_title'=>'社会新闻',
            'news_man'=>'顾生壮'

        ];
//['news_title','=','社会新闻'],
//            ['news_man','=','顾生壮']
       $db->where($where)->update('cate',$update_arr);

 ?>