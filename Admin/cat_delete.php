<?php 
    include('../dbcon.php');
    if(isset($_GET['a'])){
        $id = $_GET['a'];
        $sql = "delete from category where cat_id='$id'";
        mysqli_query($conn, $sql);
        header("location:category_list.php");
    }
?>