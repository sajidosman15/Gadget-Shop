<?php 
include "config.php";
session_start();

if(!isset($_SESSION['username'])){
    header("Location:{$hostname}/login.php");
}

// session_unset(); session destruction code
// session_destroy();

?>