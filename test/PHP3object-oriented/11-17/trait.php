<?php 
trait one{
	public function num() {
    echo "数字";
	}
}
trait two{
	public function ber(){
	echo "二ber";
	}
}
trait three{
	public function aaa(){
		echo "三aaa";
	}
}
class the{
	use one,two,three;
}
$the=new the();
$the ->num();
$the ->ber();
$the->aaa();











 ?>