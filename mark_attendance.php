<?php
include 'includes/header.php';
?>

<?php
//login script
if(isset($_POST['submit'])){
    
    $date=$_POST['date'];
    $time=$_POST['time'];
    $status="Present";
 
    $query0="select * from attendance where date='$date' and employee_id='$my_id' ";
    $result0= mysqli_query($mysql, $query0);
    if($result0){
        if(mysqli_num_rows($result0)){
            alert("You Can't mark your attendance twice a day.");
            location("dashboard.php");
        }
    }else{
        alert(mysqli_error($mysql));
    }
    
    
    
    //marking attendance
    $query="insert into attendance values "
            . "('', '$my_id', '$date', '$time', '$status' )   ";
    $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Attendace Marked Successfully..");
            location("dashboard.php");
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        alert(mysqli_error($mysql)); 
    }            
}    
?>

<h1 class="text-center">Mark Your Attendance</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
<form method="post" class="form-horizontal" action="" >
        
        <label class="control-label col-sm-3">Date</label>
        <div class="col-sm-9">
            <input class="form-control"  style="size: 18px; font-weight: bold" type="text" name="date" readonly="" 
                   value="<?php echo date("d-m-Y"); ?>"
                   >                    
        </div>
        <br><br>
        
        <label class="control-label col-sm-3">Time</label>
        <div class="col-sm-9">
            <input   style="size: 18px; font-weight: bold" type="text" name="time" readonly=""
                   value="<?php echo date("H:i:s"); ?>"
                   class="form-control" >                    
        </div>
        
        <br><br><br>
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
            <button class="btn btn-success" type="submit" name="submit"><span class=" fa fa-check">Submit Attendance</span></button>
            <a class="btn btn-danger" href="index.php"><span class="fa fa-times"> Cancel</span> </a>                              
        </div>
    </form>
    <br><br>
</div>    

<?php
include 'includes/footer.php';
?>