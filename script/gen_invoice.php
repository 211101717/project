<page style="font-size: 12pt; font-famil:calibri">
<div style="margin-left:30px">
	<table width='100%'>
		<tr>
			<td>
				<img src='img/logo.png'>
			</td>
			<td style='padding-left:120px'>
				BO425 Masgung Section<br/>
				Ga-Nchabeleng<br/>
				Apel<br/>
				0739
			</td>
			<td style='padding-left:120px'>
				tel<br/>
				fax<br/>
				mail<br/>
				site<br/>
			</td>
			<td>
				: 0123356789<br/>
				: 0123356789<br/>
				: bookings@gae.co.za<br/>
				: gae.co.za<br/>
			</td>
		</tr>
	</table>
	<div style='margin-top:100px'>
	<?php
	$booking  = new Booking();
	$user_bookings = $booking->get_invoice_bookings($_GET['q']);
	if (mysql_affected_rows() > 0){
		$amount_due = 0;
		echo "<table width='100%'><tr style=''><td><b>Room no</b></td><td style='padding-left:80px;padding-bottom:10px'><b>Check in</b></td><td style='padding-left:80px'><b>Check Out</b></td><td style='padding-left:80px'><b>Rate/Day</b></td><td style='padding-left:80px'><b>Total</b><br/></td></tr>";
			while($user_booking = mysql_fetch_array($user_bookings)){
				echo "<tr><td>".$user_booking['room_no']."</td>";
				echo "<td style='padding-left:80px'>".$user_booking['checkin']."</td>";
				echo "<td style='padding-left:80px'>".$user_booking['checkout']."</td>";
				echo "<td style='padding-left:80px'>R".$user_booking['room_rate'].".00</td>";
				echo "<td style='padding-left:80px'>R".$user_booking['num_days'] * $user_booking['room_rate'].".00</td></tr>";
				$amount_due += $user_booking['num_days'] * $user_booking['room_rate'];
			}
		echo "<tr><td colspan='2' style='font-size:15px'>
			  </td><td style='padding-left:80px'></td><td style='padding-left:80px'><p>Amount Due:</p></td>
			  <td style='padding-left:80px'><p><b>R".$amount_due.".00</b></p></td></tr>";
		echo "</table>";
		echo "<br/><br/><p><b>Payment Options</b><p style='margin-top:5px;margin-bottom:0px'>
		      1. Direct Payment - Guest can pay directly at our hotel reception</p><p style='margin-top:5px;margin-bottom:0px'>
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
		echo '<p>You have not made any bookings yet!</p>';
	}
	?>
	</div>
	<p style="color:orange">* Please e-mail or fax the PoP(Proof of Payment) after making a payment!
	<br/>* Note that invoice will expire if paymnet is not made in the next coming two days. Thank you!</p>
</div>
</page>