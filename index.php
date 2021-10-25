<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/a2ee45cbd3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/index.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <title>Gadget Shop</title>
</head>

<body>

    <?php include("inc/sidebar.php") ?>

    <div class="brk">

        <!-- Banner start -->
        <div class="container " >

            <div id="carouselExampleControls" class="carousel slide orange-bg " data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-7">
                                <h4>Fsp Ups Fp 2000 Va</h4>
                                <p>FSP UPS (Power Never Ends) ,FP 2000 VA/ 1200W, Voltage : 220/230/240 Vac, Battery Type & Number : 12 V/9 Ah x 2 . 2 Years Warranty.</p>
                                <h3>$12750</h3>
                                <!-- <button type="button" class="btn btn-dark">BUY NOW >></button> -->
                            </div>
                            <div class="col-md-4">
                                <img src="https://dsxzwbyxhnf79.cloudfront.net/productImages/2021/04/607bdbc357b19_1618729923.jpg" class="carrosel-img" alt="...">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-7">
                                <h1>Tinmo F17 Blue</h1>
                                <P>Dual SIM Dual Standby, 2.8” VGA Display, 0.3 MP Camera, 1580mAh Battery, Big Sound, Big Dual Torch Light, Mp3/Mp4 Player, Wireless FM Radio, Magic VoiceGames.</P>
                                <h3>$1280</h3>
                                
                            </div>
                            <div class="col-md-4">
                                <img src="https://i.ibb.co/xJ53gBP/Tinmo-F17-Blue.jpg" class="carrosel-img" alt="...">
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="row d-flex align-items-center">
                            <div class="col-md-7">
                                <h4>APE Mini High Definition Wireless Monkey Speaker With Smartphone Stand</h4>
                                <P>This fun yet multi-functional monkey-styled speaker will be the heart and soul of your party. Small enough to fit in your pocket and loud enough for a picnic. Its wireless </P>
                                <h3>$1,199.99</h3>
                                <button type="button" class="btn btn-dark">BUY NOW >></button>
                            </div>
                            <div class="col-md-4">
                                <img src="https://i.ibb.co/vqqGHy7/60acc088d8715-1621934216.jpg" class="carrosel-img" alt="...">
                            </div>
                        </div>
                    </div>

                


                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Banner end -->


    <!-- smallCard start -->
    <div class="container categories">
        <div class="row">
            <div class="col-md-3">
                <div class="d-flex justify-content-between align-items-center cat1 ">
                    <h3> Phone</h3>
                    <img src="https://i.imgur.com/ZJX7fxx.png">
                </div>
            </div>


            <div class="col-md-3">
                <div class="d-flex justify-content-between align-items-center cat2 ">
                    <h3>Robot</h3>
                    <img src="https://i.imgur.com/vd5FLEh.png" >
                </div>
            </div>


            <div class="col-md-3">
                <div class="d-flex justify-content-between align-items-center cat4 ">
                    <h3>Arduino</h3>
                    <img src="https://i.imgur.com/7QFTMcL.png">
                </div>
            </div>


            <div class="col-md-3 ">
                <div class=" d-flex justify-content-between align-items-center cat3">
                    <h2>Sensor</h2>
                    <img src="https://i.imgur.com/hQ6bU19.png">
                </div>
            </div>
        </div>
    </div>
    <!-- SmallCard end -->





<!--  Card start -->


<div class="cart">
<?php
$user='root';
$pass='';
$connect=mysqli_connect('localhost',$user,$pass,'gadgetshop');
$query='SELECT * FROM product ORDER BY Pid ASC';
$result=mysqli_query($connect,$query);
if($result){
if(mysqli_num_rows($result)>0){
while($product=mysqli_fetch_assoc($result)){
?>

<div class="card">
<a style="text-decoration:none" href="details.php?pid=<?php echo $product['Pid'] ?>">
<img src="<?php  echo $product['imgAddress']?>"  class="card-img-top  w-75 h-100" alt="...">
<div class="card-body">
<h6 class="card-title"><?php echo $product['Pname'] ?></h6>
<p class="card-text">$<?php echo $product['price']?></p>
<button  class="btn btn-secondary"type="button" ><i class="fas fa-shopping-cart"></i>Buy Now</button>
</a>
</div>
</div>
<?php
}}}
?>
</div>

    <!--  Card  end -->



    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fab fa-cc-mastercard"></i>
                        <h2>Secure Payment</h2>
                        <p>

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
                        <p>

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-sync-alt"></i>
                        <h2>90 Days Return</h2>
                        <p>

                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-comments"></i>
                        <h2>24/7 Support</h2>
                        <p>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->


    <?php include("inc/footer.php") ?>