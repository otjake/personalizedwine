<?php
function inputtype($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<?php
// wine labelling index view
function WROI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WRO' LIMIT 0,4 ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
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
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WWHI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WWH' LIMIT 0,4 ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}


function WREI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WRE' LIMIT 0,4 ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

//Non cutomized wine
function NCI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='NCW'LIMIT 0,6 ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class=' col-sm-6 col-md-4 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content' >";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price' ><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}
// wine labelling index view
?>

<?php
// wine label tags index view
function WLTI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WLT' LIMIT 0,12 ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "
                      <div class='col-md-3 col-sm-6 col-xs-12'>
                        <div class='team-single text-center m-b-30'>
                          <div class='team-img labels'>
                            <img src='admin/product_image/" . $product_rows['product_image'] . "' class='img img-responsive'>

                          </div>

                        </div>
                      </div>
";
        }
    }
    echo     " </div>";
}
// wine label tags index view

?>

<?php
// wine engraving index view


function WEAI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WEA' LIMIT 0,6 ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WECONI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WECON' LIMIT 0,6";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WECERI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WECER' LIMIT 0,6";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}


// wine labelling index view
?>


<?php


function WETI_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WET' LIMIT 0,6";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}


?>

<?php //index ui end
?>

<?php
// wine labelling product view
function WRO_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WRO'";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WWH_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WWH' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}


function WRE_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WRE' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-6 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

// wine labelling product view
?>

<?php
// wine label tags product view
function WLT_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WLT' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "
                      <div class='col-md-3 col-sm-6 col-xs-12'>
                        <div class='team-single text-center m-b-30'>
                          <div class='team-img labels'>
                            <img src='admin/product_image/" . $product_rows['product_image'] . "' class='img img-responsive'>

                          </div>

                        </div>
                      </div>
";
        }
    }
    echo     " </div>";
}
// wine label tags product view

?>

<?php
// wine engraving product view


function WEA_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WEA' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form>";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WECON_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WECON' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WECER_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WECER' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

function WET_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='WET' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class='col-md-4 col-sm-6 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . "</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}



// wine labelling product view
?>


<?php
//non ccustomized product view
function NC_view()
{
    global $connection;

    $product_display_sql = "SELECT * FROM product WHERE product_code='NCW' ";
    $result_product_sql = mysqli_query($connection, $product_display_sql);


    echo " <div class='row'>";
    if (
        $result_product_sql
        ->num_rows > 0
    ) {

        while ($product_rows = mysqli_fetch_array($result_product_sql)) {

            echo "<div class=' col-sm-6 col-md-4 col-xs-12'>";
            echo " <div class='team-single text-center m-b-30'>";
            echo "<form class='form-item' method='post' action='includes/cart/cart_process.php'>";
            echo " <div class='team-img'>";
            echo " <div class='outline-img'>";
            echo "<img src='admin/product_image/" . $product_rows['product_image'] . "' alt='product image' class='img img-responsive'>";
            echo "</div>";
            echo " </div>";
            echo " <div class='team-content'>";
            echo  "<h3>";
            echo "<a href='#'>" . $product_rows['product_name'] . "  (" . $product_rows['product_desc'] . ") </a>";
            echo " </h3>";
            echo  "<h3 class='price'><span>&#8358;</span>" . $product_rows['product_price'] . ".00</h3>";

            echo "
            <input name='product_id' type='hidden' value='{$product_rows["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form> ";
            echo " </div>";
            echo "</div>";
            echo "</div>";
        }
    }
    echo     " </div>";
}

?>
<?php // END OF PRODUCT VIEW
?>

<?php
//subscribe to news letter
function subscribe_reg()
{

    if (isset($_POST['subscribe'])) {
        global $connection;
        global $emailErr;
        $emailErr = "";
        $email = $cemail = "";

        if (empty($_POST['email'])) {
            $emailErr = "please fill this tab";
        } else {
            $email = mysqli_real_escape_string($connection, inputtype($_POST["email"]));
            // check if email syntax is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "enter a valid email address";
            } else {
                $cemail = $email;
            }
        }
        if ($emailErr != "") {
            global $Emessage;
            $Emessage = "Subscribtion unsuccessful";
        } else {
            $sel_sql = "SELECT id FROM subscribers WHERE email='$cemail'";
            $sel_sql_result = mysqli_query($connection, $sel_sql);
            $check_subscribers = mysqli_num_rows($sel_sql_result);
            if ($check_subscribers == 0) {
                $sub_sql = "INSERT INTO subscribers (email) VALUES ('{$cemail}')";

                $result_sub_sql = mysqli_query($connection, $sub_sql);
                if ($result_sub_sql) {
                    global $Smessage;
                    $Smessage = "Expect Our updates";
                }
            } else {
                if ($check_subscribers > 0) {
                    global $Dmessage;
                    $Dmessage = "We already have your details";
                }
            }
        }
    }
}

?>

<?php
//subscribe to news letter
function reviews()
{
    if (isset($_POST['review'])) {
        global $connection;
        global $nameErr, $textErr;
        $nameErr = $textErr = "";
        $sname = $text = $cname = $ctext = "";
        $display = 0;
        if (empty($_POST['name'])) {
            $nameErr = "please fill this tab";
        } else {
            $sname = inputtype($_POST['name']);
            if (!preg_match("/^[a-zA-Z ]*$/", $sname)) {
                $nameErr = "Only white spaces and letters are allowed";
            } else {
                $cname = $sname;
            }
        }
        if (empty($_POST['comment'])) {
            $textErr = "please fill this tab";
        } else {
            $text = inputtype($_POST["comment"]);
            // check if email syntax is valid
            if (!preg_match("/^[a-zA-Z ]*$/", $text)) {
                $textErr = "enter a valid email address";
            } else {
                $ctext = $text;
            }
        }
        if ($nameErr != "" || $textErr != "") {
            global $Emessage;
            $Emessage = "Please try again,an error occured";
        } else {
            $sub_sql = "INSERT INTO reviews (name,comments,display) VALUES ('{$cname}','{$ctext}','{$display}')";
            $result_sub_sql = mysqli_query($connection, $sub_sql);
            if ($result_sub_sql) {
                global $Smessage;
                $Smessage = "Your feedback helps us do better";
            }
        }
    }
}

?>

<?php
//SEARCH RESULTS
function search_result()
{
    if (isset($_GET['search'])) { //if we are not looking  to get categories run the code below

        $user_search = $_GET['user_search'];

        global $connection;

        $get_post = "SELECT * FROM product WHERE product_name like '%$user_search%'"; //displaying search posts like keywords

        $run_post = mysqli_query($connection, $get_post);
        if ($run_post->num_rows > 0) {

            while ($row = mysqli_fetch_array($run_post)) {
                echo "<div class='col-md-4 col-sm-6 col-xs-12'>
                <div class='team-single text-center m-b-30'>
                <form class='form-item' method='post' action='includes/cart/cart_process.php'>
                                            <div class='team-img'>
                                                <div class='outline-img'>

            <img src='admin/product_image/" . $row['product_image'] . "' alt='product image' class='img img-responsive'>
                                                </div>
                                            </div>
                                            <div class='team-content'>
                                                <h3>
<a href='#'>" . $row['product_name'] . "  (" . $row['product_desc'] . ") </a>                                               
 </h3>
 <h3 class='price'><span>&#8358;</span>" . $row['product_price'] . ".00</h3>
            <input name='product_id' type='hidden' value='{$row["product_id"]}'>
            <button type='submit' class='add-cart-btn btn btn-default btn-sm'>ADD TO CART </span><i class='fas fa-cart-plus '></i></span></button>
            </form>
 
                                            </div>
                                             </div>
                                        </div>";
            }
        } else {
            echo "<h2 >Ooops your search dosen't match any description try again</h2>";
        }
    }
}
?>
