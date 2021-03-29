<?php 

  class Hum{

     public $name='骨生长';
     public static $age=18;

     public $sex ='男';

     public function play(){
     	echo "真能玩";
     }
     public function eat(){
     	echo "吃吃吃";

        echo 	$this->name;
        echo   $this->play();
     }

     public static function run(){
     	echo "真能跑";

     	echo self::$age;
     }





  }

   //1调用普通属性和普通方法
      //类外
       $person1 = new Hum();
       echo $person1->name;

       $person1->eat();
       $person1->run();
    
    //类内
        // 可以使用$this来调用普通属性和普通方法
       $person1->eat();



    //2 调用静态属性和静态方法   

       echo Hum::$age;//调用静态属性
       Hum::run();//调用静态方法


    //普通属性和普通方法只能通过对象的形式调用    $this
     //静态属性和静态方法 能通过类名+ ：： 来调用   self::





 ?>