<?php
include 'includes/header.php';
confirm_logged_in();
?>

<h1 class="text-primary">Welcome <?php echo $_SESSION['user_name']; ?></h1> 
 

<?php
echo "<h3>(".$_SESSION['user_role'].")</h3>";
?>


<img alt="No Img" class="img img-thumbnail img-responsive img-circle"
     style="width: 300px; height: 320px; float: right"
     src="<?php echo $_SESSION['user_picture'];?>"
     >


<?php
include 'includes/footer.php';
?>