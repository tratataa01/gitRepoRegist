<?php

namespace models;
use PDO;

class DataBase
{
    private $host;
    private $dbName;
    private $user;
    private $pass;
    public $pdo;

        public function __construct ($hostCopy,$dbNameCopy,$userCopy,$passCopy)
        {
            $this->host = $hostCopy;
            $this->dbName = $dbNameCopy;
            $this->user = $userCopy;
            $this->pass = $passCopy;
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->user,$this->pass);
        }
}
