<?php
//try to create another variable to store the submit so as not to confuse the beast



$con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");

if ($submit){


    // $update_id,
    //$update_title,
    // $update_content,
    // $update_date

    $update_title=$_POST['update_title'];
    $update_content=$_POST['update_content'];


    $update_title=mysqli_real_escape_string($con, $_POST['update_title']);
    $update_content=mysqli_real_escape_string($con, $_POST['update_content']);
    $result = mysqli_query($con, "UPDATE updates SET update_title= '$update_title', update_content='$update_content' WHERE update_id='$update_id';");

    ob_clean();


    header("Location: logged_in.php");

}
?>
<?php require 'templates/head2.php' ?>
<?php require 'templates/dbconnect.php' ?>
    <div id="main_content_show">
        <div id="home_content_para2">
<?php


$con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");
$update_id=$_GET['update_id'];

$result = mysqli_query($con,"SELECT * FROM updates WHERE update_id=$update_id");


list( $update_id,$update_title,$update_content,$update_date) = $result->fetch_row();


$submit =$_POST['submit'];


?>

<?php
            $update_update = <<<DB





<h2 id='title_update'>&nbsp; Update: $update_title </h1>

<div id="move_form">
<form method="POST" action="update_update.php?update_id=$update_id">
    <p><label>Update Title</label>&nbsp;&nbsp;<input type="text" size="28" name="update_title" value="$update_title" placeholder="$update_title" autofocus required></p>
    <label>Update Content</label>
    <p><textarea rows="10" cols ="80"  name="update_content" placeholder="Update Content" required>$update_content</textarea></p>
<div id="submit_it4">
<p><input type="submit" name="submit" value="Update The Update"></p>
</div>
</form>
</div>
DB;

            echo $update_update;

            ob_end_flush();



            ?>




            <br/>
            <p><a class='link2' href='logged_in.php'>Back To Admin Area</a></p>
        </div>


<?php require 'templates/footer2.php'?>