<?php

class DB
{
    const USER = "root";
    const PASS = "";
    const HOST = "localhost";
    const DB = "registration_site";

    public static function connectToDB()
    {
        $user = self::USER;
        $pass = self::PASS;
        $host = self::HOST;
        $db = self::DB;

        $conn = new PDO("mysql:dbname=$db;host=$host",$user,$pass);

        return $conn;
    }
}