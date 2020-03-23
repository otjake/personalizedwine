<style>
    <?php include_once('style/style.css'); ?>
</style>
<a href="#" class="cart-box" id="cart-info" title="View Cart">
        <span>
          <i class="fas fa-cart-plus "></i>
        </span>
</a>
<div class="cart-items">
    <?php
    if(isset($_SESSION["products"])){
        echo count($_SESSION["products"]);
    }else{
        echo 0;
    }
    ?>
</div>
