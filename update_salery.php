<?php
include 'includes/header.php';
?>

<?php
if(isset($_GET['salary_amount'])){
    $salary_amount=$_GET['salary_amount'];    
}else{
    $salary_amount=0;
}
?>

<?php
if(isset($_POST['submit'])){
    $salary_amount=$_POST['salary_amount'];
    $employee_id=$_GET['employee_id'];

    $query="insert into salary values "
        . "( '', '$employee_id', '$salary_amount' ) ";

   $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Salary Generated Successfuly");
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        //if data already exist
        $query2="update salary set "
                . "salary_amount= '$salary_amount' "
                . "where employee_id = '$employee_id' ";
        if($result2=mysqli_query($mysql, $query2)){
            alert("Salary Record Updated");
        }else{
            alert(mysqli_error($mysql));
        }
    }
    location('manage_salary.php');
}
?>

<h1 style="font-family:serif" class="text-center">Add/Update Salary</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">


       <label class="control-label col-sm-3">Salary Amount</label>
        <div class="col-sm-9">
            <input type="salary_amount" name="salary_amount" required="" placeholder="Enter Salary Amount"
                   value="<?php echo $salary_amount; ?>"
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