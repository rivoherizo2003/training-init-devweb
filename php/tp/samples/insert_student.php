<?php
require_once("connect_db.php");

$sql = "INSERT INTO students VALUES(null, ?, ? , ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['firstname'], $_POST['lastname'], $_POST['gender']]);

    echo json_encode([
        "status" => "ok"
    ]);

} catch (\Throwable $th) {
    echo json_encode([
        "status" => "ko"
    ]);
}