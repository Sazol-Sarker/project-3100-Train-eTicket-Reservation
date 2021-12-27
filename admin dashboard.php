<?php
include 'connection.php';

// $q="select * from reserved";
$q="select * from reserved";
$data=mysqli_query($con,$q);

$total=mysqli_num_rows($data);
$sumOfBoughtTicket=0;
    // $sumOfCancelledTicket 
if($total!=0)
{
    while($result=mysqli_fetch_assoc($data))
    {
        $sumOfBoughtTicket+= $result['no_of_seat'];   
    }
}

$q1="select * from cancelled";
$data1=mysqli_query($con,$q1);

$total1=mysqli_num_rows($data1);

$sumOfCancelledTicket=0;
if($total1!=0)
{
    while($result1=mysqli_fetch_assoc($data1))
    {
        $sumOfCancelledTicket+= $result1['no_of_seat'];   
    }
}

// echo $sumOfBoughtTicket;



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
        input{
            width: 100%;
            padding: 15px;
            border:1px solid rgb(102, 255, 0);
            border-radius: 5px;
            font-size: 20px;
            margin-top: 15px; 
            margin-bottom: 15px; 
        }

        #add-btn
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
    
    #total{
        background:rgb(138, 105, 255);
        font-size: 20px;
        color:rgb(136, 252, 3);
        display: flex;
        justify-content: center;
        margin:15px;
        padding:10px; 
        max-width:1000%;   
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
            <a href="purchased.php">Reservation List</a>
            <a href="cancell.php">Cancellation List</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>

    <!-- here total purcahse,cancel show
     -->
    <div id="total" >
     <?php 
     
     echo "
    <tr>
            <td>Total purchased:</td>
            <td>$sumOfBoughtTicket</td>
            </tr>
            <br>
            
            <tr>
            <td>Total cancelled:</td>
            <td>$sumOfCancelledTicket</td>
    </tr>
           
     ";
   



?>
    
</div>
<br>



<!-- here create a form to add new route of train, pass the data to db -->
        <div id="form-heading">
                <h2>New Route </h2>     
        </div>
        <div class="form-style">
                <form  method="POST">
                    <input type="date" placeholder="Enter Date" name="dt" required>
                    <input type="text" placeholder="Enter Hour"  name="hr" required>
                    <input type="text" placeholder="Enter Train Name"  name="trnm" required>
                    <input type="text" placeholder="Source" name="source" required>
                    <input type="text" placeholder="Destination" name="dest" required>
                    <input type="number" placeholder="Fare" name="fare" required>
                    <button type="submit" name="Add" id="add-btn">Add</button>
                </form> 
        </div> 
</body>
</html>

<?php
if(isset($_POST['Add']))
{ 
    // $dt=mysqli_real_escape_string($con, $_POST['dt']) ;
    $dt=$_POST['dt'];
    $hr=$_POST['hr'];
    $trnm=$_POST['trnm'];
    $source=$_POST['source'];
    $dest=$_POST['dest'];
    $fare=$_POST['fare'];
    
    // echo "$dt";
    // echo "$hr";
    // echo "$trnm";

    $sql1="INSERT INTO train(train_name,source,destination,fare) values('$trnm','$source','$dest','$fare')";
    $query1=mysqli_query($con,$sql1);
    $sql2="INSERT INTO train_schedule(date,time,train_name,source,destination) values('$dt','$hr','$trnm','$source','$dest')";
    $query2=mysqli_query($con,$sql2);
        
       if ($query1)
       echo '<script type="text/javascript">alert("New  Train On Route Successfully!")</script>';
  
       if ($query2)
       echo '<script type="text/javascript">alert("New Train Route Addition Successfull!")</script>';
  
    //header()
    mysqli_close($con);
}


?>

