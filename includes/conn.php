<?php
$database_name="127_0_0_1 (1)";
$server_name="localhost";
$server_username="root";
$server_password="";

if(!$mysql=mysqli_connect($server_name, $server_username, $server_password, $database_name)){
    die("db connection error");
}
?>