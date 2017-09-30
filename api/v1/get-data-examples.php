<?php

// GET JOBS ON MAP
include_once '../config.php';
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$conn){
    die("couldnt connect".mysqli_error);
}

// $query= 'SELECT jobs.uid, jobs.title, jobs.descr, jobs.lat, jobs.lng, jobs.created, jobs.type, jobs.name, jobs.phone, jobs.email, jobs.date, ( (ACOS(
//          SIN(X(@p) * PI() / 180) * SIN(lat * PI() / 180) + 
//         COS(X(@p) * PI() / 180) * COS(lat * PI() / 180) * 
//          COS( ( lng - lng) * PI() / 180)) * 180 / PI()) * 60 * 1.1515
//      )
//          * 1.609344 AS distance
//  FROM jobs ORDER BY distance; ';


$query= 'SELECT * FROM jobs';


$result = $conn->query($query);
$r = array();
if( $result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $r[] = array_map('utf8_encode', $row);
        // printf ("%s (%s)\n", $row["name"], $row["category"]);
    }
}
$res = json_encode($r);
echo $res;
// echo($mysqli->error);
mysqli_close($conn);

?>

