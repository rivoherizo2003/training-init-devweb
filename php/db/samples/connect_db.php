<?php

try {
    $pdo = new PDO("mysql:host=mysql;dbname=samples", "inventor", "0000");
} catch (PDOException $e) {
    throw $e;
}

