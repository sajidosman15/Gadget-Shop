<?php include "loginValidation.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <link rel="stylesheet" href="Style/myorders.css">
</head>

<body>

    <!-- Header starts here -->
    <?php include("inc/sidebar.php") ?>
    <!-- Header Ends here -->


    <!-- order details start here -->
        <section class="order-details">
                <h4 class="page-title">MY ORDERS</h4>

                <div class="details">

                    <div class="shopping-info background-style">
                        <h6></h6>
                        <div class="confirm">
                            
                            <a style="background-color: green;" href="previousorders.php?id=1" class="btn waves-effect waves-light col s12">Check Previous Orders</a>
                            
                        </div>
                        

                        <div class="confirm">
                            
                            <a style="background-color: red;" href="previousorders.php?id=0" class="btn waves-effect waves-light col s12">Check Pending Orders</a>
                            
                        </div>
                    </div>
                </div>
            </section>
   
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
