<?php

function sendMail($newsletter_email, $newsletter_sub, $newsletter_message ) {

    $from ="info@lilac-city-dogs.com";
    $to= $newsletter_email;
    $subject=$newsletter_sub;
    $message2=$newsletter_message;
    $message2= wordwrap($message2, 90);


    $headers= "From:" . "$from";


    return mail( $to, $subject, $message2, $headers );
}


?>