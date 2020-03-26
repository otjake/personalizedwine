<?php include("includes/header.php") ?>
<?php include("includes/functions.php") ?>

<div class="blog-header">

    <!-- <strong>
        <h1 class="blog-title">WELCOME <?php //echo $_SESSION['fullname']; 
                                        ?></h1>
    </strong> -->

    <h1 class="blog-title"> CLIENT RESOURCES</h1>
</div>
<div class="new_blog">


    <ul>
        <li><a href="index.php">Review Management</a></li>
        <li><a href="newsletter.php">Newsletter</a></li>

    </ul>
    <hr>
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


        //ALERT MESSAGES USING URL STRPOS
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if (strpos($fullUrl, "Amessage=error") == TRUE) {

            echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"#\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
        } elseif (strpos($fullUrl, "Amessage=correct") == TRUE) {

            echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' class='close'>&times;</a>Updated</div>";
        }


        ?>
    </div>
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
    review_view()
    ?>






</div>
<br>
<br>
<br>
<!--        NEW BLOG FORM-->

<!--BLOGS-->


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
>
<script type='text/javascript'>
    // confirm record deletion
    function delete_review(post_id) {

        var answer = confirm('Are you sure?');
        if (answer) {

            window.location = 'delete_review.php?id=' + post_id;
        }
    }
</script>
<?php include("includes/footer.php"); ?>