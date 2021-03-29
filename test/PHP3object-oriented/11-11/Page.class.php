<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/11
 * Time: 9:59
 */

class Page{

    public $p;
    public function __construct()
    {
        $p = empty($_GET['p'])?1:$_GET['p'];
        $this->p=$p;
    }

    public function paginate($count,$page_num){

        //获取总条数
        $page = ceil($count/$page_num);

        $str = "";
        for ($i=1;$i<=$page;$i++){
            if ($this->p==$i){
                $str .= "<a href='?p=$i'><font color='red'>$i</font></a>&nbsp;&nbsp;";
            }else{
                $str .= "<a href='?p=$i'>$i</a>&nbsp;&nbsp;";

            }
        }
        return $str;
    }
}




