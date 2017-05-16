<?php
    class NumberSquared implements Iterator {
        public function __construct($start,$end) {
               $this->start = $start;
               $this->end = $end;
        }
        public function rewind() {
            $this->cur = $this->start;
        }
        public function key() {
            return $this->cur;
        }
        public function current() {
            return pow($this->cur,2);
        }
        public function next() {
            $this->cur++;
        }
        public function valid() {
            return $this->cur <= $this->end;
        }
        private $start,$end;
        private $cur;
    }
    
    $obj = new NumberSquared(3, 7);
    foreach ($obj as $key=>$val) {
        echo $key . '=' . $val . '<br>';
    }
?>