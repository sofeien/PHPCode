<?php
    $mysqli = new mysqli('localhost', 'root', 'root', 'cc');
    $query = "select email from users;";
    $query .= "select passwd from users";
    
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    
    if($mysqli->multi_query($query)) {
        do {
            if($result = $mysqli->store_result()) {
                while($row = $result->fetch_row()){
                    echo $row[0] . "<br>\n";
                }
                $result->free();
            }
            if($mysqli->more_results()) {
                echo "-------------------<br>\n";
            } else {
                break;
            }
        } while ($mysqli->next_result());
    }
    
    $mysqli->close();
?>