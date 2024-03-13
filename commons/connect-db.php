<?php

// Kết nối CSDL

$host = DB_HOST;
$dbname = DB_NAME;

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", DB_USERNAME, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    debug("Connection failed: " . $e->getMessage());
}
