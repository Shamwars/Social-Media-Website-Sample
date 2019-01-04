<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="list.php">Friends List</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>

<?php
$dname = $_GET['dname'];

session_start();
// making the connection to the database
    try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}
	
	
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $dname=$_POST['dname'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
	
	$sql = "INSERT INTO `users_table` (fname, lname, dname, email, dob) VALUES (?,?,?,?,?);";
    $sth = $DBH->prepare($sql);
	
	$sth->bindParam(1, $fname, PDO::PARAM_INT);
	$sth->bindParam(2, $lname, PDO::PARAM_INT);
	$sth->bindParam(3, $dname, PDO::PARAM_INT);
	$sth->bindParam(4, $email, PDO::PARAM_INT);
	$sth->bindParam(5, $dob, PDO::PARAM_INT);
			
	$sth->execute();
	
	$q = $DBH->prepare("select fname, lname, dname, email, dob from users_table where dname = :dname");
    $q->bindValue(':dname', $dname);
    $q->execute();
    $row = $q->fetch(PDO::FETCH_ASSOC);
	
	//$fname = $check['fname'];
    //$lname = $check['lname'];
    //$dname = $check['dname'];
	//$email = $check['email'];
    //$dob = $check['dob'];
    		
    
		
?>
<h2>Your Profile Information</h2> 

<p><h3>First Name: <?php echo $fname ?></p></h3>
<p><h3>Last Name: <?php echo $lname ?></p></h3>
<p><h3>Username: <?php echo $dname ?></p></h3>
<p><h3>Email: <?php echo $email ?></p></h3>
<p><h3>Date of Birth: <?php echo $dob ?></p></h3>

<a href="index.php">logout</a>
<p align="center"><a href="myprofile.php"></a></p>
