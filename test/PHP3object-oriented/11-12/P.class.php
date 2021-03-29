<?php 

class p{
public $p;

public function __construct(){
	$p=empty($_GET['p'])?1:$_GET['p'];
	$this->p=$p;
}


public function page($count,$page_num){
	$pag= ceil ($count/$page_num);
    $str="";
    for ($i=1; $i <=$pag ; $i++) { 
    $str .="<a href='?p=$i'>$i</a>"
    }
   return $str;


}






}











 ?>