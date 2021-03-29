<?php 
 class page{
  public $p;
  public function __coustruct(){
  	$p =empty($_GET['p'])?1:$_GET['p']
  	$this->$p;
  }
  public function pag($count,$page_num){
  	$page=ceil($count/$page_num);
  	$str="";
  for ($i=1; $i <=$page ; $i++) { 
  	if ($this->p==$i) {
  	$str .="<a href='?p=$i'><font>$i</font> </a>"
  	}else{
  		$str .="<a href='?p=$i ' > $i</a>"
  	}
  }


return $str;

  }






 }









 ?>