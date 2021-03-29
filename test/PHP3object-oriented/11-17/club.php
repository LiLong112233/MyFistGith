<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/17
 * Time: 15:38
 */

  include("./animal/cat.class.php");
include("./maoke/cat.class.php");

  use  \animal\Cat as Cat1;
  use  \aaa\Cat;

/**
 * 1.命名空间的关键字是namespace
 * 2.在namespace前面不要有任何的php代码输出
 * 3.命名空间的namespace 后面跟的命名 并不是指前面文件夹的名字
 * 4.使⽤命名空间的时候,以反斜杠 \  开头,以避免错误.
 * 5.⼀旦指定了命名空间,?使⽤这个类的时候必须带命名空间,?除⾮使⽤了 e use 指定
 * 6.使⽤ as 关键字可以给use 指定的命名空间下的类起别名
 */

$cat2 = new \animal\Cat();
$cat3 = new \aaa\Cat();


  $cat = new Cat1();
  $cat->eat();
  $cat1 = new Cat();
  $cat1->run();



