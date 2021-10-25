<?php

    $conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
    // $uid=$_SESSION['id'];


function search_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

    $search = search_input($_GET['search']);

   
    $searchquery="SELECT * FROM product WHERE Pname like '%$search%' OR  category like '%$search%' OR  description like '%$search%'";
    $result2=mysqli_query($conn,$searchquery);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <link rel="stylesheet" href="Style/search.css">
</head>

<body>

    <!-- Header starts here -->
    <?php include("inc/sidebar.php") ?>
    <!-- Header Ends here -->


    <!-- Search start here -->
    <?php  if($search == ""){ ?>
        <div class="blank-box">
            <i class="fas fa-sad-tear"></i>
            <p>Did you search? We found nothing.</p>
        </div>

    <?php  } else if(mysqli_num_rows($result2)>0){ ?>
        
            <section class="order-details">
                <h4 class="page-title">SEARCH RESULT</h4>

                <div class="details">

                    <div class="shopping-info background-style">
                        <h6>You have searched for '<?php echo $search ?>'</h6>
                        <div class="order-title">
                            <div class="image">IMAGE</div>
                            <div class="pname">PRODUCT NAME</div>
                            <div class="category">CATEGORY</div>
                            <div class="uprice">PRICE</div>
                        </div>

                        <?php 
                            while($products=mysqli_fetch_assoc($result2)) {
                                $total=$products['price']*1;
                            
                        ?>

                                <div class="products">
                                <div class="image"><img src="<?php echo $products['imgAddress']; ?>"></div>
                                <a class="pname" href="details.php?pid=<?php echo $products['Pid'] ?>">
                                <!-- <div class="pname"><?php echo $products['Pname']; ?></div> -->
                                <?php echo $products['Pname']; ?>
                                </a>
                                <div class="category"><?php echo $products['category']; ?></div>
                                <div class="uprice"><?php echo $products['price'].' tk'; ?></div>
                            </div>
 
                        <?php } ?>   
                        <h4></h4>
                    </div>

                </div>
            </section>

    <?php  }else{ ?>

        <div class="blank-box">
            <i class="fas fa-sad-tear"></i>
            <p>No Results Found. Try Again!</p>
        </div>

    <?php  } ?>
    <!-- Search ends here -->


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
