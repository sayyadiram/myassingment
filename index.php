<?php
	//link
	include_once'connection.php';
	include_once'signin_details.php';
	
	//connect to database
	$db=mysqli_connect($servername,$username,$password,$dbname);

	//check connection 
	if($db->connect_error){
		die("connection failed:".$db);
	}
	
	$cnt = 0;
	$query="SELECT id, title,discription,user_id,image FROM posts";
	$result=mysqli_query($db,$query);
	$cnt = mysqli_num_rows(mysqli_query($db,$query));

	if(!empty($_SESSION['id'])){
		$loggedIn_user_id=$_SESSION['id'];
	}

	function isLoggedIn() {
		return !empty($_SESSION['logged_user_name']);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Quick Post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./asset/css/homestyle.css">
</head>
<body>
    <div class="container">

		<?php if(isLoggedIn()) {

			echo('
				<div class="nav">
					<div class=nav__links>
						<a href="#">Home</a>
						<a href="post.php">Make a post</a>
						<a href="edit_profile.php">Edit Profile</a>
						<a href="logout.php">Logout</a>
					</div><!--close navlinks-->
					<div class="nav__img">
						<img src="./asset/img/avtar.png" alt="avatar">
					</div><!--close imag on nav-->
				</div><!--close nav-->
			');

		} 
		else{

			echo ('
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
			');

		}
		
		?>

        <div class="main">
			<div class="wlcm">

				<?php
					if(isLoggedIn()){?>
						<h2>Welcome <?php echo $_SESSION['logged_user_name'];?>, you have <?php echo $cnt;?> <?php if($cnt>1): echo 'publications'; else: echo 'publication'; endif;?> </h2>
					<?php }
					else{?>
							<h2>Welcome, you have <?php echo $cnt;?> <?php if($cnt>1): echo 'publications'; else: echo 'publication'; endif;?> </h2>
				<?php	}
				?>

            </div><!--close wlcm-->

			<div class="row">
				
				<?php 
					
					if($result){  
						
						while($row=mysqli_fetch_array($result)){
							
							if(isLoggedIn()) {

									echo('
										<div class="column"> 
											<img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'" class="imag1">
											<div class="first">
												<h3>'.$row["title"].'</h3>
											</div>
											<div class="cnt">
											'.$row["discription"].'
											</div>
											<div class="last">
												<a href="post.php?edit='.$row['id'].'">Edit</a>
												<a href="post_delete.php?id='.$row['id'].'">Delete</a>
												<a href="read_more.php?id='.$row['id'].'">read more</a>
											</div>
										</div>');

							} /*close if*/
								
							else{

								echo('
									<div class="column"> 
										<img src="data:image/jpg;base64,'.base64_encode( $row['image'] ).'" class="imag1">
										<div class="first">
												<h3>'.$row["title"].'</h3>
										</div>
										<div class="cnt">
											'.$row["discription"].'
										</div>
										<div class="last">
											<a href="read_more.php?id='.$row['id'].'">read more</a>
										</div>
									</div>
								');

							}/*close else*/
								
						}/*close while*/
							
						mysqli_free_result($result);
					}/*close if($result)*/
						
						mysqli_close($db);

                ?>

		    </div><!--close  row--> 

        </div><!--close main-->
		
    </div><!--close container-->
</body>
</html>