<?php
include("includes/header.php");

stock_upload_form();


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
            <?php
            //ALERT MESSAGES USING URL STRPOS
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl, "dmessage=error") == TRUE) {

                echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"allstock.php\" class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
            } elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

                echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='allstock.php' class='close'>&times;</a>DELETED</div>";
            }




            // Admin_post_view();
            ?>



            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>PRODUCTS TABLE</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <?php
                        global $connection;
                        $sql = "SELECT * FROM product";   //$psql="SELECT * FROM posts LIMIT 0,2";

                        $results_per_page = 10;

                        $result = mysqli_query($connection, $sql);

                        $number_of_results = mysqli_num_rows($result);
                        //    if($result_psql->num_rows >0){

                        //determine number of total pages available
                        $number_of_pages = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on
                        if (!isset($_GET['page'])) {
                            $page = 1;
                        } else {
                            $page = $_GET['page'];
                        }
                        //DETERMINE THE SQL LIMIT starting number for the results on the display page
                        $this_page_first_result = ($page - 1) * $results_per_page;

                        $squery = "SELECT product.* ,stock.category, stock.sub_category FROM product JOIN stock ON product.product_code=stock.product_code
ORDER BY product_id DESC LIMIT " . $this_page_first_result . ',' . $results_per_page;
                        $squery_result = mysqli_query($connection, $squery);
                        if ($squery_result->num_rows > 0) {

                            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>S/N</th>";
                            echo "<th>Name</th>";
                            echo "<th>Price</th>";
                            echo "<th>Sub Category</th>";
                            echo "<th>Image</th>";
                            echo "<th>Date</th>";
                            echo "<th>Action</th>";
                            echo "</thead>";
                            echo  "<tfoot>";
                            echo "<tr>";
                            echo "<th>S/N</th>";
                            echo "<th>Name</th>";
                            echo "<th>Price</th>";
                            echo "<th>Sub Category</th>";
                            echo "<th>Image</th>";
                            echo "<th>Date</th>";
                            echo "<th>Action</th>";
                            echo "</tfoot>";
                            echo "<tbody>";

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
                                echo "<a href='#' onclick='delete_product({$id})'  class='btn btn-danger 'style='margin-left:1rem;'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                                echo "<tbody>";
                            }
                            echo "</table>";
                        } else {
                            echo "<div class='alert alert-danger'>No records found</div>";
                        }
                        //displaying page links numbers
                        for ($page = 1; $page <= $number_of_pages; $page++) {
                            echo "<ul class='pagination '>
 <li><a href='allproduct.php?page=" . $page . "'>" . $page . "</a></li></ul>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script type='text/javascript'>
        // confirm record deletion
        function delete_product(id) {

            var answer = confirm('Are you sure?');
            if (answer) {

                window.location = 'delete_product.php?id=' + id;
            }
        }
    </script>

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