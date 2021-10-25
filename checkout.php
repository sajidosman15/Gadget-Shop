<?php include "loginValidation.php";

    $conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
    $uid=$_SESSION['id'];

    $sql1="SELECT name,email,phoneNumber as mobile from account where id=$uid";
    $result1=mysqli_query($conn,$sql1);
    $row1=mysqli_fetch_assoc($result1);

    $cartquery="SELECT c.Cid,c.quantity,p.Pname,p.price,p.imgAddress FROM cart as c INNER JOIN product as p ON c.pid = p.Pid WHERE c.Uid=$uid AND isConfirmed=0";
    $result2=mysqli_query($conn,$cartquery);
    $tlprice=0;


    // insert to database

    $addresserr=0;
    $errorMessageFirst="<p class='tip'><i class='far fa-question-circle'></i>";
    $errorMessageLast="</p>";
    $addressError="Address can not be empty.";

    function performSecurity($data){
        $data = htmlspecialchars($data);//protect from special character
        $data = trim($data); //remove spaces from two sides
        $data = stripslashes($data);//remove slashes
        return $data;
    }

    if(isset($_POST['save'])){ //if save button is clicked
        include "config.php";
        $addresserr=0;
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $address=performSecurity($address);
        
        if(strlen($address)==0){//if address is empty
            $addresserr=1;
        }

        if($addresserr==0){
            $orderIdquery="SELECT COUNT(*)+1 as ID FROM orders";
            $result3=mysqli_query($conn,$orderIdquery);
            $data=mysqli_fetch_assoc($result3);
            $oid=$data['ID'];

            $carts=array();

            while($products=mysqli_fetch_assoc($result2)) {
                $total=$products['price']*$products['quantity'];
                $tlprice=$tlprice+$total;
                array_push($carts,$products['Cid']);
            }

            $orderquery="INSERT INTO `orders`(`Oid`, `Uid`, `totalPrice`, `isDelivered`, `delivaryAddress`) VALUES ($oid,$uid,$tlprice,0,'$address');";

            if(mysqli_query($conn,$orderquery)){
                foreach ($carts as $cid) {
                    $cartquery="UPDATE `cart` SET `Oid` = $oid, `isConfirmed` = '1' WHERE `cart`.`Cid` = $cid;";
                    mysqli_query($conn,$cartquery);    
                }
                header("Location:{$hostname}/index.php");
            }
        }

    }

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
    <link rel="stylesheet" href="Style/checkout.css">
</head>

<body>

    <!-- Header starts here -->
    <?php include("inc/sidebar.php") ?>
    <!-- Header Ends here -->


    <!-- order details start here -->
    <?php  if(mysqli_num_rows($result2)>0){ ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        
            <section class="order-details">
                <h4 class="page-title">QUICK CHECKOUT</h4>

                <div class="details">
                    <div class="first-row">
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
                                <input class="address-box" name="address" type="text" placeholder="Delivery Address">
                            </div>

                            <div>
                                <p class="details-title"></p>
                                <?php
                                if($addresserr==1){
                                    echo $errorMessageFirst.$addressError.$errorMessageLast;
                                }
                                ?>
                            </div>
                            
                        </div>

                        <div class="bkash-info background-style">
                            <h6>SHIPPING METHOD</h6>
                            
                                <div class="options">
                                    <i class="fas fa-truck"></i>
                                    <input class="radiobutton" type="radio" name="shipping" value="Home" checked>
                                    <span>Home Delivery</span>
                                </div>
                                
                                <div class="options">
                                    <i class="fas fa-store"></i>
                                    <input class="radiobutton" type="radio" name="shipping" value="store">
                                    <span>Pickup From Store</span>
                                </div>
                            
                        </div>

                        <div class="bkash-info background-style">
                            <h6>PAYMENT METHOD</h6>
                            
                                <div class="options">
                                    <i class="far fa-money-bill-alt"></i>
                                    <input class="radiobutton" type="radio" name="payment" value="cash" checked>
                                    <span>Cash On Delivery</span>
                                </div>
                                
                                <div class="options">
                                    <i class="fas fa-credit-card"></i>
                                    <input class="radiobutton" type="radio" name="payment" value="Bkash">
                                    <span>Bkash</span>
                                </div>
                            
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

                        <div class="confirm">
                            
                            <button class="btn waves-effect waves-light col s12" name="save">Confirm Order <i class="fas fa-arrow-right"></i></button>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </section>

        </form>
    <?php  }else{ ?>

        <div class="blank-box">
            <i class="fas fa-sad-tear"></i>
            <p>Sorry! Your Cart Is Empty.</p>
        </div>

    <?php  } ?>
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

    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <script src="JavaScript/sidebarscript.js"></script>
</body>

</html>
