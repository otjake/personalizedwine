<?php
//error_reporting(0);
include("../db.php"); //include config file
setlocale(LC_MONETARY,"en_US"); // US national format (see : http://php.net/money_format)

############# add products to session #########################
$new_product = array();
$_SESSION["products"] = (isset($_SESSION["products"]) ? $_SESSION["products"] : array());

if(isset($_POST["product_id"]))
{

    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
    }

    //we need to get product name and price from database.
    $statement = $connection->prepare("SELECT product_name, product_desc, product_price, product_image, product_code FROM product WHERE product_id=? LIMIT 1");
    $statement->bind_param('s', $new_product['product_id']);
    $statement->execute();
    $statement->bind_result($product_name, $product_desc, $product_price, $product_image, $product_code);

    while($statement->fetch()){
        $new_product["product_name"] = $product_name; //fetch product name from database
        $new_product["product_desc"] = $product_desc; //fetch product description from database
        $new_product["product_price"] = $product_price;  //fetch product price from database
        $new_product["product_qty"] = 12; //Declare product initial quantity
        $new_product["product_code"] = $product_code; //fetch product image from database
        $new_product["product_image"] = $product_image; //fetch product image from database
        $new_product["product_id"] = $new_product['product_id'];

        $isFound = false;
        $i = 0;
        if(isset($_SESSION["products"])){  //if session var already exist
            foreach ($_SESSION['products'] as $item) {
                $i++;
                foreach ($item as $key => $value) {
                    if ($key == "product_id" && $value == $new_product['product_id']) {

                        array_splice($_SESSION['products'], $i - 1, 1, array([
                            'product_id' => $item['product_id'],
                            'product_desc' => $item['product_desc'],
                            'product_name' => $item['product_name'],
                            'product_price' => $item['product_price'],
                            'product_image' => $item['product_image'],
                            'product_qty' => $item['product_qty'] + 12,
                            'product_code' => $item['product_code'],
                        ]));
                        $isFound = true;
                    }
                }

            }
            if ($isFound == false) {
                array_push($_SESSION['products'], $new_product);
            }
        }
    }
    $total_items = count($_SESSION["products"]); //count total items
    die(json_encode(array('items'=>$total_items))); //output json

}

################## list products summary in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"] == 1) {


    if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0 ) { //if we have session variable
        $cart_box = '<div class="cart-results-container">';
        $cart_box .= '<ul class="cart-products-loaded">';
        $total_dec = 0;
        foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

            //set variables to use them in HTML content below
            $product_name = $product["product_name"];
            $product_desc = $product["product_desc"];
            $product_price = $product["product_price"];
            $product_id = $product["product_id"];
            $product_qty = $product["product_qty"];
            $cart_box .=  "<li><i class='fa fa-thumbtack fa-xs'></i> $product_name (Qty: $product_qty)  <a href=\"#\" class=\"remove-item\" data-code=\"$product_id\"><i class='fas fa-trash fa-xs trash-icon'></i></a></li>";
            $subtotal_dec = ($product_price * $product_qty);
            $subtotal = number_format($subtotal_dec);
            $total_dec = ($total_dec + $subtotal_dec);
            $total = number_format($total_dec);
        }
        $cart_box .= "</ul><hr class='hidden-hr'>";
        $cart_box .= '<div class="cart-products-total">Total: '.$currency.$total.' <hr class="visible-cart-hr"><a href="./cartpage.php" title="Review Cart and Check-Out" class="view_cart_link">view Cart <i class="fa fa-edit"></i></a></div>';
        $cart_box .= '</div>';
        die($cart_box); //exit and output content
    } else {
            echo("<div class='text-center'>Your cart is empty<br></div>"); //we have empty cart
        }
}


################# remove item from menu shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
    $product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

    if (!empty($_SESSION["products"])) {
            foreach ($_SESSION["products"] as $select => $val) {
                if ($val["product_id"] == $product_code) {
                    unset($_SESSION["products"][$select]);
                }
            }
    }

    $total_items = count($_SESSION["products"]);
    die(json_encode(array('items'=>$total_items)));
}

################# remove item from cartpage shopping cart ################
if(isset($_GET["remove_item_code"]) && isset($_SESSION["products"]))
{
    $product_code   = filter_var($_GET["remove_item_code"], FILTER_SANITIZE_STRING); //get the product code to remove

    if (!empty($_SESSION["products"])) {
        foreach ($_SESSION["products"] as $select => $val) {
            if($val["product_id"] == $product_code)
            {

                unset($_SESSION["products"][$select]);
            }
        }
    }


$total_items = count($_SESSION["products"]);
    if($total_items === 0) {
        $check_count = 0;
    }
die(json_encode(array('cart_items'=>$total_items, 'checkIfEmpty' => $check_count)));

}

//Increment cart page item quantity and update price
if(isset($_POST["increment_id"])) {

    if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0 ) {
    $i = 0;
    foreach ($_SESSION['products'] as $increment_item) {
        $i++;
        foreach ($increment_item as $key => $value) {
            if ($value == $_POST['increment_id']) {

                $total_item = $increment_item['product_qty'] + 12;
                $price = $increment_item['product_price'];
                $subtotal_price = $price * $total_item;

                array_splice($_SESSION['products'], $i - 1, 1, array([
                    'product_id' => $increment_item['product_id'],
                    'product_desc' => $increment_item['product_desc'],
                    'product_name' => $increment_item['product_name'],
                    'product_price' => $increment_item['product_price'],
                    'product_image' => $increment_item['product_image'],
                    'product_code' => $increment_item['product_code'],
                    'product_qty' => $increment_item['product_qty'] + 12,
                ]));
            }
        }
    }
}

    die(json_encode(array('per_item_count'=> $total_item, 'subtotal_price' => $subtotal_price))); //output json
}


//Decrement cart page item qty and update price
if(isset($_POST["decrement_id"])) {

    if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0 ) {
        $i = 0;
        foreach ($_SESSION['products'] as $decrement_item) {
            $i++;
            foreach ($decrement_item as $key => $value) {
                if ($value == $_POST['decrement_id']) {

                    if ($decrement_item['product_qty'] > 12){
                        $total_item = $decrement_item['product_qty'] - 12;
                        $price = $decrement_item['product_price'];
                        $subtotal_price = $price * $total_item;
                        array_splice($_SESSION['products'], $i - 1, 1, array([
                            'product_id' => $decrement_item['product_id'],
                            'product_desc' => $decrement_item['product_desc'],
                            'product_name' => $decrement_item['product_name'],
                            'product_price' => $decrement_item['product_price'],
                            'product_image' => $decrement_item['product_image'],
                            'product_code' => $decrement_item['product_code'],
                            'product_qty' => $decrement_item['product_qty'] - 12,
                        ]));
                    }
                }
            }
        }
    }

    die(json_encode(array('dec_item_count'=> $total_item, 'dec_subtotal_price' => $subtotal_price))); //output json
}

################## list products summary in cart ###################
if(isset($_POST["total_cart_amount"]) && $_POST["total_cart_amount"] == "load_amount") {

if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0 ) { //if we have session variable

    $total_cart_amount = 0;
    foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

        $product_price = $product["product_price"];
        $product_qty = $product["product_qty"];
        $subtotal = ($product_price * $product_qty);
        $total_cart_amount = ($total_cart_amount + $subtotal);
    }
    echo(number_format($total_cart_amount)); //exit and output content
    exit;
}
}

//Checkout form validation
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["order_checkout"])) {

    $customer_name = $customer_email = $customer_phone = $customer_address = $order_deadline = '';

    function check_input($input) {
        $input = htmlspecialchars($input);
        $input = trim($input);
        $input = stripslashes($input);
        return $input;
    }
    //Generate random order id
    function generate_orderID(){
        return 'OID_'.floor((rand(100, 1000) * rand(100, 10000)) + 1);
    }

    $customer_name = $_POST["customer_name"];
    $customer_name = check_input($customer_name);
    $customer_email = check_input($_POST["customer_email"]);
    $customer_phone = check_input($_POST["customer_phone"]);
    $customer_address = check_input($_POST["customer_address"]);
    $order_deadline = check_input($_POST["order_deadline"]);

    if (empty($customer_name)) {
        $name = 'Full name is required';
        die(json_encode(array('name_error' => $name)));
    } else if (strlen($customer_name) < 6) {
        $name = "Name too short. Full name required";
        die(json_encode(array('name_error' => $name)));
    }

    if (empty($customer_email)) {
        $email = "Email is required";
        die(json_encode(array('email_error' => $email)));
    } elseif (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $email = "The email provided is invalid";
        die(json_encode(array('email_error' => $email)));
    }


    if (empty($customer_phone)) {
        $mobile = "Mobile number is required";
        die(json_encode(array('mobile_error' => $mobile)));
    } elseif (strlen($customer_phone) < 10) {
        $mobile = "Please enter valid mobile number";
        die(json_encode(array('mobile_error' => $mobile)));
    }


    if (empty($customer_address)) {
        $delivery = "Delivery address is required";
        die(json_encode(array('address_error' => $delivery)));
    } elseif (strlen($customer_address) < 10) {
        $delivery = "Address description is too short";
        die(json_encode(array('address_error' => $delivery)));
    }

    if (empty($order_deadline)) {
        $order = "Order fufillment date is required";
        die(json_encode(array('date_error' => $order)));
    }

    $_SESSION["customer_name"] = $customer_name;
    $_SESSION["customer_email"] = $customer_email;
    $_SESSION["customer_phone"] = $customer_phone;
    $_SESSION["customer_address"] = $customer_address;
    $_SESSION["order_deadline"] = $order_deadline;
    $_SESSION["order_id"] = generate_orderID();

    die(json_encode(array('status' => true)));
}
?>