<?php include('includes/head.php');?>
<?php 
if(!isset($_SESSION['loginUserType'])){
    header('location:signin.php');
}
?>
<div class="main">
	<?php include('includes/leftbar.php');?>	
	<?php include('includes/rightbar.php');?>	
</div>
<?php include('includes/popup.php');?>
<?php include('includes/foot.php');?>
	
	
