<?php
if(isset($_SESSION['loginUserEmail'])){
   $userdata = get_record('users',"where email='$loginUserEmail'")[0];
     	extract($userdata);
   }
?>
<div class="top_sticky">
	<div class="">
		<div class="row">
			<div class="col-12 col-lg-8">
				<p class="offer">Its Limited Time Offer <strong data-toggle="modal" data-target="#sign_up_modal">Sign Up</strong> Now and Get <strong>30% Discount </strong></p>
			</div>
			<div class="col-12 col-lg-4 hidden-xs">
				<p class="btns">
					<a href="booking.php" class='btnSticky'><i class="fa fa-shopping-cart"></i> Order Now</a>
				</p>
			</div>
		</div>
	</div>
</div>

<span id="translate" style="top: 50%;position: fixed;color: #fff;background: #313131;font-size: 21px;z-index: 99;width: 40px;height: 40px;line-height: 40px;text-align: center;border-radius: 0px 4px 4px 0px;" class="fa fa-language"></span>
<span class="hidden" id="google_translate_element" style="top: 55%;position: fixed;color: #fff;border-radius: 0px 4px 4px 0px;background: #313131;z-index: 99;"></span>
<div class="header-top">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-6 hidden-xs">
				<p class="left-bar">
					<a href="mailto:<?php echo $site_email; ?>"><i class="fa fa-envelope-o"></i> <?php echo $site_email; ?></a>
					<a href="tel:<?php echo $site_phone; ?>"><i class="fa fa-phone"></i> <?php echo $site_phone; ?></a>
				</p>
			</div>
			<div class="col-xs-12 col-md-6">
				<?php
				if(!isset($_SESSION['loginUserEmail'])){
				?>
				<p class="right-bar">
					<a data-toggle="modal" data-target="#sign_up_modal"> Sign Up</a>
					<a data-toggle="modal" data-target="#sign_in_modal" class='active'><i class="fa fa-sign-in"></i> Sign In</a>
				</p>
				<?php
				}
				else{
				?>
				<div class="right-bar" style="float:right;text-align:inherit;">
				    <div class="dropdown">
				        
                      <button style="background:black;color:#fff" class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user-circle-o" style="color:#8bc34a"></i><?php echo $username; ?>
                      <span class="caret"></span></button>
                      <ul style="right: 0;left:inherit" class="dropdown-menu">
                        <li><a href="dashboard/index.php" ><i class="fa fa-home"></i>Dashboard </a></li>
                        <li><a href='signout.php' dclass='active'><i class="fa fa-sign-in"></i> LogOut</a></li>
                      </ul>
                    </div>
					<!---->
					<!---->
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</div>