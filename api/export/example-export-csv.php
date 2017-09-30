<?php

    include_once '../config.php';
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
die("couldnt connect".mysqli_error);
}


    // open connection to mysql database
    // $connection = mysqli_connect($host, $username, $password, $dbname) or die("Connection Error " . mysqli_error($connection));
    
    // fetch mysql table rows
    $sql = "SELECT email FROM customers";
    $result = mysqli_query($conn, $sql) or die("Selection Error " . mysqli_error($conn));

    $fp = fopen('email-all-users.csv', 'w');

    while($row = mysqli_fetch_assoc($result))
    {
        fputcsv($fp, $row);
    }
    
    fclose($fp);

    //close the db connection
    mysqli_close($conn);

?>





