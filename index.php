
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="phpstyle.css">

        
    </head>
    <body>
        <header id="header">
            <a href="index.html" class="logo">The TSF Bank</a>
            
        </header>
        
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "banking";

            //connection
            $conn = mysqli_connect($servername, $username, $password , $database);

            $sql = "SELECT * FROM `customers`";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                echo "<table><tr><th>Account Number</th><th>Customer Name</th><th>Email ID</th><th>Balance</th></tr>";
                while($row = $result->fetch_assoc()){
                    echo "<tr><td>".$row['Account Number']."</td><td>".$row['Customer Name']."</td><td>".$row['Email ID']."</td><td>".$row['Balance']."</td></tr>";
                }
                echo "</table>";
            }
            else {
                echo "0 results";
            }

        ?>
       <br>
       <div class="wid">
       <section id="btns">
            <a href="insert.php" name="btn1">New Customer</a><br><br><br>
            <a href="deposit.php" name="btn2">Deposit</a><br><br><br>
            <a href="withdraw.php" name="btn3">Withdraw</a><br><br><br>
            <a href="transfer.php" name="btn3">Transfer</a>                     
       </section>
        </div>
    </body>
</html>