<?php

include_once('db.php');
include_once('model.php');

$conn = get_connect();
if (!$conn) {
    die("Ошибка подключения к базе данных.");
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User transactions information</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>User transactions information</h1>
  <form action="data.php" method="get">
    <label for="user">Select user:</label>
    <select name="user" id="user">
    <?php
    $users = get_users($conn);
    foreach ($users as $user) {
        echo "<option value=\"" . $user['id']. "\">" . $user['name'] . "</option>";
    }
    ?>
    <input id="submit" type="submit" value="Show">
  </form>

  <div id="data">
      <h2>Transactions of <span id="user_name"></span></h2>
      <table>
          <header><tr><th>Mounth</th><th>Amount</th></tr></header>
          <tbody id="balance">

          </tbody>
       </table>
  </div>
<script src="script.js"></script>
</body>
</html>
