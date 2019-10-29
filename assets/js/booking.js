var fixed_charges=50;
var pickup_time ;
var selected_trip;
var car_title=$(".car.active .car-title").text();
var loginUser = $("#session").text();
    loginUser = loginUser.replace( /\s/g, '');
    console.log('abc'+loginUser);
    
function price_after_discount(actualPrice){
    
    var getCost = parseFloat(actualPrice);
    var getOffer = $('#get_offer').val();
    if(getOffer.length>1){
        getOffer=getOffer.split(':')
        var offer_amount = getOffer[0];
        var offer_type =  getOffer[1];
        
        //calc
        calc = getCost*offer_amount/100;
        calc = calc.toFixed(2);
        calc = parseFloat(calc);
        var total;
        //check offer type
        if(offer_type=='discount'){
            total = getCost-calc
        }else{
            total = getCost+calc
        }
        total = total.toFixed(2);
        $('#totalcost').text(total)
    }
}   
function showsummary() {
    var startsum = document.getElementById('start').value;
    var endsum = document.getElementById('end').value;
    var sumitem="";
    
    for (i = 0; i < waypts.length; i++) {
        var j = i + 1;
        sumitem += "<div class='summary'><h3>" + 'Stop ' + j + ' :<br>' + "</h3><span class='wayPoint fa fa-map-marker'></span><span> " + waypts[i].location + "</span></div>";
    }
    var startdate = document.getElementById('date2').value;
    var starttime = document.getElementById('time2').value;
    pickup_time = starttime +"/"+ startdate;
    var orderdetails = {
        Start: startsum,
        Stops: waypts,
        End: endsum,
        Time: starttime,
        Date: startdate,
        Distance: totalDist ,
        CarTitle: car_title,
        FixedCharges: fixed_charges,
        TripCost: fixed_charges * totalDist ,
        TripDuration: totalTime
    };
    console.log()
    // alert($(".adp-summary span:first-child").html());
    $(".adp-summary").each(function(){
      var getdist = $(this).find('span:first-child').text();
       console.log(getdist);
    });
    
    $('#pickup_time').text(pickup_time);
    $('#car_type').text(car_title);
    $('#pickup_time').text();
    $('#totaldistance').text(totalDist );
    var trip_type = $("input[name='trip_type']:checked"). val();
    $.ajax({
        url:'dashboard/request.php',
        method:'post',
        data:{requestType:'price_range',totalDistance:Math.floor(totalDist),trip_type:trip_type,form:startsum,to:endsum},
        success:function(res_price){
            fixed_charges = res_price
            totalCost = fixed_charges * totalDist;
            $('#totalcost').text(totalCost);
            price_after_discount(totalCost)
        }
    })
   
    $("#startingpoint").text(startsum);
    $('#ridestops').html(sumitem);
    $("#endingpoint").text(endsum);
    $('#myModal').modal('show');
}
function fixedorder(){
    $('#myModal .modal-body').empty();
    var trip_id = $( "input:checked" ).val();
    var selectedtrip_data =$( "input:checked" ).closest('tr').find('.fixedtrip_data').val()
    selected_trip = JSON.parse(selectedtrip_data);
    $('#modal-summary').append('<span>Trip Name : <span>'+selected_trip.trip_name+'<br><br>');
    $('#modal-summary').append('<span>Starting Point : <span>'+selected_trip.starting_point+'<br><br>');
    $('#modal-summary').append('<span>Ending Point : <span>'+selected_trip.ending_point+'<br><br>');
    $('#modal-summary').append('<span>Car Type : <span>'+selected_trip.car_name+'<br><br>');
    $('#modal-summary').append('<span>Trip Cost : $<span>'+selected_trip.fixed_price+'<br>');
    // fixed_order(selected_trip);
    
    $('#fixed_booknow').removeClass("hidden");
    $('#booknow').addClass("hidden");
    $('#myModal').modal('show');
}


function fixedorder_book(trip_data){
        var order_date = new Date();
        var pickup_date = $('#fpickdate').val();
        var pickup_time = $('#fpicktime').val();
        var user_type = $('#fpicktime').val();
        var car_id = trip_data['car_id'];
        var trip_id=trip_data['id'];
        
        var res;
        console.log(trip_data);
         $.ajax({
        url: 'dashboard/request.php',
        method: 'post',
        data: {
            'user_id':loginUser,
            'order_date':order_date,
            'car_id':car_id,
            'pickup_date':pickup_date,
            'pickup_time':pickup_time,
            'trip_data': trip_data,
            'user_type': user_type,
            'requestType': 'fixedorder'
        },
        success: function(response) {
            res = response;
            console.log(res);
            if (res == 'nologin') {
                var modalhead = '<h3>Login Or Submit Order As a Guest</h3>'
                var promptlogin = '<p class="">'+'<a data-toggle="modal" data-target="" class="btn btn-default button">Order As Guest</a>'+'<a class="btn btn-default button" data-toggle="modal" data-target="#sign_in_modal" class=\'active\'><i class="fa fa-sign-in"></i> Sign In</a>'+'</p>';
                $('#modal-summary').empty();
                $('.modal-header').empty();
                $('#modal-summary').append(modalhead);
                $('#modal-summary').append(promptlogin);
            }
            else if(res=='Order Submitted'){
                 $('#modal-summary').empty();
                 //$('#modal-summary').append('<h2>Order Submitted</h2>');
                 $('#fixed_booknow').addClass('hidden');
                 $('#payment_card').removeClass('hidden');
                 
            }
        }
    });
    return res;
}

$('#fixed_booknow').click(function(){
    fixedorder_book(selected_trip);
});

function order(user_id, order_time, order_date, pickup_time, pickup_date,
    departure, stops, destination, trip_distance,car_title , fixed_charges, order_status,user_type) {
    var res;
         $.ajax({
        url: 'dashboard/request.php',
        method: 'post',
        data: {
            'requestType': 'order',
            'user_id': user_id,
            'order_time': order_time,
            'order_date': order_date,
            'pickup_time': pickup_time,
            'pickup_date': pickup_date,
            'departure': departure,
            'stops': stops,
            'destination': destination,
            'trip_distance': trip_distance,
            'car_title': car_title,
            'fixed_charges': fixed_charges,
            'order_status': 'pending',
            'user_type': user_type
        },
        success: function(response) {
            res = response;
            console.log(res);
            if (res == 'nologin') {
                var modalhead = '<h3>Login Or Submit Order As a Guest</h3>'
                var promptlogin = '<p class="">'+'<a data-toggle="modal" data-target="" class="btn btn-default button">Order As Guest</a>'+'<a class="btn btn-default button" data-toggle="modal" data-target="#sign_in_modal" class=\'active\'><i class="fa fa-sign-in"></i> Sign In</a>'+'</p>';
                $('#modal-summary').empty();
                $('.modal-header').empty();
                $('#modal-summary').append(modalhead);
                $('#modal-summary').append(promptlogin);
            }
        }
    });
    return res;
}

// validations
$('#bookingsmry').click(function(){
    if (formValidator('#booking') == 0) {
        $('#bookingsmry').html('Wait..')
        setTimeout(function(){
            showsummary();
            $('#bookingsmry').html('Book Now')
        },3000)
    }
    if($("#fixed").hasClass("active")){
        fixedorder();
    }
});



// Book Now
$('#booknow').click(function(){
    if (formValidator('#booking') == 0) {
        var dNow = new Date();
        var userId = 123;
        var orderDate = dNow.getMonth() + '/' + dNow.getDate() + '/' + dNow.getFullYear();
        var orderTime = dNow.getHours() + ':' + dNow.getMinutes();
        var pickupTime = $('#time2').val();
        var pickupDate = $('#date2').val();
        
        var start = $('#start').val();
        var stops = JSON.stringify(waypts);
        var end = $('#end').val();
        var tripDistance = totalDist ;
        var carTitle = car_title;
        var fixedCharges = $('#totalcost').text();
        var orderStatus = 'Pending Approval';
        var usertype = $('#usertype').val();
        //var response 

        var responseorder = order(userId, orderDate, orderTime, pickupTime, pickupDate, start, stops, end, tripDistance, carTitle,fixedCharges, orderStatus,usertype);
        if(responseorder=="undefined"){
            console.log(responseorder);
        }else{
             $("#modal-summary").empty();
             //$("#modal-summary").append("<p>Your Order Has Been Submitted</p>");
             $("#booknow").addClass("hidden");
             setInterval(function(){
                // $('#myModal').modal('hide')
                 // window.location.reload();
             },3000);
             
            $('#payment_card').removeClass('hidden');
                 
        }
    }
});
$('.car').click(function(){
    $( ".car" ).removeClass( "active" );
    $(this).addClass('active');
    fixed_charges = $( ".car.active .fixed-charges" ).text();
    car_title = $( ".car.active .car-title" ).text();
});

 $('#b_btnlogin').click(function(){
      if(formValidator('#user_login')==0){
      var email = $('#b_login_email').val();
      var password = $('#b_login_password').val();
      var rep = b_signIn( email , password );
      }
      });
      
  $('#b_btnsignup').click(function(){
       if(formValidator('#guest_login')==0){
      var name = $('#b_signup_name').val();
      var email = $('#b_signup_email').val();
      var phone = $('#b_signup_name').val();
      var password = "mypassword";
      var checksignup = signUp_guest( email,name ,phone ,password );
       }
      });
