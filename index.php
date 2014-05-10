<?php
    include 'class/user/user.class.php';
    include 'class/session.class.php';
    include 'class/room.class.php';
    include 'class/dbconn.class.php';
	include 'class/booking.class.php';
    $user = new User();
    if(isset($_GET['q'])){
        if($_GET['q']=='logout'){
            $user->logout();
        }
    }
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/home.php'; ?>
<?php include 'include/footer.php';?>