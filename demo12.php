<?php
    //观察者模式
    
    class RateChange {
        static $instance = NULL;
        private $items = array();
        private $rate;
        
        static public function getInstance() {
            if(self::$instance==NULL) {
                self::$instance = new RateChange();
            }
            return self::$instance;
        }
        
        public function regist($obj) {
            $this->items[] = $obj;
        }
        
        public function setRate($rate) {
            $this->rate = $rate;
            foreach ($this->items as $item) {
                $item->getRate($this);
            }
        }
        
        public function getRate() {
            if(isset($this->rate)){
                return  $this->rate;
            } else {
                return 'Unknow Rate';
            }
        }
    }
    
    class product {
        private $name;
        public function __construct($name) {
            $this->name = $name;
            RateChange::getInstance()->regist($this);
        }
        public function getRate($obj) {
            if($obj instanceof RateChange) {
                echo 'product: ' . $this->name .  '  Rate changed. Current Rate is ' . $obj->getRate() . '<br>';
            }
        }
    }
    
    $apple = new product('Apple');
    $banana = new product('banana');
    $orange = new product('orange');
    RateChange::getInstance()->setRate(15.4);
?>