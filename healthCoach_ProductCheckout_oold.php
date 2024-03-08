<?php
session_start();

include_once 'api/config.php';
include_once 'api/action.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_GET['error'])) {

    authUser();
}


$title = 'Review Order';

?>


<?php include_once 'header.php';
?>
<div class="inner-bnr">
    <div class="container">
        <p class="bdhding_main">Complete Checkout</p>
    </div>
</div>
<div class="bg-top">
    <div class="container">
        <div class="right-chk">
            <div class="product_option">
                <div class="top_hed top_hed1">
                    <p class="prod_type">Select An Option Below</p>
                </div>
                <a class="prodcsel" data-id="1">
                    <div class="select_box flt-l">

                    </div>
                    <div class="pric-box">
                        <div class="options">
                            <input type="checkbox" name="sel_check" value="1" class="opt-check" pid='1' data-price='129.88'>
                            <p class="p_name">
                                <b>Revolt CBD Oil</b>
                                <span class="prod-type">(2 Bottles)</span>
                            </p>
                            <span class="pric"><b>$129.88</b></span>
                        </div>
                        <p class="brder"></p>
                        <div class="ship-option ship-option-prc"> Price: $129.88 </div>
                        <p class="brder"></p>
                        <div class="btn bnrbtn">Place Order</div>
                    </div>
                </a>
            </div>
            <div class="order-smry-hdng">Order Summary</div>
            <div class="prod-box">
                <div class="ord-inn-text">
                    <h4 class="ord-p1-hed" style="margin-left:10px;">
                        <a class="prodcsel" data-id="1" id="prd-1">
                            <div class=" flt-l">                                
                                <img src="images/product<?=isset($_GET['pidx']) ? $_GET['pidx'] : ''?>.png" class="two_btl" id="prod-image">
                            </div>
                            <div class="pric-box" >
                                <div class="options">
                                    <input type="checkbox" name="sel_check" value="1" class="opt-check" pid='1' data-price='129.88'>
                                    <p class="p_name" id="product_name"></p>
                                </div>
                            </div>
                        </a>
                        <?php 
                        $packetsCount = 2;
                        if(isset($_GET['pidx'])) {
                            if($_GET['pidx'] == 2){
                                $packetsCount = 3 ;
                            }else if($_GET['pidx'] == 3){
                                $packetsCount = 5 ;
                            }
                        }
                        ?>
                        Revolt<span id="prd_name"></span> <span id="sub-prodnm">Revolt CBD Gummies - <?=$packetsCount?> Packets</span>
                    </h4>
                </div>
                <div class="ord-inn-text" >
                    <h4 class="ord-p1-hed" style="margin-left:10px;">
                        <a class="prodcsel" data-id="1" id="prd-1">
                            <div class=" flt-l">
                                <img src="images/check.png" class="two_btl" style="left: 40px;" id="prod-image">

                            </div>
                            <div class="pric-box">
                                <div class="options">
                                    <input type="checkbox" name="sel_check" value="1" class="opt-check" pid='1' data-price='129.88'>
                                    <p class="p_name" id="product_name"></p>
                                </div>
                            </div>
                        </a>
                        Revolt<span id="prd_name"></span> <span id="sub-prodnm">Hired A Revolt Health Coach</span>
                    </h4>
                </div>
                <div class="prc-details">
                    <div class="prod-box1">
                        <div class="ord-lft">
                            <p class="ord-p4">Total for CBD Packets</p>
                        </div>
                        <div class="ord-right">
                            <p id="sub-tot">$0.00</p>
                        </div>
                    </div>
                    <div class="prod-box1">
                        <div class="ord-lft">
                            <p class="ord-p4">One Time Health Coach</p>
                        </div>
                        <div class="ord-right">
                            <p id="sub-tot2">$0.00</p>
                        </div>
                    </div>
                    <div class="prod-box1">
                        <div class="ord-lft">
                            <p class="ord-p4">Shipping and Handling</p>
                        </div>
                        <div class="ord-right">
                            <p id="shp_hnd">$0.00</p>
                        </div>
                    </div>
                    <div class="prod-box1 total-pr">
                        <div class="ord-lft">
                            <p class="ord-p4">Total</p>
                        </div>
                        <div class="ord-right" style="position: relative;right: -8px;">
                            <p class="tot-prc">$0.00</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="terms">
                <p style="font-weight:bold;font-size: medium;color: #B51F27;text-align: center;">
                    Please note, that the monthly subscription for your CBD packets and your health coach will show up as two sepereate charges. Shortly after you process your order, you will recieve a calendar link to schedule with one of our Revolt Health Coaches
                </p>
            </div>
            <div class="chk-why-choose">
                <ul class="s4list dsplay bdfont">
                    <li>
                        <img src="images/icon1.png" alt="">
                        Tested For Purity
                    </li>
                    <li>
                        <img src="images/icon2.png" alt="">
                        Quality CBD
                    </li>

                    <li class="col-12">
                        <img src="images/icon3.png" alt="">
                        Best Voted CBD
                    </li>
                    <li>
                        <img src="images/icon4.png" alt="">
                        Made In USA
                    </li>
                    <li>
                        <img src="images/icon5.png" alt="">
                        GMP Certified
                    </li>

                </ul>
            </div>
        </div>
        <!----- Form ----->
        <div class="bg-rounded">
            <!--From-->
            <div class="lft-chk">
                <?php 
                    $prices = array("1"=>34174 , "2"=>34175 , "3"=>34176);
                    $selectedProductId = 0;
                    if(isset($_GET["pidx"])){
                        $productId = $_GET["pidx"];
                        $selectedProductId = isset($prices["$productId"]) ? $prices["$productId"] :"";
                    }

                ?>
                <form role="form" id="checkoutForm2"> 

                    <input type="hidden" id="productId" name="productId" value="<?=$selectedProductId?>" />
                    <input type="hidden" id="cc_expires" name="cc_expires" value="">
                    <!--FORM-->

                    <div class="form-container">
                        <p class="chk-head"><img src="images/chk-icn1.png"> Shipping Address</p>
                        <div class="errorMessage"></div>
                        <div class="input-50 fl">
                            <label>First Name:</label>
                            <div class="input-box wid-70">
                                <input type="text" name="firstName" placeholder="First Name" class="ft-input" required aria-required="true">
                            </div>
                        </div>
                        <div class="input-50 fr">
                            <label>Last Name:</label>
                            <div class="input-box wid-70">
                                <input type="text" name="lastName" placeholder="Last Name" class="ft-input" required aria-required="true">

                            </div>
                        </div>
                        <div class="frm-elements">
                            <label>Phone Number:</label>
                            <div class="input-box wid-70">
                                <input type="text" name="phone" onkeyup="phonenumber(this.value)" id="phone" maxlength="13" class="h5-phone ft-input" placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="frm-elements">
                            <label>Email:</label>
                            <div class="input-box wid-70">
                                <input type="email" name="email" class="h5-email ft-input" id="email" pattern="^[\w]{1,}[\w.+-]{0,}@[\w-]{2,}([.][a-zA-Z]{2,}|[.][\w-]{2,}[.][a-zA-Z]{2,})$" placeholder="Email Address" required aria-required="true">

                            </div>
                        </div>
                        <div class="frm-elements">
                            <label>Address:</label>
                            <div class="input-box wid-70">
                                <input type="text" name="address" placeholder="Address" required aria-required="true" class="ft-input">
                            </div>
                        </div>
                        <div class="frm-elements">
                            <label>City:</label>
                            <div class="input-box wid-70">
                                <input type="text" name="city" placeholder="City" required aria-required="true" class="ft-input">
                            </div>
                        </div>
                        <input type="hidden" name="shippingCountry" id="shippingCountry" value="US">
                        <div class="input-30">
                            <label>Country:</label>
                            <div class="input-box wid-70">
                                <select name="country" id="country" required class="field-all validate[required]">
                                    <option value="US">United States</option>
                                </select>
                                <img src="images/dwn-arw1.png" alt="dwn-arw" class="dwn-arw1">
                            </div>
                        </div>
                        <div class="input-30">

                            <div class="input-box wid-70">
                                <select name="state" class="form-select form-select-lg field-all validate[required]" aria-label=".form-select-lg example" required aria-required="true">
                                    <option selected value="">Select State</option>
                                    <?php
                                    foreach ($GLOBALS['states'] as $key => $state) {
                                    ?>
                                        <option value="<?php echo $state ?>"><?php echo $state ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>

                        <div class="input-30">
                            <label id="">Zip:</label>
                            <div class="input-box wid-70">
                                <input type="text" name="zipCode" placeholder="Zip code" required aria-required="true" class="h5-zip ft-input">
                            </div>
                        </div>

                    </div>
                    <div class="form-container" style="float:right; padding-top:10px">
                        <p class="chk-head"><img src="images/chk-icn3.png"> Payment Information</p>
                        <div class="billing_address">
                            <p class="text-start  bdfont">

                                Billing Address is the same as Shipping Address

                            <div class="d-flex  text-start">
                                <div class="form-check form-check-inline text-start">
                                    <input class="form-check-input " type="radio" name="inlineRadioOptions" checked="" value="yes">
                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline text-start ">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="" value="no">
                                    <label class="form-check-label" for="inlineRadio1">No</label>
                                </div>
                            </div>

                            </p>
                        </div>
                    </div>
                    <div id="shipping-billing" class="col-md-12 m-auto" style="display: none;">
                        <p class="text-start mt-sm-4">
                            Please Edit Your Billing Address Below
                        </p>
                        <div id="billing-form-part">
                            <div class="frm-elements">
                                <div class="card_input input-box wid-70 ">
                                    <input type="text" class="ft-input" name="billing_address" id="billing_address" placeholder="Address" value="" minlength="2">
                                </div>
                            </div>

                            <div class="frm-elements">
                                <div class="card_input input-box wid-70">
                                    <input type="text" class="ft-input" name="billing_address_2" id="billing_address_2" placeholder="Address Line 2" value="" minlength="2">
                                </div>
                            </div>

                            <div class="frm-elements ">

                                <div class="input-30">

                                    <input type="text" name="billing_city" placeholder="City" id="billing_city" class="ft-input">
                                </div>
                                <div class="  input-30  ">
                                    <select class="ft-input" name="billing_state" class="form-select ft-input" aria-label=".form-select-lg example">

                                        <option selected value="">State</option>

                                        <?php
                                        foreach ($GLOBALS['states'] as $key => $state) {
                                        ?>
                                            <option value="<?php echo $state ?>"><?php echo $state ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>

                                <div class="input-30  ">
                                    <input type="text" class="ft-input" name="billing_zip_code" id="billing_zip_code" placeholder="Zip Code" value="" minlength="2">

                                </div>

                            </div>




                        </div>
                    </div>
                    <div class="bg-sec">
                        <img src="images/cards.png" class="chk-card-img">
                        <div class="clearall"></div>
                        <div class="input-50 fl">
                            <input type="hidden" name="cc_type" id="cc_type">
                            <input type="text" name="cc_number" id="cc_number" class="cc_number switch-card validate-credit-card js-add-cc-type floatlabel ft-input noicon h5-ccno" placeholder="Card Number" required>
                        </div>
                        <div class="input-50 fr">
                            <label></label>
                            <div class="input-box icn-l-p">
                                <input type="text" name="cardName" class="ft-input" placeholder="Name on Card" required>
                            </div>
                        </div>

                        <div class="input-30">
                            <input type="text" pattern="(1[0-2]|0[1-9]) ?\/ ?(2[0-9]|3\d)" data-valid-example="05/35" maxlength="5" class="ft-input cardYear cc_expire_date_month_year" id="cc_expire_date_month_year" name="cc_expire_date_month_year" placeholder="Exp MM/YY" required>
                        </div>

                        <div class="input-30">
                            <input placeholder="CVV" class="ft-input cc_code floatlabel" type="tel" name="cc_cvv2" id="cc_code" maxlength="3" autocomplete="cc-csc" required="required" style="width:100%;transition: all 0.2s ease-in-out 0s;">
                        </div>
                        <div class="input-30 text-start"> <a id="openPopup">What is this?</a></div>
                        <div class="overlay" id="overlay"></div>



                        <div class="popup" id="popupBox">
                            <img src="images/cvvnum.jpg" />
                        </div>
                    </div>


                    <div class="prod-box">

                        <div class="prc-details">


                            <div class="prod-box1 total-pr">
                                <div class="ord-lft">
                                    <p class="ord-p4">Monthly Total</p>
                                </div>
                                <div class="ord-right">
                                    <p class="tot-prc2">$0.00</p>
                                </div>
                            </div>
                            <div class="prod-box1 total-pr">
                                <div class="ord-lft">
                                    <p class="ord-p4">One-Time Monthly Health Coach Fee</p>
                                </div>
                                <div class="ord-right">
                                    <p class="tot-prc3">$0.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="prc-details">
                            <p style="font-weight:bold;font-size: medium;color: #B51F27;text-align: center;">
                                Please note your health coach fee is billed seperately from your monthly subscription.
                            </p>
                        </div>
                    </div>

                    <button type="submit" class="medium_btn">Purchase Now</button>

                    <div class="agreeTerms chk_1">
                        <label>
                            <input type="checkbox" name="agree" id="agree" value="Y" class="chk radio" required>
                            I am at least 18 years of age and agree to the 
                            <a href="terms.php" target="_blank">Terms & Conditions</a> 
                            and 
                            <a href="privacy.php" target="_blank">Privacy Policy </a>. I understand that I will be billed the monthly price above with new product(s) being shipped approximately every 30 days under the subscribe & save option. And, I understand the health coach fee is non-refundable and is a one-time fee.
                        </label>
                    </div>
                    <div class="agreeTerms chk_1" style="display:none">
                        <input type="checkbox" name="is_reaccouring" id="is_reaccouring">
                        Subcribe and save
                    </div>

                    <div style="clear:both"></div>
                    <p class="d-flex text-start"><i class="fa fa-lock" aria-hidden="true"></i> Secure 256 Bit Encrypted Connection</p>
            </div>
            <div class="submit-popup" id="processingPopup">
                <div class="popup-content">
                    <div class="loading-animation"></div>
                    Please wait for 5 to 10 seconds while we process your request.
                    <img src="images/fancybox_loading.gif" alt="loader" class="loader">
                </div>
            </div>
            </form>
        </div>
        <!--From End-->
    </div>
</div>
<!----- Form ----->
</div>
</div>
<!----------------------Checkout End Here -------------------->


<!-----------FOOTER---------->
<div class="ftrstrip dsplay">
    <div class="container bdinpad">
        <ul class="ftrstrip-list dsplay">
            <li>
                <img src="images/safety.png" alt="">
                <p><span class="span1">Safe & Secure </span><br>
                    <span class="span2">Encrypted Checkout</span>
                </p>
            </li>
            <li>
                <img src="images/deliver.png" alt="">
                <p> <span class="span1">Fast Shipping</span><br>
                    <span class="span2">Across U.S.A. </span>
                </p>
            </li>
            <li>
                <img src="images/contact.png" alt="">
                <p><span class="span1">Phone & Email </span><br>
                    <span class="span2">Customer Support</span>
                </p>
            </li>
        </ul>
    </div>
</div>
<footer class="dsplay">
    <div class="container bdinpad">
        <p class="text-center s2txt bdfont">© 2023 REVOLT CBD</p>
        <ul class="ftrlist1">
            <li>Revolt CBD 216 S. 22nd Elwood, IN 46031 US </li>
            <li> support@tryrevoltcbd.com</li>
        </ul>
        <div class="ftrBox1">
            <p class="ftrbx1-t1"> * The product is not approved by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease. Photographs are for dramatization purposes only and may include models.
                Results may vary based on time and degree of product usage.</p>
        </div>


    </div>
</footer>

<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Open popup when link is clicked
        $("#openPopup").click(function() {
            $("#overlay").show();
            $("#popupBox").show();
        });

        // Close popup when link is clicked
        $("#closePopup").click(function() {
            $("#overlay").hide();
            $("#popupBox").hide();
        });

        // Close popup when clicking outside of it
        $(document).mouseup(function(e) {
            var popupContainer = $("#popupBox");

            if (!popupContainer.is(e.target) && popupContainer.has(e.target).length === 0) {
                popupContainer.hide();
                $("#overlay").hide();
            }
        });
    });
    window.addEventListener('load', function() {
        var checkbox = document.getElementById('agree');
        checkbox.checked = false;
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        function slideMenu() {
            var activeState = $("#menu-container .menu-list").hasClass("active");
            $("#menu-container .menu-list").animate({
                left: activeState ? "0%" : "-100%"
            }, 400);
        }
        $("#menu-wrapper, .menu-link").click(function(event) {
            event.stopPropagation();
            $("#hamburger-menu").toggleClass("open");
            $("#menu-container .menu-list").toggleClass("active");
            slideMenu();

            $("body").toggleClass("overflow-hidden");
        });


    });

    $(document).scroll(function() {

        if ($(this).scrollTop() > 110) {
            $('.top-fix-bar').addClass('fixed-nav');
        } else {
            $('.top-fix-bar').removeClass('fixed-nav');
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('.order-btn').click(function(e) {
            var selid = $(this).attr('data-id');
            $('.btn').text('Select');
            $(this).find('.btn').text('SELECTED');
            $('.order-btn').not(this).removeClass('picked');
            $(this).addClass('picked');
            $('input[type=checkbox]').prop("checked", false);
            $(this).find('[type=checkbox]').prop('checked', true);
            window.location.href = "checkout102c.html?pidx=" + selid;
        });

    });
</script><!---------------------Footer End Here -------------------->


<script type='text/javascript'>
    function newWindow(mypage, myname, w, h, features) {
        winl = 20;
        wint = 20;
        var settings = 'height=' + h + ',';
        settings += 'width=' + w + ',';
        settings += 'top=' + wint + ',';
        settings += 'left=' + winl + ',';
        settings += features;
        win = window.open(mypage, myname, settings);
        win.window.focus();
    }
</script>
<script>
    $(document).ready(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);


        $('.pd').hide();
        var selc_prc = urlParams.get('pidx');
        var selc_prc2 = urlParams.get('pidx2');


        var total = 0.00;
        var prod = '1';
        var prod2 = '2';
        var prod3 = '3';
        var healthCoach = '1111';

        if (selc_prc2 == healthCoach && selc_prc == prod) {
            $('#sub-tot2').html('$99.95');
            $('#sub-tot').html('$118.08');
            var subTotal1 = parseFloat($('#sub-tot').html().replace('$', ''));
            var subTotal2 = parseFloat($('#sub-tot2').html().replace('$', ''));
            total = subTotal1 + subTotal2;
            
            $(".tot-prc").html(total);
            $(".tot-prc2").html("$118.08");
            $(".tot-prc3").html("$99.95");
        }

        if (selc_prc2 == healthCoach && selc_prc == prod2) {
            $('#sub-tot2').html('$99.95');
            $('#sub-tot').html('$148.92');
            var subTotal1 = parseFloat($('#sub-tot').html().replace('$', ''));
            var subTotal2 = parseFloat($('#sub-tot2').html().replace('$', ''));
            total = subTotal1 + subTotal2;
            
            $(".tot-prc").html(total);
            $(".tot-prc2").html("$148.92");
            $(".tot-prc3").html("$99.95");
        }

        if (selc_prc2 == healthCoach && selc_prc == prod3) {
            $('#sub-tot2').html('$99.95');
            $('#sub-tot').html('$197.70');
            var subTotal1 = parseFloat($('#sub-tot').html().replace('$', ''));
            var subTotal2 = parseFloat($('#sub-tot2').html().replace('$', ''));
            total = subTotal1 + subTotal2;
            
            $(".tot-prc").html(total);
            $(".tot-prc2").html("$197.70");
            $(".tot-prc3").html("$99.95");
        }





        $('.prodcsel').find('input[type=checkbox]').prop("checked", false);
        $('.prodcsel').removeClass('picked');
        $(this).addClass('picked');

        $(this).find('[type=checkbox]').prop('checked', true);

        total = "$" + total.toFixed(2);
        $(".tot-prc").html(total);



    });
</script>


<?php
if (!empty($_GET['error'])) {
?>
    <script>
        $('html, body').animate({
            scrollTop: $("#errorhandling").offset().top
        }, 2000);
    </script>
<?php
}

?>
<script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
            var showShowing = $("#shipping-billing").html();


            $("#checkoutForm2").on("submit", function(e) {
                
                e.preventDefault();
                console.log("ajax load");
                $.ajax({

                    method: "POST",
                    url: "api/createOrder.php",
                    data: $(this).serializeArray(),

                    beforeSend: function() {
                        document.getElementById('processingPopup').style.display = 'block';

                    },

                    success: res => {
                        $.LoadingOverlay("hide");
                        console.log(res);
                        const data = JSON.parse(res);
                        console.log(data);
                        if (data.Status === 1) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                            });
                        } else if (res.includes("Invalid Credit Card Number")) {
                            document.getElementById('processingPopup').style.display = 'none';
                            $(".errorMessage").show();
                            $(".errorMessage")
                                .text("Your card was declined. Please check your card number, CVV, and expiration date again and then resubmit.");
                            $("html, body").animate({
                                scrollTop: $(".errorMessage").offset().top-100
                            }, 1000);
                            $(".errorMessage").animate({ marginLeft: '-=10px' }, 1000)
                                .animate({ marginLeft: '+=20px' }, 1000)
                                .animate({ marginLeft: '-=20px' }, 800)
                                .animate({ marginLeft: '+=20px' }, 400)
                                .animate({ marginLeft: '-=10px' }, 1000);

                            return false;
                        } else {

                            redirectToSubsPage();

                        }

                    }
                })

            });
            // Function to handle redirection
            function redirectToSubsPage() {
                const origin = window.location.origin;
                var pathArray = window.location.pathname.split('/');
                pathArray.pop();
                // var newURL = window.location.protocol + "//" + window.location.host + ("/" + pathArray.join("/") + "/dev/success.php").replace("//" , "/")+"?subs=" + subsValue
                var newURL = window.location.protocol + "//" + window.location.host + ("/" + pathArray.join("/") + "/success.php?prodId=34569").replace("//", "/")
                window.location.href = newURL;
            }



            $("input[name='inlineRadioOptions']").change(function() {
                if ($(this).val() === 'no') {
                    $("#shipping-billing").html(showShowing)
                    $("#shipping-billing").show();
                } else {
                    $("#shipping-billing").html('')
                    $("#shipping-billing").hide();

                }
            });


            $(".cc_number").on("change", function() {
                var e = $(".cc_number");
                e.hasClass("AX") ? $("#your-cvv").text("This 4-digit code can be found on the front of your American Express card, above your card number.") : (e.hasClass("VI") || e.hasClass("MC") || e.hasClass("DI"), $("#your-cvv").text("This 3-digit code can be found on the back of your card."))
            })
        }), $(".cc_number").on("keypress", function() {
            var e = $(".cc_number");
            e.hasClass("VI") ? ($("#your-card").attr("src", "assets/images/creditCard-visa.webp"), $("#cc_code").attr("maxlength", "3"), $("#cc_number").attr("maxlength", "19"), $("#cc_number").mask("0000 0000 0000 0000")) : e.hasClass("MC") ? ($("#your-card").attr("src", "assets/images/creditCard-mc.webp"), $("#cc_code").attr("maxlength", "3"), $("#cc_number").attr("maxlength", "19"), $("#cc_number").mask("0000 0000 0000 0000")) : e.hasClass("AX") ? ($("#your-card").attr("src", "assets/images/creditCards-amex.webp"), $("#cc_code").attr("maxlength", "4"), $("#cc_number").attr("maxlength", "18"), $("#cc_number").mask("0000 000000 00000")) : (e.hasClass("DI") ? $("#your-card").attr("src", "assets/images/creditCard-discover.webp") : $("#your-card").attr("src", "assets/images/creditCard-default.webp"), $("#cc_code").attr("maxlength", "3"), $("#cc_number").attr("maxlength", "19"), $("#cc_number").mask("0000 0000 0000 0000"))
        }), $("#cc_code").focus(function() {
            var e = $(".cc_number");
            e.hasClass("VI") ? $("#your-code").attr("src", "assets/images/creditCard-cvc.webp") : e.hasClass("MC") ? $("#your-code").attr("src", "assets/images/creditCard-cvc.webp") : e.hasClass("AX") ? $("#your-code").attr("src", "assets/images/creditCard-ccvc.png") : e.hasClass("DI") ? $("#your-code").attr("src", "assets/images/creditCard-cvc.webp") : $("#your-code").attr("src", "assets/images/creditCard-default.webp")
        }), $("#cc_code").blur(function() {
            var e = $(".cc_number");
            e.hasClass("VI") ? $("#your-card").attr("src", "assets/images/creditCard-visa.webp") : e.hasClass("MC") ? $("#your-card").attr("src", "assets/images/creditCard-mc.webp") : e.hasClass("AX") ? $("#your-card").attr("src", "assets/images/creditCard-amex.webp") : e.hasClass("DI") && $("#your-card").attr("src", "assets/images/creditCard-discover.webp")
        }),
        $(".validate-credit-card").on("input", function() {
            var e = $(this).val().replace(/\D/g, ""),
                t = !1,
                a = "";
            (e.match(/^4/) ? (a = "VI", $('input[name="cc_type"]').val(a), $('input[name="cc_number"]').mask("0000 0000 0000 0000"), $('input[name="cc_cvv2"]').mask("000"), $(".js-add-cc-type").removeClass("VI").removeClass("DI").removeClass("AX").removeClass("MC").addClass(a)) : e.match(/^5[1-5]/) ? (a = "MC", $('input[name="cc_type"]').val(a), $('input[name="cc_number"]').mask("0000 0000 0000 0000"), $('input[name="cc_cvv2"]').mask("000"), $(".js-add-cc-type").removeClass("VI").removeClass("DI").removeClass("AX").removeClass("MC").addClass(a)) : e.match(/^(?:6011|65[0-9]{2}|64[4-9][0-9])/) ? (a = "DI", $('input[name="cc_type"]').val(a), $('input[name="cc_number"]').mask("0000 0000 0000 0000"), $('input[name="cc_cvv2"]').mask("000"), $(".js-add-cc-type").removeClass("VI").removeClass("DI").removeClass("AX").removeClass("MC").addClass(a)) : e.match(/^(?:34|37)/) ? (a = "AX", $('input[name="cc_type"]').val(a), $('input[name="cc_number"]').mask("0000 000000 00000"), $('input[name="cc_cvv2"]').mask("0000"), $(".js-add-cc-type").removeClass("VI").removeClass("DI").removeClass("AX").removeClass("MC").addClass(a)) : ($('input[name="cc_type"]').val(""), $('input[name="cc_number"]').mask("0000 0000 0000 0000"), $('input[name="cc_cvv2"]').mask("000"), $(".js-add-cc-type").removeClass("VI").removeClass("DI").removeClass("AX").removeClass("MC")), e.match(/^4[0-9]{15}$/) ? t = !0 : e.match(/^5[1-5][0-9]{14}$/) ? t = !0 : e.match(/^(?:6011|65[0-9]{2}|64[4-9][0-9])[0-9]{12}$/) ? t = !0 : e.match(/^(?:34|37)[0-9]{13}$/) && (t = !0), t) ? function(e) {
                return !/[^0-9-\s]+/.test(e) && i(e)
            }(e) ? this.setCustomValidity(""): this.setCustomValidity(""): this.setCustomValidity("")
        }), $(".validate-credit-card").focusout(function() {
            $(this).val($.trim($(this).val()))
        }), $('input[name="cc_cvv2"]').focus(function() {
            $(".js-add-cc-type").addClass("cvv_view")
        }), $('input[name="cc_cvv2"]').focusout(function() {
            $(".js-add-cc-type").removeClass("cvv_view")
        }), $.isFunction($.fn.mask) && ("undefined" != typeof no_cc_mask && no_cc_mask || ($('input[name="cc_number"]').mask("0000 0000 0000 0000"), $('input[name="cc_expire_date_month_year"]').mask("00/00"), $('input[name="cc_cvv2"]').mask("000")));


    $(document).ready(function() {
        $(".cardYear").keyup(function(e) {
            formatString(e)
        });
    });

    function formatString(e) {
        var inputChar = String.fromCharCode(event.keyCode);
        var code = event.keyCode;
        var allowedKeys = [8];
        if (allowedKeys.indexOf(code) !== -1) {
            return;
        }

        event.target.value = event.target.value.replace(
            /^([1-9]\/|[2-9])$/g, '0$1/' // 3 > 03/
        ).replace(
            /^(0[1-9]|1[0-2])$/g, '$1/' // 11 > 11/
        ).replace(
            /^([0-1])([3-9])$/g, '0$1/$2' // 13 > 01/3
        ).replace(
            /^(0?[1-9]|1[0-2])([0-9]{2})$/g, '$1/$2' // 141 > 01/41
        ).replace(
            /^([0]+)\/|[0]+$/g, '0' // 0/ > 0 and 00 > 0
        ).replace(
            /[^\d\/]|^[\/]*$/g, '' // To allow only digits and `/`
        ).replace(
            /\/\//g, '/' // Prevent entering more than 1 `/`
        );
    }
    let timer = 1080; // 2 minutes in seconds
    let milSec = 60; // 2 minutes in seconds
    let interval;
</script>

</body>

</html>