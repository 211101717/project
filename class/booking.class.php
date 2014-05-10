<?php
class Booking{
	function get_user_bookings($u_mail,$status){
		$query = "select room.room_no,checkin,checkout,room_rate, datediff(checkout,checkin) as num_days from booking,room where u_mail = '$u_mail' and status = '$status' and room.room_no = booking.room_no";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	function remove_cart_item($item, $in){
		$query = "delete from booking where room_no = $item and checkin = '$in' and status = 'pending'";
		$db = new Database();
		$results = $db->execute($query);
	}
	function empty_cart($u_mail){
		$query = "delete from booking where u_mail = '$u_mail' and status = 'pending'";
		$db = new Database();
		$results = $db->execute($query);
	}
	function check_out($u_mail,$amount_due){
		$invoice_no = $this->generate_invoice($u_mail,$amount_due);
		$query = "update booking set status = 'complete', invoice_no = '$invoice_no' where u_mail = '$u_mail' and status = 'pending'";
		$db = new Database();
		$results = $db->execute($query);
	}
	function get_user_invoices($u_mail){
		$query = "select * from invoice where u_mail = '$u_mail'";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	function get_invoice_bookings($invoice_no){
		$query = "select room.room_no,checkin,checkout,room_rate, datediff(checkout,checkin) as num_days from booking,room where invoice_no = '$invoice_no'  and room.room_no = booking.room_no";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	function get_all_invoices(){
		$query = "select * from invoice";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	function get_all_selected_invoices($status){
		$status = strtolower($status);
		$query = "select * from invoice where status = '$status'";
		$db = new Database();
		$results = $db->execute($query);
		return $results;
	}
	function set_expired_invoice(){
		$query = "update invoice set status='expired' where (SELECT DATEDIFF(CURDATE(),invoice_date)) > 2 and status = 'pending'";
		$db = new Database();
		$results = $db->execute($query);
		return mysql_affected_rows();
	}
	private function generate_invoice($u_mail,$amount_due){
		$date = date('Y-m-d');
		$query = "insert into invoice values(null,'$u_mail','$date',$amount_due,'pending')";
		$db = new Database();
		$results = $db->execute($query);
		return mysql_insert_id();
	}
}
?>