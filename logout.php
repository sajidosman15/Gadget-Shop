<?php 
include "config.php";

session_start();
session_unset();// session destruction code
session_destroy();
header("Location:{$hostname}/login.php");
?>