<?php require 'godzilla.php'?>
<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$contact = $_POST['contact'];
$question= $_POST['question'];


// for debugging only
# print_r($_POST);



$form_submit = $_POST['form_submit'];  //submit variable used to check if form submitted and in thank you message below submit button

//checking for presence of content in form fields
//$errors = [];      //initialize error array then check fields
//if ( !isset($name) || $name === ""){                           //isset is boolean t/f
//    $errors['name'] = "Name is required";
//
//}
//
//if ( !isset($email) || $email === ""){                           //isset is boolean t/f
//    $errors['email'] = "Email is required.";
//}
//if ( !isset($phone) || $phone === ""){
//    $errors['phone'] = "Please supply your contact phone.";
//}
//if (isset($question)){
//    $question = $_POST['question'];
//}

//Radio Buttons
$e_mail = $contact == "email" ? 'checked="checked"' : "";
$p_hone = $contact == "phone" ? 'checked="checked"' : "";

//check boxes


if($form_submit) {





    $newsy_sub2='Admin Alert! Someone Contacted Lilac City Dog Walking & Care!!!!' . strftime("%T", time());

    $mess2="Here is a recap of the information a user at lilac-city-dogs.com has submitted:"."\n\n\nName:".$name."\nEmail:".$email."\nPhone: ".$phone."\nQuestion: ".$question."\nPreferred Method of Contact: ". $contact;
    $message = '';
    $con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");
    $result = mysqli_query($con, 'SELECT * FROM admin');   // query database  It's convention in sql to put key words in uppercase  // use query method to query sql variable
    if ($con->error){                                    //this will give us error message
        $message = $con-> error;
    }
    if ($message)  {
        echo "<h3>$message</h3>";

    }
    while(list( $user_id, $uname, $johnsonville) = $result->fetch_row() ) {

        if ($uname !="") {
            //send admin email using sendMail method
            sendMail($uname, $newsy_sub2, $mess2 );
        }


    }


    $newsy_sub='Thanks for contacting Lilac City Dog Walking & Care!' . strftime("%T", time());
    $mess="Thank you for contacting Lilac City Dog Walking & Care!  We will be looking over the information you have sent to us as soon as we are able to and will respond to you just as soon! :)   Here is a recap of the information you sent to us:"."\n\n\nName:".$name."\nEmail:".$email."\nPhone: ".$phone."\nQuestion: ".$question."\nPreferred Method of Contact: ". $contact;
    sendMail($email, $newsy_sub, $mess);

    header("Location: contact_thanks.php");

}

?>
<?php ob_start(); require 'templates/head3.php' ?>










<div id="main_content_show">
    <div id="home_content_para2">

        <div class='update_title3'><span class="white">Contact Lilac City Dog Walking &amp; Care</span></div>

        <br/>




        <?php


        $form = <<<EOD
        <div id="center_it">
                 <form  method="POST" action="contact.php">
                 <br/>

                     <label for="name">Name</label> <input id="name" size="55" type="text" class="cat_textbox" name="name" value="$name"  placeholder="Name" required><br/><br/>
                     <label for="email">E-mail</label> <input id="email" size="35" type="email" class="cat_textbox" name="email" value="$email" placeholder="E-mail" required>&nbsp;&nbsp;
                  <br/><br/>  <label for="phone">Phone</label> <input id="phone" size="35" type="tel" class="cat_textbox" name="phone" value="$phone" placeholder="Phone">

                    <br/>

                    <p>Please let us know how we can help you! If you and/or your family are interested in the services of an affordable, skillful and caring dog walker, pet, plant/yard or house sitter we are here to help!</p>
                         <textarea class="cat_textbox" name="question" rows="8" cols ="70" required>$question</textarea>


                    <br/>
                    <div class="submit_it5">
                 <label>Preferred Contact Method:</label> <br>
                        <input type="radio" checked = "checked" name="contact" value="email" $e_mail> Email
                        <input type="radio" name="contact" value="phone" $p_hone> Phone
<br/>
<br/>



                   </div>
                   <br/>


                   <div class="submit_it5">
                    <input type="submit" class="cat_button" name="form_submit" value="Submit">

                   </div>

<br/>
<br/>

                </form>
                </div>

EOD;

        echo $form ;

        ?>



        <br/>

    </div>


<?php require 'templates/footer2.php'?>