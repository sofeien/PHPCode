<?php
    //单件模式
    class Logger {
        static private $instance = NULL;
        static private $line = 0;
        static function getInstance() {
            if(self::$instance==NULL) {
                self::$instance = new Logger();
            }
            return self::$instance;
        }
        private function __construct() {
            
        }
        private function __clone() {
            
        }
        function Log($str) {
            //记录日志
            echo self::$line . ': ' . $str;
            echo '<br>';
            self::$line++;
        }
    }
    
    $log = Logger::getInstance();
    $log->Log('日志1');
    $log2 = Logger::getInstance();
    $log2->Log('日志2');
    
?>