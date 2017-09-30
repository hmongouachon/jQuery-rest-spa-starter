<?php

    include_once '../config.php';
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(!$conn){
       die("couldnt connect".mysqli_error);
    }

    // check email with post older than 1 month
    // $query= 'SELECT email FROM jobs WHERE created < DATE_SUB(NOW(), INTERVAL 1 MONTH)';
    
    // test statement
    $query= 'SELECT email FROM customers WHERE premium=1';

    $result = $conn->query($query);
    $r = array();
    if( $result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $r[] = $row;

            // print_r( $row["email"]);
            // test
            // mail($row["email"], 'finderz test', 'test');

            // mail function

            $to      = $row["email"];
            $subject = "Votre annonce est toujours active sur Finderz.io";
            // $message .= "<div style='width: 100%; max-width : 540px; text-align:center; margin : 0 auto;'>";
            // $message .= "<p><img style='width : 160px' src='http://finderz.io/resources/images/logo-black.png' alt='Finderz.io' /></p>";
            $message = "<h1 style='color:#f48080'>Lorem ipsum sit amet</h1>";
            
            // $message .= "<p>Check out our <a href='https://finderz.io/#/help' title='Help'>Help</a> section to learn more about our services and features.</p>";
            // $message .= "<p>You can login to your account with the following credentials: </p>";
            // $message .= "<p><strong>Your email :</strong> {$user['email']} | <strong>Your password :</strong> {$password} </p>";
            // $message .= "<p>See ya soon!</p>";
            // $message .= "<p>The Finderz.io team</p>";
            // $message .= "</div>";
            $headers = 'From: Finderz.io <hello@finderz.io>' . "\r\n" .
                        'Reply-To: hello@finderz.io' . "\r\n" .
                        'Content-type: text/html; charset=utf-8' . "\r\n" .
                        'MIME-Version: 1.0' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

            mail($to, $subject, $message, $headers);


            
        }
    }









   



    //close the db connection
    mysqli_close($conn);

?>