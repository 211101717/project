<?php
include '../class/dbconn.class.php';
$db = new Database();
$room_no = $_GET['room'];
$query = "select * from room where room_no = $room_no";
$result = $db->execute($query);
while($room = mysql_fetch_array($result)){
	echo "<b>&nbsp;Room no:</b> ".$room['room_no']."<br/>";
	echo "<b>&nbsp;Room type:</b>&nbsp;&nbsp;&nbsp;";
	selectTypes(ucfirst(strtolower($room['room_type'])),$room['room_no']);
	selectCapacity(ucfirst(strtolower($room['room_capacity'])),$room['room_no']);
	echo "<p style='margin:4px 0px 0px 0px'><b>&nbsp;Room rate:</b> R<input class='room_rate$room_no' type='text' value='".$room['room_rate'].".00' style='width:155px'></p>";
	echo "<table><tr><td valign='top'><b>Extras:</b> </td><td><textarea class='room_feat$room_no' style='width:193px;height:35px'>".$room['room_feat']."</textarea></td></tr></table><input type='button' id='input-submit' value='Save' onclick='saveEditRoom()' >";
}
function selectTypes($type,$room_no){
	$types = array("Deluxe","Superior","Standard");
	echo "<select class='room_type$room_no'>";
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
function selectCapacity($capacity,$room_no){
	$capacities = array("King","Queen","Double","Single","Twin");
	echo " <select class='room_capacity$room_no'>";
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