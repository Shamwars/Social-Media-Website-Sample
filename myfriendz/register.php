<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="profiles.php">View Profile</a></li>
<li><a href="list.php">Friends List</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>

<?php
session_start();
if($_POST){
    $fname = $_POST['fname'];
	$lname = $_POST['lname'];
    $dname = $_POST['dname'];
	$email = $_POST['email'];
	$dob = $_POST['dob'];
	$password = $_POST['password'];
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error .= 'Sorry you did not enter a correct email! <br>';
	}
	if ( 'fname' == null || 'fname' == "" ) {
        $error .= 'First name must be filled out <br>';
    }
    if ( 'lname' == null || 'lname' == "" ) {
        $error .= 'Last name must be filled out <br>';
    }
	if ( 'dname' == null || 'dname' == "" ) {
        $error .= 'Username must be filled out <br>';
    }
	if ( 'dob' == null || 'dob' == "" ) {
        $error .= 'Date of Birth must be filled out <br>';
    }	
    if($error){
		echo $error;
		}
	if(!$error){
		echo 'Form Validated!';
		}	
	}
    try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}  

    $sql = "INSERT INTO `users_table` (fname, lname, dname, email, dob, password) VALUES (?,?,?,?,?,?);";
    $sth = $DBH->prepare($sql);
	
	$sth->bindParam(1, $fname, PDO::PARAM_INT);
	$sth->bindParam(2, $lname, PDO::PARAM_INT);
	$sth->bindParam(3, $dname, PDO::PARAM_INT);
	$sth->bindParam(4, $email, PDO::PARAM_INT);
	$sth->bindParam(5, $dob, PDO::PARAM_INT);
	$sth->bindParam(6, $password, PDO::PARAM_INT);
		
	$sth->execute();
	
	if (isset($_POST['dname']))
	{
		$q = $DBH->prepare("SELECT * FROM users_table WHERE dname='$dname'");
		if ($q == 'num_rows')
			echo "<span class='taken'>&nbsp;&#x2718; " ."This username is taken </span>";
		else
			echo "<span class='available'>&nbsp;&#x2714; " ."This username is available! </span>";
		}
		echo 'You are now registered!';
    
?>

<h1><u>Welcome to MyFriends Zone</h1></u><p>

<h3>Fill the form to register</h3></p>

<form action="register.php" method="post">
First Name <input type="text" name="fname"/> Last Name <input type="text" name="lname"/><p>
Desire Username <input type="text" name="dname"/><p>
Email <input type="text" name="email"/><p>
Date of Birth <input type="text" name="dob"/></p>
Password <input type="text" name="password"/><p>
<input type="submit"/>

</form>

<a href="index.php">Home</a><br>
<a href="myprofile.php">View My Profile</a>





