<?php

class Database
{
    public $host;
    public $db;
    public $user;
    public $password;
    public function __construct($host,$db,$user,$password)
    {
        $this->host = $host;
        $this->db = $db;
        $this->user = $user;
        $this->password = $password;
    }

    public function connect()
    {
        try {
            $dsn = "pgsql:host=$this->host;port=5433;dbname=$this->db;";

            $pdo = new PDO($dsn, $this->user, $this->password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

            if ($pdo) {
                return $pdo;
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        } finally {
            if ($pdo) {
                $pdo = null;
            }
        }
    }
}