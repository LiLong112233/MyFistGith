<?php 

    
    // include('./one/A.class.php');
    // include('./one/B.class.php');
    //自动加载

   //1 需要自己定义一个函数 （对路径做拼接处理 放在include() 函数中）
   //2 是将自定义函数名放在spl_autoload_register；
    function auto($name){
        $filename = $name.'.class.php';

        $path = "./one/".$filename;
        // echo $path;
        if (!file_exists($path)) {
        	echo "此类文件不存在";
        }else{
        	include($path);
        }

        // include("./one/B.class.php");
    }
   spl_autoload_register('auto');

    $D =new  C();

    // $B = new B();
    

 ?>