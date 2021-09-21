
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
        <!-- php for displaying the table -->
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


        <!-- php for withdrawing  -->
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $acc = $_POST['acc1'];
                $balance = $_POST['bal'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "banking";

                //connection
                $conn = mysqli_connect($servername, $username, $password , $database);

                if(!$conn){
                    die("Sorry we failed to connect !");
                }
                else{

                    $sql = "UPDATE `customers` SET `Balance`= Balance - $balance WHERE `Account Number` = $acc";
                    $result = mysqli_query($conn , $sql);

                    
                }
            }

        ?>


        <!-- php for Depositing -->        
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $acc = $_POST['acc2'];
                $balance = $_POST['bal'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "banking";

                //connection
                $conn = mysqli_connect($servername, $username, $password , $database);

                if(!$conn){
                    die("Sorry we failed to connect !");
                }
                else{

                    $sql = "UPDATE `customers` SET `Balance`= Balance + $balance WHERE `Account Number` = $acc";
                    $result = mysqli_query($conn , $sql);

                    if($result){
                        echo "Balance transferred successfully!<br>";
                    }
                    else{
                        echo "Unable to transfer the balance!<br>".mysqli_error($conn);
                    }
                }
            }

        ?>
            <form action="./transfer.php" method="POST">
                <div class="transfer">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Sender's Account Number</span><br>
                    <input type="number" class="form-control" name="acc1" required>
                    </div>

                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Receiver's Account Number</span><br>
                    <input type="number" class="form-control" name="acc2" required>
                    </div>
                    
                    <div class="input-group mb-3">
                    <span class="input-group-text">Withdraw Amount</span><br>
                    <input type="numfmt_format_currency" class="form-control" name="bal" required>
                    </div>
                    <br>
                    <button type="submit">Transfer</button>
                    <button><a href="index.php">Back</a></button>
                </div>
            </form>
            
       
    </body>
</html>