<?php 
    include('../dbcon.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "delete from product where pro_id = '$id'";
        mysqli_query($conn, $sql);
        header("Location:pro_list.php");
    } 
?> 