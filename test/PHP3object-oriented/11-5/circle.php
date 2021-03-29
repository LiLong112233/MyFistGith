<?php 


  include('aaa.php');
  //求圆周长
   

   $cirle = new Circle();


   // echo $cirle->name;

   $cirle->circleL();

   // $cirle->circleS();
   // $Circle->Add();

   //public  公有的  也就是在  类内 类外 子类当中都可以使用
   //protected  受保护的   只能在类内和子类当中使用

   $cirle->Add();
   //private  私有的   只能类内使用
    
    
 ?>