<?php include "adminvalidator.php";

    $oid = $_GET['oid'];
    $conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
    $sql="SELECT uid,isDelivered,delivaryAddress as address from orders where oid=$oid";
    $result = mysqli_query($conn, $sql) or die("Query Failed.");
    $row = mysqli_fetch_assoc($result);
    $uid=$row['uid'];
    $address=$row['address'];
    $deliver=$row['isDelivered'];

    $sql1="SELECT name,email,phoneNumber as mobile from account where id=$uid";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);

    $cartquery="SELECT c.quantity,p.Pname,p.price,p.imgAddress FROM cart as c INNER JOIN product as p ON c.pid = p.Pid WHERE c.Oid=$oid";
    $result2=mysqli_query($conn,$cartquery);
    $tlprice=0;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <link rel="stylesheet" href="Style/orderdetails.css">
</head>

<body>

    <!-- sidebar start here -->
    <?php include("inc/sidebar.php") ?>
    <!-- sidebar ends here -->


    <!-- order details start here -->
    
    <section class="order-details">
        <h4 class="page-title">ORDER DETAILS</h4>

        <div class="details">
            <div class="customer-info background-style">
                <h6>CUSTOMER PERSONAL DETAILS</h6>
                <div>
                    <p class="details-title">ID: </p>
                    <p class="information"><?php echo $uid; ?></p>
                </div>
                <div>
                    <p class="details-title">Name: </p>
                    <p class="information"><?php echo $row1['name']; ?></p>
                </div>
                <div>
                    <p class="details-title">Email: </p>
                    <p class="information"><?php echo $row1['email']; ?></p>
                </div>
                <div>
                    <p class="details-title">Mobile: </p>
                    <p class="information"><?php echo $row1['mobile']; ?></p>
                </div>
                <div>
                    <p class="details-title">Address: </p>
                    <p class="information"><?php echo $address; ?></p>
                </div>
            </div>

            <div class="shopping-info background-style">
                <h6>SHOPPING CART</h6>
                <div class="order-title">
                    <div class="image">IMAGE</div>
                    <div class="pname">PRODUCT NAME</div>
                    <div class="quantity">QUANTITY</div>
                    <div class="uprice">UNIT PRICE</div>
                    <div class="tlprice">TOTAL</div>
                </div>

                <?php 
                    while($products=mysqli_fetch_assoc($result2)) {
                        $total=$products['price']*$products['quantity'];
                        $tlprice=$tlprice+$total;
                    
                ?>
                    <div class="products">
                        <div class="image"><img src="<?php echo $products['imgAddress']; ?>"></div>
                        <div class="pname"><?php echo $products['Pname']; ?></div>
                        <div class="quantity"><?php echo $products['quantity']; ?></div>
                        <div class="uprice"><?php echo $products['price'].' tk'; ?></div>
                        <div class="tlprice"><?php echo $total.' tk'; ?></div>
                    </div>

                <?php } ?>   
                

                <div class="bill">
                    <h4>Total: </h4>
                    <div><?php echo $tlprice.' tk'; ?></div>
                </div>

                <div class="cnfbtn">
                    <?php
                        if($deliver==0){
                    ?>
                            <a href="databasequery.php?id=1&oid=<?php echo $oid; ?>" id="confirm"><i class="fas fa-check"></i>Confirm Order</a>
                    <?php
                        }
                        else{
                    ?>
                            <h3 id="confirm2"><i class="fas fa-check"></i>Order Is Confirmed</h3>
                    <?php
                        }
                    ?>
                    
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- order details ends here -->

    <!-- Footer is starts here -->
    <footer>
        <div class="first-section">
            <div class="location">
                <i class="fas fa-map-marker-alt foot-icon"></i>
                <div class="foot-texts">
                    <h3>SHOP LOCATION</h3>
                    <p>
                        GadgetShop.Com.BD,
                        Shop 463, 3rd Floor,
                        Farm view Supper Market,
                        Farmget, Dhaka 1215
                    </p>
                </div>
            </div>
            <div class="calls">
                <i class="fas fa-phone-volume foot-icon"></i>
                <div class="foot-texts">
                    <h3>CALL US</h3>
                    <p>
                        Store: 012345678910
                        Delivery: 012345678910
                        Support: 012345678910
                    </p>
                </div>
            </div>
            <div class="time">
                <i class="fas fa-clock foot-icon"></i>
                <div class="foot-texts">
                    <h3>STORE HOURS</h3>
                    <p>
                        Saturday - Friday 09:30AM - 07:00PM
                    </p>
                </div>
            </div>
        </div>

        <div class="second-section">
            <a href=""><i class="fab fa-facebook link-icon"></i></a>
            <a href=""><i class="fab fa-twitter link-icon"></i></a>
            <a href=""><i class="fab fa-youtube link-icon"></i></a>
            <a href=""><i class="fas fa-envelope link-icon"></i></a>
        </div>
        <div class="copy">
            <p>Copyright © 2021, GadgetShop.Com.BD, All Rights Reserved</p>
        </div>
    </footer>
    <!-- Footer is Ends here -->


    <script src="JavaScript/sidebarscript.js"></script>
</body>

</html>