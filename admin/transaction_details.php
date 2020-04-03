<?php
include("includes/header.php");

$sql = "SELECT `meta_value` FROM `settings` WHERE `meta_name`='sdc'";
$result_psql = mysqli_query($connection, $sql);
if ($result_psql->num_rows > 0) {
    while ($rows = mysqli_fetch_array($result_psql)) {
        $delivery_price = $rows['meta_value'];
    }
} else {
    echo "cant source info";
}

if (isset($_POST['update_delivery_price'])) {
    $delivery_price = ($_POST['p_delivery']);

    $usql = "UPDATE settings SET meta_value='{$delivery_price}' WHERE meta_name='sdc' ";
    $result_usql = mysqli_query($connection, $usql);
    if ($result_usql) {
        $Smessage = "Price Updated";
    } else {

        $Emessage = " Unable to Update";
    }
}



$gsql = "SELECT `meta_status` FROM `settings` WHERE `meta_name`='ssk'";
$result_gsql = mysqli_query($connection, $gsql);
if ($result_gsql->num_rows > 0) {
    while ($rowg = mysqli_fetch_array($result_gsql)) {
        $trans = $rowg['meta_status'];
    }
} else {
    echo "cant source info  2";
}

if (isset($_POST['update_gate_way'])) {
    $gateway = ($_POST['gate']);

    $usql = "UPDATE settings SET meta_status='{$gateway}' WHERE meta_name='ssk' ";
    $result_usql = mysqli_query($connection, $usql);
    if ($result_usql) {
        echo "<script>alert(Gate updated)</script>";
        header('Location: transaction_details.php');
    } else {

        $Emessage = " Unable to Update";
    }
}







?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>


            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>TRANSACTION PROPERTIES</div>
                <div class="card-body">


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
                    if (!empty($double_code_message)) {
                        echo "<p class='alert alert-danger'> $double_code_message </p>";
                    }

                    ?>
                    <!-- top row -->
                    <div class="row">
                        <div class="col-xs-6 connectedSortable">
                            <div class="row">
                                <div class="col-xs-6 connectedSortable">
                                    <form method="POST" action="transaction_details.php" style="padding-left: 1rem;">

                                        <div class="form-group">
                                            <b>
                                                <h4 class="mt-4">DELIVERY PRICE:</h4>


                                                <div class="input-group">
                                                    <span class="input-group-text ">#</span>
                                                    <input type="text" class="form-control" name="p_delivery" value="# <?php echo $delivery_price; ?>">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </b>
                                        </div>



                                        <button type="submit" id="upload" name="update_delivery_price" class="btn btn-primary">Update product price</button>




                                    </form>
                                    <br>
                                    <br>
                                    <br>
                                    <hr>
                                    <div class="wells">
                                        <div class="card-body">
                                            <form method="POST" action="transaction_details.php">

                                                <div class="form-group">
                                                    <b>
                                                        <h4 class="mt-4">PAYMENT GATEWAY:</h4>

                                                        <br>
                                                        <input type="radio" name="gate" data-toggle="toggle" value=0 <?php if ($trans == 0) {
                                                                                                                            echo " checked";
                                                                                                                        }
                                                                                                                        ?> />&nbsp;&nbsp;&nbsp;CLOSE PAYMENT GATE WAY

                                                        <?php if ($trans == 0) {
                                                            echo "<p class='alert alert-danger'>Payment Gateway is currently closed </p>";
                                                        }
                                                        ?>

                                                        <br>
                                                        <br>
                                                        <br>
                                                        <input type="radio" name="gate" data-toggle="toggle" value=1 <?php if ($trans == 1) {
                                                                                                                            echo " checked";
                                                                                                                        }
                                                                                                                        ?> />&nbsp;&nbsp;&nbsp; OPEN PAYMENT GATE WAY
                                                        <?php if ($trans == 1) {
                                                            echo "<p class='alert alert-success'>Payment Gateway is currently open </p>";
                                                        }
                                                        ?>
                                                    </b>
                                                </div>
                                                <?php if ($trans == 1) {
                                                    echo    "<button type='submit' id='upload' name='update_gate_way' onclick='redo()' class='btn btn-primary'>Confirm Gate Closure</button>";
                                                } else {
                                                    echo    "<button type='submit' id='upload' name='update_gate_way' onclick='redo()' class='btn btn-primary'>Confirm Gate Opening</button>";
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
    </main>

    <script type='text/javascript'>
        // confirm record deletions
        function redo() {

            setTimeout(function() {
                location.reload();
            }, 1400);
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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <?php include("includes/footer.php"); ?>