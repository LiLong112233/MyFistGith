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

    public function p_page($count,$page_num){

//        $g_name = empty($_GET['g_name'])?"":$_GET['g_name'];
//        $g_price = empty($_GET['g_price'])?"":$_GET['g_price'];
        $info = $_GET;
        $page_str="";
        if (!empty($_GET)){
             unset($info['p']);
             foreach ($info as $k=>$v){
                $page_str.= '&'.$k.'='.$v;
             }
         }
        //获取总条数
        $page = ceil($count/$page_num);
        $str = "";
        for ($i=1;$i<=$page;$i++){
            if ($this->p==$i){
                $str .= "<a href='?p=$i".$page_str."'><font color='red'>$i</font></a>&nbsp;&nbsp;";
            }else{
                $str .= "<a href='?p=$i".$page_str."'>$i</a>&nbsp;&nbsp;";
            }
        }
        return $str;
    }
}




