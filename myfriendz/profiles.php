<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="profile.php">View Profile</a></li>
<li><a href="list.php">Friends List</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>

<?php

// making the connection to the database
    try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}
		
{ 
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dname=$_POST['dname'];
$email=$_POST['email'];
$dob=$_POST['dob'];
}
?>
<h2>Your Profile Information</h2> 

<p><h3>First Name: <?php echo $fname ?></p></h3>
<p><h3>Last Name: <?php echo $lname ?></p></h3>
<p><h3>Username: <?php echo $dname ?></p></h3>
<p><h3>Email: <?php echo $email ?></p></h3>
<p><h3>Date of Birth: <?php echo $dob ?></p></h3>

<a href="index.php">logout</a>

<p align="center"><a href="index.php"></a></p>