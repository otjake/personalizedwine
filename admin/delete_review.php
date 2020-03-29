<?php
require_once("includes/session.php");
confirm_logged_in();
include("includes/functions.php");
require_once("includes/db.php");
if (isset($_GET['posts'])) {
    $id = $_GET['posts'];


    //deletes from posts table
    $delete_sql = "DELETE FROM reviews WHERE id={$id} LIMIT 1";
    $result_delete = mysqli_query($connection, $delete_sql);
    if ($result_delete == 1) {
        echo "<script>alert('product deleted')</script>";
        page_redirect('review.php?dmessage=correct');
    } else {
        echo "<script>alert('unable to delete')</script>";
        page_redirect('review.php?dmessage=error');
    }
}
