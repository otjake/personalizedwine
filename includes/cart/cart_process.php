<?php
//error_reporting(0);
session_start();
 //start session
include_once("../db.php"); //include config file
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
    $statement = $connection->prepare("SELECT product_name, product_price FROM product WHERE product_id=? LIMIT 1");
    $statement->bind_param('s', $new_product['product_id']);
    $statement->execute();
    $statement->bind_result($product_name, $product_price);

    while($statement->fetch()){
        $new_product["product_name"] = $product_name; //fetch product name from database
        $new_product["product_price"] = $product_price;  //fetch product price from database
        $new_product["product_qty"] = 12;
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
                            'product_name' => $item['product_name'],
                            'product_price' => $item['product_price'],
                            'product_qty' => $item['product_qty'] + 1,
                        ]));
                        $isFound = true;
                    }
                }

            }
            if ($isFound == false) {
                array_push($_SESSION['products'], $new_product);
            }
        }

//        var_dump($_SESSION["products"][$new_product['product_code']]);
//        $_SESSION["products"][$new_product['product_code']] = $new_product;	//update products with new item array

    }

    $total_items = count($_SESSION["products"]); //count total items
    die(json_encode(array('items'=>$total_items))); //output json

}

################## list products in cart ###################
if(isset($_POST["load_cart"]) && $_POST["load_cart"] == 1) {


    if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0 ) { //if we have session variable

        $cart_box = '<ul class="cart-products-loaded">';
        $total = 0;
        foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

            //set variables to use them in HTML content below
            $product_name = $product["product_name"];
            $product_price = $product["product_price"];
            $product_id = $product["product_id"];
            $product_qty = $product["product_qty"];

            $cart_box .=  "<li><i class='fa fa-thumbtack fa-xs'></i> $product_name (Qty: $product_qty)  <a href=\"#\" class=\"remove-item\" data-code=\"$product_id\"><i class='fas fa-trash fa-xs trash-icon'></i></a></li>";
            $subtotal = ($product_price * $product_qty);
            $total = ($total + $subtotal);
        }
        $cart_box .= "</ul><hr class='hidden-hr'>";
        $cart_box .= '<div class="cart-products-total">Total: '.$currency.' '.sprintf("%01.2f",$total).' <hr class="visible-cart-hr"><a href="./cartpage.php" title="Review Cart and Check-Out">Review <i class="fa fa-edit"></i></a></div>';
        die($cart_box); //exit and output content
    } else {
        echo("<div class='text-center'>Your cart is empty<br></div>"); //we have empty cart
    }
}

################# remove item from shopping cart ################
if(isset($_GET["remove_code"]) && isset($_SESSION["products"]))
{
    $product_code   = filter_var($_GET["remove_code"], FILTER_SANITIZE_STRING); //get the product code to remove

    if (!empty($_SESSION["products"])) {
            foreach ($_SESSION["products"] as $select => $val) {
                if($val["product_id"] == $product_code)
                {
                    unset($_SESSION["products"][$select]);
                }
            }
    }

    $total_items = count($_SESSION["products"]);
    die(json_encode(array('items'=>$total_items)));
}