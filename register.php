<?php
require_once('connect.php');
session_start();
$firstName = $lastName = $gender = $email = $phone = $password = '';
if(isset($_POST['submit'])){ 
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone=$_POST['phone'];
$password = $_POST['password'];
$confPassword=$_POST['confPassword'];
if(trim($firstName) ==""){
    echo "<span style='color:red'>Please Enter First Name</span>";
}else
    if(trim($lastName) ==""){
        echo "<span style='color:red'>Please Enter last Name</span>";  
    }else
    if(trim($email) ==""){
        echo "<span style='color:red'>Please Enter  Email address</span>";  
    }else
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          echo"<span style='color:red'>Please Enter a valid email address</span>";
       }else
    if(trim($phone) ==""){
        echo "<span style='color:red'>Please Enter phone Number</span>";  
    }else
            if($password != $confPassword){
            echo"passwords doesn't match";
       }else{
        $sql = "Select * from users_table where email='$email'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num==0)
        {
        $sql = "INSERT INTO users_table (firstName,lastName,gender,email,phone,Password) VALUES ('$firstName','$lastName','$gender','$email','$phone','$password')";
        $result = mysqli_query($conn, $sql);
       if($result)
       {
        $_SESSION["name"]=$firstName." " .$lastName;
        $_SESSION["email"]=$email;
        $_SESSION["phone"]=$phone;
        $_SESSION["gender"]=$gender;
	    header("Location: welcome.php");
       }
    }else{
        echo"<span style='color:red'>Email Already Exist</span>";
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <form action="register.php" method="POST">
            <label for="firstName"> First Name</label><br>
            <input type="text" placeholder="First Name" name="firstName" value="<?php echo $firstName; ?>"><br>

            <label for="lastName">Last Name</label><br>
            <input type="text" placeholder="Last Name" name="lastName" value="<?php echo $lastName; ?>"><br>

            <label for="email">Email</label><br>
            <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>"><br>

            <label for="phone">Phone Number</label><br>
            <input type="text" placeholder="Phone Number" name="phone" value="<?php echo $phone; ?>"><br>

            <label for="password">Password</label><br>
            <input type="password" placeholder="password" name="password"><br>

            <label for="confirmPassword">Confirm Password</label><br>
            <input type="password" placeholder="Confirm Password" name="confPassword"><br>

            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="male">male</option>
                <option value="female">female</option>
                <option value="others">others</option>
                </select>
            <button type="submit" value="sumbit" name="submit">Submit</button>
        </form>
    </div>

</body>
</html>