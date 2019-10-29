<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header" style="background:#8bc34a">
            <button type="button" class="close" data-dismiss="modal">X</button>
            <h2 class="modal-title">Order Summary</h2>
         </div>
         <div class="modal-body" id="modal-summary">
            <div class='' style="font-size:24px">
               <!--<div>-->
               <!--  <h3>Total Time : <span id="totaltime"></span> Minutes</h3>-->
               <!--</div>-->
               <!--<div>-->
               <!--    <span class="fa fa-road"></span> -->
               <!--   <h3>Total Distance : <span id="totaldistance" ></span> Miles </h3>-->
               <!--</div>-->
               <!--<div>-->
               <!--    <h3 class="fa fa-car">Car Type : <span id="car_type" ></span></h3>-->
               <!--</div>-->
               <!--<div>-->
               <!--   <h3 class="fa fa-usd">Total Cost : $<span id="totalcost" ></span></h3>-->
               <!--</div>-->
               <div  class="summary">
                    <span class="fa fa-clock-o"></span>
                     <h3>PickUp Time :</h3>
                     <span id="pickup_time"></span>
                </div>
                <div  class="summary">
                    <span class="fa fa-road"></span>
                     <h3>Total Distance :</h3>
                     <span id="totaldistance"></span>
                     <span class="units"> Miles</span>
                </div>
                <div  class="summary">
                    <span class="fa fa-car"></span>
                     <h3>Car Type : </h3>
                     <span id="car_type"></span>
                </div>
                <div  class="summary">
                    <span class="fa fa-usd"></span>
                     <h3>Total Cost : $</h3>
                     <span id="totalcost"></span>
                </div>
               <div id="directions">
                  <div  class="summary">
                      <span class="fa fa-map-marker"></span>
                     <h3>Start :</h3>
                     <span id="startingpoint"></span>
                  </div>
                  <div id="ridestops"></div>
                  <div class="summary end">
                      <span class="fa fa-map-marker"></span>
                     <h3>End :<br></h3>
                     
                     <span id="endingpoint"></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="payment_card hidden" id="payment_card">
            <?php 
                include('stripe/index.php');
            ?>
         </div>
         <div class="modal-footer">
            <button  id="booknow" type="button" class="btn btn-default button">Pay Now</button>
            <button  id="fixed_booknow" type="button" class="btn btn-default button hidden">Pay Now</button>
         </div>
      </div>
   </div>
</div>