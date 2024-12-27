<?php 
    include('../dbcon.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "delete from contact where c_id = '$id'";
        mysqli_query($conn,$sql);
        header("Location:message.php");
    }
?>