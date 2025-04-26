<?php
include 'includes/header.php';
?>

<?php
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $Location=$_POST['Location'];
    $contact=$_POST['contact'];
    $gender=$_POST['gender'];
    $user_role="Employee";
 
    //checking same password
    if($password!=$password2){
        alert("Password Not Same");
    }else{

    //picture
    if(!$_FILES['picture']['error']){
        $picture_path="images/".$_FILES['picture']['name'];
        if(!move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path)){
            alert("Pic not uploaded");
        }
    }else{
        $path="No Pic uploaded";
    }


    $query="insert into $user_role values "
        . "( '', '$name', '$email', '$password', '$Location', '$contact', '$gender', "
            . "'$picture_path'  ) ";

   $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Your have been registerd Successfuly");
            location('login.php');
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
}
?>

<h1 style="font-family:serif" class="text-center">Registration Form</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">

        <label class="control-label col-sm-3">Full Name</label>
        <div class="col-sm-9">
            <input type="text" autofocus='' name="name" required="" placeholder="Enter Full Name"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Email</label>
        <div class="col-sm-9">
            <input type="email" name="email" required="" placeholder="Enter Email Address"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Password</label>
        <div class="col-sm-9">
            <input type="password" name="password" required="" placeholder="Enter Password"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Confirm Pass</label>
        <div class="col-sm-9">
            <input type="password" name="password2" required="" placeholder="Enter Password To Confirm"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Location</label>
        <div class="col-sm-9">
            <input type="text" name="Location" required="" placeholder="Enter Location"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Contact</label>
        <div class="col-sm-9">
            <input type="number" name="contact" required="" placeholder="Enter Contact Number"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Gender</label>
            <div class="col-sm-9">
                <select name="gender" required="" class="form-control">
                    <option value="">Please Select an Option</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
        <br><br>

       <label class="control-label col-sm-3">Picture</label>
        <div class="col-sm-9">
            <input type="file" name="picture" required=""
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


<script>
    function hide_div(input){
        if(input.value=="Doctor"){
            document.getElementById("specialization2").disabled=false;
        }else{
            document.getElementById("specialization2").disabled=true;
        }
    }
</script>

<?php 
include 'includes/footer.php';
?>