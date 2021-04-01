<?php
require 'connection.php';
if (isset($_SESSION['email'])) {
    header('location:home.php');
}
require 'header.html';
?>
    <div style="text-align: center">
        <form method="post" action="login_script.php" style="margin-top: 200px">
            <input type="email" placeholder="Email" name="email" class="form-control form-group"
                    style="width: 20%;margin: auto">
            <input type="text" placeholder="Password" name="password" class="form-control form-group"
                   style="width: 20%;margin: auto;margin-top: 5px;">
            <input type="submit" value="Login" class="btn" style="width:20%;margin-top: 5px;
                background: linear-gradient(45deg, rgb(0,0,0) 0%, rgba(186,108,189,1) 97%, rgba(186,108,189,1) 100%);
                color: white;font-weight: bolder">
        </form>
        <div class="modal-footer">
            <a href="forgot_password.php" target="_blank" style="text-decoration:none;margin-right: 600px">Forget
                Password?</a>
        </div>
    </div>

<?php
require 'footer.html';

