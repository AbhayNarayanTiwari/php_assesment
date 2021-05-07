<?php
require_once('connect.php');
$title = $description = $priority = '';
if(isset($_POST['submit'])){
$title=$_POST['title'];
$description=$_POST['description'];
$priority=$_POST['priority'];
if(trim($title) ==""){
    echo "<span style='color:red'>Please Enter Title In The Title Field</span>";
}else
    if(trim($description) ==""){
        echo "<span style='color:red'>Please Enter Description In The Descriptions Field</span>";
    }else{
         $sql="INSERT INTO contact(title,description,priority) VALUES ('$title','$description','$priority')";
         $result = mysqli_query($conn, $sql);
  if($result)
 {
	header("Location: contactus.html");
 }}}

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
    <form action="contact.php" method="POST">
        <h1>Contact US</h1>
        <label for="title">Title</label><br>
        <input type="text" placeholder="title" name="title" id="title" value="<?php echo $title; ?>"><br>

        <label for="description">Description</label><br>
        <textarea name="description" id="description" cols="43" rows="5 " value="<?php echo $description; ?>"></textarea><br>

        <label for="priority">Priority</label>
        <select name="priority" id="priority">
            <option value="high">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select><br>
        <button type="submit" value="submit" name="submit">Submit</button>
    </form>
</body>

</html>