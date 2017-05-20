<?php
      
    $test_array = array('name'=>'jack','age'=>20,'school'=>'beijing');
    $algo = 'md5';
    $key = 'gameover';
    
    //生成加密字符串
    function create_param($array) {
        $data = '';
        $ret = array();
        $algo = $GLOBALS['algo'];
        $key = $GLOBALS['key'];
        
        foreach($array as $key=>$val) {
            $data .= $key . $val;
            $ret[] = "$key=$val";
        }
        
        $hash = hash_hmac($algo, $data, $key);
        $ret[] = "hash=$hash";
        return join('&amp;',$ret);
    }
    
    //校验hash值
    function check_hash($arr) {
        $hash = $arr['hash'];
        unset($arr['hash']);
        
        $str = create_param($arr);
        preg_match('/hash=(.*)/',$str,$matches);
        
        if($hash==$matches[1]) {
            return true;
        } else {
            return 'not match';
        }
    }
    
    $msg = 'name=jack&age=20&school=beijing&hash=75c788d0fc4839550afe6e340b370b9e';
    $msg_array = array(
        'name'=>'jack',
        'age'=>'20',
        'school'=>'beijing',
        'hash'=>'75c788d0fc4839550afe6e340b370b9e'
    );

    echo check_hash($msg_array);
?>