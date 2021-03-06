<script>
    $(document).ready(function () {
        // Add item to cart
        $(".form-item").submit(function (e) {
            e.preventDefault();
            var getForm = $('.form-item');
            var formUrl = $(getForm).attr('action');
            var form = $(this).serialize();
            var button_content = $(this).find('button[type=submit]');
            setTimeout(function () {
                //Change button text to loading icon
                button_content.html('<div style="color: darkolivegreen"><i class="fas fa-spinner fa-pulse fa-1x"></i></div>'); //Loading button text
            }, 10);

            $.ajax({ //make ajax request to cart_process.php to add item in session
                url: formUrl,
                type: "POST",
                dataType: "json", //expect json value from server
                data: form,
            }).done(function (data) { //on ajax success
                setTimeout(function () {
                    //update add to cart button with info
                    button_content.html('<div style="color: darkolivegreen"><i class="fa fa-check" aria-hidden="true"></i>Added to <i class="fa fa-shopping-cart" aria-hidden="true" style="color: #f0f0f0f0"></div>'); //change button text to added
                }, 20);
                //Disable add to cart button until page refresh
                // setTimeout(function () {
                //     $(button_content).attr('disabled', 'disabled');
                // }, 30);
                $(".cart-items").html(data.items);//update total items in cart-items element
                if ($(".shopping-cart-box").css("display") === "block") { //if cart box is still visible
                    $(".close-shopping-cart-box").trigger("click"); //trigger click to update the cart box.
                }
            }).fail(function (response) {//on ajax request fail
                setTimeout(function () {
                    button_content.html('<div style="color: indianred"><i class="fa fa-times" aria-hidden="true"></i> Not added</div>');
                }, 10)
                setTimeout(function () {
                    button_content.html('Add to cart');
                }, 30);
            });
        });

        //Show overview of items in cart
        $(".cart-box").click(function (e) { //when user clicks on cart box
            e.preventDefault();
            $(".shopping-cart-box").show(); //display cart box
            $(".shopping-cart-results").html('<i class="fas fa-spinner fa-spin fa-2x"></i>'); //show loading image
                $(".shopping-cart-results").load("includes/cart/cart_process.php", {"load_cart": "1"}, function(){
                setTimeout(function () {
                    if ((window.location.pathname.split('/')[1]) === "cartpage.php") {
                        $(".view_cart_link").html("");
                    }
                }, 20);
                }); //Make ajax request using jQuery Load() & update results
        });
        $(".shopping-cart-box").hide(); //hide cart box by default

        //Close cart overview
        $(".close-shopping-cart-box").click(function (e) { //user click on cart box close link
            e.preventDefault();
            $(".shopping-cart-box").hide(); //close cart-box
        });

        //Remove item from cart in overview mode
        $("#shopping-cart-results").on('click', 'a.remove-item', function (e) {
            e.preventDefault();
            var pcode = $(this).attr("data-code"); //get product code
            $(this).parent().fadeOut(); //remove item element from box
            $.getJSON("includes/cart/cart_process.php", {"remove_code": pcode}, function (data) { //get Item count from Server
                $(".cart-items").html(data.items); //update Item count in cart-items
                if ((window.location.pathname.split('/')[1]) === "cartpage.php") {
                    $(".close-shopping-cart-box").trigger("click");
                    setTimeout(function () {
                        location.reload();
                    }, 5);
                }
                if (data.items < 1) {
                    if ((window.location.pathname.split('/')[1]) === "cartpage.php") {
                        $(".close-shopping-cart-box").trigger("click");
                        $(".fadeOut-total-empty").fadeOut();
                        $("#checkout").fadeOut();
                        $(".fadeOut-item").fadeOut();
                        setTimeout(function () {
                            location.reload();
                        }, 5);
                    }
                    $(".cart-box").trigger("click"); //trigger click on cart-box to update the items list
                } else {
                    $(".cart-box").trigger("click"); //trigger click on cart-box to update the items list
                }
            });
        });

        //Remove item from cart in cart page
        $("div.cart-remove-button").on('click', 'a.remove-cartpage-item', function (e) {
            e.preventDefault();
            var item_code = $(this).attr("data-code"); //get product code
            var cart_items_el = $(this).parentsUntil($('.container.cartPage'));//get item element from the list
            //get current item count from cart-items and subtract one from the value
            var cart_items = $(".cart-items");
            var current_cart_el = $(cart_items).html();
            var current_cart_count = parseInt(current_cart_el);
            var updated_cart_count = (current_cart_count - 1);
            $(cart_items).html(updated_cart_count);//update the current item count
            setTimeout(function () {
                $(cart_items_el).fadeOut();//remove the item from the page list
            }, 20);
            $.getJSON("includes/cart/cart_process.php", {"remove_item_code": item_code}, function (new_data) { //get item count from Server
                 // Fetch final checkout amount (delivery + total amount) from server
                setTimeout(function(){
                    checkoutTotal();
                },10);
                $(".cart-items").html(new_data.cart_items);//update Item count in cart-items
                if (new_data.cart_items < 1) { //check if unique item count is less than 1
                    $(".fadeOut-total-empty").fadeOut();
                    $("#checkout").hide();
                    $(cart_items_el).fadeOut();
                    setTimeout(function () {
                        location.reload();
                    }, 40);
                }
            });
            setTimeout(function () {//query server for current total cart amount
                $.ajax({
                    type: 'post',
                    url: 'includes/cart/cart_process.php',
                    data: {
                        total_cart_amount: "load_amount"
                    },
                    success: function (response) {
                        $(".total_cart_amount").html(response);//update current total cart amount
                        $(".update_checkout_amount").html(response);
                    }
                });
                // Fetch final checkout amount (delivery + total amount) from server
                checkoutTotal();
            }, 30);

        });

        //Increment item count in cart
        $(".increment-item").submit(function (e) {
            e.preventDefault();
            var getIncrementForm = $('.increment-item');
            var incrementFormUrl = $(getIncrementForm).attr('action');
            var incrementForm = $(this).serialize();
            var item_subtotal_qty_el = $(this).next('.item_subtotal_qty'); //Get current item quantity holder
            var item_subtotal_price_el = $(this).parentsUntil('tr').next('.item_subtotal_price');//Get current item price holder
            $.ajax({ //make ajax request to cart_process.php to increment product with supplied product_id
                url: incrementFormUrl,
                type: "POST",
                dataType: "json", //expect json value from server
                data: incrementForm,
            }).done(function (data) { //on success
                item_subtotal_qty_el.html(data.per_item_count); //Update item current quantity
                item_subtotal_price_el.html("&#8358;" + data.subtotal_price); //Update item current price
                setTimeout(function(){
                    $.ajax({
                    type: 'post',
                    url: 'includes/cart/cart_process.php',
                    data: {
                        total_cart_amount: "load_amount"
                    },
                    success: function (response) {
                        $(".total_cart_amount").html(response);
                        $(".update_checkout_amount").html(response);
                        checkoutTotal();
                    }
                });
                }, 10);
            });
        });

        // //Decrement item count in cart
        $(".decrement-item").submit(function (e) {
            e.preventDefault();
            var getDecrementForm = $('.decrement-item');
            var decrementFormUrl = $(getDecrementForm).attr('action');
            var decrementForm = $(this).serialize();
            var item_subtotal_qty_el = $(this).prev('.item_subtotal_qty'); //Get current item quantity holder
            var item_subtotal_price_el = $(this).parentsUntil('tr').next('.item_subtotal_price');//Get current item price holder
            var item_remove_btn_el = $(this).parentsUntil(".cart-details").next("div.cart-remove-button").children(".remove-cartpage-item");
            var current_item_count = parseInt(item_subtotal_qty_el.html());
            if (current_item_count <= 12) {//if individual item quantity is less than or equals 12
                setTimeout(function () {
                    item_remove_btn_el.trigger("click");
                }, 20);
            } else {
                $.ajax({ //make ajax request to cart_process.php
                    url: decrementFormUrl,
                    type: "POST",
                    dataType: "json", //expect json value from server
                    data: decrementForm,
                }).done(function (data) { //on ajax success
                    //Update item current quantity and price
                    item_subtotal_qty_el.html(data.dec_item_count);
                    item_subtotal_price_el.html("&#8358;" + data.dec_subtotal_price);
                    setTimeout(function(){
                        $.ajax({
                        type: 'post',
                        url: 'includes/cart/cart_process.php',
                        data: {
                            total_cart_amount: "load_amount"
                        },
                        success: function (response) {
                            $(".total_cart_amount").html(response);
                            $(".update_checkout_amount").html(response);
                            checkoutTotal();
                        }
                    });
                    }, 10);
                    if (data.dec_item_count < 1) {
                        item_remove_btn_el.trigger("click");
                    }

                    });
            }
        });

        // Validate and process checkout form
        var terms_checkbox = $("#terms_checkbox"); //Get terms and conditions checkbox
        if ($(terms_checkbox).prop("checked") !== true) {
            $("#order_checkout").attr('disabled', 'disabled');//Disable checkout button while terms checkbox is unchecked
        }
        //Toggle checkout button depending on terms checkbox status
        $(terms_checkbox).click(function () {
            // if($(terms_checkbox).is(':checked')) {
            //     $("#order_checkout").attr('disabled', 'disabled');
            // }
            if ($(terms_checkbox).prop("checked") !== true) {
                $("#terms_link").fadeIn();
                $("#order_checkout").attr('disabled', 'disabled');//Disable checkout button while terms checkbox is unchecked
            } else if ($(terms_checkbox).prop("checked") === true) {
                $("#terms_link").fadeOut();
                $("#order_checkout").removeAttr('disabled');//enable checkout button while terms checkbox is checked
            }
        });
        //Checkout form submission
        $("#form_checkout").submit(function (e) {
            e.preventDefault();
            var getForm = $('#form_checkout');
            var formUrl = $(getForm).attr('action');
            var form = $(this).serialize();
            var msg_form = $("#form_error_messages");
            setTimeout(function () {
                $(msg_form).alert('close');
                $(msg_form).removeClass("error");
                $(msg_form).html("");
            }, 5000);
            $.ajax({ //make ajax request to checkout_form.php
                url: formUrl,
                type: "POST",
                // dataType: "json",
                data: form,
            }).done(function (data) { //on ajax success
                var val = JSON.parse(data);
                if (val.name_error) {
                    $(msg_form).addClass("error");
                    $(msg_form).html(val.name_error);
                    // $("#inputUserName").parent("div.input-outline").css( "border", "1px solid #D45C5C" );
                }
                if (val.email_error) {
                    $(msg_form).addClass("error");
                    $(msg_form).html(val.email_error);
                }
                if (val.mobile_error) {
                    $(msg_form).addClass("error");
                    $(msg_form).html(val.mobile_error);
                }
                if (val.address_error) {
                    $(msg_form).addClass("error");
                    $(msg_form).html(val.address_error);
                }
                if (val.date_error) {
                    $(msg_form).addClass("error");
                    $(msg_form).html(val.date_error);
                }
                var validity = "vldprocess";
                if (val.status === true) {
                    window.location.href = "checkout.php?chkvld="+validity;
                }
            }).fail(function (response) {//on ajax request fail
                alert("Request failed. please try again.");
            });
        });

//    Place none-paid order processing
        $(".place_order_form").submit(function (e) {
            e.preventDefault();
            var form = $(".place_order_form");
            var formURL = $(form).attr("action");
            var formData = $(this).serialize();
            var fail_msg = $("#order_process_msg");
            var success_msg = $(".order_process_msg");
            var place_order_btn = $("#place_order_btn");

            $(place_order_btn).html('<span style="color: darkolivegreen"><i class="fas fa-spinner fa-pulse fa-2x"></i> Processing</span>'); //Loading button text
            setTimeout(function () {
                $(place_order_btn).attr('disabled', 'disabled');
            }, 200);
            $.ajax({
                url: formURL,
                type: 'POST',
                data: formData,

            }).done(function (result) {
                $(place_order_btn).removeAttr('disabled', 'disabled');
                var status = JSON.parse(result);
                if(status.success){
                    setTimeout(function(){
                        $(place_order_btn).text("Place Order");
                    }, 400);
                    $(success_msg).removeClass("error").addClass("success");
                    setTimeout(function(){
                                    $(success_msg).html(status.success);
                                    $(".order_status_modal").trigger("click");
                                }, 1200);
                    setTimeout(function () {
                        $(".order_process_complete_fade").fadeOut();
                    }, 800);
                    //Display return button in checkout page after processing
                    // setTimeout(function () {
                    //     $('#placedorder_empty_cart_link').css('display','block');
                    //     $("#placedorder_empty_cart_link").show();
                    // }, 1200);
                }

                if(status.fail){
                    setTimeout(function(){
                        $("#place_order_btn").text("Place Order");
                    $(fail_msg).removeClass("success").addClass("error");
                    $(fail_msg).html(status.fail);
                }, 500);
                }


            });

        });


        //Calculate total checkout charge (delivery + products amount)
        function checkoutTotal()
        {
            $.post("includes/cart/cart_process.php", {"checkout_amount": "1"}, function (total) {
                $(".total_checkout_amount").html(total);
            }); //Make ajax request using jQuery post() & update checkout amount
        }

        //Hide checkout page return button by default
        $("#placedorder_empty_cart_link").hide();

        //Hide cart on checkout page
        if ((window.location.pathname.split('/')[1]) === "checkout.php") {
            $(".cart-box").hide();
            $(".cart-items").hide();
        }
    });
</script>