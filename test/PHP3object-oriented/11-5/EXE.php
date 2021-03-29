<?php 
@define(TA, ddd);
echo TA;


class CAT{
	const APP = 987.654321;
	const FTP = 'ABCabc';
    public function  res(){
    	echo self::APP;
    	echo self::FTP;
    }
    public static $name="sss"; 
    public static function assa(){
    	echo "牛呗";
    	echo CAT :: $name;

    }


}

// $cat=new CAT();
// echo $cat::APP ;
// // echo   self::APP;
// $cat->res();
 CAT :: assa();
 echo CAT :: $name;
 ?>