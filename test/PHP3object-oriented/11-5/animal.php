
<?php 

   class Animal{

   	   public $name;
   	   public $sex;
   	   public $age;

   	   const API =3.14;


   	   public function eat(){

   	   	 echo "能吃能睡";
   	   }

   	   public function run(){
         echo $this->name;

         // echo Animal::API;
         echo self::API;
   	   }

   	   // public function __construct(){
   	   // 	  echo "初始化";
   	   // }


   	   // public function __destruct(){
   	   // 	  echo "我被销毁了";
   	   // }

   }

   //实例化
   $cat = new Animal();
   
   // echo $cat->API;//输出类常量失败

   // echo Animal::API;//类外调用类常量

   // $cat->name="小花";//赋值
   // echo $cat->name;//获取值

   // $cat->eat();
   $cat->run();


   //类外  对象调用属性  和$this伪对象调用属性
   //类内  类名调用类常量 和self 调用类常量

 ?>