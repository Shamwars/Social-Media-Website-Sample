<?php
// create random number
$id = rand(0,10000);

echo $id;

 // insert record into database 
    try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}  

    $sql = "INSERT INTO `forgotpassword` (`rand`, `uid`) VALUES (?, '1');";
    $sth = $DBH->prepare($sql);
	
	$sth->bindParam(1, $id, PDO::PARAM_INT);

	
	$sth->execute();
    
//= send email
//  mail()

     echo '<a href="http://localhost/forgotpassword.php?id='. $id . '  ">Link</a>    ';           






?>