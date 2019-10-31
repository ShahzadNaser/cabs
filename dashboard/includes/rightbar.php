<div class="rightbar">
	<?php include('includes/header.php');?>
	<div class="content-wrapper">
		<?php
			if(isset($_GET['p'])){
				$page= $_GET['p'];
			}else{
				if($user_type=='admin'){
					$page = 'dashboard';
				}else{
					$page = 'profile';
				}

			}
			include('pages/'.$page.'.php');
		?>
	</div>
</div>	