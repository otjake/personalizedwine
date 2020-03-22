<?php include("includes/header.php") ?>
<?php include("includes/functions.php") ?>
<?php
tag_upload_form();

?>
<div class="blog-header">

    <!-- <strong>
        <h1 class="blog-title">WELCOME <?php //echo $_SESSION['fullname']; 
                                        ?></h1>
    </strong> -->
    <br>
    <h1 class="blog-title"> ADD A NEW PRODUCT HERE</h1>
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



    <form method="POST" action="tag_advert.php" enctype="multipart/form-data">

        <div class=" form-group">
            <b>Tag Name:
                <input type="text" class="form-control" name="p_name" placeholder="product name" />

            </b>
        </div>
        <div class="form-group">
            <b>Tag Description:
                <textarea name="product_desc" col="20" row="10" placeholder="describe product"></textarea>
            </b>
        </div>
        <div class="form-group">
            <b>Tag price:
                <input type="number" class="form-control" name="tag_price" placeholder="price" />

            </b>
        </div>
        <div class="form-group">
            <b>Tag Image:
                <input type="file" class="form_control" name="tag_image" placeholder="front" />
            </b>
        </div>
        <div class="form-group">
            <b>Tag CODE:
                <input type="text" class="form-control" name="tag_code" placeholder="Product Code" required />
                <span style="color: red">*Make sure your code is in your stock database</span>

            </b>
        </div>
        <div class="form-group">
            <b>DATE:
                <input type="date" class="form-control" name="date" placeholder="format-:27 november,2007" />
            </b>
        </div>
        <div class="form-group">
            <b>KEY WORD:
                <input type="text" class="form-control" name="keyword" placeholder="Enter a key word to aid search" required />

            </b>
        </div>

        <button type="submit" id="uploadp" name="uploadp" class="btn btn-primary">Upload Product</button>
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
        $('#uploadp').click(function() {
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
        $('#uploadp').click(function() {
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