<?php
ob_start();
session_start();
$logged_in_attempt=0;
?>
<?php require 'templates/head3.php' ?>








<?php require 'templates/dbconnect.php' ?>

<div id="main_content_show">
    <div id="home_content_para2">

        <div class='update_title3'>Admin Login</div>

        <?php

        $con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");
        $user_email = $_POST['user_email'];
        $password = $_POST['password'];
        $submit = $_POST['submit'];

        if($submit) {

            $user_email=mysqli_real_escape_string($con, $_POST['user_email']);
            $password=mysqli_real_escape_string($con, $_POST['password']);

            $password= hash("sha256", $password);
            //print out encrypted password to encrypt password php myadmin database
            //echo $password;
            $result = mysqli_query($con,"SELECT * FROM admin WHERE user_email='$user_email' AND password='$password'");

            list( $user_id, $user_email, $password) = $result->fetch_row();


            $logged_in_attempt++;
        }

        if (!$user_id && $logged_in_attempt>0) {

            echo "<span class='status_log2'>Log in Failed.</span>";


        }

        else if($user_id) {
            $logged_in_attempt=0;
            $_SESSION['user_email'] = $user_email;
            ob_clean();
            header("Location: logged_in.php");

        }

        ?>

        <br/>




        <?php




        $logon = <<< EOL
<div id="move_form">
<form method ="POST" action="login_admin.php">
<div id="submit_it4">
<label>Email</label>&nbsp;&nbsp;<input type="email" name="user_email" value="$user_email" size="40" placeholder="Email" required><br/>
<label>Password</label>&nbsp;&nbsp;<input type="password" name="password" value="$password" size="50" placeholder="Password" required><br/><br/>
<input type="submit" name="submit" value="Sign In">
</div>
</form>
</div>
EOL;

        echo $logon;

        ?>
        <br/>

    </div>


<?php require 'templates/footer2.php'?>