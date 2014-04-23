<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gae Hotel</title>
        <link href='style/style.css' rel="stylesheet" type="text/css">
<<<<<<< HEAD
		<link rel="stylesheet" href="jquery-ui-1.10.4.custom/development-bundle/themes/base/jquery.ui.all.css">
		<script src="jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
		<script src="jquery-ui-1.10.4.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script src="jquery-ui-1.10.4.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script src="jquery-ui-1.10.4.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
		<script src="js/jquery-latest"></script>
		<script>
			function setRoom(num){
				$("#room").val(num)
			}
			function bookRook(num){
					$("#room").val($(this).attr('title'));
					$("#error"+$("#room").val()).css('display','none');
					$("#message"+$("#room").val()).css('display','none');
					var room_no = num;
					var u_mail = $('#u_mail').val();
					var checkin = $("#checkin"+num).val();
					var checkout = $("#checkout"+num).val();
					$.ajax({
					type:'GET',
					url:'script/bookroom.php',
					data: {u_mail:u_mail,checkin:checkin,checkout:checkout,room_no:room_no},
					success: function(data){
							if(data == "0"){
								$("#message"+num).css('display','none');
								$("#error"+num).css('display','block');
								$("#error"+num).html("Room booked for selected period, try another room on or select another peroid.");
							}
							if(data == "1"){
								$("#error"+num).css('display','none');
								$("#message"+num).css('display','block');
								$("#message"+num).html("Room added to booking.");
								$(".check-out"+num).css('display','inline');
								$("#dates"+num).css('display','none');
								var cartArray = $("#cart").html().split(':');
								var item = parseInt(cartArray[1])+1;
								$("#cart").html("Cart:"+item);
								$("#checkin"+num).val("");
								$("#checkout"+num).val("");
								$(".continue"+num).click(function(){
								$("#error"+num).css('display','none');
								$(".check-out"+num).css('display','none');
								$("#message"+num).css('display','none');
								$("#dates"+num).css('display','block');
								});
							}
							$("#checkin"+num).datepicker( "option", "maxDate", '01/01/2020');
							$(".check-availability"+num).css('display','none');
						}
					});
			}
			$(document).ready(function() {
				$(".search").click(function(){
					if($(".search-text").val() != ""){
						$(".search").attr('href','room.php?search='+$(".search-text").val());
					}
				})
				$(".book").click(function(){
					$("#room").val($(this).attr('title'));
					$("#error"+$("#room").val()).css('display','none');
					$("#message"+$("#room").val()).css('display','none');
					$(".check-out").css('display','none');
					$(this).css('display','none');
					$("#dates"+$("#room").val()).css('display','block');
					if($("#checkin"+$("#room").val()).val() != "" && $("#checkout"+$("#room").val()).val() != ""){
						$(".check-availability"+$("#room").val()).css('display','block');
					}
					$(function() {
						$("#checkin"+$("#room").val()).datepicker({
							minDate: 'D',
							defaultDate: "+1w",
							changeMonth: true,
							onClose: function( selectedDate ) {
								$("#checkout"+$("#room").val()).datepicker( "option", "minDate", selectedDate );
								if($("#checkout"+$("#room").val()).val() != ""){
									$(".check-availability"+$("#room").val()).css('display','block');
									$("#message"+$("#room").val()).css('display','none');
									$("#error"+$("#room").val()).css('display','none');
								}
							}
						});
						$( "#checkout"+$("#room").val()).datepicker({
							minDate: '+1D',
							defaultDate: "+1w",
							changeMonth: true,
							onClose: function( selectedDate ) {
								$("#checkin"+$("#room").val()).datepicker( "option", "maxDate", selectedDate );
								if($("#checkin"+$("#room").val()).val() != "" && $("#checkout"+$("#room").val()).val() != ""){
									if($("#checkin"+$("#room").val()).val() == $("#checkout"+$("#room").val()).val()){
										$("#message"+$("#room").val()).css('display','block');
										$("#message"+$("#room").val()).html("Check out day can not be equal to Check in day");
										$(".check-availability"+$("#room").val()).css('display','none');
									}
									else{
										$("#message"+$("#room").val()).css('display','none');
										$("#error"+$("#room").val()).css('display','none');
										$(".check-availability"+$("#room").val()).css('display','block');
										//bookRoom();
									}
								}
								else{
									$("#message"+$("#room").val()).css('display','block');
									$("#message"+$("#room").val()).html("Please select both Check in and Check out day");
									$(".check-availability"+$("#room").val()).css('display','none');
								}
							}
						});
					});
				});
			});
		</script>
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
    </head>
    <body>
        <table align="center">
            <tr>
                <td>
                    <div class="header">
						<img src='img/logo.png' id="logo">
                        <div class="main-menu">
                              <a href="room.php">Rooms</a> <a href="#">Contact Us</a> <a href="#">About Us</a> 
<<<<<<< HEAD
                             <?php if(!isset($_COOKIE['u_mail'])){ ?>
=======
                             <?php if(!isset($_COOKIE['u_mail'])){?>
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
                             <a href="register.php">Register</a>  <a href="login.php" id="main-last">Log In</a>
                             <?php //echo $_SESSION['u_mail']; ?>
                             <?php }else{ ?>
                             <?php if($_COOKIE['u_role'] == 'admin'){ ?>
                             <a href="newroom.php">Add Room</a>
                             <a href="account.php">Accounts</a> 
                             <?php } ?>
<<<<<<< HEAD
							 <?php
								$booking = new Booking();
								$user_bookings = $booking->get_user_bookings($_COOKIE['u_mail'],'pending');
								$_SESSION['item']  = mysql_affected_rows();
							 ?>
                             <a href="dashboard.php">Dashboard</a> <a href="bookings.php" id='cart'>Cart:<?php echo $_SESSION['item']; ?></a> <a href="bookings.php?checkout" id='cart'>Invoices</a>   <a href="index.php?q=logout" id="main-last">Log Out</a>
                             <?php } ?>
							 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' placeholder='Search rooms' id='input-text' value='' class='search-text' style='width:150px'> <a  id='input-submit' class='search' style='background-color:white;'>Search</a>
=======
                             <a href="dashboard.php">Dashboard</a>  <a href="index.php?q=logout" id="main-last">Log Out</a>
                             <?php } ?>
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
                        </div>
                    </div>
                        <div class="content">