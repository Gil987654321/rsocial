<?php
// Establish Connection to Database
function connect() {
    static $conn;
    if ($conn === NULL) {
        $username = 'doadmin';
        $password = 'AVNS_T_3d_BTX-xXyHK4xuRQ';
        $host = 'db-mysql-nyc3-87335-do-user-14016281-0.c.db.ondigitalocean.com';
        $port = 25060;
        $database = 'socialnetwork';
        $sslmode = 'REQUIRED';

        $conn = mysqli_connect($host, $username, $password, $database, $port);
        
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    return $conn;
}
?>
