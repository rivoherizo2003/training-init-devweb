<?php
require_once("connect_db.php");

$sql = "SELECT * FROM students";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$listStudents = $stmt->fetchAll();

foreach ($listStudents as $student) {
    echo "<tr>";
        echo "<td>".$student["id"]."</td>";
        echo "<td>". $student["lastname"] ."</td>";
        echo "<td>". $student["firstname"] ."</td>";
        echo "<td>". $student["gender"] ."</td>";
        echo "<td>";
        echo "<a class='btn-delete' href='delete_student.php?id=". $student["id"]."'>Delete</a>";
        echo "</td>";
    echo "</tr>";
}