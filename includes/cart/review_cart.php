<?php
################## list products in cart review page ###################
if(isset($_SERVER["REQUEST_URI"]) && basename($_SERVER["REQUEST_URI"]) === "cartpage.php") {


    if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0 ) {

        $total = 0;
        foreach($_SESSION["products"] as $product){ //loop though items and prepare html content

            //set variables to use them in HTML content below
            $product_name = $product["product_name"];
            $product_desc = $product["product_desc"];
            $product_price = $product["product_price"];
            $product_id = $product["product_id"];
            $product_image = $product["product_image"];
            $product_qty = $product["product_qty"];
            $subtotal = ($product_price * $product_qty);
            $total = ($total + $subtotal);
            ?>
            <div class="col-xs-12 fadeOut-item">
                <div class="card">
                    <div class="card-body">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 cart-image">
                            <img src="admin/product_image/<?php echo $product_image; ?>" style="float: right" height='170px'>
                        </div>
                        <div class="col-xs-10 col-md-10 col-sm-10 col-lg-10  cart-details">
                            <table class="table table-borderless ">
                                <!--                                    <thead>-->
                                <!--                                        <tr>-->
                                <!--                                            <th>Product</th>-->
                                <!--                                            <th>Quantity</th>-->
                                <!--                                            <th>Price</th>-->
                                <!--                                        </tr>-->
                                <!--                                    </thead>-->
                                <tbody>
                                <tr>
                                    <td style='font-size:16px;' class='cart-table'> <?php echo $product_name.' '.$product_desc; ?></td>
                                    <td class="cart-table">
                                        <div>
                                            <i class="fas fa-chevron-up"></i>
                                            <p class='item-amount'><?php echo $product_qty; ?></p>
                                            <i class="fas fa-chevron-down"></i>
                                        </div>
                                    </td>
                                    <td class='cart-table'><?php echo $currency.' '.$subtotal; ?></td>
                                </tr>


                                </tbody>
                            </table>
                            <div style="text-align: left;" class="cart-remove-button">
                                <a href="#" class="remove-cartpage-item text-decoration-none" data-code="<?php echo $product_id; ?>"><i class='fas fa-trash fa-sm trash-icon'></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="ecart-content" style="left: auto; right: auto; margin: auto">
            <div class="capsule">
                <img src="images/empty-cart2.jpg" height="" />
            </div>
            <h1 style="color:#E0E0E0 ">Your cart is empty</h1>
            <h2 #id="ad_items" style="font-weight:100;">Add items to shopping cart</h2>
            <a href="allproducts.php" class="btn btn-primary btn-lg">Start shopping</a>

        </div>
    <?php }
}?>