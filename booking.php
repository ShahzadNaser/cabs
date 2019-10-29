<?php include('includes/head.php');?>
 <?php 
   if(isset($_GET['action']) && $_GET['action']=='booknow'){
       $trip_id=   $_GET['trip_id'];
       $pickdate = $_POST['pickdate'];
       $picktime = $_POST['picktime'];
       $trip= get_record('fixedtrips',"where id=$trip_id");
       
       extract($trip[0]);
       $data = array(
        'departure' => $starting_point,
        'destination' => $ending_point,
        'pickup_time' => $picktime,
        'pickup_date' => $pickdate,
        'order_type' => "Fixed Trip"
     );
     print_r($data);
     if(insert_record('orders', $data)){
         echo "true";
     }else{
         echo "error";
     }
     
   }
?>
<!--header top-->
<?php include('includes/header-top.php');?>
<!--main header-->
<?php include('includes/header.php');?>
<link href="assets/css/booking.css" rel="stylesheet">
<section class="section wow fadeInUp" id="booking" data-wow-duration="1s" data-wow-delay="0.1s">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-md-8">
            <input type='hidden' value="<?php echo get_offer();?>" id="get_offer" />
            <?php if (!isset($loginUserEmail)) { ?>
            <div id="loginbox" class="sec-div ">
               <div class="choose-cars">
                  <div class="cat-container">
                     <h3>Already a User?</h3>
                     <div class="bs-example">
                        <ul class="nav nav-tabs">
                           <li class="nav-item active">
                              <a href="#user_login" class="nav-link active" data-toggle="tab">SignIn</a>
                           </li>
                           <li class="nav-item">
                              <a href="#guest_login" class="nav-link" data-toggle="tab">Guest</a>
                           </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane fade  active in" id="user_login">
                              <h4 class="mt-2">Sign In As Exisiting User</h4>
                              <form action="/action_page.php">
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <input type="email" class="form-control  email req-field input-fill" name="login_email" id="b_login_email" placeholder="Your Email">
                                 </div>
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" class="form-control req-field input-fill" name="login_password" id="b_login_password" placeholder="Your Password">
                                 </div>
                                 <button id="b_btnlogin" type="button" class="btn btn-default pay-detail">Login</button>
                                 <span class="p"><a href="#">Forgot Your Password?</a></span>
                                 <span class="addwarrning"></span>
                              </form>
                           </div>
                           <div class="tab-pane fade" id="guest_login">
                              <h4 class="mt-2">Sign In As Guest</h4>
                              <div>
                                 <div style="background:#eeebd8;margin-bottom: 10px;padding: 10px" class="">
                                    <span class="fa fa-warning" style="display: inline-block;font-size: 17px;"></span>
                                    <p style="display: inline;" >By providing personal data, you acknowledge that you have read and understood our Privacy Notice</p>
                                 </div>
                                 <div class="input-group" >
                                    <span style="" class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    <div class="labels" style="border-top: 1px solid #ccc;border-right: 1px solid #ccc; border-left: 1px solid #ccc ">
                                       <span class="formlabel"> Email  </span>
                                    </div>
                                    <input id="b_signup_email"  style="border-top:0px!important;" type="email" class="form-control req-field input-fill" placeholder="Enter Your Email">
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="input-group">
                                          <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                          <input id="b_signup_name" type="name" class="form-control req-field input-fill" placeholder="Name">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <input id="b_signup_phone" type="text" class="form-control req-field input-fill" id="phone2" placeholder="Phone" />
                                       </div>
                                    </div>
                                 </div>
                                 <button id="b_btnsignup" type="button" class="btn btn-default pay-detail">Continue</button>
                                 <div class="warrning"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <?php
               }
                  ?>
            <input id="usertype" type="hidden" value="<?php echo($user_type) ?>" >
            <div class="booking_form tab-content">
               <h3 style="margin-top: 0;">JOURNEY DETAILS</h3>
               <ul class="nav nav-tabs  ">
                 <li class="active"><a data-toggle="tab" href="#custom">Custom Trip</a></li>
                 <li><a data-toggle="tab" href="#fixed">Fixed Trips</a></li>
              </ul>
              <div  class="tab-pane fade active in" id="custom">
               <form action="/action_page.php">
                  <div class="form-body">
                     <div class="custom_input signup">
                        <div class="input-group">
                           <input type="text" class="form-control"  placeholder="Name">
                           <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                        <div class="input-group">
                           <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                           <input type="email" class="form-control"  placeholder="Email">
                        </div>
                        <div class="row">
                           <div class="col-xs-12 col-md-6">
                              <div class="input-group">
                                 <input placeholder="Enter Password" class="textbox-n form-control" type="text"  id="date1"/>
                                 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                              </div>
                           </div>
                           <div class="col-xs-12 col-md-6">
                              <div class="input-group">
                                 <input placeholder="Confirm Password" class="textbox-n form-control" type="text"  id="time1"/> 
                                 <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                        <div class="labels">
                           <span class="formlabel"> Pick Up  </span>
                        </div>
                        <input id="start" class="form-control " type="text" placeholder="ENTER PICKUP LOCATION">
                     </div>
                     <div id="waypointdiv"></div>
                     <div class="row">
                        <div class="col-xs-12 col-md-12">
                           <div class="multides">
                              <label>Add Stop</label>
                              <button id="addmulti" onclick="addway();" type="button" class="btn btn-default pull-right">
                              <span class='fa fa-plus'></span>
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="input-group">
                        <span class="input-group-addon"><i style="color: #000" class="fa fa-map-marker"></i></span>
                        <div class="labels">
                           <span class="formlabel"> Drop off</span>
                        </div>
                        <input id="end" class="form-control  " type="text" placeholder="ENTER PICKUP LOCATION">
                     </div>
                     <br>
                     <div class="form-body">
                        <label class="custom_radio">Fare By Miles 
                           <input type="radio" checked="checked" value="miles" name="trip_type">
                           <span class="checkmark"></span>
                        </label>
                        <label class="custom_radio">Fixed Fare
                           <input type="radio"  value="fixed" name="trip_type">
                           <span class="checkmark"></span>
                        </label>
                     </div>   
                     <div class="row">
                        <div style="margin:0px 15px 5px 15px;color: #000; ">Enter Journey Time and Date<span id="direction-warrning" class="hidden" style="float: right;margin-top: -11px;color: red;font-size: 10px;padding: 5px 9px;border: 1px solid red;" ></span></div>
                        <div class="col-xs-12 col-md-6">
                           <div class="input-group datetime">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input placeholder="Pick up Date" class="textbox-n form-control req-field input-fill" type="text" onfocus="(this.type='date')"  id="date2"/>
                           </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                           <div class="input-group datetime">
                              <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                              <input placeholder="Pick up Time" class="textbox-n form-control req-field input-fill" type="text" onfocus="(this.type='time')"  id="time2"/> 
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
              </div>
              <div class="tab-pane" id="fixed">
                    <form>
                      <div class="">
                        
                        <?php 
	if(!isset($_GET['action'])){ 
?>
<div class="row" style="padding:20px">
                        <form>
                        <div style="margin:0px 15px 5px 15px;color: #000; ">Enter Journey Time and Date<span id="direction-warrning" class="hidden" style="float: right;margin-top: -11px;color: red;font-size: 10px;padding: 5px 9px;border: 1px solid red;"></span></div>
                        <div class="col-xs-12 col-md-6">
                           <div class="input-group datetime">
                              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                              <input name="pickdate" placeholder="Pick up Date" class="textbox-n form-control  input-fill" type="date" onfocus="(this.type='date')" id="fpickdate">
                           </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                           <div class="input-group datetime">
                              <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                              <input name="picktime" placeholder="Pick up Time" class="textbox-n form-control  input-fill" type="text" onfocus="(this.type='time')" id="fpicktime"> 
                           </div>
                        </div>
                    </form>
</div>
<div class="row ">
   <div class="col-xs-12 col-md-12">
      <?php 
        $getOffer = get_offer();
        $getOffer = explode(':',$getOffer);
        $offer_amount =  $getOffer[0];
        $offer_type =  $getOffer[1];
      ?>    
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
                <th class="active">ID</th>
                <th class="active">Trip</th>
                <th class="active">Start Location</th>
                <th class="active">End Location</th>
                <th class="active">Car</th>
                <th class="active">Price</th>
                <?php 
                    if(get_offer()!=':'){
                ?>
                <th class="active"><?php echo ucfirst($offer_type);?></th>
                <th class="active">Payable</th>
                <?php 
                }?>
                <th class="active">Action</th>
            </tr>
            <?php 
               $s=0;
               $fixedtrips = get_record('fixedtrips');
               foreach($fixedtrips as $fixedtrip){
               	$s++;
               	extract($fixedtrip);
               	$fixedtrip['car_name'] =get_val('cars','car_title',"where id=$car_id");
               	
               	if(get_offer()!=':'){
               	  $fixedtrip['fixed_price'] = price_after_discount($fixed_price,$offer_type,$offer_amount);  
               	}
               	$trip_id=$id;
               	$is_activec = $is_active;
               	
               ?>
            <tr>
               <td><?php echo $s;?></td>
               <td><?php echo $trip_name;?></td>
               <td><?php echo $starting_point;?></td>
               <td><?php echo $ending_point;?></td>
               <?php
                $car= get_record('cars',"where id=$car_id");
                if(!empty($car)){
                     extract($car[0]);
                $fixedC_title = $car_title;
                }
                
               $payable =price_after_discount($fixed_price,$offer_type,$offer_amount);
               $offer_price = $fixed_price-$payable;
               ?>
               <td><?php echo $fixedC_title;?></td>
               <td>$<?php echo $fixed_price;?></td>
               <?php 
                    if(get_offer()!=':'){
                ?>
                <td>$<?php echo $offer_price;?></td>
               <td>$<?php echo $payable;?></td>
                <?php 
                }?>
               
               <td>
                   <input type="hidden" class="fixedtrip_data" value='<?php echo json_encode($fixedtrip,true)?>' />
                    <label class="checkcontaine">
                      <input type="radio" name="gender" value="<?php echo $id ?>" <?php if($s==1){echo 'checked';}?>>
                      <span class="checkmar"></span>
                    </label>
               </td>
            </tr>
            <?php 
               }?>
         </table>
      </div>
      <br>
   </div>
   
</div>
<?php
}?>
                     </div>
                  </form>
              </div>
            </div>
            
            <div class="sec-div">
               <div class="choose-cars">
                  <div class="cat-container">
                     <h3>CHOOSE YOUR CAR</h3>
                     <div class="row">
                        <?php 
                           $cars = get_record('cars',"where is_active=1");
                           foreach($cars as $key=> $car){
                              if($key==0){
                                 $active_car='active';
                              }else{
                                 $active_car='';
                              }
                              extract($car);
                           ?>
                        <div class="col-xs-12 col-md-4">
                           <div class="car <?php echo $active_car;?>">
                              <div class="car-desc">
                                 <p class="fixed-charges hidden"><?php echo $fixed_charges ?></p>
                                 <h3 class="car-title"><?php echo $car_title ?></h3>
                                 <h4 class=""><?php echo $car_name ?></h4>
                                 <p class=""><?php echo $car_description ?></p>
                                 <img class="car-img " src="dashboard/uploads/<?php echo $car_image ?>">
                                 <div class="cap-con">
                                    <div class="capacity">
                                       <span class="fa fa-user-o"></span> "<?php echo $passenger_capacity; ?>"
                                    </div>
                                    <div class="capacity">
                                       <span class="fa fa-briefcase"></span> "<?php echo $item_capacity; ?>"
                                    </div>
                                    <div class="capacity" style="background: #efbf13;font-size: 15px;font-weight: bold;">
                                       <span class="fa fa-dollar"></span><?php echo $fixed_charges; ?>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <?php
                           }
                        ?>
                     </div>
                     <!-- passenger details -->
                  </div>
               </div>
            </div>
            <div id="session" class="hidden">
               <?php if(isset($loginUserEmail)){
                  echo($loginUserEmail); 
                  }
                  ?>
            </div>

            <div class="sec-div hide">
               <div class="choose-cars">
                  <div class="cat-container">
                     <h3>PAYMENT DETAILS</h3>
                     <div class="pay-btns">
                        <button class="btn btn-default pay-detail">Cash</button>
                        <button class="btn btn-default pay-detail">Visa</button>    
                        <button class="btn btn-default pay-detail">Card</button>
                        <button class="btn btn-default pay-detail">PAYPAL</button>
                        <div class="pay-btn">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- map  -->
         <div class="col-xs-12 col-md-4">
            <div>
               <div id="map"></div>
            </div>
            <div id="summary">
            </div>
            <div class="booking_form summary">
               <h3 style="margin-top: 0">Booking Summary</h3>
               <div id="mysummary"></div>
               <div id="right-panel">
               </div>
               <div class="form-group">
                  <?php if(isset($loginUserEmail)) { ?>
                  <button id="bookingsmry" type="submit"  class="form-control btn btn-default button" >Book Now</button>
                  <?php } ?>
                  <?php if(!isset($loginUserEmail)) {  ?>
                  <a href='#loginbox' id="bookingsmry" class="form-control btn btn-default button" >Book Now</a>
                  <?php }?>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="mapsec">
   <div id="floating-panel">
      <strong>Start:</strong>
      <br>
      <strong>End:</strong>
   </div>
</section>
<section class="summarymodal">
   <!--Invoice Modal -->
   <?php include('modals/invoice.php');?>
</section>
<?php include('includes/footer.php');?>
<?php include('includes/foot.php');?>
<script src="assets/js/gmap.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqksn9fLxjZSlby8VoGJVesz2szNlbMB4&libraries=places&callback=initMap"></script>
<script type="text/javascript" src="assets/js/booking.js"></script>