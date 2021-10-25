<?php include "loginValidation.php";

$id = $_GET['id'];
// $oid = $_GET['oid'];
$conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");

if($id==1){
    confirm_order($conn);
}

if($id==2){
    addToCart($conn);
}
if($id==3){
    deleteProduct($conn);
}

function confirm_order($conn){
    $oid = $_GET['oid'];
    $sql="UPDATE orders SET isDelivered=1 where oid=$oid";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    header("Location:{$hostname}/gadgetShop/orderdetails.php?oid=$oid");
}

function addToCart($conn){
    $uid = $_SESSION['id'];
    $pid = $_GET['pid'];
    $quantity = $_GET['quantity'];
    $sql="INSERT INTO `cart`(`Uid`, `Pid`, `quantity`, `isConfirmed`) VALUES ($uid,$pid,$quantity,0);";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    header("Location:{$hostname}/gadgetShop/details.php?pid=$pid&ok=ok");
}
function deleteProduct($conn){
    $cid = $_GET['Cid'];
    $sql = "DELETE FROM Cart WHERE Cid=$cid;";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    header("Location:{$hostname}/gadgetShop/mycart.php");
}
?>