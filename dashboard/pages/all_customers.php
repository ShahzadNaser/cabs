<?php 
 $userdata = get_record('users',"where user_type='user' or user_type='guest'");
 if(isset($_GET['action']) && $_GET['action']=='status')
{
	$set_status = $_GET['actionVal'];
	$user_id = $_GET['user_id'];

	if($set_status=='deactive'){
		update('users',array('is_del'=>0),"where id=$user_id");
	}else{
		update('users',array('is_del'=>1),"where id=$user_id");
	}

	redirect('index.php?p=users');
}
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
		  
		  <h2 class="section-title">All Customers</h2>

		  <div class="table-responsive">
			<table class="table">
			<tr>
				<th class="active">User Name</th>
				<th class="active">Email</th>
				<th class="active">User Type</th>
				<th class="active">Orders</th>
				<th class="active">Operations</th>
			</tr>
			<?php 
			foreach($userdata as $user){
				extract($user);
			?>
			<tr>
				<td><?php echo $username;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $user_type;?></td>
				<td><?php echo order_counter($email);?></td>
				<td>
					<div class="dropdown">
					  <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    <li><a href="index.php?p=user_profile&&c_id=<?php echo $id?>">View Profile</a></li>
					    <li><a href="index.php?p=customer_orders&&c_id=<?php echo $email?>">View Orders</a></li>
					  </ul>
					</div>
					
					<?php 
                      if($is_del==1){
                      ?>
                      <a href="index.php?p=users&&action=status&&actionVal=deactive&&user_id=<?php echo($id);?>" class='badge badge-danger'>Deactivate User</a>
                      <?php 
     				  }else{
                      ?>
                      <a href="index.php?p=users&&action=status&&actionVal=active&&user_id=<?php echo($id);?>" class='badge badge-success'>Activate User</a>
                      <?php 
    				  }
                      ?>
				</td>

			</tr>
			<?php 
			 }
			?>
		  </table>
		  </div>
   </div>
</div>
