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
    <!-- <link rel="stylesheet" href="regStyle.css">
    <link rel="stylesheet" href="form.css"> -->
  <!-- css for desktop -->
  <link rel="stylesheet" href="desktopStyle.css" media="screen and (min-width:992px)">
  <style>
        *{
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
         }
    body{
        padding: 0;
        font-family: Georgia, 'Times New Roman', Times, serif;       
         }
    .form-style{
        border: 1px solid gray;
        max-width: 600px;
        margin: auto;
        padding: 10px;
        font-size:18px;
        font-weight: bold;
            }
        #form-heading{
            background-color: rgb(255, 0, 85);
            color: rgb(255, 240, 245);
            text-align: center;
            max-width: 600px;
            padding: 10px;
            margin: auto;
            border: 1px solid gray;
            border-bottom: none;
        }
        input{
            width: 100%;
            padding: 15px;
            border:1px solid rgb(102, 255, 0);
            border-radius: 5px;
            font-size: 20px;
            margin-top: 15px; 
            margin-bottom: 15px; 
        }

        #reg-btn
        {
        margin: auto;
        width: 20%;
        padding: 10px 10px;
        border: 1px solid greenyellow;
        border-radius: 10px;
        cursor: pointer;

        background:rgb(138, 105, 255);
        font-size: 20px;
        display: flex;
        justify-content: center;


        }


</style>
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
            <a href="login.php">Login</a>
            <a href="admin login.php">Admin Login</a>
            <a href="index.php">Back to Home</a>
        </div>

        </div>
    </div>

    <div id="form-heading">
        <h2>User registration </h2>     
    </div>
        <div class="form-style">
            <!-- <img src="image/signup_logo.jpg" alt="" id="sg-logo"> -->
            <!-- <h2>Enter Your details:</h2> class="input-box"-->
            <form  method="POST">
            <input type="text" placeholder="Enter Your Name" name="name" required>
            <input type="email" placeholder="Enter Your Email"  name="email" required>
            <input type="password" placeholder="Enter Account Password"  name="pass1" required>
            <input type="password" placeholder="Confirm Your Password" name="pass2" required>
            <button type="submit" name="Reg" id="reg-btn">Register</button>
            </form> 
      </div>      

</body>
</html>
<?php
if(isset($_POST['Reg']))
{
    include 'connection.php';

    $name=mysqli_real_escape_string($con, $_POST['name']) ;
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $pass1=mysqli_real_escape_string($con,$_POST['pass1']);
    $pass2=mysqli_real_escape_string($con,$_POST['pass2']);

    $dupEmail="select * from passenger where pnr_email='$email'";
    $query=mysqli_query($con,$dupEmail);
    $cnt=mysqli_num_rows($query);
    // echo "$dupEmail";
    if($cnt>0)//Dupliacte Email check
    {
        echo "Email already exist";
    }
    else{
        if($pass1==$pass2)//password match check
        {
            
            $sql="INSERT INTO passenger(pnr_name,pnr_email,account_password) values('$name','$email','$pass1')";
            $query=mysqli_query($con,$sql);
            header("location:login.php");
        }
        else{
            
            echo "Password doesn't match";
            
            
        }
    }
    mysqli_close($con);



}


?>