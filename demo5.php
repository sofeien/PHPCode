<?php
    //$_SERVER['DOCUMENT_ROOT'] => D:/wamp64/www    
    function __autoload($class_name) {
        require_once $_SERVER['DOCUMENT_ROOT'] . '/cc/bookcode/' . $class_name . '.php';
    }
    
    $obj = new MyClass();
    $obj->printHelloWorld();
?>