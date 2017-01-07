<?php


define('DB_USER', "root"); // db user
define('DB_PASSWORD', ""); // db password (mention your db password here)
define('DB_DATABASE', "moyin"); // database name
define('DB_SERVER', "localhost"); // db server
/**
 * A class file to connect to database
 */
class DB_CONNECT {
    
    public $connection;
    // constructor
    function __construct() {
        // connecting to database
         $this->connect();
    }
 
 
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
          echo "Database Connection Successful ! \n";
        
       }
 
    /**
     * Function to close db connection
     */
    function close() {
        // closing db connection
        mysqli_close($this->connection);
    }
 
}
?>