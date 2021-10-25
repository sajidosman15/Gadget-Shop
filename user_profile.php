<?php include "loginValidation.php";?>

<?php 
$uid = $_SESSION['id'];
$conn=mysqli_connect("localhost","root","","gadgetShop") or die("Connection Failed");
$sql = "SELECT * FROM account Where id =$uid;";
$result = mysqli_query($conn,$sql) or die("Query Failed");

if(mysqli_num_rows($result)>0){
  $data = mysqli_fetch_assoc($result);
  $user_name = $data['username'];
  $name = $data['name'];
  $password = $data['password'];
  $email = $data['email'];
  $phone = $data['phoneNumber'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <script src="https://kit.fontawesome.com/a2ee45cbd3.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Style/user_style.css">
    <link rel="stylesheet" href="Style/header.css">
    <link rel="stylesheet" href="Style/Footer.css">
</head>
<body>
    < <!-- Header shart -->
    <?php include("inc/sidebar.php") ?>
    < <!-- Header Ends -->
     
    <div class="container">
        <div class="row">
            <div class="image">
                <div class="circle-img"><img src="Images/profile.png" alt=""></div>
                <div class="user-name">
                    <input type="text" name="username" value="<?php echo $user_name?>" disabled>
                </div>
            </div>
            <div class="details">
                <div><h3>User Information</h3>
                <span class="divider"></span>
            </div>
                <div class="details-box">
                    <div class="information">
                        <h4>Name:</h4>
                    <input type="text" name="Name" value="<?php echo $name ?>" disabled>
                    <h4>Email:</h4>
                    <input type="text" name="Email" value="<?php echo $email ?>" disabled>
                    </div>
                    <div class="information">
                        <h4>Phone:</h4>
                        <input type="text" name="Phone" value="<?php echo $phone ?>" disabled>
                        <h4>Password:</h4>
                        <input class="pass-text" type="text" name="Password" value="<?php echo '********' ?>" disabled>
                    </div>
                </div>
                <div class="button">
                    <a href="edit_profile.php" ><button class="edit-btn">Update profile</button> </a>
                </div>
            </div>
            
        </div>
    </div>


    <?php include("inc/footer.php") ?>