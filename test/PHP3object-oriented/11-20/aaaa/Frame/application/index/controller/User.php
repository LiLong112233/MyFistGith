<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 9:08
 */
namespace app\index\controller;
use core\Library\Controller;
class User extends Controller{

    public function getName(){
        echo "李树彦好好听课";
//        include(APP.'\index\view\create.html');
      $this->display('aaaa');
    }
}