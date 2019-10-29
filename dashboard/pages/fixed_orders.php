<?php 
if(isset($_GET['actionVal'])){
    $status = $_GET['actionVal'];
    $order_id = $_GET['order_id'];
    update('fixed_orders',array('order_status'=>$status),"where id=$order_id");
    header('location:index.php?p=fixed_orders');
}
?>
<style>
.nav-tabs {
	border:0px;
}
.nav-tabs li{
	margin:0px;
}
.nav-tabs li a{
	text-transform: capitalize;
	margin:0px 0px 10px 0px;
	border:0px !Important;
	border-bottom:2px solid #ddd!Important;
	background:#009688;
	border-radius:0px !important;
	position:relative;
	color:#fff;
}
.nav-tabs li a:hover{
    background:#03766b;
}
.nav-tabs li:last-child a{
	border:1px solid #f0f0f0;
}
.nav-tabs li a::after{
	content:'';
	display:none;
	width:0%;
	background:#03766b;
	height:2px;
	position:absolute;
	top:0;
	left:0;
	right:0;
	margin:auto;
	transition:all 1s;
}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover{
	background:#02b0a0 !Important;
	color:#fff;
}
.nav-tabs li.active a:after{
	width:100%;
}
.tab-pane{
	padding:0px 0px;
}
</style>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
       <?php 
       if($user_type=='admin' or $user_type=='admin_user'){
       ?>
      <h2 class="section-title">Fixed Orders List</h2>
      <br>
      <ul class="nav nav-tabs  ">
         <li><a data-toggle="tab" href="#all">All</a></li>
         <li class="active"><a data-toggle="tab" href="#new">New</a></li>
         <li><a data-toggle="tab" href="#approved">Approved</a></li>
         <li><a data-toggle="tab" href="#declined">Declined</a></li>
         <li><a data-toggle="tab" href="#going">Going</a></li>
         <li><a data-toggle="tab" href="#completed">Completed</a></li>
      </ul>
      <div class="tab-content">
         <div id="all" class="tab-pane fade">
            <div class="table-responsive">
               <table class="table">
                  <tr>
                     <th class="active">#</th>
                     <th class="active">Order Id</th>
                     <th class="active">Email</th>
                     <th class="active">Car Title</th>
                     <th class="active">Trip Name</th>
                     <th class="active">Pick Up Time</th>
                     <th class="active">Status</th>
                     <th class="active">Action</th>
                  </tr>
                  <?php 
                    $orderdata = get_record('fixed_orders');
                     foreach($orderdata as $key => $order){
                     	extract($order);
                     ?>
                  <tr>
                      
                     <td><?php echo $key+1;?></td>
                     <td><?php echo $order_id;?></td>
                     <td><?php echo $user_id;?></td>
                     
                     
                     <td><?php 
                     $car_title=get_val('cars','car_title',"where id='$car_id'");
                     echo $car_title;?></td>
                     <td><?php
                     echo get_val('fixedtrips','trip_name',"where id='$trip_id'");
                      
                     ?>
                    
                     </td>
                     <td><?php echo $pickup_time." / ".$pickup_date;?></td>
                     <td><?php echo $order_status;?></td>
                     
                     
                     <td>
                        <div class="dropdown hide">
                           <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li></li>
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
         <div id="new" class="tab-pane fade  in active">
            <div class="table-responsive">
               <table class="table">
                  <tr>
                     <th class="active">#</th>
                     <th class="active">Order Id</th>
                     <th class="active">Email</th>
                     <th class="active">Car Title</th>
                     <th class="active">Trip Name</th>
                     <th class="active">Pick Up Time</th>
                     <th class="active">Action</th>
                  </tr>
                  <?php 
                    $orderdata = get_record('fixed_orders',"where order_status='pending'");
                     foreach($orderdata as $key => $order){
                     	extract($order);
                     ?>
                  <tr>
                     <td><?php echo $key+1;?></td>
                     <td><?php echo $order_id;?></td>
                     <td><?php echo $user_id;?></td>
                     <td><?php 
                     $car_title=get_val('cars','car_title',"where id='$car_id'");
                     echo $car_title;?></td>
                     <td><?php
                     echo get_val('fixedtrips','trip_name',"where id='$trip_id'");
                      
                     ?>
                    
                     </td>
                     
                     <td><?php echo $pickup_time." / ".$pickup_date;?></td>
                     <td>
                        <div class="dropdown hide">
                           <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li></li>
                           </ul>
                        </div>
                        
                        
                        <a class="badge badge-success" href="index.php?p=fixed_orders&&actionVal=approved&&order_id=<?php echo $id?>">Mark as approved</a>
                        <a class="badge badge-danger" href="index.php?p=fixed_orders&&actionVal=declined&&order_id=<?php echo $id?>">Declined</a>
                     </td>
                  </tr>
                  <?php 
                     }
                    ?>
               </table>
            </div>
         </div>
         <div id="approved" class="tab-pane fade">
           <div class="table-responsive">
               <table class="table">
                  <tr>
                     <th class="active">#</th>
                     <th class="active">Order Id</th>
                     <th class="active">Email</th>
                     <th class="active">Car Title</th>
                     <th class="active">Trip Name</th>
                     <th class="active">Pick Up Time</th>
                     <th class="active">Action</th>
                  </tr>
                  <?php 
                    $orderdata = get_record('fixed_orders',"where order_status='approved'");
                    
                     foreach($orderdata as $key => $order){
                     	extract($order);
                     ?>
                  <tr>
                     <td><?php echo $key+1;?></td>
                     <td><?php echo $order_id;?></td>
                     <td><?php echo $user_id;?></td>
                     <td><?php 
                     $car_title=get_val('cars','car_title',"where id='$car_id'");
                     echo $car_title;?></td>
                     <td><?php
                     echo get_val('fixedtrips','trip_name',"where id='$trip_id'");
                     ?>
                     <td><?php echo $pickup_time." / ".$pickup_date;?></td>
                     <td>
                        <div class="dropdown hide">
                           <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li></li>
                           </ul>
                        </div>
                    
                        <a class="badge badge-success" href="index.php?p=fixed_orders&&actionVal=going&&order_id=<?php echo $id?>">Mark as on going</a>
                        
                     </td>
                  </tr>
                  <?php 
                     }
                    ?>
               </table>
            </div>
         </div>
         <div id="declined" class="tab-pane fade">
           <div class="table-responsive">
               <table class="table">
                  <tr>
                     <th class="active">#</th>
                     <th class="active">Order Id</th>
                     <th class="active">Email</th>
                     <th class="active">Car Title</th>
                     <th class="active">Pick Up Time</th>
                     <th class="active">Action</th>
                  </tr>
                  <?php 
                    $orderdata = get_record('fixed_orders',"where order_status='declined'");
                     foreach($orderdata as $key => $order){
                     	extract($order);
                     ?>
                  <tr>
                     <td><?php echo $key+1;?></td>
                     <td><?php echo $order_id;?></td>
                     <td><?php echo $user_id;?></td>
                     <td><?php 
                     $car_title=get_val('cars','car_title',"where id='$car_id'");
                     echo $car_title;?></td>
                     <td><?php
                     echo get_val('fixedtrips','trip_name',"where id='$trip_id'");
                      
                     ?>
                     <td><?php echo $car_title;?></td>
                     <td><?php echo $pickup_time." / ".$pickup_date;?></td>
                     <td>
                        <div class="dropdown hide">
                           <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li></li>
                           </ul>
                        </div>
                         
                        <a class="badge badge-success" href="index.php?p=fixed_orders&&actionVal=going&&order_id=<?php echo $id?>">Mark as on going</a>
                     </td>
                  </tr>
                  <?php 
                     }
                    ?>
               </table>
            </div>
         </div>
         <div id="going" class="tab-pane fade">
            <div class="table-responsive">
               <table class="table">
                  <tr>
                     <th class="active">#</th>
                     <th class="active">Order Id</th>
                     <th class="active">Email</th>
                     <th class="active">Car Title</th>
                     <th class="active">Trip Name</th>
                     
                     <th class="active">Pick Up Time</th>
                     <th class="active">Action</th>
                  </tr>
                  <?php 
                    $orderdata = get_record('fixed_orders',"where order_status='going'");
                     foreach($orderdata as $key => $order){
                     	extract($order);
                     ?>
                  <tr>
                     <td><?php echo $key+1;?></td>
                     <td><?php echo $order_id;?></td>
                     <td><?php echo $user_id;?></td>
                     <td><?php 
                     $car_title=get_val('cars','car_title',"where id='$car_id'");
                     echo $car_title;?></td>
                     <td><?php
                     echo get_val('fixedtrips','trip_name',"where id='$trip_id'");
                      
                     ?>
                     
                     <td><?php echo $pickup_time." / ".$pickup_date;?></td>
                     <td>
                        <div class="dropdown hide">
                           <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li></li>
                           </ul>
                        </div>
                         
                        <a class="badge badge-success" href="index.php?p=fixed_orders&&actionVal=completed&&order_id=<?php echo $id?>">Mark as completed</a>
                     </td>
                  </tr>
                  <?php 
                     }
                    ?>
               </table>
            </div>
         </div>
         <div id="completed" class="tab-pane fade">
            <div class="table-responsive">
               <table class="table">
                  <tr>
                     <th class="active">#</th>
                     <th class="active">Order Id</th>
                     <th class="active">Email</th>
                     <th class="active">Car Title</th>
                     <th class="active">Trip Name</th>
                     <th class="active">Pick Up Time</th>
                     <th class="active">Action</th>
                  </tr>
                  <?php 
                    $orderdata = get_record('fixed_orders',"where order_status='completed'");
                     foreach($orderdata as $key => $order){
                     	extract($order);
                     ?>
                  <tr>
                     <td><?php echo $key+1;?></td>
                     <td><?php echo $order_id;?></td>
                     <td><?php echo $user_id;?></td>
                     <td><?php 
                     $car_title=get_val('cars','car_title',"where id='$car_id'");
                     echo $car_title;?></td>
                     <td><?php
                     echo get_val('fixedtrips','trip_name',"where id='$trip_id'");
                      
                     ?>
                     
                     <td><?php echo $pickup_time." / ".$pickup_date;?></td>
                     <td>
                        <div class="dropdown hide">
                           <button class=" btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                           <span class="caret"></span></button>
                           <ul class="dropdown-menu">
                              <li></li>
                           </ul>
                        </div>
                         
                        <a class="badge badge-danger" href="index.php?p=fixed_orders&&order_id=<?php echo $id?>">Delete</a>
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
       }else{
      ?>
       <h2 class="section-title">My fixed_orders</h2>
      <?php 
      }?>
   </div>
</div>