<!-- JQuery Library -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<div id="loader" style="display:none"><i class="fa fa-spinner fa-spin"></i></div>
	<!-- Create page loader for user experience-->
	<script>
		// $('document').ready(function(){
			// $('#loader').delay(1000).fadeOut('slow')
		// })
	</script>
	
	<!-- bootstrap -->
	<script src="assets/js/bootstrap.min.js"></script>
	
	<!-- Owl Carousel Js -->
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<!-- form-validator Js-->
	<script src="assets/js/form-validator.js"></script>
	
	<!-- Js cookie Optional -->
	<script src="assets/js/cookie.js"></script>
	
	<!-- Wow js -->
	<script src="assets/js/wow.min.js"></script>
	
	<!--- Custom Script--->
	<script src="assets/js/tel-input/intlTelInput.js"></script>
	
	<!--- Custom Script--->
	<script src="assets/js/application.js"></script>
	<script src="assets/js/script.js"></script>
	<script>
	$(document).ready(function() {
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
			event.preventDefault();
			return false;
			}
		});
	});
	</script>
</body> 
</html>