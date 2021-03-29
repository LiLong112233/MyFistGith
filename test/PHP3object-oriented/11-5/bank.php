<?php 

   class Bank{

       public function lilv(){

       	  echo "中国人民银行的利率为0.11%";
       }

   }


   class gongshang extends Bank{
      

        public function lilv(){

        	echo "工商银行的利率为0.09%";
        } 
    

   }


   class nonghang extends Bank{

   	   public function lilv(){
           echo "农行的利率为0.10%";

   	   }
   }


   $gs = new gongshang();//工商对象

   $gs->lilv();


   $nh = new nonghang();//农行对象

   $nh->lilv();


 ?>