<?php 
class DB{
public $limk;
public $date=[];

public function link(){
   $host=include('config.php');
   $link= mysqli_connect($host['use'],$host['username'],$host['pwd'],$host['kuming'] );
   $this->link=$link;
}
public function where($where){
if (!empty($where)) {
	$str=" where ";
	foreach ($where as $key => $value) {
		foreach ($$value as $k => $v) {
		 if ($k==2) {
		  $str .=" '$v' ";
		 }else{
		  $str .= " $v ";
		 }
		}
		$str .= "and ";
	}
	$str=rtrim($str,'and ');
	$this->date['where']=$str;
}
}
   public function order($table,$sunxu='asc'){
	if (!empty($table)) {
		$order="order by $table $sunxu ";
		$this->date['order']=$order;
        return $this;
	}
}
 public function limit($p_num,$stara=0){
  if (!empty($p_num)) {
  $limit="limit $stara,$pum";
  $this->date['limit']=$limit;
  return $this;
 }
}
 public function handle(){
 	$handle=$this->date;
 	if (!empty($this->date)) {
 		$str='';
 		foreach ($handle as $key => $value) {
 			$str .="$value".' ';
 		}
 		unset($this->date);
 		return $str;
 	}
 }
public function insert ($table,$arr){
	$key="";
	$value="";
	foreach ($arr as $key => $value) {
   $key .='`'.$key.'`'.',';
   $value .="'".$value."'".',';		
	}
   $key=rtrim($key,',');
   $value=rtrim($value,',');
   $sql=" insert into `$table` ($key) values($value)";
   $query=mysqli_query($this->link  , $sql);
   $id=mysqli_insert_id($this->link);
   return $id;
}
public function inserrall($table ,$arr){
	foreach ($arr as $key => $value) {
	$key_arr="";
	$value_arr="";
	foreach ($value as $k => $v) {
	$key_arr .='`'.$k.'`'.',';
   $value_arr .="'".$v."'".',';		
	}
	   $key_arr=rtrim($key_arr,',');
   $value_arr=rtrim($value_arr,',');
	}
   $sql="insert into `$table`($key_arr)values($value_arr)";
   $query=mysqli_query($this->link,$sql);
   $id=mysqli_insert_id($this->link);
   return $id;
}
public function select($table){;
$str=$this->handle();
$sql="select*from `$table` $str";
$query=mysqli_query($this->link,$sql);
$res=mysqli_fetch_assoc($query);
if (!empty($res)) {
  return $res;
}else{
  return false;
}
}
public function selectall(){
	$str=$this->handle();
	$sql="select*form `$table` $str";
    $query =mysqli_query($this->link,$sql);
    $res=mysqli_fetch_all($query,1);
    if ($res) {
    return $res;
    }else{
    return false;
    }

}
public function delete($table){
	$str=$this->handle();
	$sql="delete from `$table` $str";
	$query=mysqli_query( $this,$sql);
	$num=mysqli_affected_rows($this->link);
	return $num;
}
public function update($table,$arr ){
	$where=$this->handle();
	$str="";
	foreach ($arr as $key => $value) {
	$str .='`'.$key.'`'.'='."'$value'".',';
	}
    $str=rtrim($str,',');
    $sql="update`$table` set $str $where";
    $query=mysqli_query($thsi->link,$sql); 
    $num = mysqli_affected_rows($this->link);
    return $num;
}
   public function join($table,$where){
//            select *from news inner join cate on news.c_id=cate.c_id
            if (!empty($table)&&!empty($where)){
                $sql = "inner join `$table` on $where";
                $this->data['join'] = $sql;
                return $this;
            }
   public function page($p,$p_num){
   	$offset=($p-1)*$p_num;
   	$sql="limit $offset,$p_num";
   	$this->date['page']=$sql;
   	return $this;
   }
    public function count ($table){
   $str = $this->handle();
   $sql="select count(*) as num from `$table` $sql ";
   $query=mysqli_query($this->link,$sql);
   $res=mysqli_fetch_assoc($query);
   return $res['num']
    }










}







 ?>