   <?php
    global $connection;
    $itemnewCount = $_POST['itemnewCount'];

    $product_display_sql = "SELECT * FROM product WHERE product_code='WRO' ORDER BY RAND () LIMIT $itemnewCount ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    // echo " <div class='row' id='bottles'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {
            echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            //
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows[' product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";
            echo "
            <input name='product_id' type='hidden' value='{$product_rows[" product_id"]}'>
                           <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
               </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "DONE";
    }
    ?>