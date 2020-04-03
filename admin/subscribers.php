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
                 <a  id=\"linkClose\" href=\"#\" onclick='myFunction()'class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
            } elseif (strpos($fullUrl, "dmessage=correct") == TRUE) {

                echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' onclick='myFunction()' class='close'>&times;</a>DELETED</div>";
            }


            //ALERT MESSAGES USING URL STRPOS
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if (strpos($fullUrl, "Amessage=error") == TRUE) {

                echo "  <div id=\"ealert\" class=\"alert alert-danger \">
                 <a  id=\"linkClose\" href=\"#\" onclick='myFunction()' class=\"close\" >&times;</a>
                        <strong>Error!</strong> Something went wrong
                    </div>";
            } elseif (strpos($fullUrl, "Amessage=correct") == TRUE) {

                echo "<div id='salert' class='alert alert-success' >
    <a  id='linkClose' href='#' onclick='myFunction()' class='close'>&times;</a>Updated</div>";
            }


            ?>




            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>PRODUCTS TABLE</div>
                <div class="card-body">



                    <?php $squery = "SELECT * FROM subscribers ORDER BY id DESC";
                    $squery_result = mysqli_query($connection, $squery);
                    if ($squery_result->num_rows > 0) {
                        echo "<table class='table table-hover table-responsive table-bordered'>";
                        echo "<tr>";
                        echo "<th>S/N</th>";
                        echo "<th>Email</th>";
                        echo "<th>Date</th>";
                        echo "<th>Action</th>";

                        echo "</tr>";
                        $i = 1;
                        while ($row =  mysqli_fetch_array($squery_result)) {
                            $id = $row['id'];

                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['date_created'] . "</td>";
                            echo "<td>";

                            //to delete only one record
                            echo "<a href='#' onclick='delete_subscribers({$id})'  class='btn btn-danger 'style='margin-left:1rem;'>Delete</a>";
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
        </div>
    </main>


    <script type='text/javascript'>
        // confirm record deletion
        function delete_subscribers(id) {

            var answer = confirm('Are you sure?');
            if (answer) {

                window.location = 'delete_subscribers.php?id=' + id;
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