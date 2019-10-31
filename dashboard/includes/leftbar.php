<div class="leftbar">
		<span class="heading"></span>
		<ul>
			<li><a href="../" class=""><i class="fa fa-home"></i> Home</a></li>
			<?php
			if($user_type=='admin'){
			?>
			<li><a href="index.php?p=dashboard" class="<?php if(isset($_GET['p']) && $_GET['p']=='dashboard'){echo 'active';}?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
			<?php 
				}
			?>
			<li><a href="index.php?p=profile" class="<?php if(isset($_GET['p']) && $_GET['p']=='profile'){echo 'active';}?>"><i class="fa fa-user"></i> Profile</a></li>
			<?php
			if($user_type=='user'){
			?>
			<li><a href="index.php?p=orders" class="<?php if(isset($_GET['p']) && $_GET['p']=='orders'){echo 'active';}?>"><i class="fa fa-first-order"></i>My Orders</a></li>
			<?php
			}
			?>
			<?php
			if($user_type=='admin' or $user_type=='admin_user'){
			?>
    			<li><a href="index.php?p=all_customers" class="<?php if(isset($_GET['p']) && $_GET['p']=='all_customers'){echo 'active';}?>"><i class="fa fa-users"></i> All Customers</a></li>
    			<li><a href="index.php?p=orders" class="<?php if(isset($_GET['p']) && $_GET['p']=='orders' ){echo 'active';}?>"><i class="fa fa-list"></i>Orders</a></li>
    			<li><a href="index.php?p=fixed_orders" class="<?php if(isset($_GET['p']) && $_GET['p']=='fixed_orders' ){echo 'active';}?>"><i class="fa fa-list"></i>Fixed Trip Orders</a></li>
    			<li><a href="index.php?p=cars" class="<?php if(isset($_GET['p']) && $_GET['p']=='cars'){echo 'active';}?>"><i class="fa fa-car"></i> All Cars</a></li>
    			<li><a href="index.php?p=fixed_trips" class="<?php if(isset($_GET['p']) && $_GET['p']=='fixed_trips'){echo 'active';}?>"><i class="fa fa-road"></i> Fixed Trips</a></li>
    			<li><a href="index.php?p=price_range" class="<?php if(isset($_GET['p']) && $_GET['p']=='price_range'){echo 'active';}?>"><i class="fa fa-dollar"></i> Price Range</a></li>
    			<li><a href="index.php?p=services" class="<?php if(isset($_GET['p']) && $_GET['p']=='services'){echo 'active';}?>"><i class="fa fa-car"></i> Services</a></li>
    			<li><a href="index.php?p=offer" class="<?php if(isset($_GET['p']) && $_GET['p']=='offer'){echo 'active';}?>"><i class="fa fa-tag"></i> Offer</a></li>
			<?php
			}
			?>
			
			<?php
			if($user_type=='admin'){
			?>
    			<li><a href="index.php?p=users" class="<?php if(isset($_GET['p']) && $_GET['p']=='users'){echo 'active';}?>"><i class="fa fa-user-secret"></i> Users</a></li>
			<?php
			}
			?>
		</ul>
		<ul class='foot hidden'>
			<li><i class="fa fa-user"></i></li>
		</ul>
	</div>