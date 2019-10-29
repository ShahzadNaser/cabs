
<?php
$userid= $_GET['c_id'];

?>
<?php 
   $userdata = get_record('users',"where id=$userid")[0];
   extract($userdata);

?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-6">
      <form action="/action_page.php">
         <div class="form-section" id="Myprofile">
			<h2 class="section-title">My Profile</h2>
            <div class="form-group">           
               <input type="name" class="form-control" id="name" placeholder="Full Name"value="<?php echo $username;?>" name="name"/>
			   <span class="edit">Edit</span>
            </div>
            <div class="form-group">
               <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email;?>"/>
			   <span class="edit">Edit</span>
            </div>
            <div class="form-group">
               <input type="phone" class="form-control" id="phone1" placeholder="Phone 1" name="phone" value="<?php echo $phone;?>"/>
			   <span class="edit">Edit</span>
            </div>
         </div>
         <div class="form-section" id="password">
            <h2 class="section-title">Change Password</h2>
            <div class="form-group">
               <input type="password" class="form-control" id="cpassword" placeholder="Current Password" />
            </div>
            <div class="form-group">
               <input type="password" class="form-control" id="newpwd" placeholder="New Password" />
            </div>
            <div class="form-group">
               <input type="password" class="form-control" id="confirmpwd" placeholder="Confirm Password" />
            </div>
            <button type="submit" class="btn btn-default">Save Changes</button>
         </div>
      </form>
   </div>
</div>