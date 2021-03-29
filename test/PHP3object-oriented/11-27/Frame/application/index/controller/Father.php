<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/27
 * Time: 9:58
 */
namespace app\index\controller;

use core\Library\Controller;
class Father extends Controller{
    public function __construct()
    {
        if (empty($_SESSION['id'])){
            $this->error("未登陆,请先登陆",'\index.php\index\Login\login');
        }
    }
}