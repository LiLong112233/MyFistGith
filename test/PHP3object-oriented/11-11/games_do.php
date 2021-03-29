<?php 
// $gname=$_POST['gname'];
// $gprice=$_POST['gprice'];
// $gdesc=$_POST['gdesc'];
// $b_id=$_POST['b_id'];
// $is_up=$_POST['is_up'];
$data=$_POST;
print_r($data);
include('DB.class.php');
$db=new DB();
// $arr=[
// 'gname'=>"$gname",
// 'gprice'=>"$gprice",
// 'gdesc'=>"$gdesc",
// 'b_id'=>"$b_id",
// 'is_up'=>"$is_up"
// ];

$res=$db->insert('games',$data);
if ($res) {
echo "插入成功";
header("refresh:2;url=games_list.php");
exit();
}else{
echo "插入失败";
header("refresh:2;url=games_list.php");
exit();
}



 ?>