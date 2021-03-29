<?php
/**
 * Created by PhpStorm.
 * User: 27341
 * Date: 2020/11/24
 * Time: 17:33
 */
namespace app\admin\controller;
use core\Library\Controller;
class Father extends Controller{
    public function  __construct()
    {
        if (empty($_SESSION['username'])){
            $this->error("您未登录，请您重新登录",'/index.php/admin/Login/login');
        }
    }
}
