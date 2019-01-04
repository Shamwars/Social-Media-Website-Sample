<h2><u>MyFriendz Zone</h2></u><br></br>
<li><a href="home.php">Home</a></li>
<li><a href="profile.php">View Profile</a></li>
<li><a href="list.php">Friends List</a></li>
<li><a href="feed.php">Comments</a></li>
<br></br>

<?php
session_start();

if($_POST){

    $dname = $_POST['dname'];
    $password = $_POST['password'];
    
    try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}  


    
   
    $q = $DBH->prepare("select * from users_table where dname = :dname and password = :password LIMIT 1");
    $q->bindValue(':dname', $dname);
    $q->bindValue(':password',  $password);
    $q->execute();
    $row = $q->fetch(PDO::FETCH_ASSOC);
 
    $message = '';
    if (!empty($row)){
       
        
        $_SESSION['dname'] = $row['dname'];
   
        
        $_SESSION['id'] = $row['id'];
		$message = 'Loggin in! Click on Username to view Profile.';

        echo $_SESSION['id'];
        echo '<BR>Welcome to MyFriendz Zone <a href="profile.php?id=' . $row['id'] . '">' .$row['dname'].'</a></BR>';
		
    } else {
         $message= 'Sorry your log in details are not correct';
    }
    
}
?>
<?php
    if(!empty($message)){
     echo '<br>';
     echo $message;
    }
 ?>
<BR><BR>
<form action="index.php" method="post">
Username <input type="text" name="dname"/>
Password <input type="text" name="password"/>
<input type="submit"/>

<a href="help.php">Forgot Password?</a>


<h3>New User ?</h3>
<a href="register.php">Signup</a>

</form>
<a href="logout.php">Logout</a>
