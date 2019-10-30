<?php
include('includes/db.php');
if(!isset($_POST['requestType']) && ($_POST['requestType']!='') ){
	die();
}
else {
	$requestType =	$_POST['requestType'];
}

if ($requestType=='signIn' ) {
	$email = $_POST['login_email'];
	$password = $_POST['login_password'];
	$usertype = $_POST['loginUserType'];
	$reslogin =	signIn($email, $password, $usertype);
	echo $reslogin;
}
else if ($requestType=='signUp_guest' ) {
	$email = $_POST['signup_email'];
	$name = $_POST['signup_name'];
	$phone = $_POST['signupPhone'];
	$password = $_POST['signup_password'];
	$usertype = $_POST['UserType'];
	$signupres = signUp_guest($email, $name, $phone, $password, $usertype);
	echo $signupres;
}

else if ($requestType=='signUp' ) {
	$email = $_POST['signup_email'];
	$name = $_POST['signup_name'];
	$phone = $_POST['signupPhone'];
	$password = $_POST['signup_password'];
	$usertype = $_POST['UserType'];
	$signupres = signUp($email, $name, $phone, $password, $usertype);
	echo $signupres;
}
else if ($requestType=='order') {
	 if (isset($loginUserEmail)) {
	$user_id = $loginUserEmail;
	$order_time = $_POST['order_time'];
	$order_date = $_POST['order_date'];
	$pickup_time = $_POST['pickup_time'];
	$pickup_date = $_POST['pickup_date'];
	$departure = $_POST['departure'];
	$stops = $_POST['stops'];
	$destination = $_POST['destination'];
	$trip_distance = $_POST['trip_distance'];
	$car_title = $_POST['car_title'];
	$fixed_charges = $_POST['fixed_charges'];
	$order_status = $_POST['order_status'];
	$user_type = $_POST['user_type'];
	order($user_id,$order_time,$order_date,$pickup_time,$pickup_date,
		$departure,$stops,$destination,$trip_distance,$car_title,$fixed_charges,$order_status,$user_type);
	}else{
		echo "nologin";
	}
}
else if ($requestType=='fixedorder' ) {
    if (isset($loginUserEmail)){
        $user_id = $loginUserEmail;
        $pickup_time = $_POST['pickup_time'];
        $pickup_date = $_POST['pickup_date'];
        $order_date = $_POST['order_date'];
        $car_id = $_POST['car_id'];
        $trip_data = $_POST['trip_data'];
        $user_type = $_POST['user_type'];
        $trip_data['fixed_price'];
        
        fixed_order($user_id,$order_date,$pickup_time,$pickup_date,$car_id,$trip_data,$user_type);
        $order_id = get_last_id('fixed_orders');
        $_SESSION['strip'] = strip_info($user_id,$order_id,$trip_data['fixed_price']);
    }else{
		echo "nologin";
	}
    
}

function strip_info($user,$order_id,$amount){
    empty($strip_info);
    $strip_info = array(
        'user' => $user,
        'order_id'=> $order_id,
        'amount' => $amount,
    );
    
    return json_encode($strip_info);
}

if ($requestType=='price_range' ) {
	$totalDistance = $_POST['totalDistance'];
	if($_POST['tripType'] == "by_miles"){
		echo get_val('price_range','price',"where range_start<$totalDistance AND range_end>$totalDistance");
	}else{
		$car_title = $_POST['carTitle'];
		$from = $_POST['from'];
		$to = $_POST['to'];
		$car_id = get_val('cars','id',"where car_title = '$car_title'");
		echo get_val('fixedtrips','fixed_price',"where car_id = $car_id AND starting_point = '$from' and ending_point= '$to' and is_active =1");
	}
	
	//echo $totalDistance;
}
 ?>