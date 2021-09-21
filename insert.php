
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
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="About.html" class="active">About</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="Transaction.html">Transaction</a></li>
                <li><a href="https://www.thesparksfoundationsingapore.org/" target="_blank">TSF</a></li>
            </ul>
        </header>
        
        <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $mail = $_POST['mail'];
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

                    $sql = "INSERT INTO `customers` (`Account Number`, `Customer Name`, `Email ID`, `Balance`) VALUES (NULL, '$name', '$mail', '$balance')";
                    $result = mysqli_query($conn , $sql);

                    if($result){
                        echo "New account created successfully!<br>";
                    }
                    else{
                        echo "Unable to create New account !<br>";
                    }
                }
            }

        ?>
            
            <form action="./insert.php" method="POST">
                <div class="main">
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Customer Name</span><br>
                    <input type="text" class="form-control" name="name" required>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon2">Email ID</span><br>
                    <input type="email" class="form-control" name="mail" required>
                    </div>
                    <br>
                    <div class="input-group mb-3">
                    <span class="input-group-text">Balance($)</span><br>
                    <input type="numfmt_format_currency" class="form-control" name="bal" required>
                    </div>
                    <br>
                    <button type="submit">Create Account</button>
                    <button><a href="index.php">Back</a></button>
                </div>
            </form>
            
       
    </body>
</html>