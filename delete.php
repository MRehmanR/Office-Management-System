<?php
include 'includes/header.php';

if(isset($_GET['id'])){
    if(!empty($_GET['id'])){
        $target_table=$_GET['table'];
        $target_id=$_GET['id'];

        $query="delete from $target_table where id=$target_id";
        $result= mysqli_query($mysql, $query);
        if($result){
            if(mysqli_affected_rows($mysql)){
                location($referer_page);
            }
        }else{
            alert(mysqli_error($mysql));
        }        
    }else{
        location($referer_page);
    }    
}

?>
