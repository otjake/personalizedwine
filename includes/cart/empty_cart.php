<?php
if (isset($_POST["empty_cart"])) {
    unset($_SESSION["products"]);
    unset($_SESSION["order_reference"]);
    unset($_SESSION["order_id"]);
    unset($_SESSION["order_amount"]);
    unset($_SESSION["order_deadline"]);
    unset($_SESSION["customer_name"]);
    unset($_SESSION["customer_phone"]);
    unset($_SESSION["customer_email"]);
    unset($_SESSION["customer_address"]);
    unset($_ENV["set_secret_key"]);
    unset($_ENV["set_public_key"]);
    unset($_ENV["set_delivery_charge"]);
    $_ENV["set_secret_key"] = '';
    $_ENV["set_public_key"] = '';
    $_ENV["set_delivery_charge"] = '';

}
?>