<?php
    class ClassOne {
        function callClassOne () {
            print "In Class One\n" . '<br>';
        }
    }
    class ClassTow {
        function callClassTow () {
            print "In Class Tow\n" . '<br>';
        }
    }
    class ClassOneDelegator {
        private $targets;
        
        function __construct() {
            $this->targets[] = new ClassTow();
            $this->targets[] = new ClassOne();
        }
        
        function addObject($obj) {
            $this->targets[] = $obj;
        }
        function __call($name, $args) {
            foreach($this->targets as $obj) {
                $r = new ReflectionClass($obj);
                try {
                    if($method = $r->getMethod($name)) {
                        if($method->isPublic() && !$method->isAbstract()) {
                            return $method->invoke($obj,$args);
                        }
                    }
                } catch(ReflectionException $e){}
            }
        }
    }
      
    $obj = new ClassOneDelegator();
    $obj->addObject(new ClassTow());
    
    $obj->callClassTow();
    $obj->callClassOne();
    
?>