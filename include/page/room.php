<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of room
 *
 * @author Mmile Jerry Mahlare
 */
?>
<b class="title" >Rooms</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
try{
	$room = new Room();
	if(isset($_GET['save'])){
			$room->editRoom($_GET['room_no'], $_GET['room_type'], $_GET['room_capacity'], $_GET['room_rate'],$_GET['room_feat']);
		}
        if(isset($_GET['delete'])){
            $room->deleteRoom($_GET['delete']);
        }
	if(!isset($_GET['search'])){
		$rooms = $room->getRooms();
	}
	else{
		$rooms = $room->searchRoom($_GET['search']);
		echo "<p><b>".mysql_affected_rows()."</b> results found for ".$_GET['search']." rooms</p>";
	}
	echo "<form method='get' action='".$_SERVER['PHP_SELF']."'><table style='margin-top:15px' >";
	echo "<input id='room' type='hidden'>";
	if(isset($_COOKIE['u_mail'])){
		echo "<input id='u_mail' type='hidden' value='".$_COOKIE['u_mail']."'>";
	}
	while($room = mysql_fetch_array($rooms)){
		if(isset($_GET['edit']) && $_GET['edit'] == $room['room_no']){
		}
		else{
		echo "<tr title='".$room['room_no']."' onMouseOver='setRoom(".$room['room_no'].")'><td valign='top'>";
		echo "<img src='img/room/".$room['room_type']."/".$room['room_pic']."' height='150px' width='200px' style='margin-top:5px'>";
		echo "</td><td valign='top' style='padding-left:10px'><div id='room".$room['room_no']."' >";
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
			echo " <a id='input-submit' class='edit-room' >Edit</a>";
            echo " <a href='?delete=".$room['room_no']."' id='input-submit'>Delete</a>";
		}
		echo "</p></div></td></tr>";
		}
	}
	echo "</table></form>";
	}
	catch(Exception $ex){
		echo "<div class='message'>".$ex->getMessage()."</div>";
	}
	function selectTypes($type){
		$types = array("Deluxe","Superior","Standard");
		echo "<select name='room_type'>";
		foreach($types as $option){
		 if($type == $option){
			echo "<option selected=''>".$option."</option>";
		 }
		 else{
			echo "<option>".$option."</option>";
		 }
		}
		echo "</select>";
	}
	function selectCapacity($capacity){
		$capacities = array("King","Queen","Double","Single","Twin");
		echo " <select name='room_capacity'>";
		foreach($capacities as $option){
		 if($capacity == $option){
			echo "<option selected=''>".$option."</option>";
		 }
		 else{
			echo "<option>".$option."</option>";
		 }
		}
		echo "</select>";
	}
?>
