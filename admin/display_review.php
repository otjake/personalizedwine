<?php

include("includes/functions.php");
require_once("includes/db.php");
$id = $_GET['posts'];


$display = 1;
$display_sql = "UPDATE reviews SET display='{$display}' WHERE id={$id}";
$result_display = mysqli_query($connection, $display_sql);
if ($result_display == 1) {
    header("refresh:3000; url=customer.php");

    page_redirect('customer.php?Amessage=correct');
} else {
    page_redirect('customer.php?Amessage=error');
}
