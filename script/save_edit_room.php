<?php
include '../class/dbconn.class.php';
include '../class/room.class.php';
$room_no = $_GET['room'];
$room_type = $_GET['room_type'];
$room_capacity = $_GET['room_capacity'];
$room_rate = $_GET['room_rate'];
$room_feat = $_GET['room_feat'];
$room = new Room();
$room->editRoom($room_no, $_GET['room_type'], $_GET['room_capacity'], $_GET['room_rate'],$_GET['room_feat']);
$db = new Database();
$query = "select * from room where room_no = $room_no";
$result = $db->execute($query);
while($room = mysql_fetch_array($result)){
	echo "<b>Room no:</b> ".$room['room_no']."<br/>";
	echo "<b>Room type:</b> ".ucfirst(strtolower($room['room_type']))." ".ucfirst(strtolower($room['room_capacity']))."<br/>";
	echo "<b>Room rate:</b> R".$room['room_rate'].".00<br/>";
	echo "<b>Extras:</b> ";
	$i = 0;
	$qty = count(explode(',',$room['room_feat']));
	foreach(explode(',',$room['room_feat']) as $feat){
		echo ucwords(strtolower($feat));
		if($i != ($qty-2)){
			if($i != ($qty-1)){
				echo " , ";
			}
		}
		else{
			echo " and ";
		}
		$i++;
	}
	echo "<p>";
	if(isset($_COOKIE['u_mail'])){
		if($_COOKIE['u_role'] != 'admin'){
			echo "<a  id='input-submit' class='book' onclick='bbb()' title='".$room['room_no']."'>Book</a> ";
			echo "<div class='check-out".$room['room_no']."' style='display:none'><a id='input-submit' class='continue".$room['room_no']."'>Continue Booking</a> ";
			echo "<a href='bookings.php' id='input-submit'>Check Out</a></div>";
			echo "<div id='dates".$room['room_no']."' style='display:none'><b>Check in:</b> <input type='text' id='checkin".$room['room_no']."'>&nbsp;&nbsp;";
			echo "<b>Check out: </b><input type='text' id='checkout".$room['room_no']."'></div>";
			echo "<div class='message' id='message".$room['room_no']."' style='display:none; min-width:420px'></div>";
			echo "<div class='message' id='error".$room['room_no']."' style='display:none; min-width:420px'></div>";
			echo "<p><a  id='input-submit' style='display:none; width:50px;text-align:center;' class='check-availability".$room['room_no']."' title='".$room['room_no']."' onClick='bookRook(".$room['room_no'].")'>Book</a></p>";
		}
	}
	else{
		echo "<a href='login.php' id='input-submit' title='Log in to book a room'>Book</a>";
	}
	if(isset($_COOKIE['u_mail']) && $_COOKIE['u_role'] == 'admin'){
		echo " <a id='input-submit' onclick='editRoom()' >Edit</a>";
		echo " <a href='?delete=".$room['room_no']."' id='input-submit'>Delete</a>";
	}
	echo "</p>";
}
?>