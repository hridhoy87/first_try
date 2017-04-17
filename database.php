<?php

    $server = "127.0.0.1";
    $username = 'root';
    $password = '1234';
    $database = 'auth';

    try{
        $con = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
    }catch (Exception $exception){
        die("Connection Failed: ".$exception->getMessage());
    }


?>