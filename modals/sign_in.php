<style>
span.p {
    display: inline-block;
    margin-right: 15px;
}
</style>
<div id="sign_in_modal" class="modal fade modal_form" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In</h4>
      </div>
      <div class="modal-body">
       <form action="/action_page.php">
		  <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
			<input type="email" class="form-control req-field email" id="login_email" placeholder="Your Email" />
		  </div>
		  <div class="input-group">
			<span class="input-group-addon"><i class="fa fa-lock"></i></span>
			<input type="password" class="form-control req-field" id="login_password" placeholder="Your Password"/>
		  </div>
      <button id="btnlogin" type="button" class="btn btn-default">Login</button>
      <div>
        <span class='p'><a href="#">Forgot Your Password?</a></span>
        <span class='addwarrning'></span>
      </div>
    </form>
      </div>
    </div>

  </div>
</div>