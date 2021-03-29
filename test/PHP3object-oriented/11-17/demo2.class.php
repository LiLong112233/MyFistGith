<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/17
 * Time: 13:58
 */

 abstract class Animal{
     abstract function run();
 }

 abstract class maoki extends Animal {
     abstract function eat();
 }

 class cat extends maoki{

     public function run()
     {
         // TODO: Implement run() method.
     }

     public function eat()
     {
         // TODO: Implement eat() method.
     }
 }