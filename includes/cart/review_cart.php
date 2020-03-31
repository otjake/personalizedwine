<?php
################## list products in cart review page ###################
if (isset($_SERVER["REQUEST_URI"]) && basename($_SERVER["REQUEST_URI"]) === "cartpage.php") {

    $_ENV["default_delivery_charge"] = (isset($_ENV["default_delivery_charge"]) ? $_ENV["default_delivery_charge"] : 1000);
    if (isset($_SESSION["products"]) && count($_SESSION["products"]) > 0) {

        $total_dec = 0;
        foreach ($_SESSION["products"] as $product) { //loop through items and prepare html content

            //set variables to use them in HTML content below
            $product_name = $product["product_name"];
            $product_desc = $product["product_desc"];
            $product_price = $product["product_price"];
            $product_id = $product["product_id"];
            $product_image = $product["product_image"];
            $product_qty = $product["product_qty"];

            $subtotal_dec = ($product_price * $product_qty);
            $subtotal = number_format($subtotal_dec);
            $total_dec = ($total_dec + $subtotal_dec);
            $total = number_format($total_dec);

            $_SESSION["pre_total_amount"] = $total_dec;
            if(isset($_ENV["set_delivery_charge"])) {
                $_SESSION["order_amount"] = $total_dec + $_ENV["set_delivery_charge"];
         } else {
                $_SESSION["order_amount"] = $total_dec + $_ENV["default_delivery_charge"];
            }
?>
            <div class="row fadeOut-item">

                <div class=" col-xs-2 col-sm-2 col-md-2 col-lg-2  cart-image">
                    <img src="admin/product_image/<?php echo $product_image; ?>">
                </div>
                <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 cart-details  ">
                    <table class="table table-border ">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style='font-size:16px;' class='cart-table'> <?php echo $product_name; ?></td>
                                <td class="cart-table">
                                    <div id="quantity-spacing">
                                        <form class="increment-item" method="post" action="includes/cart/cart_process.php">
                                            <input name='increment_id' type='hidden' value='<?php echo $product_id; ?>'>
                                            <button class="item_count_btn" type="submit"><i class="fas fa-chevron-up"></i></button>
                                        </form>
                                        <p class='item-amount item_subtotal_qty'><?php echo $product_qty; ?></p>
                                        <form class="decrement-item" method="post" action="includes/cart/cart_process.php">
                                            <input name='decrement_id' type='hidden' value='<?php echo $product_id; ?>'>
                                            <button class="item_count_btn" type="submit"><i class="fas fa-chevron-down"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class='cart-table item_subtotal_price'><?php echo $currency . $subtotal; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: left;" class="cart-remove-button">
                        <a href="#" class="remove-cartpage-item text-decoration-none" data-code="<?php echo $product_id; ?>"><i class='fas fa-trash fa-sm trash-icon'></i> Remove</a>
                    </div>
                </div>

            </div>
        <?php } ?>
        <!-- <div class="row"> -->
        <div class="col-xs-10 col-md-10 col-sm-10 col-lg-10  cart-details fadeOut-total-empty">

            <button class="btn btn-md" style="outline-color: #61a8c7; border:1px;">
                <span style="font-weight: bolder; font-size: 30px;">Total Amount</span>: <h4 style="font-weight: bold" class="total_cart_amount"><?php echo $currency . $total; ?></h4>
            </button>
            <div style="text-align: left;">
                <form method="post" action="">
                    <button type="submit" id="empty_cart_link" name="empty_cart" class="styled-btn text-decoration-none">Empty <i class='fas fa-shopping-basket'></i>
                    </button>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div class="ecart-content" style="left: auto; right: auto; margin: auto">
            <div class="capsule">
                <img src="images/empty-cart2.jpg" height="" />
            </div>
            <h1 style="color:#E0E0E0 ">Your cart is empty</h1>
            <h2 #id="ad_items" style="font-weight:100;">Add items to shopping cart</h2>
            <a href="allproducts.php" class="btn btn-primary btn-lg">Start shopping</a>

        </div>
<?php }
} ?>
