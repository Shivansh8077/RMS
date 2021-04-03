<head>
    <link rel="stylesheet" href="master.css">
    <script rel="script" src="js/online_summary.js"></script>
    <title>Order Conformation Page</title>
</head>
<div style="margin-top: 30px"></div>
<?php
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location:index.php');
}
require 'headerLoggedIn.html';
$user_name = $_SESSION['name'];
$dish_name = $_GET['dish_name'];
$dish_price = $_GET['dish_price'];
$inputQuantity = $_GET['inputQuantity'];
$dish_id = $_GET['dish_id'];  //to send to success_direct_order_confirm.php and from this id change the status to confirmed.
$type = $_GET['type'];
?>
<script>var ff = 5;</script>
<?php $selected_quantity = 1;
echo "<script>var value;
            function show () { const sel = document.getElementById('select_quantity'); // or this if only called onchange
            value = sel.options[sel.selectedIndex].value; // or just sel.value
            let text = sel.options[sel.selectedIndex].text;
            const total = document.getElementById('total');
            total.innerText = parseInt(value) * $dish_price;
            ff = parseInt(value);
            console.log(ff);
            a();
            }
        </script>";
function a()
{
    echo "$GLOBALS[selected_quantity] = <script>document.writeln(value);</script>";
} ?>
<script>
    window.addEventListener("load", () => { // on load
        document.getElementById("select_quantity").addEventListener("change", show); // show on change
        show(); // show onload
    });</script>
<?php //echo "<div class='purple_colour' style='margin-top: 200px'>$selected_quantity.\"HI\"</div>";?>
<marquee scrollamount="16">
    <div class="purple_colour"
         style="border-bottom: 2px solid black;margin-top: 100px;font-family: sans-serif;color: #010101">
        Email: <?php

        echo $_SESSION['email']; ?></div>
</marquee>

<div class="purple_colour" style="margin-top: 0;text-align: center;color: #010101" id="i">Please confirm your Order</div
<center>
    <table class="table table-bordered table-hover table-striped table-responsive table-dark"
           style="width: 25%;margin: auto">
        <?php echo "<div style='text-align: center'> <span  style='text-align: center;' class='purple_colour'>" . $user_name . " 's Order </span></div>" ?>

            <th>Dish Name</th>
            <th>Price For 1 item</th>
            <th>Quantity</th>
            <th>Price for <?php echo $inputQuantity ?> items</th>
            <tr>
                <td><?php echo $dish_name; ?></td>
                <td><?php echo "<span style='text-align: center'> &#8377</span>" . $dish_price . ""; ?></td>
                <td>
                    <!--                <select name="quantity" id="select_quantity">-->
                    <!--                    <option value="" disabled>0</option>-->
                    <!--                    <option value="1">1</option>-->
                    <!--                    <option value="2">2</option>-->
                    <!--                    <option value="3">3</option>-->
                    <!--                    <option value="4">4</option>-->
                    <!--                    <option value="5">5</option>-->
                    <!--                </select>-->
                    <?php echo $inputQuantity;
                    $final_price = $inputQuantity * $dish_price;
                    ?>
                </td>
                <td><?php echo "<span style='text-align: center'> &#8377</span>" . $final_price; ?></td>
            </tr>
            <tr>
                <td class="purple_colour">Total:</td>
                <td id="total">
                    <?php echo "<span class='purple_colour'>&#8377 " . $final_price . "</span>"; ?>
                </td>
                <td colspan="2">
                    <a
                            href='success_direct_order_conform.php?dish_id=<?php echo $dish_id; ?>&quantity=<?php echo $inputQuantity; ?>&final_price=<?php echo $final_price; ?>&type=<?php echo $type; ?>'>
                        <button class="purple_button" style="width: 100%" type="submit">Confirm
                            for <?php echo "<span>&#8377 " . $final_price . "</span>"; ?></button>
                    </a></td>
            </tr>
    </table>
</center>
<?php

?>


