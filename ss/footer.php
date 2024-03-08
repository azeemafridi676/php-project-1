
 
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