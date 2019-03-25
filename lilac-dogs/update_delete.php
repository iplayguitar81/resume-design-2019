<?php

$con=mysqli_connect("localhost","csnyder_lilac","Drexler22","csnyder_lilac-dogs");

$update_id=$_GET['update_id'];

$result = mysqli_query($con, "DELETE FROM updates WHERE update_id=$update_id");


mysqli_close($con);

$now=time();
header("Location: logged_in.php?t=$now&confirm=deleted");





?>