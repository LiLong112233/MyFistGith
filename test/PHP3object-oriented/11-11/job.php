<?php 
class DB{
	public $link;
	public $date=[];
    public function __construct(){
    	$aa=include('config.php');
    	$link=mysqli_connect($aa['host'],$aa['account'],$aa['pwd'],$aa['database']);
    	$this->link=$link; 
    }

//   public function insert($table,$arr){
//   	foreach ($arr as $k => $v) { 	
//   	$key_str="";
//   	$value_str="";
//   	foreach ($v as $key => $value) {
//   	$key_str .='`'.$key.'`'.',';
//   	$value_str .="'".$value."'".',';
//   	}
//     $key_str=rtrim($key_str,',');
//     $value_str=rtrim($value_str,',');
    
//     $sql="insert into `$table` ($key_str)values($value_str)";
//     echo $sql;
//     $query=mysqli_query($this->link,$sql);
// }
//     if ($query) {
//     	return true;
//     }else{
//     	return false;
//     }
//   }
    public function where ($where){
   if (!empty($where)) {
   	$str="where ";
    foreach ($where as $key => $value) {
     foreach ($value as $k => $v) {
      if ($k==2) {
      	$str .=" '$v' ";
      }else{
      	$str .=" $v ";
      }     
     }
    $str .="and ";
    }
    $str=rtrim($str,"and ");
    // echo "$str";
    $this->date['where']=$str;
    return $this;  
   }
  }
   public function order($length,$status='asc'){
   	if (!empty($length)) {
   	$order ="order by $length $status ";
   	// echo $order;
   	$this->date['order']=$order;
   	return $this;
   	}
   }
   public function limit($length,$start=0){
   	if (!empty($length)) {
   		$limit="limit $start,$length ";
   		$this->date['limit']=$limit;
        return $this;
   	}
   }
     public function handle(){
     	$handle=$this->date;
     	if (!empty($handle)) {
     		$str='';
     		foreach ($handle as $key => $value) {
     		$str .=$value.' ';
     		}
     		return $str;
     	}
     }
   public function join($table,$where){
   if (!empty($table)&&!empty($where)) {
     $sql="inner join `$table` on $where";
     $this->date['join']=$sql;
     return $this;
   }
   }
  public function count ($table){
    $sql="select count(*) as num from `$table`";
    echo $sql;
    $query=mysqli_query($this->link,$sql);
    $res=mysqli_fetch_assoc($query);
    return $res['num'];
  }
public function page ($p_num){
$pag==ceil($)
}





  public function select($table){
  // $where=$this->date['where'];
  // $order=$this->date['order'];
  // $limit=$this->date['limit'];
  	$str=$this->handle();
echo $str;
   $sql="select*from`$table` $str ";
   echo $sql;
   $query=mysqli_query($this->link,$sql);
   $res=mysqli_fetch_all($query,1);
   print_r($res);
  }
  public function delete($table){
  	$str=$this->handle();
  $sql="delete from `$table` $str ";
  echo $sql;
  $query=mysqli_query($this->link,$sql);
  $num=mysqli_affected_rows($this->link);
  return $num;
  }
  public function update($table,$arr ){
  	$str=$this->handle();
  // echo $str."<br>";
  	$ste='';
    // print_r($arr);
  	foreach ($arr as $key => $value) {
  	$ste .='`'.$key.'`'.'='."'$value'".',';
  	}
    

  	$ste =rtrim($ste,',');
  	$sql="update `$table` set $ste $str" ;
  	echo $sql;
  	$query=mysqli_query($this->link,$sql);
  	$num=mysqli_affected_rows($this->link);
  }
 
 



}


$db=new DB();
$where=[
['c_title','like','%社会%']
];
//  $res=$db->where($where)->order('c_id','asc')->limit(3)->select('cate');
 // print_r($res);
 // $delete=[
 // ['c_title','like','%国内%']
 // ];
 // $rss=$db->where($delete)->delete('cate');
 // print_r($rss);

$update_arr=[
	   'c_title'=>'社会',
            'c_man'=>'壮'
];
 // $res= $db->update('cate',$update_arr);
// print_r($res)

// $db ->where($where)->update('cate',$update_arr);
 // $db->join('class','student.c_id=class.c_id')->select('student');
 $res=$db->count('student');
 print_r($res);
 ?>