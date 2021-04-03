<head><title>Change Password</title></head>
<?php
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
require 'headerLoggedIn.html';
?>
<div align="center" >
    <div class="container">
        <div class="col-lg-5 col-lg-offset-3">
            <h3 class="purple_colour" style="border-bottom: 2px solid black">Change Password</h3>
                  <form method="POST" action="settings_script.php">
                <input type="text" name="Old_password" placeholder="Old Password" class="form-control form-group">
                <input type="text" name="New_password" placeholder="New Password" class="form-control form-group">
                <input type="text" name="Retyped_password" placeholder="Re-type New Password"
                       class="form-control form-group">
                <button type="submit" class="purple_button" style="">Change</button>
            </form>
        </div>
    </div>
</div>

<?php
require 'footer.html';
?>
