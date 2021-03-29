<?php 

class Circles{
  const PI = 3.14;
  protected $name="7.62";
  private static $age=18;
  public function CirclesL(){
  	echo 2*self::PI*3;
  } 
  public function Add(){
  	echo $this->name;
  }
  public static function AG(){
  	echo self::$age;
  }
  protected function dog(){
  	echo "拉耶拉不多";
  }
  public function res(){
  	$this->dog();
  }




}




 ?>