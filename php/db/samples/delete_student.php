<?php

require_once("connect_db.php");

try {
    $stmt = $pdo->prepare("DELETE FROM students WHERE id=:id");
    $stmt->execute([
        "id" => $_GET["id"]
    ]);

    header("Location: http://localhost:8000/samples/");
} catch (Exception $e) {
    throw $e;
}
