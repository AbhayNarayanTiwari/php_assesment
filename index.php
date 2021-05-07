<?php
require_once('connect.php');
session_start();
 $email = $password ='';
if(isset($_POST['submit'])){ 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql = "select * from users_table where email='".$email."'AND password='".$password."'";
    $result = mysqli_query($conn, $sql);
    if(trim($email) ==""){
        echo "<span style='color:red'>Please Enter Username</span>";
    }else{
    if($password==''){
        echo"<span style='color:red'>Please Enter Password</span>";
    }
else{
 if(mysqli_num_rows($result)==1)
{
    while($row = mysqli_fetch_assoc($result)){
        $_SESSION["name"]=$row["firstName"]." " .$row["lastName"];
        $_SESSION["email"]=$row["email"];
        $_SESSION["phone"]=$row["phone"];
        $_SESSION["gender"]=$row["gender"];

    }
	header("Location: welcome.php");
}
else
{
	echo "<span style='color:red'>Invalid Email or Password</span>";
}
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
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="index.php" method="post">
        <label for="username">User Name : </label><br>
        <input type="text" placeholder="UserName" name="email" id="email" value="<?php echo $email; ?>"><br>

        <label for="password">Password : </label><br>
        <input type="password" placeholder="Password" name="password" id="password"><br>

        <button type="submit" value="Login" name="submit">Login</button>
        <a href="register.php">Register Here</a>
    </form>

</body>

</html>