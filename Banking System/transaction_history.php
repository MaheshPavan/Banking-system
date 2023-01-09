<!DOCTYPE html>
<html lang="en">

<head>
    <title> View Customer details </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            top: 0;
            left: 0;
            box-sizing: border-box;
        }

        #main {
            width: 100%;
            height: 100%;
            text-align: center;
        }

        h3 {
            margin-top: 10px;
            font-family: sans-serif;
            color: #8458B3;
        }

        .styled-table {
            border-collapse: collapse;
            margin: 20px auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: center;
        }

        .styled-table th,
        .styled-table td {
            padding: 10px 15px;
            text-align: center;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="abcd">
            <img id="img1" src="bank_image.png" />
            <a href="#"> <span style="color : white;font-style: bolder;margin-top: 2px;"> Banking System </span></a>
            <a href="../../sparks foundation/Banking System/index.html" class="underline"> Home </a>
            <a href="../../sparks foundation/Banking System/view_all_customers.php" class="underline"> View All Customers </a>
            <a href="#" class="underline"> Transaction history </a>
            <a href="../../sparks foundation/Banking System/make_transaction.html" class="underline"> Make Transaction </a>
            <a href="contact.html" class="underline"> Contact Us </a>
        </div>

        <h3>Transaction History</h3>
        <table class="styled-table">
            <thead>
                <tr>
                    <th> Date </th>
                    <th> Time </th>
                    <th> From </th>
                    <th> To </th>
                    <th> Amount </th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("connect.php");

                $query = 'select * from transactions';
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    die("Inavlid query" .  $conn->connect_error);
                }

                // sort based on time
                $count = mysqli_num_rows($result);
                if ($count > 0) {
                    $query1 = "SELECT * FROM transactions ORDER BY time DESC";
                    $result = mysqli_query($conn, $query1);

                    // read data from each row

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>
                                <td>' . $row["date"] . '</td>
                                <td> ' . $row["time"] . ' </td>
                                <td> ' . $row["from"] . '</td>
                                <td> ' . $row["to"] . ' </td>
                                <td> ' . $row["amount"] . ' </td>
                                <td> ' . $row["status"] . ' </td>
                            </tr>';
                    }
                }
                else
                {
                     echo '<tr > <td colspan="6" style="text-align:center;"> No Transactions had been made yet </td></tr/>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>