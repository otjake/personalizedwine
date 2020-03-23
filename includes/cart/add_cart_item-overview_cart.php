<script>
$(document).ready(function(){
    $(".form-ite").submit(function(e){
        var form_data = $(this).serialize();
        var button_content = $(this).find('button[type=submit]');
        button_content.html('Adding Item'); //Loading button text

        $.ajax({ //make ajax request to cart_process.php
            url: "includes/cart/cart_process.php",
            type: "POST",
            dataType:"json", //expect json value from server
            data: form_data
        }).done(function(data){ //on Ajax success
            $(".cart-items").html(data.items); //total items in cart-info element
            button_content.html('Add to Cart'); //reset button text to original text
            alert("Item added to Cart!"); //alert user
            if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
                $(".close-shopping-cart-box").trigger( "click" ); //trigger click to update the cart box.
            }
        }).fail(function (response) {
            alert("Item was not added to Cart!");
        });
        e.preventDefault();
    });

    //Show Items in Cart
    $(".shopping-cart-box").hide();
    $( ".cart-box").click(function(e) { //when user clicks on cart box
        e.preventDefault();
        $(".shopping-cart-box").show(); //display cart box
        $("#shopping-cart-results").html('<i class="fas fa-spinner fa-spin fa-2x"></i>'); //show loading image
        $("#shopping-cart-results" ).load( "includes/cart/cart_process.php", {"load_cart":1}); //Make ajax request using jQuery Load() & update results
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
        $.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
            $("#cart-info").html(data.items); //update Item count in cart-info
            $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
        });
    });

});
</script>