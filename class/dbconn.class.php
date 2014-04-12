<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Database{
    private $password="";
    private $username="root";
    private $host="localhost";
    private $database="gae_db";
    function establishConnection(){
       $connection = mysql_connect($this->host, $this->username, $this->password);
       return $connection;
    }
    function selectDatabse(){
        mysql_selectdb($this->database, $this->establishConnection());
    }
    function execute($query){
        $this->selectDatabse();
        $results=mysql_query($query);  
        return $results;
    }
}
?>
