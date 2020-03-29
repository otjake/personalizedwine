<?php require_once("includes/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php include("includes/header.php") ?>
<?php include("includes/functions.php") ?>

<div class="blog-header">

    <br>
    <h1 class="blog-title"> View All Stocks</h1>
</div>
<div class="new_blog">

    <?php




    $squery = "SELECT stock_id, category, sub_category,quantity,product_code FROM stock ORDER BY stock_id DESC";
    $squery_result = mysqli_query($connection, $squery);
    if ($squery_result->num_rows > 0) {

        echo "<table class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Category</th>";
        echo "<th>Sub Category</th>";
        echo "<th>Quantity</th>";
        echo "<th>Product Code</th>";
        echo "<th>Action</th>";

        echo "</tr>";
        $i = 1;
        while ($row =  mysqli_fetch_array($squery_result)) {
            $id = $row['stock_id'];
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['sub_category'] . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td>" . $row['product_code'] . "</td>";

            echo "<td>";
            //to update only one record
            echo "<a href='update.php?up_id=" . $row['stock_id'] . "' class='btn btn-primary m-r-1em'>Edit<a/>";
            //to delete only one record
            echo "<a href='#' onclick='delete_stock({$id})'  class='btn btn-danger '>Delete</a>";
            echo "</td>";
        }
        echo "</table>";
    } else {
        echo "<div class='alert alert-danger'>No records found</div>";
    }
    ?>

</div>
</div>

<script type='text/javascript'>
    // confirm record deletions
    function delete_stock(id) {

        var answer = confirm('Are you sure?');
        if (answer) {
            // if user clicked ok, 
            // pass the id to delete.php and execute the delete query
            window.location = 'delete.php?id=' + id;
        }
    }
</script>

<?php include("includes/footer.php"); ?>