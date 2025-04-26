<?php
include 'includes/header.php';
?>

<?php
if($_SESSION['user_id']){
    extract($_SESSION);
}
?>

<?php
if(isset($_POST['submit'])){
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $location=$_POST['location'];
    $contact=$_POST['contact'];
    
    $query="update employee set "
            . "name= '$name', "
            . "email= '$email', "
            . "password= '$password', "
            . "location='$location', "
            . "contact='$contact' "
            . "where id = '$user_id' ";

            
   $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_affected_rows($mysql)){
            alert("Details updated Successfuly, Logging Out -->");
            location('logout.php');
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 style="font-family:serif" class="text-center">Edit User</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">

        <label class="control-label col-sm-3">Full Name</label>
        <div class="col-sm-9">
            <input type="text" autofocus='' name="name" required="" 
                   value="<?php echo $user_name; ?>"
                   placeholder="Enter Full Name"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Email</label>
        <div class="col-sm-9">
            <input type="email" name="email" required="" 
                   value="<?php echo $user_email;?>"
                   placeholder="Enter Email Address"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Password</label>
        <div class="col-sm-9">
            <input type="password" name="password" required="" 
                   value="<?php echo base64_decode($user_password); ?>"
                   placeholder="Enter Password"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Location</label>
        <div class="col-sm-9">
            <input type="text" name="location" required="" 
                   value="<?php echo $user_location;?>"
                   placeholder="Enter Location"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Contact</label>
        <div class="col-sm-9">
            <input type="number" name="contact" required="" 
                   value="<?php echo $user_contact;?>"
                   placeholder="Enter Contact Number"
                   class="form-control" >
        </div>
        <br><br><br>
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button class="btn btn-success" type="submit" name="submit"><span class=" fa fa-check"> Submit</span></button>
            <button class="btn btn-warning" type="reset"><span class="fa fa-refresh"> Reset</span> </button>
            <a class="btn btn-danger" href="dashboard.php"><span class="fa fa-times"> Cancel</span> </a>
        </div>
    </form>
    <br><br>
</div>

<?php 
include 'includes/footer.php';
?>