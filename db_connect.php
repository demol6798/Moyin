<?php


define('DB_USER', "root"); // db user
define('DB_PASSWORD', "DemoL.6798#"); // db password (mention your db password here)
define('DB_DATABASE', "android_app"); // database name
define('DB_SERVER', "localhost"); // db server
/**
 * A class file to connect to database
 */
class DB_CONNECT {
 
    // constructor
    function __construct() {
        // connecting to database
         $this->connect();
        echo "working";
    }
 
   /* // destructor
    function __destruct() {
        // closing db connection
        $this->close();
    }*/
 
    /**
     * Function to connect with database
     */
    function connect() {
     
        // Connecting to mysql database
         $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);
         // Check connection
        if (mysqli_connect_errno())
          {
              echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }
          echo "alrightsas!";
        
        // returing connection cursor
        return $this->connection;
    }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
         $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE) or die(mysql_error());
        
        mysqli_close($this->connect);
    }
 
}
    $can = new DB_CONNECT;
    
 
$result = mysqli_query($can->connection,"INSERT INTO `student_details`(`Matric_No`, `Name`, `Level`, `E-mail`) VALUES (\'11/45hg007\',\'Jardan Scatt\',300,\'jsa_tto@yahoo.com\')");
if ($result){
    echo "Sucess";
}
?>