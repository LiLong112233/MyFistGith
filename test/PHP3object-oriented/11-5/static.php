<?php 


  class Person{

     public $name='小名';

     public static $age=18;//静态属性
     // static public  $age;
     
     public function run(){

     	echo self::$age;
     }


     public static function eat(){//静态方法

     	// echo "顾生壮喜欢吃喝玩乐";

     	// echo $this->name;
     	echo self::$age;

     }

     public function test(){

     	self::eat();
     }

  }
   
  // $hum = new Person();
  //通过对象来调用普通属性
  // echo $hum->name;
  //通过类名来调用静态属性 （必须加$）
  // echo Person::$age;


  // $hum->run();

  // $hum->eat();
   //静态方法的调用：  1.可以通过对象直接静态方法  2  可以通过类名直接调用静态方法
  Person::eat();

    // $hum->test();

  //注意  静态方法中不能使用$this，静态方法中不能调用普通属性和方法，只能调用静态属性和方法

   $hum1 = new Person();
   $hum2 = new Person();
   $hum3 = new Person();
   $hum4 = new Person();
  


 ?>