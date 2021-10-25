<?php include "loginValidation.php";
    $id=$_GET['id'];

    $conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
    $uid=$_SESSION['id'];

   
    $cartquery="SELECT c.Cid,c.quantity,p.Pname,p.price,p.imgAddress FROM cart as c INNER JOIN product as p ON c.pid = p.Pid WHERE c.Uid=$uid AND isConfirmed=$id";
    $result2=mysqli_query($conn,$cartquery);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <link rel="stylesheet" href="Style/previousorders.css">
</head>

<body>

    <!-- Header starts here -->
    <?php include("inc/sidebar.php") ?>
    <!-- Header Ends here -->


    <!-- order details start here -->
    <?php  if(mysqli_num_rows($result2)>0){ ?>
        
            <section class="order-details">
                <h4 class="page-title">MY ORDERS</h4>

                <div class="details">

                    <div class="shopping-info background-style">
                        <h6></h6>
                        <div class="order-title">
                            <div class="image">IMAGE</div>
                            <div class="pname">PRODUCT NAME</div>
                            <div class="quantity">AMOUNT</div>
                            <div class="uprice">UNIT PRICE</div>
                            <div class="tlprice">TOTAL</div>
                        </div>

                        <?php 
                            while($products=mysqli_fetch_assoc($result2)) {
                                $total=$products['price']*$products['quantity'];
                            
                        ?>
                            <div class="products">

                                <div class="image"><img src="<?php echo $products['imgAddress']; ?>"></div>
                                <div class="pname"><?php echo $products['Pname']; ?></div>
                                <div class="quantity"><?php echo $products['quantity']; ?></div>
                                <div class="uprice"><?php echo $products['price'].' tk'; ?></div>
                                <div class="tlprice"><?php echo $total.' tk'; ?></div>
                            </div>

                        <?php } ?>   
                        

                        <div class="confirm">
                            
                        </div>
                        
                        
                    </div>
                </div>
            </section>
    <?php  }else{ ?>

        <div class="blank-box">
            <i class="fas fa-sad-tear"></i>
            <p>Sorry! Your Cart Is Empty.</p>
        </div>

    <?php  } ?>
    <!-- order details ends here -->


    <!-- Footer is starts here -->
    <?php include("inc/footer.php") ?>
   
    <!-- Footer is Ends here -->

    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <script src="JavaScript/sidebarscript.js"></script>
</body>

</html>
