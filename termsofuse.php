<?php require_once("includes/db.php"); ?>
<?php include("includes/functions.php"); ?>
<?php subscribe_reg(); ?>

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

    <!-- fontawesome from local -->

    <script src="includes/jquery-3.4.1.js"></script>
    <!-- fontawesome from local -->
</head>

<body>

    <?php include("includes/modal.php"); ?>

    <!-- NAVBAR -->

    <nav class="menu1">
        <ul class="menu">
            <li><a href="#home" data-toggle="modal" data-target="#exampleModal" id="cart_page_home">Client service</a></li>
        </ul>
        <div class="utility">

            <span class="search">
                <i class="fas fa-search " onclick="opensearch()"> </i>
            </span>
            &nbsp;&nbsp;&nbsp
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

    <br>
    <br>
    <div class="cart-top" style="background: #f8f8f8;">
        <a href="index.php"><i class="fas fa-home"></i>HOME</a>
    </div>

    <!-- end hero -->
    <div class="col-md-12 p-0 feature">
        <div id="horizontal-line_terms"></div>
        <div class="feature-inner">
            <h2>TERMS AND CONDITIONS</h2>
        </div>
    </div>

    <div class="col-md-12 terms-feature">
        <p> <b>CONDITIONS OF USE/GENERAL CONDITIONS</b></p>
        <p>
            By agreeing to these Terms of Service, you represent that you are at least above the age of 18 years.
            You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws of the Federal Republic of Nigeria (including but not limited to copyrights and trademark laws).
            A breach or violation of any of the Terms will result in an immediate termination of your services and possible prosecution under relevant laws.
            We reserve the right to refuse services to anyone for any reason at any time.
            You understand and agree that your information (excluding debit/credit card information), may be transferred unencrypted and involve<br> (a) transmissions over various networks; <br>(b)You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us.
            The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.
        </p>
        <br>
        <p><b> PRODUCT INFORMATION</b></p>
        <p>
            Products are packaged in crates of 12 bottles each. Products may only be ordered in multiples of 12<br>
            Only one template of the engraved or label design per 12 bottles is accepted.<br>
            There shall be no customized labelling or engraving. Changes are only allowed on the lettering (comprising of – Name /Date/ Brief wording).<br>
            Names and words to be used shall not contain more than 20 alphabets, to keep the font size uniform.
        </p>


        <br>
        <p><b> REFUNDS POLICY</b></p>
        <p> The Seller (‘CUJI’ or ‘Personalizedwine’) shall not entertain any refund or exchange requests following payment for and receipt of goods sold in good condition;
        </p>

        <br>
        <p><b> ORDER AND DELIVERY PERIOD
            </b></p>

        <p>
            There shall be a 2 – 3-month period (for customized products) from when orders are placed to when designs are finalized and then delivery is completed.<br>
            There shall be a 4 – 6 weeks period (for non-customized products) from when orders are placed to when designs are finalized and then delivery is completed.<br>
            Orders requiring a delivery period of less than 4 weeks shall not be accepted.<br>
            Alterations shall not be allowed once booking confirmation and payments have been received.
        </p>




        <br>
        <p><b> SHIPPING </b></p>
        <p>


            Shipping costs shall be included in the invoice sent to the Purchaser.<br>
            Shipping shall be processed within 2 business days after finalization of design for orders emanating from Lagos,<br> while orders from outside Lagos shall be processed within 3 – 4 business days after finalization of design.
            Shipping costs are non-refundable.
        </p>


        <br>
        <p><b> PAYMENT TERMS
            </b></p>
        <p>
            Products shipped against this Agreement shall be invoiced at the price set forth in the Order. Unless otherwise specified on the Order, payment of the purchase price shall be due upon acceptance of the Buyer’s correct invoice by the Seller.<br>
            The purchase price for the Products shall include all taxes, customs duties, customs fees or other governmental charges due with respect to the Products. Buyer shall, however, pay for any taxes that it is statutorily required to pay.
        </p>


        <br>
        <p><b> CANCELLATION POLICIES</b></p>
        <p>


            We reserve the right to refuse any order you place with us. We may in our sole discretion, limit or cancel quantities purchased per order. These restrictions may include orders placed by or under the same customer account, the same debit/credit card, and/or orders that use the same billing and/or shipping address.
            In the event we make a change to or cancel an order, we may attempt to notify you by contacting the e-mail and/or billing address or phone number provided at the time the order was made. We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors.
        </p>

        <br>
        <p><b> LIMITATION OF LIABILITIES
            </b></p>
        <p>
            We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or free from acts not within our control.<br>
            You expressly agree that your use of, or inability to use, the service is at your sole risk. The service and all products delivered to you through the service are (except as expressly stated by us) provided “as is” and “as available” and “as specifically requested by you” for your use, without representation, warranties or conditions of any kind, either express or implied, including all implied warranties or conditions of merchantability, merchantable quality, fitness for purpose durability, title, and non-infringement.
            You hereby warrant to hold the directors, officers, employees, affiliates and agents of the Company free from any liability for any injury, loss, claim, or any direct, indirect incidental, punitive, special or consequential damages of any kind, including without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the services or products procured using the service, or for any claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility.
        </p>
        <br>
        <p><b> TRADEMARK/INTELLECTUAL PROPERTY RIGHTS

            </b></p>
        <p>
            All our products are registered under the relevant trademark laws of Nigeria and thereby protected against any trademark infringement.
            All trademarks, bottle designs, service marks, and trade names of (‘CUJI’ or ‘Personalizedwine’) on the site are trademarks or registered trademarks of (‘CUJI’ or ‘Personalizedwine’) , or of their respective owners.
            Purchasers shall not take unauthorized images of products purchased with the intention of profiting commercially from such images or of commercializing the contents of the images.
        </p>

        <br>
        <p><b> DISPUTE RESOLUTION </b></p>
        <p>
            Any dispute arising from any activity on our site or the purchase of any of our products shall be submitted to mediation in accordance with the rules of the Lagos Multi-Door Courthouse on Mediation.
            Such mediation shall be presided over by a single Mediator to be appointed by the appointing authority of the Lagos Multi-Door Courthouse.
            Where, there is or likely to be a threatened or actual violation of the intellectual property rights of the Company, then (‘CUJI’ or ‘Personalizedwine’) will be well within its rights to seek an injunctive relief.
        </p>
    </div>


    <!-- ==== footer section end ==== -->
    <?php include("includes/footer.php");
    include("includes/cart/add_cart_item-overview_cart.php"); ?>