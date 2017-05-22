<?php
    include 'list_parts.tpl.php';
    
    $list = array('Andi'=>'Tel Aviv','Derick'=>'Skien','Stig'=>'Trondheim');
    $items = '';
    foreach($list as $name=>$city) {
        $items .= str_replace(array('{name}','{city}'), array($name,$city), $item) ;
    }
    $tpl = array();
    $tpl['title'] = 'List with names';
    $tpl['description'] = 'This list shows names and cities';
    $tpl['content']  = $header . $items . $footer;
    
    include 'template.php';
?>