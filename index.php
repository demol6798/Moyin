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
        <?php include 'db_connect.php';
        
        $link = new DB_CONNECT;
 
        $result1 = mysqli_query($link->connection,"SELECT `Username`, `Amount Pledged` FROM `ph`");
        
        if ($result1){
            echo "Sucess";
            //retreive rows        
            $emails_ph = mysqli_fetch_all($result1);
        }
        else
            echo "No available users";

        $result2 = mysqli_query($link->connection,"SELECT `Username`, `Amount to Receive` FROM `gh`");
        
        if ($result2){
            echo "Sucess";
            //retreive rows        
            $emails_gh = mysqli_fetch_all($result2);
        }
        else
            echo "No available users";
        ?>
        <div class="container">
            <div class="jumbotron">
                <h2 class="text-green">Calc App</h2>
                
            </div>
            <div class="row">
                <form action="/moyin/calc.php" method="post">
                <div class="row">
                    <div class="col-xs-6">
                        <h3 class="text-green">PH</h3> 
                        <ul class="list-group">
                            <?php 
                            foreach($emails_ph as $p){
                                echo "<li class='list-group-item'>".implode("<br/>",$p)."</li>";
                            }?>
                        </ul>
                    </div>
                    <div class="col-xs-6">
                        <h3 class="text-green">GH</h3>
                        <ul class="list-group">
                            <?php 
                            foreach($emails_gh as $p){
                                echo "<li class='list-group-item'>".implode("<br/>",$p)."</li>";
                            }?>
                        </ul>
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