<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class DatabaseConnection
{
    private $password="";
    private $username="root";
    private $host="localhost";
    function establishConnection()
    {
       $connection = mysql_connect($this->host, $this->username, $this->password);
       return $connection;
    }
    function execute($query)
    {
        $results=mysql_query($query);  
        return $results;
    }
}
?>
