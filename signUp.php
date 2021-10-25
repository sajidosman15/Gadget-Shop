<?php
$unameerr=0;
$nameerr=0;
$emailerr = 0;
$passworderr = 0;
$numbererr = 0;

$errorStyle="style='border-bottom:1px solid red;'";
$errorMessageFirst="<span class='tip'><p><i class='far fa-question-circle'></i>";
$errorMessageLast="</p></span>";
$nameError="Name can not be empty.";
$uNameError1="Username can not be empty.";
$uNameError2="Space is not allowed.";
$uNameError3="Username is already taken.";
$emailError="Invalid email address.";
$passError="Password must be atleast 4 character.";
$phoneError="Invalid phone number.";

// starting a session to remember all typed value
session_start();
$_SESSION['uname'] = "";
$_SESSION['pass'] = "";
$_SESSION['fname'] = "";
$_SESSION['emailf'] = "";
$_SESSION['number'] = "";

if(isset($_POST['save'])){ //if save button is clicked
    
    include "config.php";
    $unameerr=0;
    $nameerr=0;
    $emailerr = 0;
    $passworderr = 0;
    $numbererr = 0;

    function performSecurity($data){
        $data = htmlspecialchars($data);//protect from special character
        $data = trim($data); //remove spaces from two sides
        $data = stripslashes($data);//remove slashes
        return $data;
    }

    //getting data from the form.
    $fname=mysqli_real_escape_string($conn,$_POST['fname']); //protect from sql attack. take two perameter.
    $fname=performSecurity($fname);
    $uname=mysqli_real_escape_string($conn,$_POST['uname']);
    $uname=performSecurity($uname);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $email=performSecurity($email);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password=performSecurity($password);
    $number=mysqli_real_escape_string($conn,$_POST['number']);
    $number=performSecurity($number);

    // storing all typed value in session so that auto complete next time
    $_SESSION['uname'] = $uname;
    $_SESSION['pass'] = $password;
    $_SESSION['fname'] = $fname;
    $_SESSION['emailf'] = $email;
    $_SESSION['number'] = $number;

    //name check
    if(strlen($fname)==0){//if full name is empty
        $nameerr=1;
    }

    //username check
    if(strlen($uname)!=0 && strpos($uname, " ") == false){//if username is not empty and not have any space
        $sql="SELECT username from account where username='{$uname}'";
        $result=mysqli_query($conn,$sql) or die("Query failed");

        if(mysqli_num_rows($result)>0){//if username is already exist
            $unameerr=3;
        }
    }else if(strlen($uname)==0){//if username is empty
        $unameerr=1;
    }else if(strpos($uname, " ") !== false){// if username contains any space
        $unameerr=2;
    }

    //email check
    if((!filter_var($email, FILTER_VALIDATE_EMAIL))||strlen($email)==0) {
        $emailerr = 1;
    }

    //password check
    if(strlen($password)<4){
        $passworderr = 1;
    }

    //phone number check
    if(strlen($number)<11 || is_numeric($number)==0){
        $numbererr = 1;
    }

    //if all valie is valid then store it to database
    if($unameerr==0 && $nameerr==0 && $emailerr ==0 && $passworderr ==0 && $numbererr ==0){
        $password=md5($password);//encrypt password
        $sql1="INSERT INTO `account` (`username`, `name`, `password`, `email`, `phoneNumber`) 
         VALUES ('{$uname}', '{$fname}', '{$password}', '{$email}', '{$number}');";

        if(mysqli_query($conn,$sql1)){
            echo "<script>
            alert('Account is Created Successfully');
            window.location.href = 'login.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Something wrong. Try again later...');
            window.location.href = 'signUp.php';
            </script>";
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
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/style.css">

</head>

<body>

    <section class="card">
        <div class="logo">
            <img src="Images/logo.png" alt="">
        </div>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="fields" method="POST">

            <div class="box">
                <div class="row">
                    <i class="fas fa-user icon"></i>
                    <input name="fname" id="fname" type="text" placeholder="Enter Your Full Name"
                    <?php
                        echo "value='{$_SESSION['fname']}'";
                        if($nameerr==1){
                            echo $errorStyle;
                        }
                    ?>>
                </div>
                <?php
                    if($nameerr == 1){
                        echo $errorMessageFirst.$nameError.$errorMessageLast;
                    }
                ?>
            </div>

            <div class="box">
                <div class="row">
                    <i class="far fa-user-circle icon"></i>
                    <input id="username" name="uname" type="text" autocomplete="off" placeholder="Enter Username" 
                    <?php
                        echo "value='{$_SESSION['uname']}'";
                        if($unameerr!=0){
                            echo $errorStyle;
                        }
                    ?>>
                </div>
                <?php
                if($unameerr==1){
                    echo $errorMessageFirst.$uNameError1.$errorMessageLast;
                }else if($unameerr==2){
                    echo $errorMessageFirst.$uNameError2.$errorMessageLast;
                }else if($unameerr==3){
                    echo $errorMessageFirst.$uNameError3.$errorMessageLast;
                }
                ?>
            </div>

            <div class="box">
                <div class="row">
                    <i class="fas fa-envelope icon"></i>
                    <input id="email" name="email" type="email" placeholder="Enter Your Email" 
                    <?php
                        echo "value='{$_SESSION['emailf']}'";
                        if($emailerr==1){
                            echo $errorStyle;
                        }
                    ?>>
                </div>
                <?php
                    if($emailerr == 1){
                        echo $errorMessageFirst.$emailError.$errorMessageLast;
                    }
                ?>
            </div>

            <div class="box">
                <div class="row">
                    <i class="fas fa-key icon"></i>
                    <input id="password" name="password" type="password" autocomplete="off" placeholder="Enter Password" 
                    <?php
                        echo "value='{$_SESSION['pass']}'";
                        if($passworderr == 1){
                            echo $errorStyle;
                        }
                    ?>>
                </div>
                <?php
                    if($passworderr == 1){
                        echo $errorMessageFirst.$passError.$errorMessageLast;
                    }
                ?>
            </div>

            <div class="box">
                <div class="row">
                    <i class="fas fa-phone icon"></i>
                    <input id="number" name="number" type="number" placeholder="Enter Phone Number" 
                    <?php
                        echo "value='{$_SESSION['number']}'";
                        if($numbererr ==1){
                            echo $errorStyle;
                        }
                    ?>>
                </div>
                <?php
                    if($numbererr == 1){
                        echo $errorMessageFirst.$phoneError.$errorMessageLast;
                    }
                ?>
            </div>

            <div class="submit">
                <button class="btn waves-effect waves-light col s12" name="save">Register Now</button>
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </section>

    <script>
        if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
    </script>
</body>

</html>