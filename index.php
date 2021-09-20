
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">

        <style>
            table,th,td{
                border: solid black;
                
                
            }
        </style>
    </head>
    <body>
        
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
       <button><a href="insert.php">New Customer</a></button>
       <button><a href="">Deposit</a></button>
       <button><a href="">Withdraw</a></button>

    </body>
</html>