<?php 
include "config.php";
session_start();

if(!isset($_SESSION['username'])){
    header("Location:{$hostname}/login.php");
}else{
    if($_SESSION['username']!="admin"){
        header("Location:{$hostname}/index.php");
    }
}

// session_unset(); session destruction code
// session_destroy();

?>