<?php
$userdata = get_record('users',"where user_type='admin_user'");

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

<?php 
if(!isset($_GET['action'])){
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
		  
		  <h2 class="section-title">All Customers <a href="index.php?p=users&&action=add" class="btn btn-primary pull-right">Add User</a></h2>
		  <br>

		  <div class="table-responsive">
			<table class="table">
			<tr>
				<th class="active">User Name</th>
				<th class="active">Email</th>
				<th class="active">Password</th>
				<th class="active">Operations</th>
			</tr>
			<?php 
			foreach($userdata as $user){
				extract($user);
			?>
			<tr>
				<td><?php echo $username;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $password;?></td>
				<td>
				    <a href="index.php?p=user_profile&&c_id=<?php echo $id?>" class="badge badge-success">Edit</a>
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
<?php 
}?>

<?php
if(isset($_GET['action']) && $_GET['action']=='add'){
    if(isset($_POST['addUser'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if(record_exist('users',"where email='$email' and user_type='admin_user'")===false){
            $data = array(
                'username'=>$username,
                'email'=>$email,
                'password'=>$password,
                'user_type'=>'admin_user'
            );
            if(insert_record('users',$data)){
                redirect('index.php?p=users');
            }else{
                 $msg = 'Error';
            }
        }else{
             $msg = 'This user already exist, please change email';
        }
        
        
    }
?>
<div class="row">
    
   <div class="col-xs-12 col-md-6">
     <h2 class="section-title">Add Car<a href="index.php?p=users" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>   
      <br>
      <form class='popup-input' method="post" action="#">
		  <div class="form-group">
		  	<label>User name</label>
			<input type="text" class="form-control" name="username" placeholder="User name" required/>
		  </div>
		  <div class="form-group">
		  	<label>Email</label>		  	
			<input type="text" class="form-control" name="email" placeholder="Email" required//>
		  </div>
		  <div class="form-group">
		  	<label>Password</label>
			<input type="text" class="form-control" name="password" placeholder="Password" required/>
		  </div>
          <button type="submit" name="addUser" class="btn btn-primary">Add </button>
          <a href="index.php?p=users" class="btn btn-default">Back</a>
          <br><br>
          <p><?php if(isset($msg)){echo  $msg;}?><p>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>

