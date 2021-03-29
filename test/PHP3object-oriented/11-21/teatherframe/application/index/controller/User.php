<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/19
 * Time: 9:50
 */
namespace app\index\controller;
use core\Library\Controller;
 class User extends Controller {

      public function getCode(){
          echo "183****6789";
          include (APP.'\index\view\game.html');
     }

     public function run(){
          echo "你好";

     }

 }