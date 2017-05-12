<a href="#" class="scrollToTop"><img src="{{ URL::asset('assets/images/scroll.jpg') }}" width="50" height="50"  alt=""/></a>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<script src="{{ URL::asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/functions.js') }}"></script>
<script>
$(document).ready(function() {

      //feature-slider
      var owl = $("#feature-slider");

      owl.owlCarousel({

          itemsCustom : [
            [0, 2],
            [450, 3],
            [600, 3],
            [700, 3],
            [1000, 5],
            [1200, 5],
            [1400, 5],
            [1600, 5]
          ],
          navigation : true,
          autoPlay: true,
    	  stopOnHover : true
      });

	  //main-slider
	    $("#main-slider").owlCarousel({

	  autoPlay: true,
	  stopOnHover : true,
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true

      // "singleItem:true" is a shortcut for:
      // items : 1,
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false

  });

  //Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

    $('#date_of_birth').datepicker({

        format: 'yyyy-mm-dd'

      });
});



</script>