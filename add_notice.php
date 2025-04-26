<?php
include 'includes/header.php';
?>

<?php
if(isset($_POST['submit'])){
    extract($_POST);
    $date=date("Y-m-d");
    $query="insert into notice_board values "
        . "( '', '$title', '$message', '$date' ) ";

   $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_insert_id($mysql)){
            alert("Published Successfuly");
            location('manage_notice_board.php');
        }else{
            alert(mysqli_error($mysql));
        }
    }else{
        alert(mysqli_error($mysql));
    }
}
?>

<h1 style="font-family:serif" class="text-center">Add Notice</h1>
<div class="col-sm-2"></div>
<div class="col-sm-8 input_window" >
    <br><br>
    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data">


       <label class="control-label col-sm-3">Title</label>
        <div class="col-sm-9">
            <input type="text" name="title" required="" placeholder="Enter Title For Notice"
                   class="form-control" >
        </div>
        <br><br><br>

       <label class="control-label col-sm-3">Message</label>
        <div class="col-sm-9">
            <textarea name="message" required="" placeholder="Enter Notice Message"
                      class="form-control" ></textarea>
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