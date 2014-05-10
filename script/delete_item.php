<?php
include '../class/dbconn.class.php';
include '../class/booking.class.php';
$room = $_GET['room'];
$checkin = $_GET['checkin'];
$booking = new Booking();
$booking->remove_cart_item($room,$checkin);
$user_bookings = $booking->get_user_bookings($_COOKIE['u_mail'],'pending');
$_SESSION['item'] = mysql_affected_rows();
?>
<b class="title">Cart:<?php echo $_SESSION['item']; ?></b>
<?php
if (mysql_affected_rows() > 0){
	$amount_due = 0;
	echo "<table width='55%' border='0'><tr><th align='left'>Room no</th><th align='left'>Check in</th><th align='left'>Check Out</th><th align='left'>Rate/Day</th><th align='left' colspan='3'>Total</th></tr>";
		$i = 0;
		echo "<input type='hidden' id='item'>";
		while($user_booking = mysql_fetch_array($user_bookings)){
			$val = $user_booking['room_no']."&".$user_booking['checkin'];
			echo "<input type='hidden' id='item$i' value='$val'>";
			echo "<tr onmouseover='setItem(".$i.")' title='2014-05-15'><td>".$user_booking['room_no']."</td>";
			echo "<td>".$user_booking['checkin']."</td>";
			echo "<td>".$user_booking['checkout']."</td>";
			echo "<td>R".$user_booking['room_rate'].".00</td>";
			echo "<td>R</td><td align='right'>".$user_booking['num_days'] * $user_booking['room_rate'].".00</td>
				  <td style='padding-top:0px; height:30px; width:100px' ><b id='delete-icon$i' style='display:none'>&nbsp;&nbsp;<a title='Remove Item' onclick='delteItem()'><img src='img/delete_icon.jpg' id='delete'></a>
				  &nbsp;<a href='room.php' title='Add more' ><img src='img/add-icon.png' id='delete' style='max-height:21px!important; max-width:21px!important'></a></b></td></tr>";
			$amount_due += $user_booking['num_days'] * $user_booking['room_rate'];
			$i++;
		}
		if(!isset($_GET['checkout'])){
	echo "<tr><td colspan='3'></td><td align='left'></td>
		 <th valign='middle' align='left'>R</th><th valign='middle' align='right' colspan='1' align='right'>".$amount_due.".00</th>";
		 }
	echo "<td  align='left' style='padding-top:5px' >
		  <a href='?checkout=".$amount_due."'><img src='img/shopping_cart_accept.png' id='cart-icon' title='Check out'></a>
		  <!--a href='?empty' title='Empty cart'><img src='img/shopping_cart_remove.png' id='cart-icon'></a-->
		  </td></tr>";
	echo "</table>";
}
else{
	echo '<p>You have zero items on cart!</p>';
}
?>