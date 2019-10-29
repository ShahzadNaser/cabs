<?php
if (isset($_POST['add_car'])) {
	$file=uniqid().'_'.$_FILES['car_image']['name'];
	$upload_path = 'uploads/'.$file;
	$data = array(
		'car_title' => $_POST['car_title'],
		'car_name' 	=> $_POST['car_name'],
		'car_description' => $_POST['car_description'],
		'car_image' => $_POST['car_image'],
		'passenger_capacity' => $_POST['passenger_capacity'],
		'item_capacity' => $_POST['item_capacity'],
		'fixed_charges' =>  $_POST['fixed_charges'],
		'car_image' => $file

	);
	if (insert_record('cars', $data)==true) {
			move_uploaded_file($_FILES["car_image"]["tmp_name"], $upload_path);
			header('location:index.php?p=cars');
		}
}
?>



<?php 
if(isset($_GET['action']) && $_GET['action']=='status')
{
	$set_status = $_GET['actionVal'];
	$car_id = $_GET['car_id'];

	if($set_status=='deactive'){
		update('cars',array('is_active'=>0),"where id=$car_id");
	}else{
		update('cars',array('is_active'=>1),"where id=$car_id");
	}

	header('location:index.php?p=cars');
}
?>


<?php 
	if(!isset($_GET['action'])){ 
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Cars List<a href="index.php?p=cars&&action=add" class='btn btn-primary pull-right'>Add Car</a>
      </h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
               <th class="active">ID</th>
               <th class="active">Car Title</th>
               <th class="active">Car Name</th>
               <th class="active">Car Desc</th>
               <th class="active">Car Image</th>
               <th class="active">Passenger Capacity</th>
               <th class="active">Item Capacity</th>
               <th class="active">Action</th>
            </tr>
            <?php 
               $s=0;
               $cars = get_record('cars');
               foreach($cars as $car){
               	$s++;
               	extract($car);
               ?>
            <tr>
               <td><?php echo $s;?></td>
               <td><?php echo $car_title;?></td>
               <td><?php echo $car_name;?></td>
               <td><?php echo $car_description;?></td>
               <td>
                  <img width="100" src="uploads/<?php echo $car_image;?>" alt="No image">
               </td>
               <td><?php echo $passenger_capacity;?></td>
               <td><?php echo $item_capacity;?></td>
               <td>
                  <a href="index.php?p=cars&&action=edit&&car_id=<?php echo $id;?>" class='badge badge-success btnEditCar' >Edit</a>
                  <?php 
                  if($is_active==1){
                  ?>
                  <a href="index.php?p=cars&&action=status&&actionVal=deactive&&car_id=<?php echo($id);?>" class='badge badge-danger'>Deactivate Car</a>
                  <?php 
 				  }else{
                  ?>
                  <a href="index.php?p=cars&&action=status&&actionVal=active&&car_id=<?php echo($id);?>" class='badge badge-success'>Activate Car</a>
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
      <h2 class="section-title">Add Car<a href="index.php?p=cars" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
		  <div class="form-group">
		  	<label>Car Title</label>
			<input type="text" class="form-control" name="car_title" placeholder="Car Title" required/>
		  </div>
		  <div class="form-group">
		  	<label>Car Name</label>		  	
			<input type="text" class="form-control" name="car_name" placeholder="Car Name" />
		  </div>
		  <div class="form-group">
		  	<label>Car Description</label>
			<input type="text" class="form-control" name="car_description" placeholder="Car Description" required/>
		  </div>
		  <div class="form-group">
		  	<label>Fixed Charges</label>
			<input type="number" class="form-control" name="fixed_charges" placeholder="Fixed Charges" required/>
		  </div>
		  <div class="form-group">
		  	<label>Passenger Capacity</label>
			<input type="number" class="form-control" name="passenger_capacity" placeholder="Passenger Capacity" required/>
		  </div>
		  <div class="form-group">
		  	<label>Car Capacity</label>
			<input type="number" class="form-control" name="item_capacity" placeholder="Item Capacity" required/>
		  </div>
		  <div class="form-group">
		  	<label>Car Image</label>
			<input type="file" style="padding:5px" class="form-control" name="car_image" placeholder="Image" />
		  </div>
		          <a href="index.php?p=cars" class="btn btn-default" data-dismiss="modal">Close</a>
        <button type="submit" name="add_car" class="btn btn-primary">Add </button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>




<?php
if(isset($_GET['action']) && $_GET['action']=='edit'){

	$car_id = $_GET['car_id'];
	$car = get_record('cars',"where id=$car_id");
	extract($car[0]);

	if (isset($_POST['update_car'])) {

		if(!empty($_FILES['car_image']['name'])){
			$file=uniqid().'_'.$_FILES['car_image']['name'];
		}else{
			$file = $car_image;
		}
		
		$upload_path = 'uploads/'.$file;
		$data = array(
			'car_title' => $_POST['car_title'],
			'car_name' => $_POST['car_name'],
			'car_description' => $_POST['car_description'],
			'car_image' => $_POST['car_image'],
			'passenger_capacity' => $_POST['passenger_capacity'],
			'item_capacity' => $_POST['item_capacity'],
			'fixed_charges' =>  $_POST['fixed_charges'],
			'car_image' => $file
		);
		update('cars',$data,"where id=$car_id");
		if(!empty($_FILES['car_image']['name'])){
			$file=uniqid().'_'.$_FILES['car_image']['name'];
			move_uploaded_file($_FILES["car_image"]["tmp_name"], $upload_path);
		}

		 header('location:index.php?p=cars');

	}
?>
<div class="row">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Edit Car<a href="index.php?p=cars" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
		  <div class="form-group">
		  	<label>Car Title</label>
			<input type="text" class="form-control" name="car_title" value="<?php echo $car_title?>" placeholder="Car Title" required/>
		  </div>
		  <div class="form-group">
		  	<label>Car Name</label>
			<input type="text" class="form-control" name="car_name" value="<?php echo $car_name?>" value="<?php echo($car_name)?>" placeholder="Car Name" required/>
		  </div>
		  <div class="form-group">
		  	<label>Car Description</label>
			<input type="text" class="form-control" name="car_description" value="<?php echo $car_description?>" placeholder="Car Description" required/>
		  </div>
		  <div class="form-group">
		  	<label>Fixed Charges</label>
			<input type="number" class="form-control" name="fixed_charges" value="<?php echo($fixed_charges)?>" required/>
		  </div>
		  <div class="form-group">
		  	<label>Passenger Capacity</label>
			<input type="number" class="form-control" name="passenger_capacity" value="<?php echo $passenger_capacity?>"placeholder="Passenger Capacity" required/>
		  </div>
		  <div class="form-group">
		  	<label>Item Capacity</label>
			<input type="number" class="form-control" name="item_capacity" value="<?php echo $item_capacity?>" placeholder="Item Capacity" required/>
		  </div>
		  <div class="form-group">
		  	<label>Car Image</label>
			<input type="file" style="padding:5px" class="form-control" name="car_image" placeholder="Image" />
		  </div>
		          <a href="index.php?p=cars" class="btn btn-default" data-dismiss="modal">Close</a>
        <button type="submit" name="update_car" class="btn btn-primary">Save changes</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>