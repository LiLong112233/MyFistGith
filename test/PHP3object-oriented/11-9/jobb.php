<?php 
cLass Job{

}
spl_autoload_register('auto');
function auto($bb){
	$filename=$bb.'.class.php';
	$path="./one/".$filename;
	if (file_exists($path)) {
	include $path;
	}else{
	echo "您要加载的文件",$filename."不存在";
	}
}




$job=new Job();
$a=new a();
echo $a->name;




 ?>