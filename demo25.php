<?php
    $mysqli = new mysqli('localhost','root','root','cc');
    
    if(mysqli_connect_errno()) {
        printf("Error: %s \n",mysqli_connect_error());
    }
    
    $email = '444%';
    
    $query = 'SELECT * FROM users WHERE email LIKE ?';
    
    if($stmt = $mysqli->prepare($query)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($result,$result2);
        while($stmt->fetch()) {
            echo $result . "<br>\n" . $result2 . "<br>-------------------------<br>\n";
        }
        
        $stmt->close();
    }
    
    $mysqli->close();
?>