<?php 
   
   include_once'resetpassword_details.php';
    
?>

<!DOCTYPE html>
<html>
<head>
    <title>reset_password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="./asset/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="signup__box">

        <div class="header">
                <h2>Reset Password</h2>
        </div><!--close header-->

        <form  method="post" action="resetpassword_details.php">
           
            <div class="input-group">
                <p class="fa fa-key"> Password</p>
                <input type="password" name="password" placeholder="password" id="pass" >
            </div>

            <div class="input-group">
			    <p class="fa fa-thumbs-o-up">  Confirm Password</p>
                <input type="password" name="confirm_pass" placeholder="Password" id="cnfirm_pass">
            </div>
            
            <div class="input-group">
                <input  type="submit" name="reset" value="Reset">
                <input  type="submit" name="cancel" value="Cancel">
            </div>

		</form><!--close form-->

    </div><!--close signup box-->

</body>
</html>