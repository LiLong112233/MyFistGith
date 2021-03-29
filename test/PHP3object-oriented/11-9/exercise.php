<?php 
  class DB{
   public $link;

   public function __construct(){
   	$type= include('type.php');
   	$link=mysqli_connect($type['host'],$type['username'],$type['pwd'],$type['name']);
   	$this->link=$link;
   }
    // public function insert( $table,$arr  ){
    //  // echo "$table";
    //  // print_r($arr);
    //  // $arr_key=array_keys($arr);
    //  // print_r($arr_key);
    //       $arr_key="";
    //       $arr_values="";
    // 	foreach ($arr as $k => $v) {
    // 		$arr_key .='`'.$k.'`'.',';
    // 		$arr_values .="'".$v."'".',';
    // 	}
    // 	$arr_key= rtrim($arr_key,',');
    // 	$arr_values=rtrim($arr_values,',');
    // 	// echo $arr_key;
    // 	// echo $arr_values;
    //     // echo $arr_key;
    //     // echo $arr_values;



    // 	$sql="insert into`$table`($arr_key) values($arr_values)";
          
    //     $query=mysqli_query($this->link,$sql);
    //     if ($query) {
    //     	echo "添加成功";
    //     }
    // }
    public function insertall ($table,$arr ){
    	// print_r($arr);exit();
       foreach ($arr as $key => $value) {
        // print_r($value);exit();
       	$key_str="";
       	$value_sta="";
        foreach ($value as $key2 => $value2) {
          $key_str .='`'.$key2.'`'.',';
          $value_sta .="'".$value2."'".',';
        }
      $key_str=rtrim($key_str,',');
      $value_sta=rtrim( $value_sta,',');
      echo $value_sta.'<br>';
      $sql="insert into $table ($key_str)values($value_sta)";
      $query=mysqli_query($this->link,$sql);
      $id=mysqli_insert_id($this->link);
     }

 if ($id) {
      	return true;
       }else{
       	return false;
       }


      }

    public function insertal($table,$arr){
    foreach ($arr as $key => $value) {
     $key_str="";
     $value_str="";
     foreach ($value as $keyy => $valuee) {
     	$key_str .='`'.$keyy.'`'.',';
     	$value_str .="'".$valuee."'".',';
     }
     $key_str=rtrim($key_str,',');
     $value_str=rtrim($value_str,',');
     $sql="insert into $table ($key_str)values($value_str)";
     $query=mysqli_query($this->link,$sql);
     $id=mysqli_insert_id($this->link);
    }
 if ($id) {
      	return true;
       }else{
       	return false;
       }
    }


public function  insertalAll($table,$arr){
	foreach ($arr as $key => $value) {
	$key_str="";
	$value_str="";
	foreach ($value  as $keyy => $valuee) {
	$key_str .='`'.$keyy.'`'.',';
	$value_str="'".$valuee."'".',';
	}
	$key_str=rtrim($key_str,',');
	$value_str=rtrim($value_str,',');
	$sql="insert into $table($key_str) values($value_str)";
	$query=mysqli_query($this->link,$sql);
	$id=mysqli_insert_id($rhis->id);
	}
	if ($id) {
		return true;
	}else{
		return false;
	}
}








    









    public function select(){
      $sql="select *from cate";
      $query=mysqli_query($this->link,$sql);
      $arr=mysqli_fetch_all($query,1);
        // print_r($arr);
      return  $arr;
    	}

  }
$db=new DB ();
// $db->select();
// $res=$db->select();
// // $db->insert();
 $arr=array(
array('c_title'=>'国内新闻1','c_man'=>'乖壮壮,睡觉觉'),
array('c_title'=>'国内新闻2','c_man'=>'乖壮壮，睡觉觉'),
array('c_title'=>'国内新闻3','c_man'=>'乖壮壮3')
	);
  $res = $db->insertAll('cate',$arr);

var_dump($res);


 ?>