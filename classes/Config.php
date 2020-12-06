<?php
class Config{
    public function __construct(){
        $dbHostName  = "localhost";
        $dbUserName  = "root";
        $dbPassword    ="";
        $dbName          ="crud";
       mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbName);
    }
}

?>