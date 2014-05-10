<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 class Room{
	function getRooms(){
		$db = new Database();
		$query = "select * from room";
		$result = $db->execute($query);
		return $result;
	}
	function editRoom($room_no, $room_type, $room_capacity, $room_rate,$room_feat){
		$db = new Database();
		$query = "update room set room_type='$room_type',room_capacity='$room_capacity',room_rate='$room_rate',room_feat='$room_feat' where room_no = $room_no";
		$result = $db->execute($query);
	}
	function addRoom($room_no, $room_type, $room_capacity, $room_rate,$room_feat,$file){
		$db = new Database();
		$room_pic = $room_no.".png";
		$query = "insert into room values($room_no,'$room_type','$room_capacity','$room_rate','$room_pic','$room_feat')";
		$result = $db->execute($query);
                $this->uploadRoomPic($file,'img/room/'.strtolower($room_type),$room_no);
                if(mysql_affected_rows() > 0){
                    throw new Exception("Room added successful.Click the Rooms tab to view room.");
                }
	}
	function uploadRoomPic($file,$upDir,$fname){
            $upload = new Upload();
            $upload->uploadImageFile($file,$upDir,$fname);
	}
	function deleteRoom($room_no){
		$db = new Database();
		$query = "delete from room where room_no = $room_no";
		$result = $db->execute($query);
	}
	function searchRoom($search){
		$db = new Database();
		$indexes = explode(' ',$search);
		$query = "select * from room where room_type like '%$search%'";
		foreach($indexes as $index){
			$query .= " or room_type like '%$index%' or room_capacity  like '%$index%'";
			$query .= " or room_rate like '%$index%'";
		}
		$result = $db->execute($query);
		return $result;
	}
 }
?>
