<!--Php code connecting the database -->
<?php

    $con=new mysqli('localhost','root','','taskapp');

    if(!$con){
        die(mysqli_error($con));
    }
?>