<?php
class Booking{
	function get_user_bookings($u_mail,$status){
		$query = "select room.room_no,checkin,checkout,room_rate, datediff(checkout,checkin) as num_days from booking,room where u_mail = '$u_mail' and status = '$status' and room.room_no = booking.room_no";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	function check_out($u_mail,$amount_due){
		$invoice_no = $u_mail.$this->generate_invoice($u_mail,$amount_due);
		echo $query = "update booking set status = 'complete', invoice_no = '$invoice_no' where u_mail = '$u_mail' and status = 'pending'";
		$db = new Database();
		$results = $db->execute($query);
	}
	function invoice_no($u_mail){
		$query = "select distinct invoice_no from booking where u_mail = '$u_mail'";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	private function generate_invoice($u_mail,$amount_due){
		$date = date('Y-m-d');
		$query = "insert into invoice values(null,'$u_mail','$date',$amount_due,0)";
		$db = new Database();
		$results = $db->execute($query);
		return mysql_insert_id();
	}
}
?>