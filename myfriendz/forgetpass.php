<?php

$id = $_GET['id'];

echo $id;

 try {
        $host = '127.0.0.1';
        $dbname = 'myfriendz';
        $user = 'root';
        $pass = '';
        # MySQL with PDO_MYSQL
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    } catch(PDOException $e) {echo 'Error';}  

    $q = $DBH->prepare("select * from forgetpass where rand = :rand");
    $q->bindValue(':rand', $id);

    $q->execute();
    $check = $q->fetch(PDO::FETCH_ASSOC);
    
   
    if($check){
            $sql = "delete from forgotpassword where rand = '$id'";
            $sth = $DBH->prepare($sql);
	
	
	
            $sth->execute();
        echo 'exists';
        echo 'Reset your password......';
    } else {
        
        echo 'sorry invalid link';
    }
    
    
    
    
    
    

    
  
?>