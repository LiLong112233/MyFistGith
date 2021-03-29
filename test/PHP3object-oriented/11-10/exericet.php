<?php 
class DB{
	public $link;
    // public $where;
    // public $order;

    public $data=[];
    public $datado;
   public function aaa(){
     $aaa=implode($this->data,'   ' );
     $this->datado=$aaa;
    }

     public function __construct(){
             $config=include('config.php');
        	 $link =mysqli_connect($config['host'],$config['account'],$config['pwd'],$config['database']);
             $this->link = $link;
        }    
    public function select($where){
    	if (!empty($where)) {
    		$str="where ";
    		foreach ($where as $key => $value) {
    		 foreach ($value as $k => $v) {
    		  if ($k==2) {
    		  	$str .="'$v'";
    		  }else{
    		  	$str .="$v ";
    		  }
    		 }
            $str .="and ";
    		}
          $str =rtrim($str,'and ');
          $this->data['where']=$str;
          return $this;
    	}
     } 

  public function order($by,$paixu='asc'){
      if (!empty($by)) {
        $order="order by $by $paixu";
       // echo $order;
        $this->data['order']=$order;
        return $this;

      }
    }

//     public function fing($table){
//        $where = $this->where;
//        // echo $where;
//        $sql="select*from `$table` $where ";
//        // echo $sql;
//        $query=mysqli_query($this->link,$sql);
//        $res=mysqli_fetch_assoc($query);
//        if (!empty($res)) {
//        	 return $res;
//        }else{
//        	 return false;
//        }
//     }
// }
   public function selectall($table){
    // $where=$this->data['where'];
    // $order=$this->data['order'];
    $datado= $this->datado;
    echo $datado;
    $sql="select*from `$table` $datado ";
    $query=mysqli_query($this->link,$sql);
    $res=mysqli_fetch_all($query,1);
    if (!empty($res)) {
      return $res;
    }else{
      return false;
    }
   }

}




$db =new DB();
$where =[
['c_id','like','%1%']
// ['c_man','=','乖壮壮3']
];
$res = $db->select($where)->order('c_id')->selectall('cate');
print_r($res);

echo $db->aaa();




 ?>