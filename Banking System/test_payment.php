<?php
$from_name = $_POST["from_name"];
$to_name = $_POST["to_name"];
$amount_to_transfer = $_POST["amount_to_transfer"];
include("connect.php");

$query1 = 'select * from customers';
$result = mysqli_query($conn, $query1);
if (!$result) {
    die("Inavlid query" .  $conn->connect_error);
}


// checking both accounts exits or not

$check = 0;

$query1 = "select * from customers where name='$from_name'";
$result1 = mysqli_query($conn, $query1);
$l1 = mysqli_num_rows($result1);
$query2 = "select * from customers where name='$to_name'";
$result2 = mysqli_query($conn, $query2);
$l2 = mysqli_num_rows($result2);

if ($l1 == 1 && $l2 == 1) {
    $check = 1;
}

$status = "Failed";

if ($check == 1) {
    // updating senders amount
    while ($row = mysqli_fetch_assoc($result1)) {
        $amount_available = $row["amount"];
        if ($amount_available > $amount_to_transfer) {
            $amount_available -= $amount_to_transfer;
            $status = "Success";
        }
    }

    $query2 = "update customers set amount={$amount_available} where name='{$from_name}'";
    $r = mysqli_query($conn, $query2);

    // updating receivers amount
    while ($row = mysqli_fetch_assoc($result2)) {
        if ($status == "Success") {
            $amount_available = $row["amount"];
            $amount_available += $amount_to_transfer;
            $query3 = "update customers set amount={$amount_available} where name='{$to_name}'";
            $r = mysqli_query($conn, $query3);
        }
    }
}

// inserting into transactions history

$d = date("Y/m/d");
$t = date("H:i:s");

$from_name = ucfirst($from_name);
$to_name = ucfirst($to_name);

$query4 = "insert into transactions values('{$d}','{$t}','{$from_name}','{$to_name}','{$amount_to_transfer}','{$status}')";
$res = mysqli_query($conn, $query4);

echo "<script type='text/javascript'>alert('Transaction $status');</script>";
$open = '<script> window.open("make_transaction.html") </script>';
echo $open;
