<?php
// include(connection.php);
//connecting to mysql database
$servername = "localhost";
$username = "root";
$pawd = "";
$db ="railway";

// Create a connection
$connect = mysqli_connect($servername, $username, $pawd,$db);
if (!$connect)
{
    echo "Sorry, Database connection Failed!".mysqli_connect_error();
}
else
{
     echo "Connection Successful";

}






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Poppins&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet"> 
    <!-- css for mobile -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="regStyle.css">
  <!-- css for desktop -->
  <link rel="stylesheet" href="desktopStyle.css" media="screen and (min-width:992px)">
  
</head>
<body>
    <div class="nav-wala">

        <div class="navbar"  >
            
        <div class="nav-logo col-2">
            
            <img src="image/logo1.jpg" alt="Train logo"  height="60px" width="60px">    
        </div>

        <div class="nav-heading col-4">
            <h1>Bangladesh Railway</h1>
        </div>

        <div class="navbar-menu col-6">
            <a href="demologin.html">Login</a>
            <a href="demo admin login.html">Admin Login</a>
            <a href="demo.html">Back to Home</a>
        </div>

        </div>
    </div>



        <div class="registration">
            <img src="image/signup_logo.jpg" alt="" id="sg-logo">
            <h2>Enter Your details:</h2>
            <form action="demoreg.php" method="post">
                <div>
                    <label class="form-title">Name:</label>
                    <input type="text" class="input-box" name="nm"  placeholder="Enter your name" required>
                </div>
                <br>
                
                <div>
                    <label class="form-title">Email Address:</label>
                    <input type="email" class="input-box" name="emnm"  placeholder="Enter your email" required>
                </div>
                <br>
                <div>
                    <label class="form-title">Password:</label>
                    <input type="password" class="input-box" name="pwd" placeholder="Enter your password" required>
                </div><br>
                
                <div>
                    <label class="form-title">Confirm password:</label>
                    <input type="password" class="input-box" name="reppwd"  placeholder="Confirm your password" required>
                </div>
                <br>
                
                <div>
                    <!-- id="reg-btn" -->
                   <input type="submit" value ="Submit"  name="submit">
                </div>
                 
            </form>  
      </div>      

</body>
</html>

<?php
if(isset($_POST['submit']))
{

    $nm=$_POST['nm'];
    $emnm=$_POST['emnm'];
    $pwd=$_POST['pwd'];
    $reppwd=$_POST['reppwd'];
   

    echo $_POST['nm'];
    echo $_POST['emnm'];
   

    $q = "INSERT INTO `user` (`user_name`, `user_email`, `user_password`) VALUES ('$nm','$emnm','$pwd')";
     //$q="INSERT INTO railway.user ('user_name','user_email','user_password') values('$nm','$emnm','$pwd')";
    //  $q="INSERT INTO railway.user ('user_name','user_email','user_password') values('sazol','a@gmail.com','123')";
    //  $q="INSERT INTO user ('user_name','user_email','user_password') values('$nm','$emnm','$pwd')";
    //  $q="insert into 'user'(user_no,user_name,email,password) values(null,'$nm','$emnm','$pwd')";
    //   $q="insert into user('user_no','user_name','user_email','user_password') values(1,'hi','123@a.com','123')";
    $data=mysqli_query($connect,$q);
    if($data){
        echo "Data inserted into database";
    }
    else{
        echo "Data insertion failed";
    }
    
    
    // mysqli_close($connect);
}


?>

