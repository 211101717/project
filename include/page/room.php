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
<b class="title">Rooms</b>
<?php
	$room = new Room();
	if(isset($_GET['save'])){
			$room->editRoom($_GET['room_no'], $_GET['room_type'], $_GET['room_capacity'], $_GET['room_rate'],$_GET['room_feat']);
		}
        if(isset($_GET['delete'])){
            $room->deleteRoom($_GET['delete']);
        }
	$rooms = $room->getRooms();
	echo "<form method='get' action='".$_SERVER['PHP_SELF']."'><table style='margin-top:15px' >";
	while($room = mysql_fetch_array($rooms)){
		if(!isset($_GET['edit'])){
		echo "<tr><td>";
		echo "<img src='img/room/".$room['room_type']."/".$room['room_pic']."' height='150px' width='200px'>";
		echo "</td><td valign='top' style='padding-left:10px'>";
		echo "<b>Room no:</b> ".$room['room_no']."<br/>";
		echo "<b>Room type:</b> ".ucfirst(strtolower($room['room_type']))." ".ucfirst(strtolower($room['room_capacity']))."<br/>";
		echo "<b>Room rate:</b> R".$room['room_rate'].".00<br/>";
		echo "<b>Features:</b> ";
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
		echo "<a href='#' id='input-submit'>Book</a>";
		if(isset($_COOKIE['u_mail']) && $_COOKIE['u_role'] == 'admin'){
			echo " <a href='?edit=".$room['room_no']."' id='input-submit'>Edit</a>";
            echo " <a href='?delete=".$room['room_no']."' id='input-submit'>Delete</a>";
		}
		echo "</p></td></tr>";
		}else{
		    if( $_GET['edit'] == $room['room_no']){
				echo "<tr><td>";
				echo "<input type='hidden' name='room_no' value='".$room['room_no']."'>";
				echo "<img src='img/room/".$room['room_type']."/".$room['room_pic']."' height='150px' width='200px'>";
				echo "</td><td  style='padding-left:10px; vertical-align:top'>";
				echo "<b>Room no:</b> ".$room['room_no']."<br/>";
				echo "<b>Room type:</b> ";
				selectTypes(ucfirst(strtolower($room['room_type'])));
				selectCapacity(ucfirst(strtolower($room['room_capacity'])));
				echo "<p style='margin:4px 0px 0px 0px'><b>Room rate:</b> R<input name='room_rate' type='text' value='".$room['room_rate'].".00'></p>";
				echo "<table><tr><td valign='top'><b>Features:</b> </td><td><textarea name='room_feat' style='width:162px;height:35px'>".$room['room_feat']."</textarea></td></tr></table><input type='submit' id='input-submit' value='Save' name='save'></td></tr>";
			}
		}
	}
	echo "</table></form>";
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
