<?php 
$gname=$_GET['gname'];
$where=[['gname','=',$gname]];
include('../../demo/DB.class.php');
$db=new DB();
$res=$db->where($where)-> find('games');
if ($res) {
 // return true;
	echo 'yes';
}else{
    echo 'no';
}




 ?>