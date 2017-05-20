<?php
    function sanitize_vars(&$vars, $signatures) {
        $tmp = array();
        
        //遍历字段数组
        foreach ( $signatures as $name=>$sig) {
            //如果字段未定义但是required，则报错
            if (!isset($vars[$name]) && isset($sig['required']) && $sig['required']) {
                echo $name . '未填写！';
            }
            $tmp[$name] = $vars[$name];
            if (isset($sig['type'])) {
                settype($tmp[$name],$sig['type']);
            }
            if (isset($sig['function'])) {
                $tmp[$name] = $sig['function']($tmp[$name]);
            }
            
        }
        $vars = $tmp;
    }
?>
<form method="get">
    prod_id: <input type="text" name="prod_id" required><br>
    desc: <input type="text" name="desc"><br>
    <input type="submit" name="submit" value="提交"><br>
</form>
<?php 
    $sigs = array(
        'prod_id' => array('required' => true, 'type' => 'int'),
        'desc' => array('required' =>false, 'type' => 'string', 'function' => 'addslashes')
    );
    if(isset($_GET['submit'])) {
        sanitize_vars($_GET, $sigs);
        echo '<hr/>';
        echo 'prod_id=>' . $_GET['prod_id'] . '<br/>';
        echo 'desc=>' . $_GET['desc'] . '<br/>';
    }
?>
