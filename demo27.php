<?php
    $db = new SQLite3('test.db');
    if(!$db) {
        echo $db->lastErrorMsg();
    } else {
        echo "open test.db successfully" . "<br>\n";
    }
    //创建数据库
    $sql = <<<END
        create table company
        (
            ID INT PRIMARY KEY NOT NULL,
            NAME TEXT NOT NULL,
            AGE INT NOT NULL,
            ADDRESS CHAR(50),
            SALARY REAL
        );
END;
//     $ret = $db->exec($sql);
//     if(!$ret) {
//         echo $db->lastErrorMsg();
//     } else {
//         echo "Table created successfully" . "<br>\n";
//     }
    $sql = <<<END
    INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (1, 'Paul', 32, 'California', 20000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (2, 'Allen', 25, 'Texas', 15000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (3, 'Teddy', 23, 'Norway', 20000.00 );

      INSERT INTO COMPANY (ID,NAME,AGE,ADDRESS,SALARY)
      VALUES (4, 'Mark', 25, 'Rich-Mond ', 65000.00 );
END;
    //插入数据
//     $ret = $db->exec($sql);
//     if(!$ret) {
//         echo $db->lastErrorMsg();
//     } else {
//         echo "Insert data successfully" . "<br>\n";
//     }
//     $db->close();

    //  更新数据库
// $sql = <<<END
// UPDATE COMPANY SET SALARY = 25111.11 WHERE ID=1;
// END;
//     $ret = $db->exec($sql);
//     if(!$ret) {
//         echo $db->lastErrorMsg();
//     } else {
//         echo $db->changes() , " Record updated successfully<br>\n";
//     }
    
    //删除数据
    $sql = <<<END
    DELETE FROM COMPANY where ID=2;
END;
//     $ret = $db->exec($sql);
//     if(!$ret) {
//         echo $db->lastErrorMsg();
//     } else {
//         echo $db->changes() , " Record updated successfully<br>\n";
//     }
    
    $sql = <<<END
    SELECT * FROM COMPANY;
END;
    $ret = $db->query($sql);
    while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
        echo "ID=" . $row['ID'] . "<br>\n";
        echo "NAME=" . $row['NAME'] . "<br>\n";
        echo "ADDRESS=" . $row['ADDRESS'] . "<br>\n";
        echo "SALARY=" . $row['SALARY'] . "<br><br>\n";
    }
    echo "Query Done!" . "<br>\n";
    $db->close();
?>