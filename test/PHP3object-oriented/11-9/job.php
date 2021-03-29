<?php 

class DB {
public $link;
 public function __construct(){
   	$type= include('jobdo.php');
   	$link=mysqli_connect($type['host'],$type['username'],$type['pwd'],$type['name']);
   	$this->link=$link;
   }
// public function insert($table,$arr){
// 	// print_r($arr);
// $key_str="";
// $value_str="";
// foreach ($arr as $key => $value) {
// 	$key_str .='`'.$key.'`'.',';
// 	$value_str .="'".$value."'".',';
// }
// $key_str=rtrim($key_str,',');
// $value_str=rtrim($value_str,',');
// $sql="insert into `$table` ($key_str) values($value_str)";
// $query=mysqli_query($this->link,$sql);
// if ($query) {
//  return true;
// }else{
//  return false;
// }

// }
public function insertAll($table,$arr){
	foreach ($arr as $key => $value) {
		$key_str="";
		$value_str="";
		foreach ($value as $keyy => $valuee) {
	   $key_str .='`'.$keyy.'`'.',';
	   $value_str .="'".$value_str."'".',';
		}
		$key_str=rtrim($key_str,',');
		$value_str=rtrim($key_str,',');
		$sql="insert into $table ($key_str)values($value_str)";
		$query=mysqli_query($this->link,$sql);
		$id=mysqli_insert_id($this->link);
	}
	if ($id) {
  return true;
	}
  return false;
}

                    }
$db=new DB();
$arr=array(
	array('content'=>'二师兄','nid'=>'2'),
	array('content'=>'师傅','nid'=>'5'),
	array('content'=>'牛魔王','nid'=>'6')
	);
$res= $db->insertAll('xyjmessage',$arr);  
var_dump($res);








 ?>