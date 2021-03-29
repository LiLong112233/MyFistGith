<?php 

   class Circle{


   	   const PI = 3.14;

       private $name ="安瑞丰";
   	    function circleL(){

   	   	   echo  2* self::PI *3 ;
   	   }

       public static function  circleS(){

       	   echo  self::PI * 3 *3;
       }

   	   public function Add(){
          echo $this->name;
   	   }

   	   public function  select(){

   	   }

   	   public function  update(){

   	   }

   	   public function delete(){


   	   }
   }

 ?>