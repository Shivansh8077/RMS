<?php
require 'connection.php';
if(isset($_SESSION['email'])){
    header('location:home.php');
}
require 'header.html';

?>
<div style="margin-top: 200px;text-align: center">
<?php
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";


$email=mysqli_real_escape_string($con,$_POST['email']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$password=md5($password);

$select_query="SELECT id,email,name FROM users WHERE email='$email'";

$select_query_2="SELECT password,name FROM users WHERE password='$password'";

$select_query_3="SELECT * FROM users WHERE password='$password' AND email='$email'";

$select_query_result=mysqli_query($con,$select_query) or die(mysqli_error($con));
$select_query_result_2=mysqli_query($con,$select_query_2) or die(mysqli_error($con));
$select_query_result_3=mysqli_query($con,$select_query_3) or die(mysqli_error($con));

$count_of_users=mysqli_num_rows($select_query_result);
$count_of_users_2=mysqli_num_rows($select_query_result_2);

$row=mysqli_fetch_array($select_query_result_3);

if(!preg_match($regex_email,$email))
{
    echo "Enter a valid email address";
}
else if($count_of_users==0)
{
    echo "No such email is exists";
}
else if( $count_of_users==1 and $count_of_users_2==0)
{
    echo "Wrong password entered"."<br>";
    echo $password;
}
else
{
    $row=mysqli_fetch_array($select_query_result);
    $_SESSION['id']=$row['id'];
    $_SESSION['email']=$row['email'];
    $_SESSION['name']=$row['name'];
    header('location:home.php');
    require 'footer.html';
}
?>
</div>
