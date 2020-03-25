<script>
$(document).ready(function(){
    $(".form-item").submit(function(e){
        e.preventDefault();
        var getForm = $('.form-item');
        var formUrl = $(getForm).attr('action');
        var form = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        setTimeout(function () {
            button_content.html('<div style="color: darkolivegreen"><i class="fas fa-spinner fa-pulse fa-1x"></i></div>'); //Loading button text
        }, 500);

        $.ajax({ //make ajax request to cart_process.php
            url: formUrl,
            type: "POST",
            // processData: false,
            dataType: "json", //expect json value from server
            data: form,
        }).done(function(data){ //on Ajax success
            $(".cart-items").html(data); //total items in cart-info element
            setTimeout(function () {
                button_content.html('<div style="color: darkolivegreen"><i class="fa fa-check" aria-hidden="true"></i>Added</div>'); //change button text to added
            }, 2000);
            setTimeout(function () {
                button_content.html('Add to cart'); //reset button text to original text
            }, 4000);
            // alert("Item added to Cart!"); //alert user
            $(".cart-items").html(data.items);
            if($(".shopping-cart-box").css("display") === "block"){ //if cart box is still visible
                $(".close-shopping-cart-box").trigger( "click" ); //trigger click to update the cart box.
            }
        }).fail(function (response) {
            setTimeout(function () {
                button_content.html('<div style="color: indianred"><i class="fa fa-times" aria-hidden="true"></i> Not added</div>');
            }, 1500)
            setTimeout(function () {
                button_content.html('Add to cart');
            }, 3000);
        });
    });

    //Show Items in Cart
    $(".shopping-cart-box").hide();
    $( ".cart-box").click(function(e) { //when user clicks on cart box
        e.preventDefault();
        $(".shopping-cart-box").show(); //display cart box
        $(".shopping-cart-results").html('<i class="fas fa-spinner fa-spin fa-2x"></i>'); //show loading image
        setTimeout(function () {
            $(".shopping-cart-results" ).load( "includes/cart/cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results

        }, 500);
        // $.ajax({
        //     type:'post',
        //     url:'includes/cart/cart_process.php',
        //     data:{
        //         load_cart:"load_cart"
        //     },
        //     success:function(response) {
        //         $(".shopping-cart-results").html(response);
        //     }
        // });
    });

    //Close Cart
    $( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
        e.preventDefault();
        $(".shopping-cart-box").hide(); //close cart-box
    });

    //Remove items from cart
    $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
        e.preventDefault();
        var pcode = $(this).attr("data-code"); //get product code
        $(this).parent().fadeOut(); //remove item element from box
        $.getJSON( "includes/cart/cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
            $(".cart-items").html(data.items); //update Item count in cart-info
            console.log(data.items);
            $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
        });
    });

});
</script>