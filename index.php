<?php
    include 'class/user/user.class.php';
    include 'class/session.class.php';
    include 'class/room.class.php';
    include 'class/dbconn.class.php';
<<<<<<< HEAD
<<<<<<< HEAD
	include 'class/booking.class.php';
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
    $user = new User();
    if(isset($_GET['q'])){
        if($_GET['q']=='logout'){
            $user->logout();
        }
    }
?>
<?php include 'include/header.php' ?>
<?php include 'include/page/room.php'; ?>
<?php include 'include/footer.php';?>