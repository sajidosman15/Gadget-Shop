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
    <title>Update Profile</title>
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
                <form action="#" method="post">
                <div class="user-name">
                    <input type="text" value="<?php echo $user_name?>" disabled>
                </div>
            </div>
            <div class="details">
                <div><h3>User Information</h3><span class="divider"></span></div>
                <div class="details-box">
                    <div class="information">
                        <h4>Name:</h4>
                    <input class="border" type="text" name="Name" value="<?php echo $name ?>" required>
                    <h4>Email:</h4>
                    <input class="border" type="email" name="Email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="information">
                        <h4>Phone:</h4>
                        <input class="border" type="number" name="Phone" value="<?php echo $phone ?>" required>
                        <h4>Password:</h4>
                        <input class="border" type="password" name="Password" value="<?php echo '********' ?>" >
                    </div>
                </div>
                <div class="button">
                    <button type="save" name="save" class="edit-btn" value="Save">Save</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>

    <?php include("inc/footer.php") ?>

<?php
    $uid = $_SESSION['id'];
 if(isset($_POST['save'])){
    $u_name = $_POST['Name'];
    $u_email = $_POST['Email'];
    $u_phone = $_POST['Phone'];
    $u_password = $_POST['Password'];

    if($u_password=='********'){
        $u_password=$password;
    }else{
        $u_password=md5($u_password);
    }


    $sql = "UPDATE account SET name = '$u_name',
                  email = '$u_email', phoneNumber = '$u_phone', password = '$u_password' WHERE id = $uid";
    $result = mysqli_query($conn,$sql) or die("Query Failed");
    ?>
        <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "user_profile.php";
        </script>
<?php } ?>

