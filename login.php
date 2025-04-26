<?php
include 'includes/header.php';
confirm_not_logged_in();
?>

<?php
if(isset($_POST['submit'])){

$email=$_POST['email'];
$password=$_POST['password'];
$role=$_POST['role'];

$query="select * from $role where email='$email' and password='$password' ";

$result= mysqli_query($mysql, $query);
if($result){
    if(mysqli_num_rows($result)){
        $row= mysqli_fetch_array($result);

            $_SESSION['user_id']=$row[0];
            $_SESSION['user_name']=$row[1];
            $_SESSION['user_email']=$row[2];
            $_SESSION['user_password']= base64_encode($row[3]);    
            $_SESSION['user_location']=$row[4];    
            $_SESSION['user_contact']=$row[5];    
            $_SESSION['user_gender']=$row[6];    
            $_SESSION['user_picture']=$row[7];    
            
            $_SESSION['user_role']= strtoupper($_POST['role']);
            
            $str="Welcome! Mr. ".$_SESSION['user_name'];
            alert($str);
            location("dashboard.php");

        }else{
            alert("Email/Password Incorrect");
            location("login.php");
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 class="text-center">Login Form</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
<form method="post" class="form-horizontal" action="" >

        <label class="control-label col-sm-3" for="email">Email</label>
        <div class="col-sm-9">
            <input type="email" name="email" required="" placeholder="Enter email"
                   class="form-control" >
        </div>
        <br><br>

        <label class="control-label col-sm-3" >Password</label>
        <div class="col-sm-9">
            <input type="password" name="password" id="password" required="" placeholder="Enter password"
                   class="form-control" >
        </div>
        <br><br>

        <label class="col-sm-3 control-label">User Role</label>
        <div class="col-sm-9">
            <select name="role" required="" class="form-control">
                <option value="">Please Select an Option</option>
                <option>Admin</option>
                <option>Employee</option>      
            </select>
        </div>


        <br><br><br>
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button class="btn btn-success" type="submit" name="submit"><span class=" fa fa-check"> Submit</span></button>
            <button class="btn btn-warning" type="reset"><span class="fa fa-refresh"> Reset</span> </button>
            <a class="btn btn-danger" href="index.php"><span class="fa fa-times"> Cancel</span> </a>
        </div>
    </form>
    <br><br>
</div>

<?php
include 'includes/footer.php';
?>
