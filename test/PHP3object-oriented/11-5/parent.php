<?php 


     class Parent1{
        

        public $car ="哈弗H6";

        public $money ='30万';

        public $house = 2;

        private $wife="小红";

        public function run(){
            // echo $this->wife;
        	echo "跑的非慢";
        }

     }


     // $father = new Parent1();
     // // var_dump($father);
     
     // echo $father->run();


     

     class Son extends Parent1{
      

        public function run(){
            Parent::run();//
        	echo "跑的非快";
        }
        
     }


     $son = new Son();
     echo "<br>";
     // var_dump($son);

     // echo $son->wife;
     // echo $son->car;

     $son->run();
    

    //一个子类继承一个父类。如果子类当中没有与父类相同的方法，那咱们去调用父类的方法，直接可以对父类方法中的内容做输出
     //如果 子类当中的方法与父类当中的方法相同，并且被子类调用，子类将会重写父类的方法

     //如果子类当中加上parent::父类中的方法 ，这样，父类子类方法中的内容都会输出出来



 ?>