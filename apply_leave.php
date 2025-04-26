<?php
include 'includes/header.php';
?>

<?php
if(isset($_POST['submit'])){
    extract($_POST);
    $status="Pending";
    $query="insert into leave_application values "
        . "( '', '$my_id', '$date_from', '$date_to', '$reason', '$address', '$status' ) ";

   $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Application Sent Successfuly");
            location('view_leave_applications.php');
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 style="font-family:serif" class="text-center">Leave Application</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">

        <label class="control-label col-sm-3">From</label>
        <div class="col-sm-9">
            <input type="date"  name="date_from" required="" 
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">To</label>
        <div class="col-sm-9">
            <input type="date" name="date_to" required="" 
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Reason For Leave</label>
        <div class="col-sm-9">
            <input style="height: 50px" type="text" name="reason" required="" placeholder="Enter Reason For Leave"
                   class="form-control" >
        </div>
        <br><br><br>

       <label class="control-label col-sm-3">Leave Address</label>
        <div class="col-sm-9">
            <input type="text" name="address" required="" placeholder="Enter Leave Address"
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