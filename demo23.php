<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'cc');
$result = $mysqli->query("select * from users",MYSQLI_USE_RESULT);
while($row = $result->fetch_row()) {
    echo $row[0] . " " . $row[1] ."<br>\n";
}
$result->free();
$mysqli->close();
?>