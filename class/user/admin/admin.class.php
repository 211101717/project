<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author Mmile Jerry Mahlare
 */
class Admin {
    //put your code here
    function getAccounts($email){
        $db = new Database();
        $query = "select * from user where u_mail != '$email'";
        $result = $db->execute($query);
        return $result;
    }
}
?>
