<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Table</title>
</head>
<body>
    <table>
        <tr>
        <th>Account Number</th>
        <th>Customer Name</th>
        <th>E-mail ID</th>
        <th>Current Balance</th>
        </tr>
        <!--php section start-->
        <?php
            $conn = mysqli_connect("localhost","root","5955","pkb");
            $sql = "SELECT * FROM Customers";
            $result = $conn-> query($sql);

            if ($result -> num_rows > 0){
                while($row = $result -> fetch_assoc()){
                    echo "<tr><td>". $row["Account_Number"]."</td><td>". $row["Customer_Name"]."</td><td>" .$row["Email_ID"]."</td><td>".$row["Current_Balance"]."</td></tr>";
                }
            }
            else{
                echo"No Results";
            }
            $conn -> close();
        ?>
        <!--php section end-->
    </table>
</body>
</html>