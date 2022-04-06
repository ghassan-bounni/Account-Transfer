<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delete</title>
</head>

<body>

    <table>
        <tr>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Balance</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($_SESSION['accounts'] as $acc) {
            echo "<tr>";
            echo "<td>" . $acc['num'] . "</td>";
            echo "<td>" . $acc['name'] . "</td>";
            echo "<td>" . $acc['balance'] . "</td>";
            echo "<td><a href='delete.php?num=" . $acc['num'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        if (isset($_GET['num'])) {
            if ($_SESSION['accounts'][$_GET['num']]["balance"] == 0) {
                unset($_SESSION['accounts'][$_GET['num']]);
                header("Location: jsp.php");
            } else {
                echo "Account has balance, cannot delete";
            }
        }

        ?>
    </table>
</body>

</html>