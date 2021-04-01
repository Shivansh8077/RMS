<?php
require 'connection.php';
if(isset($_SESSION['email'])){
    header('location:home.php');
}

?>
<!DOCTYPE>
<html lang="en">
<head>
    <title>Signup</title>
    <link rel="stylesheet" type="text/css"
          href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>
</head>
<body style="background-color:rgba(255,245,34,0.31)">
<?php
require 'header.html';
?>

<div class="row" style="margin-top: 80px">
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <h3>SIGN UP</h3>
            <form method="POST" action="signup_script.php">
                <input type="text" name="name" placeholder="Name" class="form-control form-group input-lg">
                <input type="email" name="email" placeholder="Email" class="form-control form-group input-lg">
                <input type="text" name="password" placeholder="Password" class="form-control form-group input-lg">
                <input type="number" name="contact" placeholder="Contact" class="form-control form-group input-lg"
                       title="10 numbers" pattern=".{10}">
                <input type="text" name="city" placeholder="City" class="form-control form-group input-lg">
                <input type="text" name="address" placeholder="Address" class="form-control form-group input-lg">
                <button type="submit" class="btn btn-default btn-primary btn-lg">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
<?php
require 'footer.html';
?>
</html>