<?php
if (isset($_POST['add_price'])) {

	$data = array(
		'range_start' => $_POST['range_start'],
		'range_end' 	=> $_POST['range_end'],
		'price' => $_POST['price']
	);
	if (insert_record('price_range', $data)==true){
	   redirect('index.php?p=price_range'); 
	}
}
?>



<?php 
if(isset($_GET['action']) && $_GET['action']=='status')
{
	$set_status = $_GET['actionVal'];
	$price_id = $_GET['price_id'];

	if($set_status=='unpublished'){
		update('price_range',array('status'=>'unpublished'),"where id=$price_id");
	}else{
		update('price_range',array('status'=>'published'),"where id=$price_id");
	}
	
	redirect('index.php?p=price_range');  
}
?>


<?php 
	if(!isset($_GET['action'])){ 
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Price List<a href="index.php?p=price_range&&action=add" class='btn btn-primary pull-right'>Add Price</a>
      </h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
                <th class="active">S#</th>
                <th class="active">From</th>
                <th class="active">To</th>
                <th class="active">Price</th>
               <th class="active">Action</th>
            </tr>
            <?php 
               $s=0;
               $priceRanges = get_record('price_range');
               foreach($priceRanges as $priceRanges){
               	$s++;
               	extract($priceRanges);
               	$price_id=$id;
               	
               ?>
            <tr>
               <td><?php echo $s;?></td>
               <td><?php echo $range_start;?></td>
               <td><?php echo $range_end;?></td>
               <td><?php echo $price;?></td>
               <td>
                  <a href="index.php?p=price_range&&action=edit&&price_id=<?php echo $price_id;?>" class='badge badge-success btnEditCar' >Edit</a>
                  <?php 
                  if($status=='published'){
                  ?>
                  <a href="index.php?p=price_range&&action=status&&actionVal=unpublished&&price_id=<?php echo($price_id);?>" class='badge  badge-success'>Published</a>
                  <?php 
 				  }else{
                  ?>
                  <a href="index.php?p=price_range&&action=status&&actionVal=published&&price_id=<?php echo($price_id);?>" class='badge badge-danger'>Unpublish</a>
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
   <div class="col-xs-12 col-md-6">
      <h2 class="section-title">Add Fixed price<a href="index.php?p=price_range" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
		  <div class="form-group">
		  	<label>Starting Point</label>
			<input type="text" class="form-control" name="range_start" placeholder="From" required/>
		  </div>
		  <div class="form-group">
		  	<label>Ending Point</label>		  	
			<input type="text" class="form-control" name="range_end" placeholder="To" required/>
		  </div>
		  <div class="form-group">
		  	<label>Price</label>
			<input type="text" class="form-control" name="price" placeholder="Enter Price" required/>
		  </div>
            <button type="submit" name="add_price" class="btn btn-primary">Add price</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>




<?php
if(isset($_GET['action']) && $_GET['action']=='edit'){

	$price_id = $_GET['price_id'];
	$price = get_record('price_range',"where id=$price_id")[0];
	extract($price);
	 
	 if (isset($_POST['update_price'])) {
	     $data = array(
    		'range_start' => $_POST['range_start'],
    		'range_end' 	=> $_POST['range_end'],
    		'price' => $_POST['price']
    	);
	    update('price_range',$data,"where id=$price_id");
	    redirect('index.php?p=price_range'); 
	 }
    
?>
<div class="row">
   <div class="col-xs-12 col-md-6">
      <h2 class="section-title">Edit price<a href="index.php?p=price_range" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Starting Point</label>
			<input type="text" class="form-control" name="range_start" value="<?php echo $range_start;?>" placeholder="From" required/>
		  </div>
		  <div class="form-group">
		  	<label>Ending Point</label>		  	
			<input type="text" class="form-control" name="range_end"  value="<?php echo $range_end;?>" placeholder="To" required/>
		  </div>
		  <div class="form-group">
		  	<label>Price</label>
			<input type="text" class="form-control" name="price"  value="<?php echo $price;?>" placeholder="Enter Price" required/>
		  </div>
          <button type="submit" name="update_price" class="btn btn-primary">Save changes</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>