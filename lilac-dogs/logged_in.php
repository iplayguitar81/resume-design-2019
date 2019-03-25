<?php

session_start();

?>

<?php require 'templates/head2.php' ?>

<div id="main_content_show">
    <div id="home_content_para2">

        <h1 class='old_updates'><span class='center'> <?php
            if($_SESSION['user_email']){echo "Updates Admin Area";} else echo "L.C.D.W. Updates Archive";?></span></h1>

        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <?php
        $confirm=$_GET['confirm'];

        if($confirm== "deleted")
        {
            $confirm ="Blog Entry Successfully Deleted!";


        }

        else
        {
            $confirm="";
        }
        echo "<span class='delete_confirm'>$confirm</span>";
        ?>
        <p>Below is an archive of all of the previous updates you have made... </p>  <?php
            if($_SESSION['user_email']){echo "<p>Welcome " ."<span class='white'>".$_SESSION['user_email']."</span>! As the site admin you know what that means.</p> <p> Work your magic. :D";} else echo ""; ?></p>


        <?php
        if($_SESSION['user_email']){

            echo '

<a class="link2" href="update_new.php">&nbsp;&nbsp;Create a New Update</a><br/><br/>';
        }
        else {

            echo "";
        }

        ?>


        <?php






        $con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");

        $message = '';
        $result = mysqli_query($con,'SELECT * FROM updates ORDER BY update_date DESC');   // query database  It's convention in sql to put key words in uppercase
        // $result = $dbh->query($sql);       // use query method to query sql variable



        //display message in appropriate point in page


        //
        //$update_id,
        //$update_title,
        //$update_content,
        //$update_date

        while(list($update_id,$update_title,$update_content,$update_date) = $result->fetch_row() ) {
            $trunky=substr($update_content, 0, 666);


            $format_date=date(" l F jS Y  g:i A", strtotime($update_date."-2 hours"));
            // Query your database here and get timestamp

            echo "

                    	<div id='previous_update_contain'><div class='update_title2'><a href='update_show.php?update_id=$update_id'> $update_title</a><br/> <span class='updated2'>Posted: $format_date</span></div>


                    	<p> $trunky...<a class='link2' href='update_show.php?update_id=$update_id'> Read More</a></p><hr/><br/></div>";

        if($_SESSION['user_email']){

            echo "

<a class='link2' href='update_update.php?update_id=$update_id'>&nbsp;&nbsp;Update This</a> | <a class='link2' href='update_delete.php?update_id=$update_id'>&nbsp;Delete This</a><br/><br/>";
        }
        else {

            echo "";
        }






        }

        ?>

        <br/>
        <p><a class='link2' href='index.php'>Back Home</a>
            <?php
            if($_SESSION['user_email']){

                echo '

<a class="login_hide" href="logout.php">&nbsp;&nbsp;Logout</a><br/><br/>';
            }
            else {

                echo "<a class='login_hide' href='login_admin.php'>Login</a>";

            }

            ?>
            </p>
    </div>


<?php require 'templates/footer2.php'?>