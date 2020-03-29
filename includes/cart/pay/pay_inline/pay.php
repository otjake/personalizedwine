<!-- place below the html form -->

<?php
$_SESSION["order_id"] = (isset($_SESSION["order_id"]) ? $_SESSION["order_id"] : "");
$_SESSION["order_amount"] = (isset($_SESSION["order_amount"]) ? $_SESSION["order_amount"] : 0); //available in session variable
$_SESSION["order_deadline"] = (isset($_SESSION["order_deadline"]) ? $_SESSION["order_deadline"] : "");
$_SESSION["customer_name"] = (isset($_SESSION["customer_name"]) ? $_SESSION["customer_name"] : "");
$_SESSION["customer_phone"] = (isset($_SESSION["customer_phone"]) ? $_SESSION["customer_phone"] : "");
$_SESSION["customer_address"] = (isset($_SESSION["customer_address"]) ? $_SESSION["customer_address"] : "");
$_SESSION["customer_email"] = (isset($_SESSION["customer_email"]) ? $_SESSION["customer_email"] : "");
 if(isset($_SESSION["order_amount"]) && isset($_SESSION["delivery_charge"])){
    $amount = (doubleval($_SESSION["order_amount"] + doubleval($_SESSION["delivery_charge"])) * 100);
} else  if(isset($_SESSION["order_amount"])){
     $amount = (doubleval($_SESSION["order_amount"]) * 100);
 } ?>
<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: 'pk_test_4b13c68bf8ed3efd981699d75e2a7cf971fcd54f',
            email: '<?php if(isset($_SESSION["customer_email"])){
                echo $_SESSION["customer_email"];
            } ?>',
            amount: <?php echo $amount ?>,
            // ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                "order_id": '<?php if(isset($_SESSION["order_id"])){ echo $_SESSION["order_id"]; } ?>',
                custom_fields: [
                    {
                        display_name: "Order ID",
                        variable_name: "order_id",
                        value: '<?php if(isset($_SESSION["order_id"])){ echo $_SESSION["order_id"]; } ?>',
                    },
                    {
                        display_name: "Customer Name",
                        variable_name: "customer_name",
                        value: '<?php if(isset($_SESSION["customer_name"])){ echo $_SESSION["customer_name"]; } ?>',
                    },
                    {
                        display_name: "Customer Mobile",
                        variable_name: "customer_mobile",
                        value: '<?php if(isset($_SESSION["customer_phone"])){ echo $_SESSION["customer_phone"]; } ?>',
                    },
                    {
                        display_name: "Delivery Address",
                        variable_name: "delivery_address",
                        value: '<?php if(isset($_SESSION["customer_address"])){ echo $_SESSION["customer_address"]; } ?>',
                    },
                    {
                        display_name: "Delivery Deadline",
                        variable_name: "delivery_deadline",
                        value: '<?php if(isset($_SESSION["order_deadline"])){ echo $_SESSION["order_deadline"]; } ?>',
                    }
                ]
            },
            callback: function(response){
                // post to server to verify transaction before giving value
                var verifying = $.get( 'includes/cart/pay/pay_inline/verify.php?reference=' + response.reference);
                verifying.done(function( data ) { /* give value saved in data */
                    alert(data);
                    var val = JSON.parse(data);
                    if(val.verified === true) {
                        alert("Thank you for placing an order. Your reference is: " + response.reference);
                        setTimeout(function () {
                            location.reload();
                        }, 600);
                        setTimeout(function () {
                            $("#empty_cart_link").trigger("click");
                        }, 500);
                    } else{
                        alert("Payment Failed");
                        location.reload();
                    }
                    });
            },
            onClose: function(){
                alert('Transaction Cancelled. Click "Pay now" to retry payment.');
            }
        });
        handler.openIframe();
    }
</script>