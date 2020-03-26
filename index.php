<?php
require("includes/db.php");
include("includes/functions.php"); ?>
<?php subscribe_reg();
//session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="styles/styles.css" />
  <title>PERSONALIZED WINE</title>

  <!-- fontawesome online -->
  <link href="https://fonts.googleapis.com/css?family=Abel|Bellota+Text|Montserrat|Raleway&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/760c3d66bf.js" crossorigin="anonymous"></script>
  <script src="includes/jquery-3.4.1.js"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <!-- fontawesome online -->

</head>

<body>
  <!-- modal -->

  <?php include("includes/modal.php"); ?>

  <!-- NAVBAR -->



  <nav class="menu">
    <ul class="menu">

      <li><a href="#home" data-toggle="modal" data-target="#exampleModal">Client service</a></li>
    </ul>

    <div class="utility">

      <span class="search">
        <i class="fas fa-search " onclick="opensearch()"> </i>
      </span>
      &nbsp;&nbsp;
      <?php include('includes/cart/cart_menu_icon.php'); ?>
    </div>
    <div class="search_overlay">
      <form method="GET" action="result.php">
        <div class="input-group">
          <span class="input-group-addon btn btn-primary"> <span>
              <button type="submit" name="search" value="Search" style="background: transparent;border:none;"><i class="fas fa-search "> </i></button>
            </span>
          </span>
          <input type="text" class="form-control" name="user_search" placeholder="Search">
          <span class="input-group-addon btn btn-primary" onclick="closesearch()"><i class="fas fa-times"></i></span>

        </div>
      </form>
    </div>
  </nav>
  <?php include('includes/cart/cart_content_modal.php'); ?>
  <!-- end of navbar -->

  <!-- hero -->
  <header class="hero">
    <!-- The slideshow -->
    <div id="slides" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#slides" data-slide-to="0" class="active"></li>
        <li data-target="#slides" data-slide-to="1"></li>
        <li data-target="#slides" data-slide-to="2"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/banner1.jpg" alt="banner 1" />
        </div>
        <div class="carousel-item">
          <img src="images/banner2.jpg" alt="banner 2" />
        </div>
        <div class="carousel-item">
          <img src="images/banner9.jpg" alt="banner 3" />
        </div>
      </div>
    </div>
    <!-- The slideshow -->

    <div class="banner">
      <h1 class="banner-title">PERSONALIZED WINE</h1>
      <div class="banner-tabs">
        <ul>
          <li><a href="whatsnew.php">What's new</a></li>
          <li><a href="allproducts.php">Products</a></li>
          <!-- <li><a href="cartpage.php">Order</a></li> -->
        </ul>
      </div>
    </div>
  </header>
  <div class="divider"></div>

  <!-- end hero -->

  <section class="features-section">
    <!-- <div class="container-fluid"> -->
    <!-- <div class="row"> -->
    <div class="col-md-12 p-0 feature">
      <div id="horizontal-line"></div>
      <div class="feature-inner">
        <h2>WHAT WE DO</h2>
        &nbsp;
      </div>
      <!-- </div> -->
    </div>
    <section class="features-section">
      <!-- <div class="container-fluid"> -->
      <!-- <div class="row"> -->
      <div class="col-md-12 p-0 feature ">
        <div class="feature-inner" id="inner-inner">
          <p>
            We do customized wines for our client's special
            events<br /> Birthdays,Weddings,Anniversaries,Engagements,<br />
            Graduations,New Birth,etc.
          </p>
        </div>
      </div>
      <!-- </div> -->
      </div>
    </section>
    <!-- </div> -->
  </section>

  <!--
	  
	  
-->
  <!-- products -->
  <section class="features-section">
    <!-- <div class="container-fluid"> -->
    <!-- <div class="row"> -->
    <div class="col-md-12 p-0 feature">
      <div id="horizontal-line"></div>
      <div class="feature-inner">
        <h2><a href="allproducts.php">PRODUCTS</a></h2>
      </div>
      <!-- </div> -->
    </div>
    <!-- <section class="features-section"> -->
    <!-- <div class="container-fluid"> -->
    <!-- <div class="row"> -->
    <div class="col-md-12 p-0 feature ">
      <div class="feature-inner" id="inner-inner">
        <h2>
          WINE LABELLING CATEGORIES
        </h2>
      </div>
    </div>
    <!-- </div> -->
    <!-- </div> -->
    <section class="top-letest-product-section">
      <div class="product-accordion">

        <div id="accordion" class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#panelBodyOne" data-toggle="collapse" data-parent="#accordion">
                  <h2> ROSE<span><i class="fas fa-angle-down"></i> </span></h2>
                </a>
              </h4>
            </div>
            <div id="panelBodyOne" class="panel-collapse collapse">
              <div class="panel-body">

                <section id="team" class="section-padding">
                  <?php WROI_view(); ?>
                </section>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="top-letest-product-section">
      <div class="product-accordion">

        <div id="accordion" class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#panelBodyTwo" data-toggle="collapse" data-parent="#accordion">
                  <h2> WHITE<span><i class="fas fa-angle-down"></i> </span></h2>
                </a>
              </h4>
            </div>
            <div id="panelBodyTwo" class="panel-collapse collapse">
              <div class="panel-body">
                <section id="team" class="section-padding">


                  <?php WWHI_view(); ?>
                </section>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- red wine tab -->
    <section class="top-letest-product-section">
      <div class="product-accordion">

        <div id="accordion" class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#panelBodyThree" data-toggle="collapse" data-parent="#accordion">
                  <h2> REDS<span><i class="fas fa-angle-down"></i> </span></h2>
                </a>
              </h4>
            </div>
            <div id="panelBodyThree" class="panel-collapse collapse">
              <div class="panel-body">
                <section id="team" class="section-padding">


                  <?php WREI_view(); ?>
                </section>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="top-letest-product-section">
      <div class="product-accordion">

        <div id="accordion" class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#panelBodySix" data-toggle="collapse" data-parent="#accordion">
                  <h2> NON CUSTOMIZED WINES<span><i class="fas fa-angle-down"></i> </span></h2>
                </a>
              </h4>
            </div>
            <div id="panelBodySix" class=" panel-collapse collapse">
              <div class="panel-body">

                <section id="team" class="section-padding">
                  <?php NCI_view(); ?>
                </section>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    </div>
    </div>
    </div>
    </div>
    </div>
  </section>
  </section>

  <!-- </div> -->
  <!-- </div> -->

  <!-- </section> -->
  <!-- red wine tab -->

  <!-- wine label tab -->
  <section class="features-section">

    <div class="col-md-12 p-0 feature ">
      <div class="feature-inner" id="inner-inner">
        <h2>
          WINE LABELS
        </h2>
      </div>
    </div>

    <section class="top-letest-product-section">
      <div class="product-accordion">

        <div id="accordion" class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#panelBodyFour" data-toggle="collapse" data-parent="#accordion">
                  <h2> WINE LABELS<span><i class="fas fa-angle-down"></i> </span></h2>
                </a>
              </h4>
            </div>
            <div id="panelBodyFour" class="panel-collapse collapse">
              <div class="panel-body">
                <section id="team" class="section-padding">
                  <div class="container">

                    <?php WLTI_view(); ?>


                    <!-- continue shopping -->
                    <div class="col-md-12 p-0 feature ">
                      <div class="feature-inner" id="inner-inner" style="background: white; text-decoration: none; font-size: 20px;">
                        <a href="#">
                          CONTINUE SHOPPING
                        </a>
                      </div>
                    </div>
                    <!-- continue shopping -->

                  </div>
              </div>
    </section>

    </div>
    </div>
    </div>
    </div>
    </div>
  </section>

  </section>
  <!-- wine label tab -->



  <!-- wine engraving -->
  <section class="features-section">

    <div class="col-md-12 p-0 feature ">
      <div class="feature-inner" id="inner-inner">
        <h2>
          WINE BOTTLE ENGRAVINGS
        </h2>
      </div>
    </div>

    <section class="top-letest-product-section">
      <div class="product-accordion">

        <div id="accordion" class="panel-group">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a href="#panelBodyFive" data-toggle="collapse" data-parent="#accordion">
                  <h2>WINE BOTTLE ENGRAVINGS<span><i class="fas fa-angle-down"></i> </span></h2>
                </a>
              </h4>
            </div>
            <div id="panelBodyFive" class="panel-collapse collapse">
              <div class="panel-body">

                <!-- anniversary section -->
                <section id="anniversary" class="section-padding">

                  <div class="tops">
                    <h1> <span>Anniversary</span></h1>
                  </div>

                  <?php WEAI_view(); ?>
                </section>
                <!-- anniversary section -->

                <!-- ceremony section -->

                <section id="congratultion" class="section-padding">

                  <div class="tops">
                    <h1> <span>Congratulation</span></h1>
                  </div>




                  <?php WECONI_view(); ?>

                </section>
                <!-- anniversary section -->
                <!-- wedding section -->

                <section id="ceremony" class="section-padding">

                  <div class="tops">
                    <h1> <span>Ceremony</span></h1>
                  </div>

                  <?php WECERI_view(); ?>

                </section>

                <section id="ceremony" class="section-padding">

                  <div class="tops">
                    <h1> <span>THANK YOU</span></h1>
                  </div>

                  <?php WETI_view(); ?>

                </section>

                <!-- continue shopping -->
                <div class="col-md-12 p-0 feature ">
                  <div class="feature-inner" id="inner-inner" style="background: white; text-decoration: none; font-size: 20px;">
                    <a href="#">
                      CONTINUE SHOPPING
                    </a>
                  </div>
                </div>
                <!-- continue shopping -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </section>


  <!-- wine label tab -->



  <header class="hero_down">
    <a href="whatsnew.php">
      <h1 class="banner-title2"><button class="banner-btn2">WHAT'S NEW</button></h1>
    </a>
  </header>

  <section class="features-section" style="margin-bottom: 30px;">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12  feature">
          <div class="feature-inner">
            <h2>CUSTOMER FEEDBACK</h2>
          </div>
          <?php
          $reviews_sql = "SELECT * FROM reviews WHERE display='1'  LIMIT 0,2";
          $reviews_result = mysqli_query($connection, $reviews_sql);
          if ($reviews_result->num_rows > 0) {

            while ($review_rows = mysqli_fetch_array($reviews_result)) {
              echo "  <div class='card'>
            <div class='card-body'>
              <h5 class='card-title'>" . $review_rows['name'] . "</h5>
              <hr style='margin-top: 3rem'>

              <p class='card-text review-text' style='float: left;'>" . $review_rows['comments'] . "</p>

            </div>
          </div>";
            }
          }
          ?>

        </div>
      </div>
    </div>
  </section>
  <!-- ==== footer section start ==== -->
  <footer class="footer-bg section-padding-top footer">
    <div class="footer-widget-area">
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <div class="f-widget">
              <h2>JOIN OUR NEWSLETTER</h2>
              <form method="POST" action="">
                <?php

                if (!empty($Emessage)) {
                  echo "<p class='alert alert-danger'>" . $Emessage . "</p>";
                } ?>
                <?php
                if (!empty($Smessage)) {
                  echo "<p class='alert alert-success'>" . $Smessage . "</p>";
                } ?>
                <?php
                if (!empty($Dmessage)) {
                  echo "<p class='alert alert-success'>" . $Dmessage . "</p>";
                } ?>
                <?php
                if (!empty($emailErr)) {
                  echo "<p class='alert alert-danger'>" . $emailErr . "</p>";
                } ?>


                <input type="email" name="email" placeholder="Enter Email Address"></input>
                <button type="submit" name="subscribe" class="btn btn-primary"><i class="fas fa-chevron-right"></i></button>
              </form>

            </div>
          </div>
          <div class="col-md-5">

            <div class="contact-icons">
              <ul>
                <li><a href="https://www.instagram.com/ot_jake"><i class="fab fa-instagram fa-2x"></i></a></li>
                <li><a href="https://twitter.com/sylvar35"><i class="fab fa-twitter fa-2x"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=+2348179030542"><i class="fab fa-whatsapp fa-2x"></i></a></li>
                <li><a href="https://api.whatsapp.com/send?phone=+2348179030542"><i class="fab fa-facebook fa-2x"></i></a></li>

              </ul>
            </div>
          </div>


        </div>
      </div>
    </div>



    </div>
  </footer>
  <!-- ==== footer section end ==== -->
  <?php include("includes/footer.php");
  include('includes/cart/add_cart_item-overview_cart.php');
  ?>