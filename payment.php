<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../moyin/payment.css"></link>
        <script src="index.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>

    <body>

        <div class="container">
            <div class="jumbotron">
                <h2 class="text-green">Pay your Pledge!</h2>
                
            </div>
            <div class="row">
                <form action="/moyin/payment.php" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <h3 class="text-green">Username</h3>
                        <input name="user_name" type="text"></input>
                    </div>
                </div>
                 <br />
                 <br />
                <div class="row flex">
                    <button class="btn btn-primary" type="submit">Pay</button>
                </div>
                </form>
            </div>
           

        </div>

        <?php include 'db_connect.php';
        if($_POST){
            $link = new DB_CONNECT;

            if(isset($_POST['user_name'])){
                $user_name = htmlentities($_POST['user_name']);
            }
    
            $result = mysqli_query($link->connection,"UPDATE `ph` SET `Payment` = 'paid' WHERE `ph`.`Username` = '$user_name'");
            if ($result){
                echo "Sucess";
            }
            else
                echo mysqli_error($link->connection);
        }
        ?>

    </body>
</html>