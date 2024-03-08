<?php include_once 'header.php'; 
?>
    
    <div class="inner-bnr">
      <div class="container">
        <p class="bdhding_main">Contact Us</p>
      </div>
    </div>
<div class="tems_bg contact_details">	
	<div class="container">
        <div class="trm-bx ">
           <p> <b>Revolt CBD</b></p>
            <p><b>Corporate Address :</b> Revolt CBD 216 S. 22nd Elwood, IN 46031 US</p>
            <p><b>Customer Service Email :</b> support@tryrevoltcbd.com</p>
            <p><b>Customer Service Phone : 833-855-7732</p>
            <p><b>Return Address:</b> Revolt CBD 216 S. 22nd Elwood, IN 46031 US</p>
            <p><b>Address:</b> Revolt CBD 216 S. 22nd Elwood, IN 46031 US</p>
            <p><b>Monday - Friday, 9AM - 6PM</b></p>
            <p><b>If you would like to cancel your order, please contact customer support or email </b>support@tryrevoltcbd.com</p>
        </div>
	</div>
</div>


<!-----------FOOTER---------->
<div class="ftrstrip dsplay">
	<div class="container bdinpad">
    	<ul class="ftrstrip-list dsplay">
        	<li>
                <img src="images/safety.png" alt="">
                <p><span class="span1">Safe & Secure </span><br>
                <span class="span2">Encrypted Checkout</span></p>
            </li>
            <li>
            	<img src="images/deliver.png" alt="">
               <p> <span class="span1">Fast Shipping</span><br>
                <span class="span2">Across U.S.A. </span></p>
            </li>
            <li>
            	<img src="images/contact.png" alt="">
                <p><span class="span1">Phone & Email </span><br>
                <span class="span2">Customer Support</span></p>
            </li>
        </ul>
    </div>
</div>
<footer class="dsplay">
	<div class="container bdinpad">
    	<p class="text-center s2txt bdfont">© 2023 REVOLT CBD</p>
        <ul class="ftrlist1">
        	<li>Revolt CBD 216 S. 22nd Elwood, IN 46031 US          </li>
            <li>  support@tryrevoltcbd.com</li>
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
$(document).ready(function(){  	
  function slideMenu() {
    var activeState = $("#menu-container .menu-list").hasClass("active");
    $("#menu-container .menu-list").animate({left: activeState ? "0%" : "-100%"}, 400);
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
	
	if ($(this).scrollTop() > 110){
	   $('.top-fix-bar').addClass('fixed-nav');	   	 
	}else{
		$('.top-fix-bar').removeClass('fixed-nav');		
	}
});


</script>
 

</body>

</html>
