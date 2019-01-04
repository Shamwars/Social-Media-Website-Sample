
<?php


    try {

        $host = '127.0.0.1';

        $dbname = 'test';

        $user = 'root';

        $pass = '';

        # MySQL with PDO_MYSQL

        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // selecting the row from the database

    $q = $DBH->prepare("select * from comments");

    

    // running the SQL

    $q->execute();

    // pulling the data into a variable

    $check = $q->fetchAll(PDO::FETCH_ASSOC);

    // taking each individual piece



    foreach($check as $row){

       echo '<a href="comment.php?id=' . $row['id'] . '"> Like This! </a> </BR>';

    }
    } catch(PDOException $e) {echo 'Error' . $e;}  




?>