<style>
span.p {
    display: inline-block;
    margin-right: 15px;
}
</style>
<div id="sign_up_modal" class="modal fade modal_form" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
        <form action="/action_page.php">
		  <div class="custom_input signup">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input id="signupName" type="text" class="form-control req-field"  placeholder="Name" required>
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
					<input id="signupEmail" type="email" class="form-control req-field email"  placeholder="Email" required>
					
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-phone"></i></span>
					<input id="signupPhone" type="phone" class="form-control req-field phone"  placeholder="Phone" required>
					
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input id="signup_password" placeholder="Enter Password" class="textbox-n form-control  req-field" type="password" required />
					
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input id="signup_c_password" placeholder="Confirm Password" class="textbox-n form-control req-field" type="password" required /> 
				</div>
			</div>
			<span id="alert"></span>
		  <button id="signuprequest" type="button" class="btn btn-default">Sign Up</button>
		  <p class='p hide'><a href="#">Forgot Your Password?</a></p>
		</form>
      </div>
    </div>

  </div>
</div>