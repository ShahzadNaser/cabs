<?php
if (isset($_POST['add_service'])) {

	$data = array(
		'service_title' => $_POST['service_title'],
		'service_description' => $_POST['service_description'],

	);
    insert_record('services', $data);
}
?>



<?php 
if(isset($_GET['action']) && $_GET['action']=='status')
{
	$set_status = $_GET['actionVal'];
	$service_id = $_GET['service_id'];

	if($set_status=='deactive'){
		update('services',array('is_active'=>0),"where id=$service_id");
			
	}else{
		update('services',array('is_active'=>1),"where id=$service_id");
	}
	header('location:index.php?p=services');
    
}
?>


<?php 
	if(!isset($_GET['action'])){ 
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">services List<a href="index.php?p=services&&action=add" class='btn btn-primary pull-right'>Add service</a>
      </h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
               <th class="active">ID</th>
               <th class="active">Service Title</th>
               <th class="active">Service Desc</th>
               <th class="active">Action</th>
            </tr>
            <?php 
               $s=0;
               $services = get_record('services');
               foreach($services as $service){
               	$s++;
               	extract($service);
               ?>
            <tr>
               <td><?php echo $id?></td>
               <td><?php echo $service_title;?></td>
               <td><?php echo $service_description;?></td>
              
               
               <td>
                  <a href="index.php?p=services&&action=edit&&service_id=<?php echo $id;?>" class='badge badge-success btnEditservice' >Edit</a>
                  <?php 
                  if($is_active==1){
                  ?>
                  <a href="index.php?p=services&&action=status&&actionVal=deactive&&service_id=<?php echo($id);?>" class='badge badge-danger'>Deactivate Service</a>
                  <?php 
 				  }else{
                  ?>
                  <a href="index.php?p=services&&action=status&&actionVal=active&&service_id=<?php echo($id);?>" class='badge badge-success'>Activate Service</a>
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
      <h2 class="section-title">Add service<a href="index.php?p=services" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
		  <div class="form-group">
		  	<label>Service Title</label>
			<input type="text" class="form-control" name="service_title" placeholder="service Title" required/>
		  </div>
		  <div class="form-group">
		  	<label>Service Description</label>
			<input type="text" class="form-control" name="service_description" placeholder="service Description" required/>
		  </div>
		          <a href="index.php?p=services" class="btn btn-default" data-dismiss="modal">Close</a>
        <button type="submit" name="add_service" class="btn btn-primary">Add </button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>




<?php
if(isset($_GET['action']) && $_GET['action']=='edit'){

	$service_id = $_GET['service_id'];
	$service = get_record('services',"where id=$service_id");
	extract($service[0]);

	if (isset($_POST['update_service'])) {

		$data = array(
			'service_title' => $_POST['service_title'],
		    'service_description' => $_POST['service_description'],
		);
	   	 update('services',$data,"where id=$service_id");
		 header('location:index.php?p=services');

	}
?>
<div class="row">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Edit service<a href="index.php?p=services" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
		  <div class="form-group">
		  	<label>service Title</label>
			<input type="text" class="form-control" name="service_title" value="<?php echo $service_title?>" placeholder="service Title" required/>
		  </div>
		  
		  <div class="form-group">
		  	<label>service Description</label>
			<input type="text" class="form-control" name="service_description" value="<?php echo $service_description?>" placeholder="service Description" required/>
		  </div>
		  
		          <a href="index.php?p=services" class="btn btn-default" data-dismiss="modal">Close</a>
        <button type="submit" name="update_service" class="btn btn-primary">Save changes</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>