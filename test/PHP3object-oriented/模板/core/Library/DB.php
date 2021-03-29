<?php 
   namespace core\Library;
    class DB{

    	public $link;//数据库的链接对象
        public $data=[];//这里用来存储 where order limit值

        /** 构造方法 创建数据库对象
         * DB constructor.
         */
        public function __construct(){
             $config=include(CONFIG.'\config.php');
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
            }
            return $this;

        }

        /**封装排序方法
         * @param $field  排序的字段
         * @param string $status  排序的关键字 默认 asc
         */
        public function order($field,$status='asc'){

              if (!empty($field)){
                  $order = "order by $field $status";
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

    /**条件处理数据
     * @return string
     */
        public function handle(){

            $handle = $this->data;

            if (!empty($handle)){
                $str ='';
                foreach ($handle as $k=>$v){
                    $str .= $v.' ';
                }
                unset($this->data);
                return $str;//获取共有属性data中的内容
            }
        }
        /**查询单条数据
         * @param $table
         * @param $where
         */
        public function find($table)
        {
            //通过处理方法获取处理后的数据
            $str = $this->handle();
            $sql = "select *from `$table` $str  limit 1";
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
            $sql = "select *from `$table` $str";
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
            $query = mysqli_query($this->link,$sql);
            $num = mysqli_affected_rows($this->link);
            return $num;
        }

        /**封装的修改方法
         * @param $table
         * @param $arr 一维数组
         * @return int 返回的是修改的受影响的条数
         */
        public function update($table,$arr){
            $where = $this->handle();
                $str ="";
                foreach ($arr as $key=>$val){
                   $str .= '`'.$key.'`'.'='."'$val'".',';
                }
                $str = rtrim($str,',');
            $sql = "update `$table` set $str $where";
            $query = mysqli_query($this->link,$sql);
            $num = mysqli_affected_rows($this->link);
            return $num;
        }

        /**
         * @param $table
         * @param $where
         * @return $this
         */
        public function join($table,$where){
//            select *from news inner join cate on news.c_id=cate.c_id
            if (!empty($table)&&!empty($where)){
                $sql = "inner join `$table` on $where";
                $this->data['join'] = $sql;
                return $this;
            }

        }

        /**分页
         * @param $p 当前页码
         * @param $p_num  每页显示的条数
         * @return $this 当前对象
         */
        public function page($p,$p_num){
            if (!empty($p)){
                $offset = ($p-1) *$p_num;
                $sql = "limit $offset,$p_num";
                $this->data['page']=$sql;
            }

            return $this;
        }

        /**查询总条数
         * @param $table
         * @return mixed
         */
        public function count($table){
            $str = $this->handle();
            $sql = "select count(*) as num from `$table` $str";
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_assoc($query);
            return $res['num'];
        }
        /*平均值*/
        public function avg ($table,$aaa='*') {
            $str = $this->handle();
            $sql = "select avg ($aaa) as num from `$table` $str";
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_assoc($query);
            return $res['num'];
        }
        /* 最大值 */
        public function max ($table,$aaa='*') {
            $str = $this->handle();
            $sql = "select max($aaa) as num from `$table` $str";
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_assoc($query);
            return $res['num'];
        }
        /*最小值*/
        public function min ($table,$aaa='*') {
            $str = $this->handle();
            $sql = "select min($aaa) as num from `$table` $str";
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_assoc($query);
            return $res['num'];
        }
        /*总和*/
        public function sum ($table,$aaa='*') {
            $str = $this->handle();
            $sql = "select sum($aaa) as num from `$table` $str";
            dump($sql);
            $query = mysqli_query($this->link,$sql);
            $res = mysqli_fetch_assoc($query);
            return $res['num'];
        }
    }
 ?>