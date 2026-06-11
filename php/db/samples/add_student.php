<?php
require_once("connect_db.php");
?>
<!DOCTYPE html>
<html>

<head>
  <title>add student</title>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/form.css" />
</head>

<body>
  <h2>Add student</h2>
  <form action="insert_student.php" id="form-add-student"  class="form form-add-student" method="post">
    <div class="form-row">
      <label for="txt-lastname">Lastname</label>
      <input type="text" name="lastname" value="Rakoto" id="txt-lastname">
    </div>
    <div class="form-row">
      <label for="txt-firstname">Firstname</label>
      <input type="text" name="firstname" id="txt-firstname" value="be">
    </div>
    <div class="form-row">
      <div class="gender-radio-button">
        <input type="radio" checked name="gender" value="M" id="txt-gender-H">
        <label for="txt-gender-H">Male</label>

        <input type="radio" name="gender" value="F" id="txt-gender-F">
        <label for="txt-gender-F">Female</label>
      </div>
    </div>
    <button type="submit" class="btn-primary">Créer</button>
  </form>
  <script src="js/add_student.js"></script>
</body>

</html>