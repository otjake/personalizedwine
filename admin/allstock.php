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
                <div class="card-header"><i class="fas fa-table mr-1"></i>STOCK TABLE</div>
                <div class="card-body">

                    <div class="table-responsive">
                        <?php
                        $squery = "SELECT stock_id, category, sub_category,quantity,product_code FROM stock ORDER BY stock_id DESC";
                        $squery_result = mysqli_query($connection, $squery);
                        if ($squery_result->num_rows > 0) {
                            echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Category</th>";
                            echo "<th>Sub Category</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Product Code</th>";
                            echo "<th>Action</th>";
                            echo "</thead>";
                            echo  "<tfoot>";
                            echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Category</th>";
                            echo "<th>Sub Category</th>";
                            echo "<th>Quantity</th>";
                            echo "<th>Product Code</th>";
                            echo "<th>Action</th>";
                            echo "</tfoot>";
                            echo "<tbody>";

                            $i = 1;
                            while ($row =  mysqli_fetch_array($squery_result)) {
                                $id = $row['stock_id'];
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
                                echo "<a href='#' onclick='delete_stock({$id})'  class='btn btn-danger m-r-1em ' style='margin-left:1rem;'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                                echo "<tbody>";
                            }
                            echo "</table>";
                        } else {
                            echo "<div class='alert alert-danger'>No records found</div>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

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