<?php include('includes/head.php');?>
<!--header top-->
<?php include('includes/header-top.php');?>
<!--main header-->
<?php include('includes/header.php');?>	
	<section class="about-page brand-cumb">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 no-padding-right">
					<div class="box wow fadeIn" data-wow-delay="0.5s">
						<h4>Our services</h4>
						<p>You may contact us at any time, we are ready to chat with you for 24X7 Days</p>						
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	<section class="services_page">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-7 no-padding-right">
					<div class="box wow fadeIn" data-wow-delay="0.5s">
					    <?php 
                           $s=0;
                           $services = get_record('services');
                           foreach($services as $service){
                           	$s++;
                           	extract($service);
                           	if($is_active){
                        ?>
						<h4 id="<?php echo $id;?>"><?php echo $service_title;?></h4>
						<div id="description"><?php echo $service_description;?></div>
						<?php
					       	}
						}?>
					</div>
				</div>
				<div class="col-xs-12 col-md-3  col-md-offset-1 no-padding-right hidden-xs">
					<div class="box wow fadeIn" data-wow-delay="0.5s">
						<img src="assets/images/team/about1.png" class="img-responsive">					
					</div>
				</div>
			</div>
		</div>
	</section>
<?php include('includes/footer.php');?>
<?php include('includes/foot.php');?>
