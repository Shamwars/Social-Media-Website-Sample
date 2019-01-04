<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="profile.php">View Profile</a></li>
<li><a href="list.php">Friends List</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>


<?php


    try {

        $host = '127.0.0.1';

        $dbname = 'myfriendz';

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
 
