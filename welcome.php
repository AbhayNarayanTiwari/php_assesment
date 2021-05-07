<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
 require_once('connect.php');
 session_start();
 echo"Welcome Mr. ".$_SESSION['name']."<br><br>";
 echo"Your Details Are Here - <br>";
 echo"Email : ".$_SESSION['email']."<br>";
 echo"Phone Number : ".$_SESSION['phone']."<br>";
 echo"You Are A : ".$_SESSION['gender']."<br>"
?>
 <a href="contact.php">Contact US</a>
 </body>
</html>