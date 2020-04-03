<?php
include("includes/header.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    //selects all from posts where id is post id

    //deletes from posts table
    $delete_sql = "DELETE FROM subscribers WHERE id={$id} LIMIT 1";
    $result_delete = mysqli_query($connection, $delete_sql);
    if ($result_delete == 1) {
        echo "<script>alert('product deleted')</script>";
        page_redirect('subscribers.php?dmessage=correct');
    } else {
        echo "<script>alert('unable to delete')</script>";
        page_redirect('subscribers.php?dmessage=error');
    }
}
