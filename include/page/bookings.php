<?php
$booking  = new Booking();
if(isset($_GET['checkout'])){
				if($_GET['checkout'] != ""){
						$booking->check_out($_COOKIE['u_mail'],$_GET['checkout']);
					}
				$user_invoice = $booking->invoice_no($_COOKIE['u_mail']);
				echo "<b class='title'>User Incoive</b><br/>";
				$user_bookings = $booking->get_user_bookings($_COOKIE['u_mail'],'complete');
				if (mysql_affected_rows() > 0){
					$amount_due = 0;
					echo "<br/><table width='50%'><tr><th align='left'>Room no</th><th align='left'>Check in</th><th align='left'>Check Out</th><th align='left'>Rate/Day</th><th align='left'>Total</th></tr>";
						while($user_booking = mysql_fetch_array($user_bookings)){
							echo "<tr><td>".$user_booking['room_no']."</td>";
							echo "<td>".$user_booking['checkin']."</td>";
							echo "<td>".$user_booking['checkout']."</td>";
							echo "<td>R".$user_booking['room_rate'].".00</td>";
							echo "<td>R".$user_booking['num_days'] * $user_booking['room_rate'].".00</td></tr>";
							$amount_due += $user_booking['num_days'] * $user_booking['room_rate'];
						}
					echo "<tr><td colspan='3'></td><td align='left'>Amount Due:</td>
						 <th align='left'>R".$amount_due.".00</th>";
					echo "</table>";
				}
				else{
					echo '<p>You no invoices yet!</p>';
				}
			}
			else{
?>
<b class="title">Booking:<?php echo $_SESSION['item']; ?></b>
<?php
	$user_bookings = $booking->get_user_bookings($_COOKIE['u_mail'],'pending');
	if (mysql_affected_rows() > 0){
		$amount_due = 0;
		echo "<table width='50%'><tr><th align='left'>Room no</th><th align='left'>Check in</th><th align='left'>Check Out</th><th align='left'>Rate/Day</th><th align='left'>Total</th></tr>";
			while($user_booking = mysql_fetch_array($user_bookings)){
				echo "<tr><td>".$user_booking['room_no']."</td>";
				echo "<td>".$user_booking['checkin']."</td>";
				echo "<td>".$user_booking['checkout']."</td>";
				echo "<td>R".$user_booking['room_rate'].".00</td>";
				echo "<td>R".$user_booking['num_days'] * $user_booking['room_rate'].".00</td></tr>";
				$amount_due += $user_booking['num_days'] * $user_booking['room_rate'];
			}
			if(!isset($_GET['checkout'])){
		echo "<tr><td colspan='3'></td><td align='left'>Amount Due:<p><a href='room.php' id='input-submit'>Add More</a></p></td>
			 <th align='left'>R".$amount_due.".00<p><a href='?checkout=".$amount_due."' id='input-submit'>Check Out</a></p></th></tr>";
			 }
		echo "</table>";
	}
	else{
		echo '<p>You have not made any bookings yet!</p>';
	}
}
?>