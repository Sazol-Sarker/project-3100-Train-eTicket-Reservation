<?php

$to_email = "snehasarker0@gmail.com";
$subject = "TICKET BUY";
$body = "Hi, Your Ticket buy successful";
$header = "From: sazolsarker1@gmail.com";

if(mail($to_email,$subject,$body,$header))
{
echo "Success";
}
else
echo "Failed";

?>