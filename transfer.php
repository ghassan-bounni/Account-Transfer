<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transfer</title>
</head>

<body>
    <form action="transfer.php" method="POST">
        <table>
            <tr>
                <td>Account Source </td>
                <td><input type="text" name="acc_source" /></td>
            </tr>
            <tr>
                <td>Account Destination</td>
                <td><input type="text" name="acc_dest" /></td>
            </tr>
            <tr>
                <td> Quantity </td>
                <td><input type="number" name="quant" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="transfer" value=" transfer" style="width: 100%;" /></td>
            </tr>
        </table>
    </form>

    <?php
    //transfer money
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['transfer'])) {
            $acc_source = $_POST['acc_source'];
            $acc_dest = $_POST['acc_dest'];
            $quant = $_POST['quant'];
            if (isset($_SESSION['accounts'][$acc_source]) && isset($_SESSION['accounts'][$acc_dest])) {
                $source = $_SESSION['accounts'][$acc_source];
                $dest = $_SESSION['accounts'][$acc_dest];
                if ($source['balance'] >= $quant) {
                    $source['balance'] -= $quant;
                    $dest['balance'] += $quant;
                    $_SESSION['accounts'][$acc_source] = $source;
                    $_SESSION['accounts'][$acc_dest] = $dest;
                    echo "Transfer successful";
                } else {
                    echo "Insufficient funds";
                }
            } else {
                echo "Account not found";
            }
        }
    }
    ?>
</body>

</html>