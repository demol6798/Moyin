<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../moyin/index.css"></link>
        <script src="index.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    </head>

    <body>
        <!--<?php include 'db_connect.php';
        
        $link = new DB_CONNECT;
 
        $result = mysqli_query($link->connection,"INSERT INTO `ph`(`Username`, `Amount Pledged`, `Payment`, `Amount Used`) VALUES ('micgr7',10000,'unpaid',5000)");
        if ($result){
            echo "Sucess";
        }
        else
            echo mysqli_error($link->connection);

        ?>-->
        <div class="container">
            <div class="jumbotron">
                <h2 class="text-green">Calc App</h2>
                
            </div>
            <div class="row">
                <form action="/moyin/calc.php" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <h3 class="text-green">PH</h3>
                        <input name="PH_LIST" type="text-area"></input>
                    </div>
                    <div class="col-xs-6">
                        <h3 class="text-green">GH</h3>
                        <input name="GH_LIST" type="text-area"></input>
                    </div>
                </div>
                 <br />
                 <br />
                <div class="row flex">
                    <button class="btn btn-primary" type="submit">Calculate</button>
                </div>
                </form>
            </div>
           

        </div>

    </body>
</html>