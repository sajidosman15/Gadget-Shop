<?php session_start();?>

<?php 

$conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
$id = $_GET['pid'];
$sql = "SELECT Pid,Pname,price,category,imgAddress,description,SUBSTRING(`description`, 1, 300) as sdescription from product where Pid = $id";
$result = mysqli_query($conn,$sql) or die("Query Failed");

if(mysqli_num_rows($result)>0){
  $data = mysqli_fetch_assoc($result);
  $pname = $data['Pname'];
  $pid = $data['Pid'];
  $price = $data['price'];
  $category = $data['category'];
  $img = $data['imgAddress'];
  $description = $data['description'];
  $sdescription = $data['sdescription'];
}


$rp_sql= "SELECT imgAddress,Pname,price FROM product WHERE category = (SELECT category FROM product where Pid=$id) LIMIT 2;";
$result2 = mysqli_query($conn,$rp_sql) or die("Query Failed");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Shop</title>
    
     <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/a2ee45cbd3.js" crossorigin="anonymous"></script>
    <link href="Style/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="Style/details.css">
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
   
</head>
<body>
     <!-- Header shart -->
     <?php include("inc/sidebar.php") ?>
     <!-- Header shart -->
                
    <section class="container">

        <?php if (isset($_GET['ok']) && $_GET['ok'] == "ok") : ?>
            <div class="alert alert-success" role="alert">
                <strong style="text-align:center;display:block;">Product is added to cart</strong>
            </div>
        <?php endif ?>


        <div class="row1">
            <div class="product_img">
                <div class="preview_img">
                    <img src="<?php echo $img ?>" alt="" id="preview">
                </div>
                <div class="small_img">
                    <img src="<?php echo $img ?>" alt="" onclick="clickme(this)">
                    <img src="<?php echo $img ?>" alt="" onclick="clickme(this)">
                </div>
            </div>
            <div class="product_details">
                <div class="product-name">
                    <h4><?php echo $pname ?></h4>
                </div>
                <div class="short-info">
                    <ul>
                        <li><b>Product Code:</b> <span><?php echo $pid?></span></li>
                        <li><b>Availability: </b> <span class="bold">In Stock</span></li>
                    </ul>
                </div>
                <div class="quick-overview">
                    <h6>Quick Overview</h6>
                    <p><?php echo $sdescription?>...</p>
                    
                </div>
                
                    <div class="on-special"><b>৳ <?php echo $price?></b></div>
                    <div class="quantity"> <b>Quantity: <input class="num" type="number" name="quantity" value="1"></b>
                </div>
                <button type="submit" name="save" class="cartbutton"><a class="add-link" href="

                <?php 
                    if(isset($_SESSION['username'])){
                        echo "databasequery.php?id=2&pid=$id&quantity=1";
                    }
                    else{
                        echo "login.php";
                    } ?>
                
                ">Add To Cart</a></button>
            </div>
        </div>
    </section>

<!-- Description Section -->

<section class="container2">
    <div class="row2">
        <div class="specification">
            <div class="nav">
                <ul>
                    <li><b>Descripton</b></li>
                </ul>
            </div>

                <div class="title">
                    <h2><?php echo $pname?></h2>
                    <p><?php echo $description?></p>
                </div>
        </div>
        <div class="related_product">
            <div class="nav"><b>Related Products</b> </div>

            <?php 
                if(mysqli_num_rows($result2)>0){
                    while($data = mysqli_fetch_assoc($result2)) {
                        $Pname = $data['Pname'];
                        $Price = $data['price'];
                        $Img = $data['imgAddress'];
            ?>
                <div class="container3">
                    <div class="row3">
                        <div class="img-rp">
                            <img src="<?php echo $Img ?>" alt="">
                        </div>
                        <div class="description-rp">
                            <h6><?php echo $Pname ?></h6>
                            <p><b>৳ <?php echo $Price?></b></p>
                        </div>
                    </div>
                </div><hr>

                <?php }  } ?>
        </div>
    </div>
</section>

    <script>
        function clickme(smallimg){
            var previewbox = document.getElementById("preview");
            previewbox.src = smallimg.src;   
        }
    </script>


<?php include("inc/footer.php") ?>