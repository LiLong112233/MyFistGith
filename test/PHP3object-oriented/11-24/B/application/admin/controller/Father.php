<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/24
 * Time: 15:35
 */
namespace app\admin\controller;

use core\Library\Controller;
 class Father extends Controller{

     public function __construct()
     {
         if (empty($_SESSION['admin_id'])){
             $this->error("未登录请先登录",'/index.php/admin/Login/login');
         }
     }
 }