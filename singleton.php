<?php

class Singleton {
    // نگهداری نمونه یکتا در یک متغیر استاتیک
    private static $instance = null;

    // سازنده خصوصی به دلیل جلوگیری از استفاده خارجی از new
    private function __construct() {
        // انجام تنظیمات اولیه (در صورت نیاز)
    }

    // جلوگیری از تکثیر (Clone) نمونه
    private function __clone() {}

    // جلوگیری از unserialize نمونه (اختیاری ولی توصیه‌شده)
    public function __wakeup() {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    // متد استاتیک برای بازگرداندن نمونه یکتا
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }

    // یک متد نمونه برای نشان دادن عملکرد کلاس
    public function doSomething() {
        echo "Singleton instance is working!";
    }
}

// استفاده از Singleton:
$instance1 = Singleton::getInstance();
$instance2 = Singleton::getInstance();

if ($instance1 === $instance2) {
    echo "هر دو نمونه یکسان هستند.\n"; // خروجی: هر دو نمونه یکسان هستند.
}

$instance1->doSomething(); // خروجی: Singleton instance is working!

//------------------------------------------------------------------------------------
class ConnectDB
{
    private static $instance = null;

    private $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'laravel';

    private function __construct()
    {
        $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name};", $this->user, $this->pass);
    }

    public static function getInstacne()
    {
        if (self::$instance == null) {
            self::$instance = new ConnectDB();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

$instance = ConnectDB::getInstacne();
var_dump($instance->getConnection());

$instance1 = ConnectDB::getInstacne();
var_dump($instance1->getConnection());

$instance2 = ConnectDB::getInstacne();
var_dump($instance2->getConnection());

$instance3 = ConnectDB::getInstacne();
var_dump($instance3->getConnection());





//class Singleton {
//    private static $instance = null;
//
//    private function __construct() { }
//
//    public static function getInstacne() {
//        if(self::$instance == null) {
//            self::$instance = new Singleton();
//        }
//
//        return self::$instance;
//    }
//
//    public function method(){
//        return 'something';
//    }
//}
//
//$instance = Singleton::getInstacne();
//var_dump($instance->method());
//
//$instance = Singleton::getInstacne();
//var_dump($instance->method());
//
//$instance = Singleton::getInstacne();
//var_dump($instance->method());
//
//$instance = Singleton::getInstacne();
//var_dump($instance->method());










