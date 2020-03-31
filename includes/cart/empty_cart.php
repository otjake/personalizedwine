<?php
if (isset($_POST["empty_cart"])) {
    unset($_SESSION["products"]);
    unset($_SESSION["order_reference"]);
    unset($_SESSION["order_id"]);
    unset($_SESSION["order_amount"]);
    unset($_SESSION["order_deadline"]);
    unset($_SESSION["customer_name"]);
    unset($_SESSION["customer_phone"]);
    unset($_SESSION["customer_address"]);
    unset($_SESSION["set_secret_key"]);
    unset($_SESSION["set_public_key"]);
    unset($_SESSION["set_delivery_charge"]);
}
?>