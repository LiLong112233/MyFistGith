<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/17
 * Time: 14:03
 */

/**
 * 1.接口的关键字是interface
 * 2.接口当中全部为抽象方法(不实现），并且不写abstract
 * 3.类使用接口必须使用implements关键字来实现
 * 4.接口与接口之间可以被继承关键字extends
 */
    interface Animal{

        public function run();

    }

    interface maoke extends Animal {
        public function sleep();
    }


    class cat implements maoke{

        

        public function sleep()
        {
            // TODO: Implement sleep() method.
        }
    }