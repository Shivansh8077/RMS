<?php
require 'connection.php';
if(!isset($_SESSION['email'])){
    header('location:index.php');
}else {
    session_destroy();
   // sleep(2);
    echo " <script> setTimeout(function(){  location.href = 'index.php'; },3000);</script>
            <div style=\"margin-top: 200px;text-align: center\">You have Successfully logged Out <br><br><br><i class=\"fa fa-refresh fa-5x fa-spin\"></i> <h3>Redirecting</h3></div>";
    ?>
<?php

}

?>
