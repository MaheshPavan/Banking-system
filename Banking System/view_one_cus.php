<!-- <!DOCTYPE html> -->
<html lang="en">

<head>
    <title>View customer</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <style>
        pre {
            font-size: 20px;
            font-family: "Raleway";
        }

        #outer_div {
            display: flex;
            flex-direction: row;
            background-color: rgb(221, 226, 166);
        }

        #data {
            width: 50%;
            height: 10%;
            margin-top: 120px;
            margin-left: 100px
        }
        
    </style>
</head>

<body>
    <section id="abcd">
        <img id="img1" src="bank_image.png" />
        <a href="#"> <span style="color : white;font-style: bolder;margin-top: 2px;"> Banking System </span></a>
        <a href="index.html" class="underline"> Home </a>
        <a href="view_all_customers.php" class="underline"> View All Customers </a>
        <a href="transaction_history.php" class="underline"> Transaction history </a>
        <a href="make_transaction.html" class="underline"> Make Transaction </a>
        <a href="contact.html" class="underline"> Contact Us </a>
    </section>

    <?php
    include("connect.php");
    $name = $_GET["name"];
    $query = "select * from customers where name='$name'";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Inavlid query" .  $conn->connect_error);
    }


    while ($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        $phone = $row['phone'];
        $amount = $row['amount'];
        echo '<div id="outer_div">
        <div style="width: 35%;height:350px;text-align: center;margin-top: 90px;margin-left: 80px;" >
          <img  src="profile.png" alt="profile image" height="70%" >
        </div>
        <div id="data">
              <pre> Name          :      ' . "$name" . ' </pre>
              <pre> Email           :      ' . "$email" . ' </pre>
              <pre> Phone         :      ' . "$phone" . ' </pre>
              <pre> Amount       :      &#x20B9;' . "$amount" . ' </pre>
        </div>
       </div>
       <iframe src="footer.html" frameborder="0"></iframe>';
    }



    ?>

</body>

</html>