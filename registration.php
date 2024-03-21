<?php
if(isset($_POST['submit'])){
$dbconn=mysqli_connect("mysql-iraguha","root","","23rp_shareride_db")or die(mysqli_connect_error()); // connect to database

// inserting in Database
//`usr_id`, ``, ``, ``, ``, ``
$name=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['eamil'];
$passw=$_POST['pass'];
$sql="INSERT INTO tbl_users SET user_firstaname='$name',  user_lastname='$lname',user_gender='$gender',user_email='$email',user_password='$passw'";
$quer =mysqli_query($dbconn,$sql);
//header("location:index.php");
} ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Form to Register</title>
</head>
<body>
      <table> 
        <form action="" method="POST">
<tr><td>First Name</td><td><input type="text" name="fname" ></td></tr> 
<tr><td>LAST Name</td><td><input type="text" name="lname" ></td></tr> 
<tr><td>USER GENDER</td><td><input type="text" name="gender"></td></tr>
<tr><td>USER EMAIL</td><td><input type="text" name="eamil"></td></tr>
<tr><td>Password</td><td><input type="password" name="pass" ></td></tr> </tr>
<tr><td><input type="submit" name="submit"></td>
<td><a  href="index.php">View</a></td></tr>
</form> 
</table>
</body> 
</html>
