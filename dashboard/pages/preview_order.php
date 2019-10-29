<?php 
  		
		$orderid= $_GET['o_id'];
   	   $orderdata = get_record('orders',"where id='$orderid'")[0];
   		extract($orderdata);
   // echo"<pre>";
   // print_r($orderdata);
   // echo"</pre>";
   
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12 orderlist">
		 
		  <h2 class="section-title">Order List</h2>

		  <div class="table-responsive">
			<table class="table">
			
			<tr>
				<th class="active">Car Title</th>
				<td><?php echo $car_title;?></td>
			</tr>
			<tr>
				<th class="active">Fixed Charge</th>
				<td><?php echo $fixed_charges;?></td>
			</tr>
			<tr>
				<th class="active">Trip Distance</th>
				<td><?php echo $trip_distance;?></td>
			</tr>
			<tr>
				<th class="active">Trip Cost</th>
				<td><?php echo "$".trip_cost($trip_distance,$fixed_charges);?></td>
			</tr>
			<tr>
				<th class="active">Pick Up Time</th>
				<td><?php echo $pickup_time;?></td>
			</tr>
			<tr>
				<th class="active">Pick Up Date</th>
				<td><?php echo $pickup_date;?></td>
			</tr>
			<tr>
				<th class="active">Pickup Location</th>
				<td><?php echo $departure;?></td>
			</tr>
			<tr>
				<th class="active">Stops</th>
				<td>
					<?php
					if($stops=='[]')
						echo"No Stops";
					
						else{

							$multipoints = json_decode($stops ,true);
							foreach($multipoints as $locations){
								
								echo $locations['location']." ~ ";
							}
							
						}
						
					?>
				</td>
			</tr>
			<tr>
				<th class="active">Dropoff Location</th>
				<td><?php echo $destination;?></td>
			</tr>
		  </table>
		   <a class="btn btn-default" href="./index.php?p=orders" >Back</a>
		  </div>
   </div>
</div>