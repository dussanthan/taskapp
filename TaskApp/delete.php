<?php
    include 'connect.php';
    if(isset($_GET['deleteNo'])){
        $TaskNo=$_GET['deleteNo'];

        $sql="delete from schedule where TaskNo=$TaskNo";
        $result=mysqli_query($con,$sql);
        if($result){
            header("location:display.php");
        }else{
            die(mysqli_error($con));
        }
    }
?>