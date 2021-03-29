<?php 

class Person{
	public $name ;
    public $age;
    public $sex;
   
    public function like(){
    	echo "红色，蓝色，白色、、、、、、、";
    }
    public function sleep(){
    	echo "床上，沙发，地铺。。。。。。。";
    }

    public function test(){
    	echo $this->name;

    	$this->like();
    	$this->sleep();
    }

}
// $object = new Person();

// $object->name="哎哎哎";
// var_dump($object);
// $object->like();

// $object->test();

// echo $object->name;


class IPhone{
    public $name='中兴';

    public $tel='110';

    public $size='6.6';

    public function sss(){
    	echo "牛呗啊";
    } 
    public function abcd(){
    	echo "66666666啊";
    } 
    public function test(){
    	echo $this->name,
    	$this->tel,
        $this->size
    	;
    	$this->sss();
        $this->abcd();
    }




}
// $object=new IPhone();

// // $object->name="少时诵诗书所所";
// var_dump($object);




// $object->test();
  
  class Log{
  	public $name;
  	public $tel;
  	public $size='5cm';
  	public function goods(){
  		echo "veray good 非常好看";
  	}
  	public function text(){
  		echo $this->name,
         $this->tel,
         $this->size
  		;
  		// $this->goods();
  	}
  
  }
   $Log=new Log();
    $Log->name="山水情";
    $Log->tel='115119120';

   // print_r($Log);


   $Log->text();




 ?>