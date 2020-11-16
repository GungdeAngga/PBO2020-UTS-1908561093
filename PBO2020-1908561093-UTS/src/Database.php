<?php

class Database
{
    private $serverName;
    private $username;
    private $password;
    private $dbName;

    public function __construct()
    {
        $this->serverName = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "pbo_masukkan";
    }

    public function connect()
    {
        $conn = new mysqli($this->serverName, $this->username, $this->password, $this->dbName);
        return $conn;
    }
}
