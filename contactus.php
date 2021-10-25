<?php session_start();?>
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

    <link rel="stylesheet" href="Style/contactus.css">
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
   
</head>
<body>
     <!-- Header start -->
     <?php include("inc/sidebar.php") ?>
     <!-- Header start -->

<!-- Contact -->

<div class="contact-section">

  <h1>Contact Us</h1>
  <div class="border"></div>
  <form class="contact-form" method="POST">
    <input type="text" class="contact-form-text" name="name" placeholder="Your name" required>
    <input type="email" class="contact-form-text" name="email" placeholder="Your email" required>
    <input type="number" class="contact-form-text" name="phone" placeholder="Your phone" required>
    <textarea class="contact-form-text" name="message" placeholder="Your message" required></textarea>
    <input type="submit" name="ok" class="contact-form-btn" value="Send">
  </form>
  <?php 
        if(isset($_POST['ok'])){
            include_once 'function.php';
            $obj=new Contact();
            $res=$obj->contact_us($_POST);
            if($res==true){
                echo "<script>alert('Query successfully Submitted.Thank you')</script>";
            }
            else{
                echo "<script>alert('Update Your Xampp Server!!')</script>";
            }
        }
    ?>
</div>

<!-- Meet the Team -->

<section class="footer">
    <div class="team"><h2>MEET THE TEAM</h2>
    <span class="divider"></span>
    </div>
    <div class="card-box">
        <div class="card">
            <div class="img-pp">
                <img src="images/sajid.jpg" alt=""></div>
            <div class="des-pp">
            <h4>Sajid Osman</h4>
            <h5>191-35-2660</h5>
            </div>
        </div>
        <div class="card">
        <div class="img-pp">
                <img src="images/tanmoy.jpg" alt=""></div>
            <div class="des-pp">
            <h4>Tanmoy Paul</h4>
            <h5>191-35-2649</h5>
            </div>
        </div>
        <div class="card">
        <div class="img-pp">
                <img src="images/Shakib.jpg" alt=""></div>
            <div class="des-pp">
            <h4>Mansurul Hakim Shakib</h4>
            <h5>191-35-2723</h5>
            </div>
        </div>
        <div class="card">
        <div class="img-pp">
                <img src="Images/fazlee.jpg" alt=""></div>
            <div class="des-pp">
            <h4>Md. Fazle Rabbe</h4>
            <h5>191-35-2724</h5>
            </div>
        </div>
        <div class="card">
        <div class="img-pp">
                <img src="Images/sowad.jpg" alt=""></div>
            <div class="des-pp">
            <h4>Merazul Ehsan Sowad</h4>
            <h5>191-35-2755</h5>
            </div>
        </div>
    </div>

</section>


<!-- Footer start -->
<?php include("inc/footer.php") ?>
<!-- Footer end -->