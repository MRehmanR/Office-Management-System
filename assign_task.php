<?php
include 'includes/header.php';
?>

<?php
if(isset($_POST['submit'])){
    extract($_POST);
    $status="Pending";
    $progress=0;
    
    $query="insert into task values "
        . "( '', '$name', '$detail', '$employee_id', '$start_date', '$deadline', '$status', '$progress' ) ";

   $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Task Assigned Successfuly");
            location('manage_tasks.php');
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 style="font-family:serif" class="text-center">Assign Task</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">

        <label class="control-label col-sm-3">Task Name</label>
        <div class="col-sm-9">
            <input type="text"  name="name" required="" 
                   placeholder="Enter Task Name"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Task Detail</label>
        <div class="col-sm-9">
            <input type="text" name="detail" required="" 
                   placeholder="Enter Task Detail"
                   class="form-control" >
        </div>
        <br><br>

       <label class="control-label col-sm-3">Employee</label>
        <div class="col-sm-9">
            <select  name="employee_id" required="" class="form-control" >
                <option value="">Select From Following</option>
                <?php
                $query3="select * from employee ";
                if($result3= mysqli_query($mysql, $query3)){
                    if(mysqli_num_rows($result3)){
                        while($row3= mysqli_fetch_array($result3)){
                            echo "<option value='".$row3['id']."'>".$row3['name']."</option>";
                        }
                    }
                }else{
                    alert(mysqli_error($mysql));
                }
                ?>
            </select>
        </div>
        <br><br>

       <label class="control-label col-sm-3">Start Date</label>
        <div class="col-sm-9">
            <input type="date" name="start_date" required="" 
                   class="form-control" >
        </div>
        <br><br><br>

       <label class="control-label col-sm-3">Deadline</label>
        <div class="col-sm-9">
            <input type="date" name="deadline" required="" 
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