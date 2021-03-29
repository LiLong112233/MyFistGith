
<?php 



     

    class  Mysql{


       public $ip;
       public $username;
       public $pwd;
       public $dataBase;

      //构造方法
       public function __construct(){
         
         $this->ip ='127.0.0.1';
         $this->username='root';
         $this->pwd ='root';
         $this->dataBase='lening';

       }



    }


    $mysql = new Mysql();
    var_dump($mysql);



 ?>