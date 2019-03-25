<?php
$comments=$_REQUEST['comments'];
$email=$_REQUEST['email'];
$name=$_REQUEST['name'];
$comments=json_decode($comments,true);
$email=json_decode($email,true);
$name=json_decode($name,true);
//$cust=print_r($cust, true);
//$email=print_r($email, true);
//where the magic happens
$test_message= "ThisDudeCodes.com Contact!
  Here is what someone sent from your resume site:\n
   Information Submitted:\n
     Name: $name\n
    Email: $email\n
    Comment: $comments\n
    ";
$submit=$_POST['submit'];
$from ="Resume@ThisDudeCodes.com";
$to = "snyder.chris.m@gmail.com";
$subject="Resume Contact Notification!";
$message2=$test_message ;
$headers= "From: $from";
mail( $to, $subject, $message2, $headers );
?>