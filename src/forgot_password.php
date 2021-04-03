<?php
require 'connection.php';
if (isset($_SESSION['email'])) {
    header('location:home.php');
}
require 'header.html';
?>
    <div style="text-align: center;margin-top: 200px">
        <?php
        if(!isset($provided_email_id)){
            $provided_email_id = $_POST['email'];
        }
        if (isset($provided_email_id)) {
            echo "
    <div class='purple_colour'><marquee scrollamount='16'>Provided email id: $provided_email_id </marquee></div>";
        } ?>
        <form action="forgot_password.php" method="post">
            <label><span class="purple_colour">Enter the email id on which you want the link to be sent</span><br>
                <input type="email" placeholder="Enter Email address" name="email">
            </label><br>
            <label>
                <input type="submit" class="purple_button" style="width: 100%">
            </label>
        </form>
        <sup
                style="color: red">*</sup> <i>You would be getting an email on your provided email id soon.
            You can reset your password from there.</i>
    </div>
<?php
require 'footer.html';
