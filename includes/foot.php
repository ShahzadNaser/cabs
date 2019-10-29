    <?php include('chat.php')?>
    <!-- JQuery Library -->
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<!--google translator-->
	<script type="text/javascript"> 
    function googleTranslateElementInit() { 
    new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element'); 
    } 
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> 
    
    
	<!-- Create page loader for user experience-->
	<script>
		$('document').ready(function(){
			$('#loader').delay(1000).fadeOut('slow')
		})
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
	
	<!-- tel-input js -->
	<script src="assets/js/tel-input/intlTelInput.min.js"></script>
	
	<!-- tel-input js -->
	<script src="assets/js/jquery.lazy.min.js"></script>
	
	<script src="assets/js/script.js"></script>
	<script src="assets/js/application.js"></script>
	<script>
	$('.btnChat').click(function(){
	    $('.chat_popup').slideDown('slow');
	})
	$('.btnClosePopup').click(function(){
	    $('.chat_popup').slideUp('fast');
	})
	
	</script>
</body> 
</html>