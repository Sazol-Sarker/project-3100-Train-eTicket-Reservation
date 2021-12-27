<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel Ticket</title>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans&family=Montserrat&family=Satisfy&display=swap" rel="stylesheet"> 
    <!-- css for mobile -->
    <link rel="stylesheet" href="style.css">
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
        option,input{
            width: 100%;
            padding: 15px;
            border:1px solid rgb(102, 255, 0);
            border-radius: 5px;
            font-size: 20px;
            margin-top: 15px; 
            margin-bottom: 15px; 
        }
        label,select{
            font-size:20px;
            margin-top: 15px; 
            margin-bottom: 15px;
            width: 100%;
            padding: 15px;
        }

        #cancel-btn
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

<!-- ctrl+/ ==comment -->
<!-- shift+alt+down arrow = duplicate -->
<body>
    <div class="navbar" >

        <div class="nav-logo col-2">

                <img src="image/logo1.jpg" alt="Train logo" height="60px" width="60px">

        </div>
        <div class="nav-heading col-4">
                <h1>Bangladesh Railway</h1>
        </div>
        <div class="navbar-menu col-6">
            <a href="user dashboard.php">Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>


    </div>

    <div id="form-heading">
         <h2>Cancel Your Ticket</h2>
        </div>
        
        <div class="form-style">
            <form  method="POST">
            <input type="email" placeholder="Enter Your email"  name="email" required>
            <label for="source">Choose Source:</label>
                <select name="source">
                <option value="Rangpur">Rangpur</option>
                <option value="Kurigram">Kurigram</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Dhaka">Dhaka</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Chattogram">Chattogram</option>
                </select> 
                <br>
            <label for="dest">Choose Destination:</label>
                <select name="dest">
                <option value="Dhaka">Dhaka</option>
                <option value="Rangpur">Rangpur</option>
                <option value="Kurigram">Kurigram</option>
                <option value="Rajshahi">Rajshahi</option>
                <option value="Sylhet">Sylhet</option>
                <option value="Chattogram">Chattogram</option>
                </select>
                <br>
                
             <label for="trName">Choose Train Name:</label>
             <select name="trName">
             <option value="Rangpur Express">Rangpur Express</option>
             <option value="Kurigram Express">Kurigram Express</option>
             <option value="Parabat Express">Parabat Express</option>
             <option value="Suborno Express">Suborno Express</option>
             </select> 
                
             <label for="jrDate">Journey Date:</label>
             <input type="date" name="jrDate" required>

             <input type="number" placeholder="How many tickets"  name="tktAmount" required>
             
            <button type="submit" name="cancel" id="cancel-btn">Cancel</button>
      </form> 
    </div>
  
</body>
</html>

<?php
if(isset($_POST['cancel']))
{
    include 'connection.php';
    // echo "connected";
    $email=$_POST['email'];
    $source=$_POST['source'];
    $dest=$_POST['dest'];
    $trName=$_POST['trName'];
    $jrDate=$_POST['jrDate'];
    $tktAmount=$_POST['tktAmount'];

    
     //,'billable_amount','journey_date'
    $sql1="INSERT INTO cancelled(pnr_email,train_name,source,destination,no_of_seat) values('$email','$trName','$source','$dest','$tktAmount')";
    $query1=mysqli_query($con,$sql1);


     $sql2="DELETE from reserved where pnr_email='$email'";
     $query2=mysqli_query($con,$sql2);
   
    if($query2)
    {
        echo '<script type="text/javascript">alert("Ticket Cancellation Successfull!")</script>';
    }

    mysqli_close($con);
    
    // alert about ticket cancelling confirmation & sending email
    // include 'send.php';


}


?>