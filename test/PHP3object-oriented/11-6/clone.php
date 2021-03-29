
<?php 

    class Student{

        public $name='李子超';
        public $age=19;

         public function __destruct(){
               
               echo "对象被销毁了";

         }
          
         public function __clone(){
         	echo "正在克隆";
         }
    }

    
    $man = new Student();
    
    // echo $man->name.'<br>';

    
    //clone相当于又创建了一个对象 并且是个独立的个体，互相不影响
    // $woman =clone $man; 
    // $woman->name ="马百帅";
    // echo $woman->name;

    $woman = $man;
    // // var_dump($woman);

    $woman->name ="王庆凯";
    echo $woman->name;

    echo $man->name;





 ?>