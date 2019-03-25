<?php

$con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");

$update_title=$_POST['update_title'];

$content=$_POST['content'];
$submit=$_POST['submit'];



if($submit) {


    $update_title=mysqli_real_escape_string($con, $_POST['update_title']);
    $update_content=mysqli_real_escape_string($con, $_POST['update_content']);


    $result = mysqli_query($con, "INSERT INTO updates (update_id, update_title, update_content, update_date ) VALUES (NULL, '$update_title', '$update_content', NULL);");




  //  echo $sql;
    $new_update_id=$con->insert_id;
    mysqli_close($con);
    ob_clean();
    header("Location: update_show.php?update_id=$new_update_id");
};





?>

<?php require 'templates/head2.php' ?>
<?php require 'templates/dbconnect.php' ?>
<div id="main_content_show">
    <div id="home_content_para2">

<div class='update_title3'>New Update</div>
        <br/>

        <?php

        $new_update = <<<NB


<div id="move_form">
<form method="POST" action="update_new.php">
    <p><label>Update Title</label>&nbsp;&nbsp;<input type="text" size="28" name="update_title" value="$update_title" placeholder="Update Title" autofocus required></p>
    <label>Update Content:</label>
    <p><textarea name="update_content"></textarea></p>
<div id="submit_it4">
<p><input type="submit" name="submit" value="Create New Update"></p>
</div>
</form>
</div>
NB;

        echo $new_update;

        ob_end_flush();

        ?>

        <br/>
        &nbsp;<a class='link2' href="logged_in.php">Back To Admin Area</a>



        <br/>
        <br/>
    </div>


<?php require 'templates/footer2.php'?>