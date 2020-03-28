<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
<?php include("includes/functions.php") ?>

<div class="blog-header">

    <br>
    <h1 class="blog-title"> View All Products</h1>
</div>
<div class="new_blog">

    <?php




    $squery = "SELECT product.* ,stock.category, stock.sub_category FROM product JOIN stock ON product.product_code=stock.product_code
ORDER BY product_id DESC";
    $squery_result = mysqli_query($connection, $squery);
    if ($squery_result->num_rows > 0) {

        echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
        echo "<th>S/N</th>";
        echo "<th>Name</th>";
        // echo "<th>Description</th>";
        echo "<th>Price</th>";
        // echo "<th>Category</th>";
        echo "<th>Sub Category</th>";
        echo "<th>Image</th>";
        // echo "<th>Product Code</th>";
        // echo "<th>Keyword</th>";
        echo "<th>Date</th>";
        echo "<th>Action</th>";

        echo "</tr>";
        $i = 1;
        while ($row =  mysqli_fetch_array($squery_result)) {
            $id = $row['product_id'];

            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $row['product_name'] . "</td>";
            echo "<td>" . $row['product_price'] . "</td>";
            echo "<td>" . $row['sub_category'] . "</td>";
            echo "<td><img src='product_image/" . $row['product_image'] . "' width='60' height='150'/></td>";

            echo "<td>" . $row['date_created'] . "</td>";

            echo "<td>";
            //to update only one record
            echo "<a href='update_product.php?product_id=" . $row['product_id'] . "' class='btn btn-primary m-r-1em'>Edit<a/>";
            //to delete only one record
            echo "<a href='#' onclick='delete_product({$id})'  class='btn btn-danger '>Delete</a>";
            echo "</td>";
        }
        echo "</tr>";
        echo "</table>";
    } else {
        echo "<div class='alert alert-danger'>No records found</div>";
    }
    ?>

</div>
</div>


<script type='text/javascript'>
    // confirm record deletion
    function delete_product(id) {

        var answer = confirm('Are you sure?');
        if (answer) {

            window.location = 'delete_product.php?id=' + id;
        }
    }
</script>
<?php include("includes/footer.php"); ?>