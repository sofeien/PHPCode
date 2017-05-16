<?php
    class StrictCoordinateClass {
        private $arr = array('x'=>NULL,'y'=>NULL);
        
        function __get($key) {
            if(array_key_exists($key, $this->arr)){
                return $this->arr[$key];
            } else {
                echo '属性获取失败';
            }
        }
        
        function __set($key,$val) {
            if (array_key_exists($key, $this->arr)) {
                $this->arr[$key] = $val;
            } else {
                echo '属性不存在';
            }
        }
    }

    $obj = new StrictCoordinateClass();
    $obj->x = 5;
    $obj->y = 10;
    echo '当前坐标为 x:' . $obj->x . ' y:' . $obj->y; 
?>