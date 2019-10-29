<?php 
  
 $usertype = get_record('users',"where email='$loginUserEmail'")[0];
   extract($usertype);
   echo $user_type;
   if($user_type=='admin'){
   	 $userdata = get_record('users');
   extract($userdata);
   }else{
   	   $userdata = get_record('orders',"where user_id='$loginUserEmail'");
   		extract($userdata);
   }
 
//    echo"<pre>";
//    print_r($userdata);
//    echo"</pre>";
   
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
		  
		  <h2 class="section-title">Customer List</h2>

		  <div class="table-responsive">
			<table class="table">
			<tr>
				<th class="active">#</th>
				<th class="active">User Name</th>
				<th class="active">Email</th>
				<th class="active">Orders</th>
				<th class="active">Operations</th>
			</tr>
			<?php 
			foreach($userdata as $user){
				extract($user);
			?>
			<tr>
				<td><?php echo $id;?></td>
				<td><?php echo $username;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo '(10)';?></td>
				<td>
					<div class="dropdown">
					  <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    <li><a href="index.php?p=user_profile&&c_id=<?php echo $id?>">View Profile</a></li>
					    <li><a href="index.php?p=customer_orders&&c_id=<?php echo $email?>">View Orders</a></li>
					  </ul>
					</div>
				</td>

			</tr>
			<?php 
			 }
			?>
		  </table>
		  </div>
   </div>
</div>
