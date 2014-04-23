<?php
include '../class/dbconn.class.php';
$u_mail = $_GET['u_mail'];
$checkin = date('Y-m-d',strtotime($_GET['checkin']));
$checkout = date('Y-m-d',strtotime($_GET['checkout']));
$room_no = $_GET['room_no'];
$db = new Database();
$query = "select * from booking where room_no = $room_no and '$checkin' between checkin and checkout";
$db->execute($query);
if(mysql_affected_rows() > 0){
	echo 0;
}
else{
	$query = "insert into booking values ('$checkin','$checkout','$room_no','$u_mail','pending','')";
	$db->execute($query);
	echo 1;
}
?>
