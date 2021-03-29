<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/20
 * Time: 10:05
 */
namespace app\index\controller;
use core\Library\Controller;
use core\Library\DB;
use core\Library\UploadFile;
use core\Library\Page;
class Father extends Controller{

    public function __construct()
    {
        if (empty($_SESSION['username'])){
            $this->error('您未登录，请您重新登录','/index.php/index/Login/login');
        }
    }

}