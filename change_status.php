<?php
include 'includes/header.php';

if(isset($_GET['id'])){
    extract($_GET);
    
    $query="update $table set status = '$keyword' where id = $id ";
    $result= mysqli_query($mysql, $query);
    if($result){
        if(mysqli_affected_rows($mysql)){
           //-
        }
    }else{
        alert(mysqli_error($mysql));
    }    
     location($referer_page);
}

?>
