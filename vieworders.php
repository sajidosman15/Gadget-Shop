<?php include "adminvalidator.php";


$conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
$sql="SELECT * FROM `orders` ORDER BY oid DESC";
$result = mysqli_query($conn, $sql) or die("Query Failed.");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <link rel="stylesheet" href="Style/vieworder.css">
</head>

<body>


    <!-- sidebar start here -->
    <?php include("inc/sidebar.php") ?>
    <!-- sidebar ends here -->

    <!-- order list start here -->

    <section class="order-list">
        <div class="order-title">
            <div class="id">Order ID</div>
            <div class="cname">Customer Name</div>
            <div class="tprice">Total Price</div>
            <div class="address">Address</div>
            <div class="delivered">Delivered</div>
            <div class="details">Details</div>
        </div>

        <?php 
            if(mysqli_num_rows($result) > 0){
                $i=0;
                while($row = mysqli_fetch_assoc($result)) {
                    $i++;
                    $uid=$row['Uid'];
                    $sql="SELECT name FROM account WHERE id=$uid";
                    $data = mysqli_query($conn, $sql) or die("Query Failed.");
                    $data1 = mysqli_fetch_assoc($data);
                    $name=$data1['name'];
        ?>

        <div class="order <?php if($i%2==0){echo 'rowcolor';} ?>">
            <div class="id format bold"><?php echo $row['Oid']; ?></div>
            <div class="cname format"><?php echo $name; ?></div>
            <div class="tprice format"><?php echo $row['totalPrice'].' Tk'; ?></div>
            <div class="address format"><?php echo $row['delivaryAddress']; ?></div>
            <div class="delivered format">
                <?php
                if($row['isDelivered']==1){
                    echo "<i class='far fa-check-circle bold greencolor'></i>";
                }
                else{
                    echo "<i class='fas fa-times-circle bold redcolor'></i>";
                }
                ?>
            
            </div>
            <div class="details format"><a href='orderdetails.php?oid=<?php echo $row['Oid']; ?>' class="dtlbtn">Details</a></div>
        </div>

        <?php } }?>

        
    </section>

    <?php include("inc/footer.php") ?>