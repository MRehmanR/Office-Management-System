<?php
include 'includes/header.php';
?>

<?php
if(isset($_GET['progress'])){
    $progress=$_GET['progress'];
    $task_id=$_GET['id'];
}
?>

<?php
if(isset($_POST['submit'])){
    $progress=$_POST['progress'];    
    $query="update task set progress = '$progress' where id = '$task_id' ";
    
    $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_affected_rows($mysql)){
            alert("Progress Updated Successfuly");
        }
        location('manage_tasks.php');
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 style="font-family:serif" class="text-center">Update Task</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">
        
       <label class="control-label col-sm-3">Progress</label>
        <div class="col-sm-9">
            <input type="number" name="progress" required="" 
                   value="<?php echo $progress; ?>" autofocus
                   placeholder="Enter Progress Percentage  "
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