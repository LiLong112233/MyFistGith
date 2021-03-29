<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/25
 * Time: 17:57
 */
namespace app\index\controller;
 use core\Library\Controller;
 class Farther extends Controller{
     public function __construct(){
         if (empty($_SESSION['username'])){
             $this->error("您未登陆，请您重新登录",'/index.php/index/Login/login');
         }
     }

 }