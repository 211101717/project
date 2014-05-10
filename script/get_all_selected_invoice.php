<?php
include '../class/dbconn.class.php';
include '../class/booking.class.php';
$status = $_GET['select'];
$booking  = new Booking();
$user_bookings = $booking->get_all_selected_invoices($status);
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
			echo "<p>There are no $status invoices generated yet!</p>";
		}
?>