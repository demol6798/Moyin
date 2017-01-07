<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="index.css"></link>
        <script src="index.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>

    <body>
        <?php include 'db_connect.php';
        
        $link = new DB_CONNECT;
 
        $result = mysqli_query($link->connection,"INSERT INTO `ph`(`Username`, `Amount Pledged`, `Payment`, `Amount Used`) VALUES ('micgr7',10000,'unpaid',5000)");
        if ($result){
            echo "Sucess";
        }
        else
            echo mysqli_error($link->connection);

        ?>
        <div class="container">
            <div class="jumbotron">
                <h2>Calc App</h2>
            </div>
        </div>

    </body>
</html>