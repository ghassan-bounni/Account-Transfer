<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>main</title>
</head>

<body>
  <a href="createAcc.php">Create an Acc</a>
  <a href="transfer.php">Transfer</a>
  <a href="delete.php">Delete</a>
  <a href="display.php">Display</a>
  <?php print_r($_SESSION["accounts"]) ?>
</body>

</html>