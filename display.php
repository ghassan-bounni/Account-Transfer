<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Display</title>
</head>

<body>


    <table>
        <tr>
            <th>Account Number</th>
            <th>Account Name</th>
            <th>Address</th>
            <th>Tel</th>
            <th>Balance</th>
        </tr>
        <?php

        if (isset($_GET['page']) && !empty($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $perpage = 2;
        $first =   ($page * $perpage) - $perpage;
        $tab = array_slice($_SESSION['accounts'], $first, $perpage);
        foreach ($tab as $acc) {
            echo "<tr>";
            echo "<td>" . $acc['num'] . "</td>";
            echo "<td>" . $acc['name'] . "</td>";
            echo "<td>" . $acc['address'] . "</td>";
            echo "<td>" . $acc['tel'] . "</td>";
            echo "<td>" . $acc['balance'] . "</td>";
            echo "</tr>";
        }

        $count = count($_SESSION['accounts']);
        $pages = ceil($count / $perpage);


        ?>

    </table>
    <?php
    for ($i = 1; $i <= $pages; $i++) {
        echo "<a href='display.php?page=" . $i . "'>" . $i . "</a>";
    } ?>
</body>

</html>