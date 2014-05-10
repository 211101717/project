<?php
$booking  = new Booking();
$booking->set_expired_invoice();
if($_COOKIE['u_role'] != 'admin'){
	if(isset($_GET['checkout'])){
					if($_GET['checkout'] != ""){
							$booking->check_out($_COOKIE['u_mail'],$_GET['checkout']);
						}
					echo "<b class='title'>User Bookings</b><br/>";
					$user_bookings = $booking->get_user_invoices($_COOKIE['u_mail']);
					if (mysql_affected_rows() > 0){
						$amount_due = 0;
						echo "<p style='color:gray;position:absolute;margin:46px 0px 0px 255px'>* Please e-mail or fax the PoP(Proof of Payment) after making a payment!
							  <br/>* Note that invoice will expire if paymnet is not made in the next coming two days. Thank you!</p>";
						echo "<br/><table width='25%'><tr><td><b>Invoice</b></td><td><b>Amount Due</b></td></tr>";
							while($user_booking = mysql_fetch_array($user_bookings)){
								echo "<tr><td><a href='invoice.php?q=".$user_booking['invoice_no']."' target='_blank'>Invoice no:".$user_booking['invoice_no']."</a></td><td>R ".number_format($user_booking['amount_due'],2)."</td></tr>";
							}
						echo "</table>";
						echo "<p><b>Payment Options</b><p style='margin-top:5px;margin-bottom:0px'>
							  1. Direct Payment - Guest can pay directly at our hotel reception.</p><p style='margin-top:5px;margin-bottom:0px'>
							  2. EFT - Guest can pay electronicaly to our bank account.</p><p style='margin-top:5px;margin-bottom:0px'>
							  3. Bank Deposit - Guest can deposits payment in our bank account.</p></p>";
						echo "<b>Banking Details are:</b>
							  <p style='margin-top:5px;margin-bottom:0px'>Bank: Standard Bank</p>
							  <p style='margin-top:5px;margin-bottom:0px'>Branch code: 057448</p>
							  <p style='margin-top:5px;margin-bottom:0px'>Acc name: Gae Hotel (PTY) LTD</p>
							  <p style='margin-top:5px;margin-bottom:0px'>Acc no: 243398743</p>
							  <p style='margin-top:5px;margin-bottom:0px'>Acc type:Cheque Account</p>";
					}
					else{
						echo '<p>You no invoices yet!</p>';
					}
				}
				else{
	?>
	<div id='items'>
	<b class="title">Cart:<?php echo $_SESSION['item']; ?></b>
	<?php
		$user_bookings = $booking->get_user_bookings($_COOKIE['u_mail'],'pending');
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
		echo "</div>";
	}
}
else{
	?>
	<b class="title">Bookings</b>
	<select id='select_invoice'>
		<option>Select Bookings</option>
		<option>Expired</option>
		<option>Paid</option>
		<option>Pending</option>
	</select>
	<div id='selected_invoice'>
	<?php
		$user_bookings = $booking->get_all_invoices();
		if (mysql_affected_rows() > 0){
			echo "<br/><table width='800px'><tr><td><b>Invoice</b></td><td><b>User</b></td><td><b>Amount Due</b></td><td></td></tr>";
			while($user_booking = mysql_fetch_array($user_bookings)){
				echo "<tr><td valign='top'><a href='invoice.php?q=".$user_booking['invoice_no']."' target='_blank'>Invoice no:".$user_booking['invoice_no']."</a></td>";
				echo "<td valign='top'>".$user_booking['u_mail']."</td>";
				echo "<td valign='top'>R <b style='font-weight:normal;' id='balance-".$user_booking['invoice_no']."'>".number_format($user_booking['amount_due'],2)."</b></td>";
				echo "<td valign='top' width='200px'><a href='#' id='pay-".$user_booking['invoice_no']."'  onclick='pay(".$user_booking['invoice_no'].")'>Payment</a> 
					  <b style='display:none' id='r-pay-".$user_booking['invoice_no']."'>R:<b><input type='text' id='pay-input-".$user_booking['invoice_no']."' style='display:none;width:50px' > 
					  <a href='#' id='submit-pay-".$user_booking['invoice_no']."' style='display:none' onclick='submitPay(".$user_booking['invoice_no'].")'>Submit</a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else{
			echo '<p>There are no bookings yet!</p>';
		}
	echo "</div>";
}
?>
	
	
	
	
	