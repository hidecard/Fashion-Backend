<?php 
    include('../dbcon.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from balance where bl_id = '$id'";
        mysqli_query($conn,$sql);
        header("Location:balance.php");
    }
?>



