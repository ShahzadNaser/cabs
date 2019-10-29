	<section class="section footer wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-3">
					<a href="index.php" class="logo"><img src="https://taxiwordpress.com/wp-content/uploads/2016/03/logo_white.png" alt=""></a>
					<p class='logo_txt'>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
				</div>
				<div class="col-12 col-md-3">
					<h4>Useful Links</h4>
					<ul class="links">
						<li><a href="faqs.php">FAQ's</a></li>
						<li><a href="booking.php">Book Now</a></li>
						<li><a href="#aboutUs"  class="scroll">About us</a></li>
						<li><a href="#contactus"  class="scroll">Contact us</a></li>
						<li><a href="privacy-policy.php">Privacy Policy</a></li>
						<li><a href="term-of-use.php">Term Of Use</a></li>
					</ul>
				</div>
				<div class="col-12 col-md-3">
					<h4>Our Vehicals</h4>
					<ul class="links">
						<li><a href="#">BMW</a></li>
						<li><a href="#">Ferrari</a></li>
						<li><a href="#">Toyota Corrola</a></li>
						<li><a href="#">Cadillac</a></li>
						<li><a href="#">Audi</a></li>
					</ul>
				</div>
				<div class="col-12 col-md-3">
					<h4>Address</h4>
					<ul class="address">
						<li><a href="#"><i class="fa fa-map-marker"></i> 125-720 King Street West, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Toronto,     ON, Canada</a></li>
						<li><a href="tel:<?php echo $site_phone; ?>"><i class="fa fa-phone"></i> <?php echo $site_phone; ?></a></li>
						<li><a href="mailto:<?php echo $site_email; ?>"><i class="fa fa-envelope"></i> <?php echo $site_email; ?></a></li>
						<li><a href="#"><i class="fa fa-comment-o"></i> Live Chat</a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="footer_bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
				<p>
			© Copyright All Rights Reserved 2019 <span class='pull-right'> Developed By <a href="http://www.hiddenlogics.com/">hiddenlogics</a> </span>
		</p>
				</div>
			</div>
		</div>
		
	</section>		
	<div id="loader"><i class="fa fa-spinner fa-spin"></i></div>
	
	<!-- sample modal -->
	<div id="sampleModel" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
		  <div class="modal-body">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <!-- Wrapper for slides generate dynamically from your sample gallery-->
			  <div class="carousel-inner">
				
			  </div>

			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
		  </div>
		</div>

	  </div>
	</div>
	<?php include('modals/sign_in.php');?>
	<?php include('modals/sign_up.php');?>