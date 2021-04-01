<?php
require 'connection.php';


$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
$regex_contact = "/^[789][0-9]{9}$/";

$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);
$password = md5($password); //using MD5 algorithm to encrypt the password.
$contact = mysqli_real_escape_string($con, $_POST['contact']);
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);

$select_query = "SELECT id FROM users WHERE email = '$email'";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$count_of_users = mysqli_num_rows($select_query_result);
?>
<div style="margin-top: 100px;text-align: center">
    <?php

    if ($count_of_users > 0) {
        echo "Email id already exists";
    } else if ($name == null or $email == null or $password == null or $contact == null or $city == null or $address == null) {
        echo "Please fill all the details";
    } else if (!preg_match($regex_email, $email)) {
        echo "Email does not match the pattern ";
    } else if (!preg_match($regex_contact, $contact)) {
        echo "Contact does not match the pattern";
    } else {
        $insert_query = "INSERT INTO users (name,email,password,mobile,city,address) VALUES ('$name','$email','$password','$contact','$city','$address')";
        $insert_query_submit=mysqli_query($con,$insert_query) or die (mysqli_error($con));
        $_SESSION['id'] = mysqli_insert_id($con);
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;

        header('location:home.php');
    }

    ?>
</div>