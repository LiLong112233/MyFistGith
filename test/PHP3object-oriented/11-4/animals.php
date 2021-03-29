<?php 
class Animals {
	public $name;
	public $sex;
	public $age; 
	public $height;

   public function __construct(){
     $this->name='猎豹';
     $this->age=9.99;
     $this->sex='公';
     $this->height=2;
   }

	public function run(){
		echo "在动物世界跑的快便是生存王道";
	}
	public function sleep(){
		echo "要想生存栖息地为最为重要的基础";
	}
    public function res(){
    	echo $this->name,$this->sex,$this->age,$this->height;
    	$this->run();
    	$this->sleep();
    }


}

// $a=new Animals();
// $a->res();






class Mysql{
	public $id;
	public $username;
	public $pwd;
	public $dateBase;
    
    public function __construct(){
     $this->ip='127.0.0.1';
     $this->username='root';
     $this->pwd='123456';
     $this->dateBase='cms';
     echo "已创建构造";
    }
     public  function connect(){
      echo mysqli_connect('$this->id','$this->username','this->pwd','this->dateBase');
     }
     
    public function __destruct(){
    echo "该对象已被销毁了呀";
    }
}
  $a=new Mysql;






  echo "13232";







 ?>