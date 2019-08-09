<?php
//incluse database connection  value
include_once'connection.php';
    
//connect to database
$db=mysqli_connect($servername,$username,$password,$dbname);

//check connection 
if($db->connect_error){
	die("connection failed:".$db);
}
/*else{
	echo "ok";
}*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quick Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="homestyle.css">
	
</head>
<body>
    <div class="container">
		<div class="nav_data">
			<div class="nav_link">
        		<a href="sign_in.php">Sign In</a>
        		<a href="#">/</a>
        		<a href="sign_up.php">Sign Up</a>
			</div>
			<br>	
			<div class="nav_data1" style="text-align:right;">
				<a href="forgetpass.php">Forget Password ?</a>
			</div>
        </div>
        <div class="nava1">
            <h1>Quick Post</h1>
        </div>
        <div class="main1">
            <div class="row">
				<?php 
					//fetching
					$query="SELECT title,discription FROM posts";
                    
					//loop rows
					if($result=mysqli_query($db,$query)){
						while($row=mysqli_fetch_row($result)){
							echo('
								<div class="column"> 
									<img src="./img/snow.jpg" alt="Snow" style="width:100%">
									<div class="first">
										<h3>'.$row[0].'</h3>
									</div>
									<div class="cnt">
										'.$row[1].'
									</div>
									<div class="last">
										<a href="#">Read More</a>
									</div>
                                </div>
                            ');
						}
						mysqli_free_result($result);
					}
					mysqli_close($db);
                    ?>

			    </div><!--close  row-->                
        </div><!--close main-->
    </div><!--close container-->
</body>
</html>