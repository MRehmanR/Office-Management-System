<?php

//closing window
function close(){
    echo "<script>window.close();</script>";
    exit();
}

//to get js alert
function alert($text){
    echo "<script>alert(\"$text\");</script>";
}

//to go to locaton
function location($path){
    echo "<script>location=\"$path\";</script>";
    exit();
}

//location and ref
function location_ref($path){
    echo "<script>window.opener.location.href=\"$path\";</script>";
    echo "<script>window.close();</script>";
}

//confirming logged in
function confirm_logged_in(){
    if(!isset($_SESSION['user_role'])){
        alert("please login to continue");
        location("login.php");
    }
}

function confirm_not_logged_in(){
    if(isset($_SESSION['user_id'])){
        location("dashboard.php");
    }
}

function get_row_by_id($table, $id){
    global $mysql;
    $result99= mysqli_query($mysql, "select * from $table where id = $id ");
    if($result99){
        if(mysqli_num_rows($result99)){
            return $row99= mysqli_fetch_array($result99);
        }else{
            alert("No Data Found");
        }
    }else{
        alert(mysqli_error($mysql));
    }
}

function delete_table_row($target_table, $row_id){
    global $mysql;
    $query="delete from $target_table where id=$row_id";
    $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_affected_rows($mysql)){
            return true;
        }else{
            return false;
        }
    }else{
        alert(mysqli_error($mysql));
    }    
}

?>