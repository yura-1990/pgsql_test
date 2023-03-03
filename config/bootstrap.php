<?php
require_once 'autoloader.php';
$conn = new Database('localhost', 'test', 'postgres', 'postgres');
Region::$pdo = $conn->connect();
District::$pdo = $conn->connect();
Organization::$pdo = $conn->connect();
Store::$pdo = $conn->connect();
Product::$pdo = $conn->connect();
