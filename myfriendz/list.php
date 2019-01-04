<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="profile.php">View Profile</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>


<?php
Session_Start();
// making the connection to the database


    try {

        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = 'mysql';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}  


    // selecting the row from the database

    $q = $DBH->prepare("select * from users_table;");
	
    // running the SQL

    $q->execute();

    // pulling the data into a variable

    $check = $q->fetchAll(PDO::FETCH_ASSOC);

    // taking each individual piece

    foreach($check as $row){

       echo '<a href="list.php?id=' . $row['id'] . '">' .$row['dname'].'</a> </BR>';

    }





 ?>