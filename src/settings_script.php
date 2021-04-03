<!DOCTYPE html>
<html lang="en">
<title>Change Password</title>
<head>
    <title>Change Password</title>
</head>
<?php
require 'connection.php';
if(!isset($_SESSION['email']))
{
    header('location:index.php');
}
require 'headerLoggedIn.html';
$user_id=$_SESSION['id'];
$old_password=mysqli_real_escape_string($con,$_POST['Old_password']);
$new_password=mysqli_real_escape_string($con,$_POST['New_password']);
$retyped_password=mysqli_real_escape_string($con,$_POST['Retyped_password']);
$old_password1=md5($old_password);  //encrypting the users entered password to match with the database
$new_password1=md5($new_password);
$retyped_password1=md5($retyped_password);
if($old_password == null || $new_password == null || $retyped_password = null){
    echo  "<div class='purple_colour' style='text-align: center;margin-top: 100px'>All the fields need to be filled</div>";
}
else if(($retyped_password1!==$new_password1))
{
?>
<body>
<div style="margin-top:200px" class="purple_colour">
    Please Re-type the password correctly
</div>
<?php
}
?>
<div style="margin-top: 100px">
</div>
<?php
$select_query="SELECT * FROM users where id='$user_id'";
$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$row=mysqli_fetch_array($select_query_result);
$email=$_SESSION['email'];
if($old_password1==$row['password'])
{
    $update_query="UPDATE gbms.users SET users.password= '$new_password1' WHERE users.email='$email'";
    $update_query_result=mysqli_query($con,$update_query) or die(mysqli_error($con));
    echo "<div class='purple_colour'>Password Updated Successfully</div>";
    echo '<h4 class="purple_colour">Click on the button to go to home page</h4>';
    echo '<center><a href="home.php" ><button class="purple_button">Click Here</button></a></center>';
}
else {
    ?>
    <div style="margin-top: 100px;text-align: center" class="purple_colour">Incorrect Current Password</div>
    <?php
}
?>
</body>
</html>
