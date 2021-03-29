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
class Farther extends Controller{

    public function __construct()
    {
        if (empty($_SESSION['username'])){
            $this->error('您未登陆，请先登陆','/index.php/index/Login/login');
        }
    }


}