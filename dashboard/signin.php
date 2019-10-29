<?php include('includes/head.php');?>
<?php
if(isset($_SESSION['loginUserType'])){
    header('location:index.php');
}
if(isset($_POST['signin'])){
	$email= $_POST['email'];
	$password= $_POST['password'];
	$userType = $_POST['userType'];
	 $signIn = json_decode(signIn($email, $password, $userType),true)['status'];
	if ($signIn=='true') {
	     $msg = "valid";
		 header('location:index.php');
	}else{
	     $msg = "Invalid login";
	}
}
?>
<style>
#loginbox {
    margin: 50px 0px;
    border: 1px solid #f0f0f0;
    background: #f9f9f9;
    box-shadow: 0px 0px 4px -2px #ddd;
}
#loginbox .form-header{
    background:#f74b85;
    padding: 20px;
    position:relative;
}
#loginbox .form-header h1{
    margin: 0px;
    font-size: 21px;
    color: #fff;
}
#loginbox .form-header h1 span{
    text-align: center;
    margin: 0px;
    font-size: 15px;
    color: #fff;
    float:right;
}
#loginbox .form-body{
   padding: 20px; 
}
</style>
<div class="main">
    <div class="container">
        <div class="mainbox col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2">
            <div id="loginbox" style="">
                <form id="loginform" method='post' class="form-horizontal">
                    <div class="form-header">
                        <h1>Admin Login<span>Mini Cabs</span></h1>
                    </div>
                    <div class="form-body">
                        <label>User Type</label>    
                        <div style="margin-bottom: 25px" class="">
                            <select type="email" class="form-control" name="userType">
                                <option value="admin">Admin</option>
                                <option value="admin_user">User</option>
                            </select>
                        </div>
                        <label>Your Email</label>    
                        <div style="margin-bottom: 25px" class="input-group">
                            <input id="login-username" type="email" class="form-control" name="email" value="" placeholder="Email" required/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        </div>
                        <label>Your Password</label> 
                        <div style="margin-bottom: 25px" class="input-group">
                            <input id="login-password" type="password" class="form-control" name="password" placeholder="Password" required/>
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-sm-12 controls">
                                <button id="btn-login" type="submit" name="signin" class="btn btn-success">Login </button>
                                <br> <br>
                                <p>
                                    <?php if(isset($msg)){echo $msg;}?>
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
<?php include('includes/popup.php');?>
<?php include('includes/foot.php');?>
	