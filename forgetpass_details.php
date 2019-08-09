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
    if(isset($_POST['submit'])){
        $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
        $sql = "SELECT * FROM users WHERE user_name = '$user_name'";
        $res = mysqli_query($db, $sql);
        $count = mysqli_num_rows($res);
        if($count == 1){
            
            header('Location:resetpassword.php');
           
        }else{
            echo "User name does not exist in database";
        }
    }

?>