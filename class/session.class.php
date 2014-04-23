<?php
$_SESSION['err']='';
class Session{
    function set_session_user($user){
        $_SESSION['u_mail'] = $user['u_mail'];
        $_SESSION['u_pass'] = $user['u_pass'];
        $_SESSION['u_fname'] = ucfirst(strtolower($user['u_fname']));
        $_SESSION['u_lname'] = ucfirst(strtolower($user['u_lname']));
        $_SESSION['u_role'] = $user['u_type'];
        $_SESSION['id'] = $user['id'];
<<<<<<< HEAD
 
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
        setcookie('u_mail',$_SESSION['u_mail']);
        setcookie('u_pass',$_SESSION['u_pass']);
        setcookie('u_lname',$_SESSION['u_lname']);
        setcookie('u_fname',$_SESSION['u_fname']);
        setcookie('u_role',$_SESSION['u_role']);
        setcookie('id',$_SESSION['id']);
   }
<<<<<<< HEAD
   function set_session_buyer($u_mail){
       if(isset ($u_mail)){
            setcookie('b_item',$this->calcItem($u_mail));
            setcookie('b_amnt',$this->calcAmnt($u_mail));
       }
       else{
           $_SESSION['b_item'] = 0;
           setcookie('b_item',$_SESSION['b_item']);
       }
   }
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
   function  unset_session_user()
   {
       unset ($_SESSION['u_mail']);
       setcookie('u_mail','',time()-3600);
<<<<<<< HEAD
       session_destroy();
   }
   private function calcItem($u_mail){
       $buyer = new Buyer();
       $item = 0;
       $cart = $buyer->getCart($u_mail,'pending');
       foreach ($cart as $c) {
           $item = $item + $c['C_QTY'];
       }
       return $item;
   }
   private function calcAmnt($u_mail){
       $buyer = new Buyer();
       $amnt = 0;
       $cart = $buyer->getCart($u_mail,'pending');
       foreach ($cart as $c) {
           $amnt = $amnt + ($c['I_PRICE'] * $c['C_QTY']);
       }
       return $amnt;
=======
>>>>>>> 652aa883a77e0b97622748a0f5e3be2bd93bac85
   }
}
?>