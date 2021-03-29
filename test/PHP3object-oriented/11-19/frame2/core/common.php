<?php   

//定义打印输出函数
function dump($var){
	if (is_bool($var)) {
		var_dump($var);
	}else if (is_bool($var)) {
		var_dump(null); 
	}else{
	 echo "<pre style='color:red'>";
	 var_dump($var);
	 echo "</pre>";
	}
}




?>