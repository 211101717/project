<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gae Hotel</title>
        <link href='style/style.css' rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="jquery-ui-1.10.4.custom/development-bundle/themes/base/jquery.ui.all.css">
		<script src="jquery-ui-1.10.4.custom/js/jquery-1.10.2.js"></script>
		<script src="jquery-ui-1.10.4.custom/development-bundle/ui/jquery.ui.core.js"></script>
		<script src="jquery-ui-1.10.4.custom/development-bundle/ui/jquery.ui.widget.js"></script>
		<script src="jquery-ui-1.10.4.custom/development-bundle/ui/jquery.ui.datepicker.js"></script>
		<script src="js/jquery-latest"></script>
		<script>
			//delete from cart
			function delteItem(){
				key = $("#item").val().split('&');
				room = key[0];
				checkin = key[1];
				$.ajax({
					type:'GET',
					url:'script/delete_item.php',
					data: {room:room,checkin:checkin},
					success: function(data){
						$("#items").html(data);
						cart = $("#cart").html();
						item = parseInt(cart)-1;
						$("#cart").html(item);
					}
				});
			}
			function setItem(no){
				$("#item").val($("#item"+no).val());
				$("#delete-icon"+no).css('display','inline');
				$(this).mouseout(function(){
					$("#delete-icon"+no).css('display','none');
				})
			}
			//end delete from cart
			function saveEditRoom(){ 
				room = $("#room").val();
				room_type = $(".room_type"+room).val();
				room_capacity = $(".room_capacity"+room).val();
				room_rate = $(".room_rate"+room).val();
				room_feat = $(".room_feat"+room).val();
				$.ajax({
					type:'GET',
					url:'script/save_edit_room.php',
					data: {room:room,room_type:room_type,room_capacity:room_capacity,room_rate:room_rate,room_feat:room_feat},
					success: function(data){
						$("#room"+room).html(data);
					}
				});
			}
			function editRoom(){
				room = $("#room").val();
				$.ajax({
						type:'GET',
						url:'script/edit_room.php',
						data: {room:room},
						success: function(data){
							$("#room"+room).html(data);
						}
					});
			}
			$(function() {
				$(".edit-room").click(function(){
					room = $("#room").val();
					$.ajax({
							type:'GET',
							url:'script/edit_room.php',
							data: {room:room},
							success: function(data){
								$("#room"+room).html(data);
							}
						});
				});
			});
			$(function() {
				$("#select_invoice").change(function(){
					var select = $(this).val();
					if(select != "Select"){
						$.ajax({
							type:'GET',
							url:'script/get_all_selected_invoice.php',
							data: {select:select},
							success: function(data){
								$("#selected_invoice").html(data);
							}
						});
					}
				});
			});
			//pay room
			function submitPay(invoice_no){
				var pay  = $("#pay-input-"+invoice_no).val();
				$.ajax({
					type:'GET',
					url:'script/payroom.php',
					data: {invoice_no:invoice_no, pay:pay},
					success: function(data){
						$("#balance-"+invoice_no).html(data);
						$("#pay-input-"+invoice_no).css('display','none');
						$("#pay-"+invoice_no).css('display','inline');
						$("#submit-pay-"+invoice_no).css('display','none');
						$("#r-pay-"+invoice_no).css('display','none');
					}
				})
			}
			function pay(invoice_no){
				$("#pay-input-"+invoice_no).css('display','inline');
				$("#pay-"+invoice_no).css('display','none');
				$("#submit-pay-"+invoice_no).css('display','inline');
				$("#r-pay-"+invoice_no).css('display','inline');
			}
			//end pay room
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
								var cart = $("#cart").html();
								var item = parseInt(cart)+1;
								$("#cart").html(item);
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
				//Search function
				$(".search-button").click(function(){
					if($(".search-text").val() != ""){
						$(".search-button").attr('href','room.php?search='+$(".search-text").val());
					}
					else{
						window.alert("Please enter a search term");
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
    </head>
    <body>
		<br/>
        <table align="center">
            <tr>
                <td>
                    <div class="header">
						<a href='index.php'><img src='img/logo.png' id="logo"></a>
						<?php
						$booking = new Booking();
						if(isset($_COOKIE['u_mail'])){
							$user_bookings = $booking->get_user_bookings($_COOKIE['u_mail'],'pending');
							$_SESSION['item']  = mysql_affected_rows();
						}
						else{
							$_SESSION['item']  = 0;
						}
					    ?>
						<div id="shopping-cart"><a href="bookings.php" id='cart'><?php if(isset($_SESSION['item'])){echo $_SESSION['item'];}else echo 0; ?></a></div>
                        <div class="main-menu">
							<table  width='900px'>
								<tr>
									<td>
									  <a href="index.php">Home</a> <a href="room.php">Rooms</a> <a href="contact.php">Contact Us</a>
									  <?php if(!isset($_COOKIE['u_mail'])){ ?>
									  <a href="register.php">Register</a>  <a href="login.php" id="main-last">Log In</a>
									  <?php //echo $_SESSION['u_mail']; ?>
									  <?php }else{ ?>
									  <?php if($_COOKIE['u_role'] == 'admin'){ ?>
									  <a href="newroom.php">Add Room</a>
									  <a href="account.php">Accounts</a> 
									  <?php } ?>
									  <a href="dashboard.php">Dashboard</a> 
									  <?php if($_COOKIE['u_role'] != 'admin'){ ?>
									  <a href="bookings.php?checkout" id='cart'>Invoices</a>  
									  <?php }else{?>
									  <a href="bookings.php?checkout" id='cart'>Bookings</a>
									  <?php } ?>
									  <a href="index.php?q=logout" id="main-last">Log Out</a>
									  <?php } ?>
									</td>
									<td align='right'>
										<!--Search-->
										<div id='search-area' style='width:200px'>
											<input type='text' placeholder='Search rooms'  value='' class='search-text' ><a  class='search-button'  style='color:black; background:none;'><img src='img/search-icon.png'></a>
										</div>
									</td>
								</tr>
							</table>
                        </div>
                    </div>
                        <div class="content">