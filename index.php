<?php
ini_set('display_errors','On');
include('common/common_db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="css/global.css" rel="stylesheet">
</head>
<body>
  <script src="js/common.js"></script>
  <main>
    <p>
      <?php
      $mysqli = db_connect();
      $res = $mysqli->query('SELECT * FROM `first`');
      $res->data_seek(0);
      while ($row = $res->fetch_assoc()) {
        echo $row['text'];
      }
      ?>
    </p>
  </main>
</body>
</html>
