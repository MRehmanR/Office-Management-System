<?php
include 'includes/header.php';
?>

<?php

if(isset($_POST['submit'])){
    extract($_POST);
    $date=date('Y-m-d');
    
    $query="insert into complaint values "
        . "( '', '$my_id', '$title', '$detail', '$date' ) ";
    $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Added Successfuly");
            location('index.php');
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 style="font-family:serif" class="text-center">Launch Complaint</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">

        <label class="control-label col-sm-3">Complaint Title</label>
        <div class="col-sm-9">
            <input type="text" autofocus='' name="title" required="" 
                   placeholder="Enter Complaint Title"
                   class="form-control" >
        </div>
      
        <br><br>
        <label class="control-label col-sm-3">Complaint Detail</label>
        <div class="col-sm-9">
            <textarea type="text" name="detail" required="" 
                   placeholder="Enter Complaint Detail"
                   class="form-control" ></textarea>
        </div>
      
        <br><br><br><br>
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
