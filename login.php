<?php 
 include "config.php";
 $errMessage="";
 session_start();

 if(isset($_SESSION['username'])){ //if user is already logged in then redirect to home page
     header("Location:{$hostname}/index.php");
 }

 if(isset($_POST['save'])){ //if save button is clicked
    
    include "config.php";

    function performSecurity($data){
        $data = htmlspecialchars($data);//protect from special character
        $data = trim($data); //remove spaces from two sides
        $data = stripslashes($data);//remove slashes
        return $data;
    }

    $uname=mysqli_real_escape_string($conn,$_POST['uname']);
    $uname=performSecurity($uname);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $password=performSecurity($password);
    $password=md5($password);//encrypt password
    
    $sql="SELECT * FROM `account` WHERE username='{$uname}' AND password='{$password}';";
    $result=mysqli_query($conn,$sql) or die("Query failed");

    if(mysqli_num_rows($result)>0){
        
        while($row=mysqli_fetch_assoc($result)){//save the associative array in row
            
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phoneNumber'] = $row['phoneNumber'];

            header("Location:{$hostname}/index.php");
        }
    }
    else{
        $errMessage="<p class='err-message'>Username or Password is Incorrect!</p>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="Style/loginstyle.css">
</head>
<body class="back red">
    
    <section class="card">
        <div class="logo">
            <img src="Images/logo.png" alt="">
        </div>

        <form action="<?php $_SERVER['PHP_SELF'];?>" class="fields" method="POST">

            <div class="row">
                <i class="far fa-user-circle icon"></i>
                <input id="username" name="uname" type="text" placeholder="Enter Username" required>
            </div>

            <div class="row">
                <i class="fas fa-key icon"></i>
                <input id="password" name="password" type="password" placeholder="Enter Password" required>
            </div>

            <?php echo $errMessage; ?>

            <div class="remember">
                <input type="checkbox" id="remember-me"/>
                <label for="remember-me">Remember me</label>
            </div>

            <div class="submit">
                <button class="btn waves-effect waves-light col s12" name="save">Log In</button>
                <p>Not have any account? <a href="signUp.php">Register Now!</a></p>
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