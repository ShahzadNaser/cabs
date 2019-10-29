<div class="header">
		<div class="container">
			<nav class="navbar navbar-default custom_nav">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand text hidden" href="index.html"><?php echo $site_name; ?> </a>
				  <a class="navbar-brand img " href="index.php" ><img src="assets/images/logo.png"></a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					  <i class="fa fa-car"></i> Services <span class="caret"></span></a>
					  <ul class="dropdown-menu">
						<div class="row">
						    <div class="col-xs-12 col-md-4 wrap">
							<ul>
    						    <?php 
                                   $s=0;
                                   $services = get_record('services');
                                   foreach($services as $service){
                                   	$s++;
                                   	extract($service);
                                   	if($is_active){
                                ?>
								<li><a class="dropdown-item" href="services.php#<?php echo $id;?>"> <?php echo $service_title;?></a></li>
								<?php
                                   	}
								}?>
							</ul>
						</div>
						<div class="col-xs-12 col-md-4 wrap" >
							<h4>Airport Transfers</h4>
							<ul>
								<li><a class="dropdown-item" href="#">Heathrow airport services</a></li>
								<li><a class="dropdown-item" href="#">Gatwick Airport services</a></li>
								<li><a class="dropdown-item" href="#">London City Airport services</a></li>
								<li><a class="dropdown-item" href="#">Luton Airport services</a></li>
								<li><a class="dropdown-item" href="#">Stansted Airport Services</a></li>
							</ul>
						</div>
						<div class="col-xs-12 col-md-4">
							<h4>Sea port Transfers </h4>
							<ul>
								<li><a class="dropdown-item" href="#">Dover cruise port</a></li>
								<li><a class="dropdown-item" href="#">Harwich International Port</a></li>
								<li><a class="dropdown-item" href="#">Portsmouth cruise port</a></li>
								<li><a class="dropdown-item" href="#">Southampton cruise port</a></li>
								<li><a class="dropdown-item" href="#">Tilbury International Port</a></li>
						    </ul>
						</div>
					  </div>
					  </ul>
					</li>
					<li><a href="#">Areas we cover</a></li>
					<li><a href="booking.php">Book Now</a></li>
					<li><a href="contact-us.php">Contact Us</a></li>
					<li><a href="#aboutUs" class="scroll">About Us</a></li>
				  </ul>
				</div>
			</nav>
		</div>
	</div>