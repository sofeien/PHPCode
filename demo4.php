<?php
    class NullHandleException extends Exception {
        function __construct($message) {
            parent::__construct($message);
        }
    }
    
    function printObject($obj) {
        if ($obj==NULL) {
           throw new NullHandleException("object is null"); 
        }
        print $obj . "\n";
    }
    
    class MyName {
        function __construct($name) {
            $this->name = $name;
        }
        function __toString() {
            return $this->name;
        }
        private $name;
    }
    
    try {
        printObject(new MyName("Bill"));
        echo "<br>";
        printObject(NULL);
        echo "<br>";
        printObject(new MyName('Jane'));
        echo "<br>";
    } catch (NullHandleException $e) {
        print $e->getMessage();
        print " in file " . $e->getFile();
        print " in line " . $e->getLine();
    }
?>