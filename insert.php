
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
            <div class="about">
                <form action="./insert.php" method="POST">
                    <h2>Account Information</h2>
                    
                    <div class="text-box">
                        <span class="input-group-text" id="basic-addon1">Customer Name</span><br>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                   <br>
                    <div class="text-box">
                       <span class="input-group-text" id="basic-addon2">Email ID</span><br>
                        <input type="email" class="form-control" name="mail" required>
                    </div>
                    <br>
                    <div class="text-box">
                        <span class="input-group-text">Balance($)</span><br>
                        <input type="numfmt_format_currency" class="form-control" name="bal" required>
                    </div>
                    <br>
                    <button type="submit">Create Account</button>
                    <section>
                    <a href="index.php">Back</a>
                    </section>
                </form>
            </div>
            
       
    </body>
</html>