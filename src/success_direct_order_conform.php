<head>
    <title>Success Direct Order Page</title>
</head>
<div style="margin-top: 100px;"></div>
<?php
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {
    require 'headerLoggedIn.html';
    $user_id = $_SESSION['id'];
    $dish_id=$_GET['dish_id'];
    $quantity=$_GET['quantity'];
    $final_price=$_GET['final_price'];
    $type=$_GET['type'];
    $insert_query = "INSERT INTO user_items (user_id,item_id,status,quantity,type,final_price) VALUES ('$user_id','$dish_id','Confirmed','$quantity','$type','$final_price')";
    $insert_query_result = mysqli_query($con,$insert_query) or die(mysqli_error($con));
}
?>
<div class="container" style="margin-top: 70px">
    <div class="jumbotron">
        <h1 style="color: blue; text-align: center">Success</h1>
        <h3 style="text-align: center">Congratulations Your order is confirmed and will be delivered shortly</h3>
        <h4 style="text-align: center"></h4>
    </div>
    <div align="center">
    <a href="home.php" target="_self"><button class="purple_button" style="width: auto;margin: auto;"> Click here</button></a>
    to book a delicious meal for your loved ones.
    </div>
    </div>

