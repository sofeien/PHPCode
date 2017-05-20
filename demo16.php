<?php
    function create_para($arr) {
        $data = '';
        $ret = array();
        
        foreach ($arr as $key=>$value) {
            $data .= $key.' '. $value;
            $ret[] = "$key=$value";
        }
        $hash = md5($data);
        $ret[] = "hash=$hash";
        
        return join('&amp;',$ret);
    }
    
    $arr = array(
           'name'=>'king',
            'age'=>20
    );
    
    echo create_para($arr);
?>  