<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$room = new Room();
?>
<b class="title">Add new room</b>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
<table width="265px">
    <tr>
        <td align='left'>
                <p><label>Room type: &nbsp;</label><?php selectTypes("Deluxe");?> &nbsp;&nbsp;&nbsp;&nbsp; <?php selectCapacity("King") ?></p>
                <p><label>Room no: </label><br/><input id="input-text" type="number" placeholder="Room number" required="" name="room_no" value="<?php if(isset($_POST['add'])){echo $_POST['room_no']; } ?>"></></p>
                <p><label>Rate(R0,00): </label><br/><input id="input-text" type="number" placeholder="Room rate (R 0.00)" required="" name="room_rate" value="<?php if(isset($_POST['add'])){echo $_POST['room_rate']; } ?>"></></p>
                <p><label>Features: </label><br/><textarea id="input-text" placeholder="Room features" style="height: 40px" required="" name ="room_feat"><?php if(isset($_POST['add'])){echo $_POST['room_feat']; } ?></textarea></p>
                <p><label>Room pic:</label><br/><input type="file" required="" name="room_pic"  value="<?php if(isset($_POST['add'])){echo $_FILES['room_pic']; } ?>"></p>
                <?php                
                    if(isset($_POST['add'])){
                        try{
                          $room->addRoom($_POST['room_no'], $_POST['room_type'], $_POST['room_capacity'], $_POST['room_rate'], $_POST['room_feat'], $_FILES['room_pic']);
                        }
                        catch(Exception $ex){
                            echo "<div class='message'>".$ex->getMessage()."</div>";
                        }
                    }
                ?>
        </td>
    </tr>
    <tr>
        <td align='right'>
                <input id="input-submit" type="submit" value="Add room" name="add">
        </td>
    </tr>
</table>
</form>
<?php
function selectTypes($type){
        $types = array("Deluxe","Superior","Standard");
        echo "<select name='room_type' type='input=submit'>";
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
        echo " <select name='room_capacity' type='input=submit'>";
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
