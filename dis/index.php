<?php

session_start();

include_once 'api/config.php';

if (!empty($_REQUEST['affid']))
    $_SESSION['affid'] = $_REQUEST['affid'];
elseif (!empty($_REQUEST['affId']))
    $_SESSION['affid'] = $_REQUEST['affId'];
else
    $_SESSION['affid'] = '';

if (!empty($_REQUEST['c1']))
    $_SESSION['c1'] = $_REQUEST['c1'];
elseif (!empty($_REQUEST['C1']))
    $_SESSION['c1'] = $_REQUEST['C1'];
else
    $_SESSION['c1'] = '';

?>
<?php include_once 'header.php'; 
?>
<!-----------BANNAR SECTION------->
    <div class="banner dsplay">
        <div class="container position bdinpad equalheight">
            <div class="col-7 text-ceter equalheight_content ">
			 <h1 class="bdhding_main" style="color:#ff0000">Discount Applied<br />
                   </h1><br/>
                <h1 class="bdhding_main">Feel Your Best With<br />
                    Revolt CBD, Everyday!</h1>

                <p class="bnrtxt">Revolt CBD offers premium level CBD products. All of our products go through
                    rigorous testing. Revolt CBD has the best customer ratings in the US. </p>

                <div class="clearall"></div>
                <a href="javascript:bookmarkscroll.scrollTo('select');" class="bnrbtn mobile-hide">Purchase Now</a>
            </div>
            <div class="col-5 text-center equalheight_content">
                <img src="images/main_product.png" />
                <a href="javascript:bookmarkscroll.scrollTo('select');" class="bnrbtn mobile-show">Purchase Now</a>
            </div>

        </div>
    </div>

    <div class="bottom-arrow"></div>

    <!-----------SECTION2---------->
    <div class="sec2 dsplay" id="select">
        <div class="container">
            <h2 class="sub-heading red">Make Your Best, Better </h2>
            <h2 class="sub-heading-large">Revolt CBD Best Sellers </h2>



            <div class="prodBox">
                <div class="prodbox-row">
                    <div class="prod-headbox">
                        <img src="images/product1.png">
                        <p class="prodbx-head red">Revolt CBD Gummies</p>
                        <p class="prodbx-para">2 Packets</p>

                    </div>
                    <p class="mg-txt">Price: <span>$88.45</span> </p>
                    <div class="clearall"></div>
                    <a href="javascript:void(0)" data-id="1" class="small_btn order-btn">Claim Discount Now</a>
                </div>

                <div class="prodbox-row">
                    <div class="prod-headbox">
                        <img src="images/product2.png">
                        <p class="prodbx-head red">Revolt CBD Gummies</p>
                        <p class="prodbx-para">3 Packets</p>


                    </div>
                    <p class="mg-txt">Price: <span>$111.38</span> </p>
                    <div class="clearall"></div>
                    <a href="javascript:void(0)" data-id="2" class="small_btn order-btn">Claim Discount Now</a>
                </div>

                <div class="prodbox-row">
                    <div class="prod-headbox">
                        <img src="images/product3.png">
                        <p class="prodbx-head red">Revolt CBD Gummies</p>
                        <p class="prodbx-para">5 Packets</p>


                    </div>
                    <p class="mg-txt">Price: <span>$145.93</span> </p>
                    <div class="clearall"></div>
                    <a href="javascript:void(0)" data-id="3" class="small_btn order-btn">Claim Discount Now</a>
                </div>



            </div>



        </div>
    </div>
    <div class="bottom-arrow-light"></div>
    <!-----------SECTION3---------->
    <div class="sec3 dsplay" id="about">
        <div class="container bdinpad">
            <h2 class="sub-heading red">Be The Best Version Of Yourself </h2>
            <h2 class="sub-heading-large uppercase">Experience The Revolt CBD Difference </h2>


            <p class="s2txt bdfont">At Revolt CBD, we are committed to formulating CBD products that harness the power of quality & safe ingredients. </p>
        </div>
        <div class=" padding_largetop dsplay">
            <div class="container bdinpad position">
                <div class="s2bx-lft">
                    <img src="images/main_product.png" />
                </div>
                <div class="s2bx-rgt align-left">
                    <h2 class="sub-heading-large align-left  red">Safe, Non-Habit Forming,
                        Effective and 100% Legal!</h2>
                    <ul class="safe-list-item">
                        <li> <img src="images/check.png" /> 5 Star Ratings</strong> </li>
                        <li><img src="images/check.png" />Highest Quality</strong> </li>
                        <li> <img src="images/check.png" />Best Customer Satisfaction</li>
                        <li> <img src="images/check.png" />Next Day Shipping</li>
                        <li> <img src="images/check.png" />Made in the <strong>USA</strong> </li>

                    </ul>
                    <a href="javascript:bookmarkscroll.scrollTo('select');" class="large_btn">Purchase Now</a>
                </div>

            </div>
        </div>
    </div>

    <!-----------SECTION4---------->
    <div class="sec4 dsplay">
        <div class="container bdinpad">
            <h2 class="sub-heading red">A CBD Brand You Can Trust</h2>
            <h2 class="sub-heading-large uppercase">The Revolt CBD Promise</h2>

            <p class="s2txt bdfont">Revolt CBD products are made with premium CBD that are processed at a certified facility to meet & exceed industry standards </p>
            <ul class="s4list dsplay bdfont">
                <li>
                    <img src="images/icon1.png" alt="">
                    Tested For Purity
                </li>
                <li>
                    <img src="images/icon2.png" alt="">
                    Quality CBD
                </li>

                <li>
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
            <a href="javascript:bookmarkscroll.scrollTo('select');" class="s4btn">Shop Now</a>
        </div>
    </div>

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
                <p class="ftrbx1-t1"> * The product is not approved by the FDA. This product is not intended to diagnose, treat, cure, or prevent any disease.</p>
            </div>


        </div>
    </footer>


    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/slick.js"></script>
    <script type="text/javascript" src="js/popupwindow.js"></script>
    <script src="js/bookmarkscroll.js"></script>
    <script src="js/common.js"></script>
    <script type="text/javascript" src="js/jquery.h5validate.js"></script>
    <script type="text/javascript" src="js/jquery.maskedinput.min.js"></script>
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

            $('.s2-slider-nav').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                asNavFor: '.s2-slide-div',
                dots: false,
                centerMode: false,
                focusOnSelect: true,
                arrows: false,

            });

            $('.s2-slide-div').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                arrows: false,
                dots: false,
                autoplaySpeed: 11000,
                asNavFor: '.s2-slider-nav',

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
                window.location.href = "checkout.php?pidx=" + selid;
            });

        });
    </script>
</body>

</html>