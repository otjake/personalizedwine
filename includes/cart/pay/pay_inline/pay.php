<!-- place below the html form -->
<?php
$_SESSION["order_id"] = (isset($_SESSION["order_id"]) ? $_SESSION["order_id"] : "");
$_SESSION["order_amount"] = (isset($_SESSION["order_amount"]) ? $_SESSION["order_amount"] : 0); //available in session variable
$_SESSION["order_deadline"] = (isset($_SESSION["order_deadline"]) ? $_SESSION["order_deadline"] : "");
$_SESSION["customer_name"] = (isset($_SESSION["customer_name"]) ? $_SESSION["customer_name"] : "");
$_SESSION["customer_phone"] = (isset($_SESSION["customer_phone"]) ? $_SESSION["customer_phone"] : "");
$_SESSION["customer_address"] = (isset($_SESSION["customer_address"]) ? $_SESSION["customer_address"] : "");
$_SESSION["customer_email"] = (isset($_SESSION["customer_email"]) ? $_SESSION["customer_email"] : "");
 if(isset($_SESSION["order_amount"])){
    $amount = (doubleval($_SESSION["order_amount"]) * 100);
}?>
<script>
    function payWithPaystack(){
        var handler = PaystackPop.setup({
            key: '<?php if (isset($_ENV["set_public_key"])) {
              echo $_ENV["set_public_key"]; } ?>',
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
                    var val = JSON.parse(data);
                    if(val.verified === true) {
                        $(".paystack_process").html('<span style="color: darkolivegreen"><i class="fas fa-spinner fa-pulse fa-2x"></i> Processing</span>'); //Loading button text
                        $.ajax({
                            url: "includes/cart/mail/paid_order_mail.php",
                            type: 'POST',
                            data: {'reference':response.reference},

                        }).done(function(result){
                            $(".paystack_process").text("Pay Now");
                            setTimeout(function () {
                                alert(result);
                            }, 300);
                            setTimeout(function () {
                                $(".order_process_complete_fade").fadeOut();
                            }, 800);
                            setTimeout(function () {
                                $("#empty_cart_link").trigger("click");
                            }, 450);
                            setTimeout(function () {
                                location.href="cartpage.php";
                            }, 1500);

                        }).fail(function (failed) {
                            $(".paystack_process").text("Pay Now");
                            alert(failed.responseText);
                            setTimeout(function () {
                                location.reload();
                            }, 1000);
                        });
                    } else{
                        alert("Payment failed. Please try again.");
                        setTimeout(function () {
                            location.reload();
                        }, 1500);
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