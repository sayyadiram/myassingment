<?php

    //incluse database connection  value
    include_once'connection.php';
    
    //connect to database
    $db=mysqli_connect($servername,$username,$password,$dbname);

    //check connection 
    if($db->connect_error){
	    die("connection failed:".$db);
    }

    //check
    if(isset($_POST['reset'])){
        
    }
    if(isset($_POST['cancel'])){
        header('location:index.php'); //redirect to home page 
    }

?>