<?php include("includes/header.php") ?>
<?php include("includes/functions.php") ?>
<?php
stock_upload_form();

?>
<div class="blog-header">

    <!-- <strong>
        <h1 class="blog-title">WELCOME <?php echo $_SESSION['fullname'];
                                        ?></h1>
    </strong> -->
    <br>
    <h1 class="blog-title"> ADD A NEW STOCK HERE</h1>
</div>
<div class="new_blog">

    <?php
    if (!empty($Smessage)) {
        echo "<p class='alert alert-success'> $Smessage </p>";
    }
    if (!empty($Emessage)) {
        echo "<p class='alert alert-danger'> $Emessage </p>";
    }
    if (!empty($Emmessage)) {
        echo "<p class='alert alert-danger'> $Emmessage </p>";
    }

    ?>



    <form method="POST" action="index.php">

        <div class="form-group">
            <b>Category:
                <input type="text" class="form-control" name="category" placeholder="stock category" />

            </b>
        </div>
        <div class="form-group">
            <b>Sub-Category:
                <input type="text" class="form-control" name="subcategory" placeholder="stock sub-category" />

            </b>
        </div>
        <div class="form-group">
            <b>Quantity:
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" />

            </b>
        </div>
        <div class="form-group">
            <b>PRODUCT CODE:
                <input type="text" class="form-control" name="p_code" placeholder="Product Code" required />

            </b>
        </div>
        <div class="form-group">
            <b>DATE:
                <input type="date" class="form-control" name="date" placeholder="format-:27 november,2007" />
            </b>
        </div>


        <button type="submit" id="upload" name="upload" class="btn btn-primary">Upload Post</button>
        <a href="allstock.php" class="btn btn-info">View all stock</a>

    </form>


</div>
<br>
<br>
<br>
<!--        NEW BLOG FORM-->

<!--BLOGS-->

<div>

    <?php
    //ALERT MESSAGES USING URL STRPOS
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (strpos($fullUrl, "dmessage=error") == TRUE) {

        echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"#\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
    } elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

        echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' class='close'>&times;</a>DELETED</div>";
    }




    // Admin_post_view();
    ?>
</div>
<!--BLOGS-->
<br>
<br>





</div><!-- /.blog-main -->
<script>
    $(document).ready(function() {
        //jquery function to show alert using the submit button
        $('#upload').click(function() {
            $('#ealert').show('fade');

            //jquery function to close alert within 2 seconds
            setTimeout(function() {
                $('#ealert').hide('fade');
            }, 2000);
        });
        //jquery function to close alert using the cross button
        $('#linkClose').click(function() {
            $('#ealert').hide('fade');
        });
    });


    $(document).ready(function() {
        //jquery function to show alert using the submit button
        $('#upload').click(function() {
            $('#alert').show('fade');

            //jquery function to close alert within 2 seconds
            setTimeout(function() {
                $('#salert').hide('fade');
            }, 2000);
        });
        //jquery function to close alert using the cross button
        $('#linkClose').click(function() {
            $('#salert').hide('fade');
        });
    });
</script>
<?php include("includes/footer.php"); ?>