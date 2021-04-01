<head>
    <title>
        Success
    </title>
</head>
<div style="margin-top: 100px;"></div>
<?php
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
} else {
    require 'headerLoggedIn.html';
    if(!isset($user_id)) {
        $user_id = $_SESSION['id'];
    }if(!isset($food_id)) {
        $food_id = $_GET['ids'];
    }
    $food_id = unserialize($food_id);
    for ($i = 0; $i < sizeof($food_id); $i++) {
        $update_query = "UPDATE user_items SET status='Confirmed' WHERE user_id = '$user_id' AND item_id = '$food_id[$i]' AND status = 'Added to cart'";
        $update_query_result = mysqli_query($con, $update_query) or die(mysqli_error($con));
    }
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

