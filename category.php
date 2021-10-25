<?php session_start();?>
<?php 

$category = $_GET['category'];

?>


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
    <link rel="stylesheet" href="Style/Category.css">
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
    <title>Document</title>

</head>

 <body>
 
 <?php include("inc/sidebar.php") ?>

 <!-- Categories Start -->
 <section class="manu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <li><a class="dropdown-item" href="./ComputerAccessories.php">Computer Accessories</a></li>
                                <li><a class="dropdown-item" href="./FeaturesPhone.php">Features Phone</a></li>
                                <li><a class="dropdown-item" href="./Sensor.php">Sensor</a></li>
                                <li><a class="dropdown-item" href="./Robot.php">Robot</a></li>
                                <li><a class="dropdown-item" href="./Arduino.php">Arduino</a></li>
                            </ul>
                        </li>


                        <li class="nav-item">
                        <a class="nav-link active" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Login</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>
<!-- Categories end -->

<!-- features starts  -->
<div class="card-container">
<?php
$user='root';
$pass='';
$connect=mysqli_connect('localhost',$user,$pass,'gadgetshop');
$query="SELECT * FROM product WHERE category='$category' ";
$result=mysqli_query($connect,$query);

if($result){
if(mysqli_num_rows($result)>0){
while($product=mysqli_fetch_assoc($result)){
?>

<div class="card" style="width:16rem">
<a style="text-decoration:none" href="details.php?pid=<?php echo $product['Pid'] ?>">
<img src="<?php  echo $product['imgAddress']?>" class="card-img-top w-75 h-100" alt="...">
<div class="card-body">
<h6 class="card-title"><?php echo $product['Pname'] ?></h6>
<p class="card-text">$<?php echo $product['price']?></p>
<button type="button" class="btn btn-success m-2 "><i class="fas fa-shopping-cart"></i>Buy Now</button>
</a>
</div>
</div>
<?php
}}}
?>
</div>
<!-- features ends  -->



<?php include("inc/footer.php") ?>