<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Poppins&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet"> 
    <!-- css for mobile -->
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="adminStyle.css"> -->
    <!-- <link rel="stylesheet" href="logStyle.css"> -->
    <!-- <link rel="stylesheet" href="regStyle.css"> -->
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

        #log-btn
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
            <a href="index.php">Back to Home</a>
         </div>
    </div>
</div>

    <div id="form-heading">
         <h2>Admin Login Details</h2>
    </div>

     <div class="form-style">
        <!-- <img src="image/login_logo.png" alt="" id="sg-logo"> -->
        <form  method="POST">
           <input type="text" placeholder="Enter Admin Name"  name="adName" required>
           <input type="password" placeholder="Enter Admin Account Password"  name="pwd" required>
           <button type="submit" name="Log" id="log-btn">Login</button>
        </form> 
     </div>
 
</body>
</html>

<?php
if(isset($_POST['log']))
{
    // include 'connection.php';
    
    $adName==mysqli_real_escape_string($con,$_POST['adName']);
    $pwd=mysqli_real_escape_string($con,$_POST['pwd']);
    
    if($adName=="admin")
    {       
            if($pwd=="password")
            {
                header("location:admin dashboard.php");
            }
            else{
                
                echo "Wrong Admin Password, Access Denied!";  
            }
    }
    else{
       echo "Wrong Admin Name, Access Denied!";  
    }
        
        // mysqli_close($con); 
   
   
  
}


?>

