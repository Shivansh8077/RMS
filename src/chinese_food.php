<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chinese Food</title>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
    <link rel="stylesheet" type="text/css"
          href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="index.js"></script>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css"
          rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery.jqZoom.js"></script>
    <link href="js/jquery.jqZoom.css" rel="stylesheet">
    <style> a:hover {
            background-color: transparent;
        }</style>
</head>
<body style="background: linear-gradient(45deg, rgb(255,245,253) 0%, rgb(1,1,1) 97%, rgb(1,1,1) 100%)">
<?php
require 'connection.php';
if (isset($_SESSION['email'])) {
    require 'headerLoggedIn.html';
} else {
    require 'header.html';
}

//echo "<div style='margin-top: 60px'> HIIIIIII</div>" ?>
<?php
//$con =mysqli_connect("localhost","root","","gbms") or die(mysqli_error($con));

$select_indian_food_name_query = "select * from food_items WHERE type='chi'";
$select_indian_food_name_query_result = mysqli_query($con, $select_indian_food_name_query) or die(mysqli_error($con));
$count_names = mysqli_num_rows($select_indian_food_name_query_result);

//$select_indian_food_image_link_query = "select imageLink from indian_food";
//$select_indian_food_image_link_query_result = mysqli_query($con,$select_indian_food_image_link_query) or die(mysqli_error($con));
//$count_links = mysqli_num_rows($select_indian_food_image_link_query_result);
?>
<div class="container-fluid" style="margin-top: 60px">
    <div class="row">
        <?php for ($i = 0; $i < $count_names; $i++) {
            $row = mysqli_fetch_array($select_indian_food_name_query_result);

            echo "
        <div class='col-sm-4' >
            <div class='panel panel-default' >
                <div class='panel-heading' style='text-align: center;font-weight:bolder;font-size: 20px'>
                    <i>$row[name]</i>
                </div>
                <div class='panel-body' >
                    <a class='thumbnail'>
                        <div class='zoom-box'><img src='$row[imageLink]' alt='' style='height: 400px;width: max-content'
                       onclick='zoom()'
                       '></div>
                    </a>
                    <div class='caption' >
                        <p style='text-align: center'>
                          <span style='font-size: 23px;font-weight: bolder'> &#8377 </span><span style='color:purple;font-size: 25px;font-weight: bolder'> $row[price]/- </span></i>
                        </p>
                    </div>
                    ";  //Finishing 1st echo and checking weather user is logged in or not and adjusting the link of the Order Now button accordingly
            if (!isset($_SESSION['email'])) {
                echo "<a href='signup.php'><button type='button' class='btn btn-primary btn-block'>Order Now!</button></a>
                    ";  //User logged out
            } else {
                ?>
                <script>
                    const form = document.getElementById("form");
                    form.addEventListener("click",function(e){e.preventDefault();});
                </script>
                <form method='get' action='chinese_food.php' id='form'>Choose Quantity <input type='number' min="1" max="5" placeholder='Enter Quantity' value="1" name='inputQuantity' style="height: auto;width: 25%;margin-top: 15px">
                    <input type="submit" value="Confirm Quantity" class="purple_button">
                </form>
                <?php
                $inputQuantity = 1;
                $page_name = "chinese_food.php";
                if(isset($_GET['inputQuantity'])){
                    $inputQuantity = $_GET['inputQuantity'];
                }
                $dish_price = $row["price"]*$inputQuantity;
                echo "<a href='cart_add.php?id=$row[food_id]&inputQuantity=$inputQuantity&type=$row[type]&redirectedFrom=$page_name&dishPrice=$dish_price'>
                      <button type='submit' class='btn btn-primary purple_button btn-block'  style='width: 100%'>Add to Cart</button></a>";

                echo "<a href='order_summary.php?dish_name=$row[name]&dish_price=$row[price]&inputQuantity=$inputQuantity&dish_id=$row[food_id]&type=$row[type]'> <button type='submit' class='purple_button btn btn-primary btn-block' style='width: 100%'>  Order Now!</button></a>";
            }   //User Logged in
            echo "
                </div>
            </div>
        </div>";
        } ?>
    </div>
</div>
<script> function zoom() {
        $(function () {
            $("img").jqZoom({
                // settings here

            });
        });
        $(function () {
            $("img").jqZoom({
                selectorWidth: 20,
                selectorHeight: 20
            });
        });
        $(function () {
            $("img").jqZoom({
                selectorWidth: 0,
                selectorHeight: 0,
                viewerWidth: 400,
                viewerHeight: 300
            });
        })
    }</script>

<footer class="container " style="margin-top: 120px">
    <div class="footer"
         style="width: 80%;background: linear-gradient(45deg, rgb(0,0,0) 0%, rgba(186,108,189,1) 97%, rgba(186,108,189,1) 100%);position: fixed;bottom:0 ">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-1">
                <p style="font-size:18px "><b style="color: white ">Information</b></p>
                <a href="about.php" style="text-decoration:none;color:white">About Us</a><br>
                <a href="contact.php" style="text-decoration:none;color:white">Contact Us</a>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <p style="font-size:18px "><b style="color: white ">My Account</b></p>
                <a href=".modal" data-toggle="modal" style="text-decoration:none;color:white">Login </a><br>
                <a href="signup.php" style="text-decoration:none;color:white">Signup</a>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <p style="font-size:18px "><b style="color: white ">Contact Us</b></p>
                <p style="color: white"> Contact: +91-80777-875-875</p>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <a href="workWithUs.html" style="text-decoration:none;color:white"><p style="color: white">Work with
                        us</p></a>
            </div>
        </div>
    </div>
</footer>


</body>
</html>