<?php 
class Nba{
	public $name;
	public $age;
	public $height;
  
  public function __construct(){
  	echo "NBA球员介绍";
  }
 public function play(){
 	echo "打的漂亮";
 }
public function run(){
	echo "跑的好快呀";
}
public function __destruct(){
	echo "NBA结束了";
}
}
$Nba=new Nba;

$Nba->play();

$Nba->run();

unset($Nba);

class Singer{
	public $name ;
	public $age;
	public $sex;
	public function __construct(){
		echo "歌手介绍";
	}
    public function sing(){
    	echo "唱功好棒啊";
    }
    public function dance(){
    	echo "舞蹈好棒呐";
    }
    public function __destruct(){
    	echo "歌手介绍结束";
    } 
}

  $Singer=new Singer;
    $Singer->name="周杰伦";
    echo $Singer->name;
    $Singer->sing();
    $Singer->dance();
    unset($Singer);


class computer{
	public $name="DELL";
	public $cpu;
	public $type;
    public function __construct(){
    	echo "电脑介绍";
    }
    public function paofen(){
    	echo "跑分很高呀";
    }
    public function res(){
    $this->name='HP';
      echo $this->name;
    $this->paofen();
    }
    public function __destruct(){
    	echo "结束介绍";
    }
}
$computer = new computer;
$computer->res();
unset($computer);

class cup {
	public $type;
	public $name;
	public function __construct(){
		echo "水杯"; 	
	}
	public function waiguan(){
		echo "好看";
	}
	public function __destruct(){
		echo "goood";
	}
}
$cup =new cup;
 $cup->waiguan();
 unset($cup);
class music{
	public $name="我就是我";
	public $Singer="宋宇宁";
	public $type="流行";
	public function __construct(){
		echo "歌曲开始演奏";
	}
	public function sign() {
    echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
	}
	public function __destruct(){
		echo "歌曲终结";
	}
}
$music=new music;
$music->sign();
unset($music);
echo "<br>";
class school {
	public $name;
	public static $age=18;
	public function __construct(){
		echo "开始证明";
	}
	public function Techer(){
		echo "棒棒哒";
	}
	public static function student(){
		echo "哈哈哈";
	}
    public static function res(){
        
    	echo self :: $age;
    }


	public function __destruct(){
		echo "结束证明";
	}
}
$school=new school;
$school->name="清华";
echo $school->name;
$school->Techer();
// unset($school);
echo "<br>";
school :: student();
echo school :: $age ;


school :: res();
echo "<br>";
unset($school);

 class SSS{
 	public $name='花花';
 	public static $nae='画画';
 	public function Bay(){
 		echo "花花哗哗";
 	}
    public static function Old(){
    	echo "花花哗啦啦";
    	echo self :: $nae;
    }
    public static function res(){
    	self :: Old();
    }

 }
$rew=new SSS;
echo $rew->name;
echo "<br>";
$rew ->Bay();
echo "<br>";

 echo  SSS :: $nae;
 echo "<br>";
 SSS :: Old();
 echo "<br>";
 SSS :: res();








































 ?>