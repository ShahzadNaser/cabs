<?php
session_start();
$db = new mysqli('localhost','root','','cabs');
// $db = new mysqli('localhost','hiddybli_cabs','P(i(2I)rzqO#','hiddybli_cabs');
//date_default_timezone_set("Asia/Karachi");
$date = date('Y-m-d');
$time = date("h:i:sa");
$currency = '£';
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
if(isset($_SESSION['loginUserEmail'])){
	$loginUserEmail = $_SESSION['loginUserEmail'];
	$user_type = $_SESSION['loginUserType'];
}
function unpublish_offer(){
	global $db;
    $query = "update offer set status='unpublished'";
	$queryRun = $db->query($query);

    if($queryRun){
        return true;
    }else{
        return false;
    }
}
function get_offer(){
     $today =  date("Y-m-d");
    //return get_val('offer','percentage',"WHERE date_start >= $today and date_end <= $today and status = 'published'");
    $getOffer= get_record('offer',"WHERE '$today' BETWEEN offer.date_start AND offer.date_end AND status='published'")[0];
    extract($getOffer);
    
    return "$percentage:$offer_type";
}
function price_after_discount($actualPrice,$offer_type,$offer_amount){
    $calc = $actualPrice*$offer_amount/100;
    $calc = (float)$calc;
    $total;
    //check offer type
    if($offer_type=='discount'){
        $total = $actualPrice-$calc;
    }else{
        $total = $actualPrice+$calc;
    }
    $total = round($total,2);
    return $total;
}  

//echo price_after_discount(123,'discount',10);
function signIn($email,$password,$user_type){
	global $db;
	$query = "select * from users where email='$email' AND password='$password' AND user_type='$user_type' AND is_del=1";
	$query = $db->query($query);
	$result = $query->num_rows;
	if($result>0){
		$_SESSION['loginUserEmail'] = $email;
		$_SESSION['loginUserType'] = $user_type;
		return json_encode(array('msg'=>'login success','status'=>'true'));
	}else{
		return json_encode(array('msg'=>'login failed','status'=>'false'));
	}
}
function order_counter($user_email){
    global $db;
	$query = "select * from orders where user_id='$user_email'";
	$query = $db->query($query);
	$result = $query->num_rows;
	
	return $result;
}
function signUp($email, $name, $phone, $password){
	if(record_exist('users',"where email='$email'")===false){
		$data = $arrayName = array(
			'email' => $email, 
			'username' => $name,
			'phone' => $phone,
			'password' => $password,
			'user_type' => 'user'
		);

		if (insert_record('users', $data)==true) {
			 signIn($email,$password,'user');
			 return json_encode(array('msg'=>'login success','status'=>'true'));
		}
		else{
			return json_encode(array('msg'=>'login failed','status'=>'false'));
		}
	}
	else{
		return json_encode(array('msg'=>'Registration failed','status'=>'exist'));
	}

}
// sign up guest
function signUp_guest($email, $name, $phone, $password){
		$data = $arrayName = array(
			'email' => $email, 
			'username' => $name,
			'phone' => $phone,
			'password' => $password,
			'user_type' => 'guest'
		);
		if (insert_record('users', $data)==true) {
			 signIn($email,$password,'guest');
			 return json_encode(array('msg'=>'login success','status'=>'true'));
		}
		else{
			return json_encode(array('msg'=>'login failed','status'=>'false'));
		}
	
}
function trip_cost($trip_distance,$fixed_charges){
	return $trip_distance*$fixed_charges;
}
// book ride
function order($user_id,$order_time,$order_date,$pickup_time,$pickup_date,
  $departure,$stops,$destination,$trip_distance,$car_title,$fixed_charges,$order_status,$user_type){

		$data = $arrayName = array(
			'order_id' => uniqid(), 
			'user_id' => $user_id, 
			'order_time' => $order_time,
			'order_date' => $order_date,
			'pickup_time' => $pickup_time,
			'pickup_date' => $pickup_date,
			'departure' => $departure,
			'stops' => $stops,
			'destination' => $destination,
			'trip_distance' => $trip_distance,
			'car_title' => $car_title,
			'fixed_charges' => $fixed_charges,
			'order_status' => $order_status,
			'user_type' => $user_type,

		);
		if (insert_record('orders', $data)==true) {
			echo 'Order Submitted';
		}
		else{
			echo "Order Submission Error";
		}
}
function fixed_order($user_id,$order_date,$pickup_time,$pickup_date,
		$car_id,$trip_data,$user_type){

		$data = $arrayName = array(
		    
			'order_id' => uniqid(), 
			'user_id' =>  $_SESSION['loginUserEmail'],
			'trip_id' =>  $trip_data['id'],
			'order_date' => $order_date,
			'pickup_time' => $pickup_time,
			'pickup_date' => $pickup_date,
			'car_id' => $car_id

		);
		if (insert_record('fixed_orders', $data)==true) {
			echo 'Order Submitted';
		}
		else{
			echo "Order Submission Error";
		}
}

function signOut(){
	unset($_SESSION['loginUserEmail']);
	unset($_SESSION['loginUserType']);
}


function get_record($table,$where="",$fields=null){
	global $db;
	if(is_null($fields)){
		$fields = '*';
	}else{
		$fields = implode(',', $fields);
	}
	$query = "select $fields from $table $where order by id desc";
	$query = $db->query($query);
	
	if($query->num_rows > 0){
		$result = array();
		 while($row = $query->fetch_assoc()){
		 	$result[] = $row;
		 } 
		  return $result;
	}else{
		return array();
	}
}
function get_last_id($table,$order='desc'){
	global $db;
	$query = $db->query("select id from $table order by id $order limit 1");
	if($query->num_rows > 0){
		return $query->fetch_assoc()['id'];
	}else{
		return false;
	}
}
function delete_record($table,$where){
	global $db;
	$query = "delete from $table $where";
	$query = $db->query($query);
	if($query){
        return true;
    }else{
        return false;
    }
}
function get_val($table,$val,$where){
	global $db;
	$query = "select $val from $table $where limit 1";
	$query = $db->query($query);
	if($query->num_rows > 0){
		return $query->fetch_assoc()[$val];
	}else{
		return false;
	}
}

// insert function
function insert_query_data($data){
    global $db;
    foreach (array_keys($data) as $key => $value) {
         if($key == 0){
             $query_data = "(";
         }
         $query_data.= " $value ";
         if($key < count($data)-1){
             $query_data .= ",";
         }else{
             $query_data .=")";
         }
     }

     $query_data .= " values";

     foreach (array_values($data) as $key => $value) {
         if($key == 0){
             $query_data .= "(";
         }
         $value =  $db->real_escape_string($value);
         $query_data.= " '$value' ";
         if($key < count($data)-1){
             $query_data .= ",";
         }else{
             $query_data .=")";
         }
     }

     return  $query_data;
}


function insert_record($table,$data){
    global $db;
    $query_data = insert_query_data($data);
	$query_ = "insert into $table $query_data";
    $query= $db->query($query_);

    if($query){
        return true;
    }else{
        return false;
    }
}
//update function

function update_query_data($data){

    $query = '';
    foreach ($data as $key => $d) {
        $query .= $key." =  '$d',";
    }
    $query = rtrim($query,',');
    return $query;
}

function update($table,$data,$where=null){
	global $db;
    if(is_null($where) or is_null($where)){
        return false;
    }
    $set_fields = update_query_data($data);
    $query = "update $table set $set_fields  $where";
	$queryRun = $db->query($query);

    if($queryRun){
        return true;
    }else{
        return false;
    }
}

//this fuction is using to temporary delete data from view, but actually exist in db
//Note: the data never delete from database.
function set_status($table,$status,$id){
	$data = array(
		'status'=>$status
	);
	update($table,$data,"where id=$id");
}

function record_exist($table,$where=""){

    global $db;
	$que = "select id from $table $where";
    $query = $db->query($que);
    if($query->num_rows > 0){
        $query->fetch_assoc()['id'];
        return true;
    }else{
        return false;
    }
}
function  is_echo($input){
	if(isset($input)){
		echo $input;
	}else{
		echo '';
	}
}
function active_nav($para){
	$file =  basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']);
	$fileName = $_GET['p'];
		
	 if($fileName==$para){
		 echo 'active';
	 }else{
		 echo '';
	 }
}
function redirect($url){
	echo "<script>window.location.href='".$url."'</script>";
}

function  get_diseas_json(){
	$getdisease = str_replace('\t','',json_encode(get_record('disease',"where id!=0"),true));
	$getdisease=str_replace('"', "'",$getdisease);
	return $getdisease;
}
?>