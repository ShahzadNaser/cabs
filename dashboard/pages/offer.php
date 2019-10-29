<?php
if (isset($_POST['add_Offer'])) {

	$data = array(
	    'title' => $_POST['title'],
		'date_start' => $_POST['date_start'],
		'date_end' 	=> $_POST['date_end'],
		'percentage' => $_POST['percentage']
	);
	
	if (insert_record('offer', $data)==true){
	   redirect('index.php?p=offer'); 
	}
}
?>

<?php 
if(isset($_GET['action']) && $_GET['action']=='status')
{
	$set_status = $_GET['actionVal'];
	$Offer_id = $_GET['Offer_id'];
    unpublish_offer();
    update('offer',array('status'=>'published'),"where id=$Offer_id");	
	redirect('index.php?p=offer');  
}
?>


<?php 
	if(!isset($_GET['action'])){ 
?>
<div class="row wow fadeInUp">
   <div class="col-xs-12 col-md-12">
      <h2 class="section-title">Offer List<a href="index.php?p=offer&&action=add" class='btn btn-primary pull-right'>Add Offer</a>
      </h2>
      <br>
      <div class="table-responsive">
         <table class="table table-bordered">
            <tr>
                <th class="active">S#</th>
                <th class="active">Title</th>
                <th class="active">Date Star</th>
                <th class="active">Date End</th>
                <th class="active">Percentage</th>
                <th class="active">Offer Type</th>
                <th class="active">Status</th>
            </tr>
            <?php 
               $s=0;
               $OfferRanges = get_record('offer');
               foreach($OfferRanges as $OfferRanges){
               	$s++;
               	extract($OfferRanges);
               	$Offer_id=$id;
               	
               ?>
            <tr>
               <td><?php echo $s;?></td>
               <td><?php echo $title;?></td>
               <td><?php echo $date_start;?></td>
               <td><?php echo $date_end;?></td>
               <td><?php echo $percentage;?></td>
               <td><?php echo $offer_type;?></td>
               <td>
                  <a href="index.php?p=offer&&action=edit&&Offer_id=<?php echo $Offer_id;?>" class='badge badge-success btnEditCar' >Edit</a>
                  <?php 
                  if($status=='published'){
                  ?>
                  <span class='badge  badge-success'>Active</span>
                  <?php 
 				  }else{
                  ?>
                  <a href="index.php?p=offer&&action=status&&actionVal=published&&Offer_id=<?php echo($Offer_id);?>" class='badge badge-danger'>Deactive</a>
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
      <h2 class="section-title">Add Fixed Offer<a href="index.php?p=offer" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" action="#" enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Starting Point</label>
			<input type="text" class="form-control" name="title" placeholder="Offer Title" required/>
		  </div>
		  <div class="form-group">
		  	<label>Offer Start Date</label>
			<input type="date" class="form-control" name="date_start" required/>
		  </div>
		  <div class="form-group">
		  	<label>Offer Start Date</label>		  	
			<input type="date" class="form-control" name="date_end" required/>
		  </div>
		  <div class="form-group">
		  	<label>Amount Percentage</label>
			<input type="text" class="form-control" name="percentage" placeholder="Enter amount %" required/>
		  </div>
		  <div class="form-group">
		  	<label>Offer Type</label>
			<select class="form-control" name="offer_type">
			    <option value="Discount">Discount</option>
			    <option value="Extra">Extra</option>
			</select>
		  </div>
            <button type="submit" name="add_Offer" class="btn btn-primary">Add Offer</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>




<?php
if(isset($_GET['action']) && $_GET['action']=='edit'){

	$Offer_id = $_GET['Offer_id'];
	$Offer = get_record('offer',"where id=$Offer_id")[0];
	extract($Offer);
	 
	 if (isset($_POST['update_Offer'])) {
	     $data = array(
    	    'title' => $_POST['title'],
    		'date_start' => $_POST['date_start'],
		    'date_end' 	=> $_POST['date_end'],
    		'percentage' => $_POST['percentage'],
    		'offer_type' => $_POST['offer_type'],
    	);
	    update('offer',$data,"where id=$Offer_id");
	    redirect('index.php?p=offer'); 
	 }
    
?>
<div class="row">
   <div class="col-xs-12 col-md-6">
      <h2 class="section-title">Edit Offer<a href="index.php?p=offer" class="btn btn-primary pull-right"  >Go back
         </a>
      </h2>
      <br>
      <form class='popup-input' method="post" enctype="multipart/form-data">
          <div class="form-group">
		  	<label>Title</label>
			<input type="text" class="form-control" name="title" value="<?php echo $title;?>" placeholder="" required/>
		  </div>
          <div class="form-group">
		  	<label>Date Start</label>
			<input type="date" class="form-control" name="date_start" value="<?php echo $date_start;?>" placeholder="" required/>
		  </div>
		  <div class="form-group">
		  	<label>Date End</label>		  	
			<input type="date" class="form-control" name="date_end"  value="<?php echo $date_end;?>" placeholder="" required/>
		  </div>
		  <div class="form-group">
		  	<label>Percentage</label>
			<input type="text" class="form-control" name="percentage"  value="<?php echo $percentage;?>" placeholder="" required/>
		  </div>
		  <div class="form-group">
		  	<label>Offer Type</label>
			<select class="form-control" name="offer_type">
			    <option value="discount" value="<?php if($offer_type=='discount'){echo 'discount';}?>" >Discount</option>
			    <option value="extra" value="<?php if($offer_type=='extra'){echo 'extra';}?>" >Extra</option>
			</select>
		  </div>
          <button type="submit" name="update_Offer" class="btn btn-primary">Save changes</button>
		</form>
      </div>
      <br>
   </div>
</div>
<?php 
}?>