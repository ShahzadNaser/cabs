<?php include('includes/db.php');?>
<?php
//clear session
signOut();
//redirect
if($user_type=='admin' or $user_type=='admin_user'){
	header('location:signin.php');
}
else{
	header('location:../index.php');
}

?>