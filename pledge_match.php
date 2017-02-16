<?php include 'db_connect.php';
 //   if($_POST){
            $link = new DB_CONNECT;
    
            $ph_list = mysqli_query($link->connection,"SELECT `Username`,`Amount Pledged`,`Amount Used` FROM `ph` WHERE `Payment` = 'unpaid' ORDER BY `TIME`");
            $gh_list = mysqli_query($link->connection,"SELECT `Username`,`Amount to Receive`,`Amount Received` FROM `gh` ORDER BY `TIME`");
            
            if ($ph_list && $gh_list){
                echo "Sucess";
            }
            else
                echo mysqli_error($link->connection);

            foreach ($gh_list as $key) {
                $gh_amount = $key['Amount to Receive'];
                $gh_username = $key['Username'];
                $gh_amount_received = $key['Amount Received'];
                $rem_match_amount = $gh_amount - $gh_amount_received; 
             
                foreach ($ph_list as $key2) {
                    if($rem_match_amount == 0)
                        break;
                    
                    $ph_pledge_amount = $key2['Amount Pledged'];
                    $ph_username = $key2['Username'];
                    $ph_amount_used = $key2['Amount Used'];
                    $matchable_amount = $ph_pledge_amount - $ph_amount_used;
                    echo "<br/>" ."Matchable Amount: " .$matchable_amount;
                    echo "<br/>"."Remaining to match: ".$rem_match_amount;
                    echo "<br/>"."Amount used up: ".$ph_amount_used . $ph_username;
                    echo "<br/>"."Pledge Amount: ".$ph_pledge_amount . $ph_username;
                    if($matchable_amount != 0){
                        if($rem_match_amount >= $matchable_amount){
                            $rem_match_amount -= $matchable_amount;
                            $bug = mysqli_query($link->connection,"UPDATE `ph` SET `Amount Used` = $ph_pledge_amount WHERE `ph`.`Username` = '$ph_username'");
                            if($bug)
                                echo "Sucess";
                            else
                                echo "bug";
                            echo "test";
                            mysqli_query($link->connection,"UPDATE `gh` SET `Amount Received` = $ph_pledge_amount WHERE `gh`.`Username` = '$gh_username'");
                            mysqli_query($link->connection,"INSERT INTO `matches`(`ph_Username`,`Amount`,`gh_Username`) VALUES ('$ph_username','$ph_pledge_amount','$gh_username')");                            
                        }
                        else if($rem_match_amount < $matchable_amount){
                            $matchable_amount -= $rem_match_amount;
                            $amount_used_up = $ph_amount_used + $rem_match_amount;
                            $bug2 = mysqli_query($link->connection,"UPDATE `ph` SET `Amount Used` = $amount_used_up WHERE `ph`.`Username` = '$ph_username'");
                            if($bug2)
                                echo "Sucess";
                            else
                                echo "bug";
                            echo "test";
                            mysqli_query($link->connection,"UPDATE `gh` SET `Amount Received` = $gh_amount WHERE `gh`.`Username` = '$gh_username'");
                            mysqli_query($link->connection,"INSERT INTO `matches`(`ph_Username`,`Amount`,`gh_Username`) VALUES ('$ph_username','$rem_match_amount','$gh_username')");
                            $rem_match_amount = 0;
                        }
                    }
                }
            }
 //       } FIX BUG AMOUNT USED IS NOT UPDATING ON FIRST RUN!!!
?>