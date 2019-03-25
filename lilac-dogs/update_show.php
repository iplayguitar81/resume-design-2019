
<?php require 'templates/head2.php' ?>
<?php require 'templates/dbconnect.php' ?>
<div id="main_content_show">
    <div id="home_content_para2">


        <?php




        if (! ($message)) {
            echo "<h3>$message</h3>";


        }


        ?>







        <?php


        require "templates/dbconnect.php";












        $con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");

        $message = '';
        $update_id=$_GET['update_id'];
        $result = mysqli_query($con,"SELECT * FROM updates WHERE update_id=$update_id");   // query database  It's convention in sql to put key words in uppercase

        // $result = $dbh->query($sql);       // use query method to query sql variable



        //display message in appropriate point in page


        //
        //$update_id,
        //$update_title,
        //$update_content,
        //$update_date


        while(list($update_id,$update_title,$update_content,$update_date) = $result->fetch_row() ) {



            $format_date=date(" l F jS Y  g:i A", strtotime($update_date."-2 hours"));
            // Query your database here and get timestamp

            echo "      <div id='show_update_contain'>
                    	<div class='old_updates'>$update_title<p class='updated3'> Posted: $format_date Spokane Time </p> </div>



                    	<p> $update_content </p>


                        <p><a class='link2' href='index.php'>Back Home</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a class='link2' href='previous_updates.php'>Back To Past Updates</a></p></div><br/>";



        }

        ?>
<?php
if ($update_content < 500)
{
    echo "<br/><br/><br/><br/>";

}
        else {

        }
?>

</div>


<?php require 'templates/footer2.php'?>