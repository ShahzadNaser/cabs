<?php
if (isset($_POST['add_trip'])) {

	$data = array(
		'starting_point' => $_POST['fixed_start'],
		'ending_point' 	=> $_POST['fixed_end'],
		'fixed_price' => $_POST['fixed_price'],
		'trip_name' => $_POST['trip_name'],
		'car_id' => $_POST['fixed_car'],
		

	);
		if (insert_record('fixedtrips', $data)==true){
		   
		}
		else{
		    header('location:index.php?p=cars');
		}
}
?>



<?php 
if(isset($_GET['action']) && $_GET['action']=='status')
{
	$set_status = $_GET['actionVal'];
	$trip_id = $_GET['trip_id'];

	if($set_status=='deactive'){
		update('fixedtrips',array('is_active'=>0),"where id=$trip_id");
	}else{
		update('fixedtrips',array('is_active'=>1),"where id=$trip_id");
	}
}
?>


<?php 
	if(!isset($_GET['action'])){ 
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Cars List<a href="index.php?p=fixed_trips&&action=add" class='btn btn-primary pull-right'>Add Car</a>
      </h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
                
                <th class="active">ID</th>
                <th class="active">Trip Name</th>
                <th class="active">Starting Location</th>
                <th class="active">Ending Location</th>
                <th class="active">Car Title</th>
                <th class="active">Fixed Price</th>
               
               <th class="active">Action</th>
            </tr>
            <?php 
               $s=0;
               $fixedtrips = get_record('fixedtrips');
               foreach($fixedtrips as $fixedtrip){
               	$s++;
               	extract($fixedtrip);
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
               
               ?>
               <td><?php echo $fixedC_title;?></td>
               <td>$<?php echo $fixed_price;?></td>
               <td>
                  <a href="index.php?p=fixed_trips&&action=edit&&trip_id=<?php echo $trip_id;?>&&car_id=<?php echo $car_id;?>" class='badge badge-success btnEditCar' >Edit</a>
                  <?php 
                  if($is_activec==1){
                  ?>
                  <a href="index.php?p=fixed_trips&&action=status&&actionVal=deactive&&trip_id=<?php echo($trip_id);?>" class='badge badge-danger'>Deactivate Car</a>
                  <?php 
 				  }else{
                  ?>
                  <a href="index.php?p=fixed_trips&&action=status&&actionVal=active&&trip_id=<?php echo($trip_id);?>" class='badge badge-success'>Activate Car</a>
                  <?php 
				  }
                  ?>
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
<?php
if(isset($_GET['action']) && $_GET['action']=='add'){
?>
<div class="row">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Add Fixed Trip<a href="index.php?p=fixed_trips" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Trip Name</label>
			<input type="text" class="form-control" name="trip_name" placeholder="Add Trip Title" required/>
		  </div>
		  <div class="form-group">
		  	<label>Starting Point</label>
			<input type="text" class="form-control" name="fixed_start" placeholder="Add Starting Point" required/>
		  </div>
		  <div class="form-group">
		  	<label>Ending Point</label>		  	
			<input type="text" class="form-control" name="fixed_end" placeholder="Add Ending Point" />
		  </div>
		  <div class="form-group">
		  	<label>Fixed Price</label>
			<input type="text" class="form-control" name="fixed_price" placeholder="Enter Fixed Price" required/>
		  </div>
		  
		  <div class="form-group">
		  	<label>Select Car</label></br>
		  	<select name="fixed_car" class="form-control">
		  	<?php 
		  	$cars = get_record('cars');
               foreach($cars as $car){
               	extract($car);
            ?>
                <option class="cars" value="<?php echo($id)?>"><?php echo($car_title)?></option>
			<?php }?>
			
            </select>
		  </div>
            <a href="index.php?p=fixed_trips" class="btn btn-default" data-dismiss="modal">Close</a>
            <button type="submit" name="add_trip" class="btn btn-primary">Add Trip</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>




<?php
if(isset($_GET['action']) && $_GET['action']=='edit'){

	$trip_id = $_GET['trip_id'];
	$trip = get_record('fixedtrips',"where id=$trip_id");
	 if(!empty($trip)){
	 
	     	extract($trip[0]);
	     
	 }
	 else
	 echo "not found";
	 
	 if (isset($_POST['update_trip'])) {
	     $data = array(
			'trip_name' => $_POST['trip_name'],
			'starting_point' => $_POST['fixed_start'],
			'ending_point' => $_POST['fixed_end'],
			'car_id' => $_POST['fixed_car'],
			'fixed_price' => $_POST['fixed_price']
		);
	     	update('fixedtrips',$data,"where id=$trip_id");
	 }

?>
<div class="row">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Edit Trip<a href="index.php?p=fixed_trips" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Trip Name</label>
			<input type="text" class="form-control" name="trip_name" value="<?php echo $trip_name?>"placeholder="" required/>
		  </div>
		  <div class="form-group">
		  	<label>Starting Point</label>
			<input type="text" class="form-control" name="fixed_start" value="<?php echo ($starting_point)?>" placeholder="Starting Point" required/>
		  </div>
		  <div class="form-group">
		  	<label>Ending Point</label>
			<input type="text" class="form-control" name="fixed_end" value="<?php echo $ending_point?>" value="<?php echo($ending_point)?>" placeholder="Ending Point" required/>
		  </div>
		  <div class="form-group">
		  	<label>Select Car</label></br>
		  	<select name="fixed_car" class="form-control">
		  	<?php
		  	    
		  		$scar = get_record('cars',"where id=$car_id");
		  		extract($scar[0]);
		  	?>   
		  	 <option class="cars" value="<?php echo($id)?>"><?php echo($car_title)?></option>  
		  	<?php 
		  	$cars = get_record('cars');
               foreach($cars as $car){
               	extract($car);
            ?> 
            
            <option class="cars" value="<?php echo($id)?>"><?php echo($car_title)?></option>
			<?php }?>
			
            </select>
		  </div>
		  <div class="form-group">
		  	<label>Fixed Price</label>
			<input type="number" class="form-control" name="fixed_price" value="<?php echo($fixed_price)?>" required/>
		  </div>
		  
		          <a href="index.php?p=fixed_trips" class="btn btn-default" data-dismiss="modal">Close</a>
        <button type="submit" name="update_trip" class="btn btn-primary">Save changes</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>