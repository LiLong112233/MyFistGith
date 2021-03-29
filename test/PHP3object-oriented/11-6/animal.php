<?php 

    class Animal{

        
        protected $age;
        public $sex;
       //在方法名后面的括号中定义的参数叫形参   而调用方法的地方的参数叫实参

    	//构造方法
        public function __construct($num){

             // echo "我今年".$num."岁";
        }

        //析构方法
        public function __destruct(){
        	// echo "销毁";
        }

        //当给一个不存在或者权限不够的属性 赋值时 会被自动调用
        public function __set($name,$value){//$name 是不存在的属性名或者权限不够的属性名   $value是赋的值
      
            echo "在这里".$name.'-'.$value.'<br>';

        }

        //当调用权限不够或者不存在的属性名时触发
        public function __get($name){//$name 是权限不够或者不存在的属性名 

        	echo $name.'在哪里';
        }




    }

  
   $cat = new Animal(18);//实例化时触发构造方法
   
   // unset($dog);
   // echo "你好";

   $cat->name="顾生壮";
   $cat->age = 3;
   $cat->sex ="男";
   
   echo $cat->age;
   echo $cat->wife;

   // echo $cat->name;


 ?>