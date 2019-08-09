<?php 
    include_once'connection.php';
    include_once'post_details.php';
    
    $userid=$_SESSION['id'];
    
    if(isset($_GET['edit'])){
    
        $post_id=$_GET['edit'];
        $edit_state=true;
        $rec = mysqli_query($db,"SELECT * FROM posts WHERE id='$post_id'");
        $record =mysqli_fetch_array($rec);
        $title=$record['title'];
        $discription=$record['discription'];
        $post_id=$record['id'];   
        $user_id=$record['user_id'];
    
    }
    else{
    
        $edit_state=false;
        $title="";
        $discription="";
        $post_id="";
        $user_id="";
    
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>POST</title>
    <link href="./asset/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

    <div class="signup__box">
        
        <div class="header">
                <h2>POST</h2>
        </div>
        
        <form  method="post" action="post_details.php" enctype="multipart/form-data">

            <?php if(isset($_SESSION['msg'])):?>
                <div class="input-group">
                    <?php
                        echo $_SESSION['msg'];
                    ?>
                </div>
            <?php endif ?>
            
            <input type="number" name="id" hidden value="<?php echo $post_id; ?>">

            <div class="input-group">
                <p>Title</p>
                <input type="text" name="title"  placeholder="Enter title" value="<?php echo $title; ?>">
            </div>  
            <div class="input-group">          
                    <p>Description</p>
                    <input type="text" name="discription"  placeholder="Description" value="<?php echo $discription; ?>">
            </div>
            
            <div class="input-group">
                <input type="file" name="image" id="fileSelect" ><br><br>
            </div>
            
            <input type="hidden" name="userid" value="<?php echo $userid; ?>">

            <div class="input-group">
                <?php if($edit_state==true):?>
                    <input  type="submit" name="update" value="Update">
                <?php else:?>
                    <input  type="submit" name="submit" value="Submit">
                <?php endif?>
                <input  type="submit" name="cancel" value="Cancel">
            </div>

        </form>
        
    </div>

</body>
</html>