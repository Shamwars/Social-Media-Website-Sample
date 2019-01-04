<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="profile.php">View Profile</a></li>
<li><a href="list.php">Friends List</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>

<?php

 $comment_id = $_GET['id']; // the id of the comment to like
 $your_user_id = 1;
    try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
		
		 $sql = "INSERT INTO `likes` (userid, commentid) VALUES (?, ?);";
    $sth = $DBH->prepare($sql);
	
	$sth->bindParam(1, $your_user_id, PDO::PARAM_INT);
	$sth->bindParam(2, $comment_id, PDO::PARAM_INT);
	
	$sth->execute();
    
    echo 'recorded';

	
    } catch(PDOException $e) {echo $e;}  

   

?>

