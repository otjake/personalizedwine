<?php
if(isset($_POST["empty_cart"])) {
    unset($_SESSION["products"]);
}
?>