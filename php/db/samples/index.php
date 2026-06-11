<?php
require_once("connect_db.php");

$sql = "SELECT * FROM students";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$listStudents = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <h1>List of students</h1>
    <div class="menu-button">
        <a href="add_student.php" class="btn-primary" id="btn-add-student">Add student</a>
        <button type="button" class="btn-primary" id="btn-refresh-list-students">Refresh</button>
    </div>
    <div class="content">
        <table>
            <thead>
                <th>id</th>
                <th>lastname</th>
                <th>firstname</th>
                <th>Gender</th>
                <th>Actions</th>
            </thead>
            <tbody id="tbody-list-students">
                <?php
                foreach ($listStudents as $student) {
                ?>
                    <tr>
                        <td><?= $student["id"] ?></td>
                        <td><?= $student["lastname"] ?></td>
                        <td><?= $student["firstname"] ?></td>
                        <td><?= $student["gender"] ?></td>
                        <td>
                            <a class="btn-delete" href="delete_student.php?id=<?= $student["id"] ?>">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script type="text/javascript" src="js/students.js"></script>
</body>

</html>
