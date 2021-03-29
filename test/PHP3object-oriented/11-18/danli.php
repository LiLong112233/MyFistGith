<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/11/18
 * Time: 9:29
 */

/**
 * 设计模式：
 * 1.单例模式
 * 2.观察者模式
 * 3.适配器模式
 * 4.工厂模式
 */

/*
 * 单例模式为解决用户不断的实例化造成内存浪费，性能损耗
 */
class  Person{
    //3.创建一个私有的静态属性
    private static $info;

    //1.构造方法私有化
    private function __construct()
    {
    }
    //2.提供对外的出口
    public static function instance(){
         //instanceof判断一个对象是否是这个类实例的；
        if (!empty(self::$info)){
            return self::$info;
        }else{
            self::$info=new self();
        }
//        self::instance =

    }
    //4:为避免用户clone对象，设置为私有
    public function eat(){
        echo "人人要吃饭";
    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }
}
 $obj=Person::instance();//1.第一次进来 静态属性值为null ,将实例化的对象赋值给这个静态属性
//  $obj1 = clone $obj;
// $obj2=Person::instance();//2 第二次进来 静态属性不为空，那将静态属性返回给它

//$person = new Person();
//$person->eat();
//$person->instance();
//$person1 = new Person();
//$person->eat();
//$person2 = new Person();
//$person->eat();
//$person3 = new Person();
//$person->eat();