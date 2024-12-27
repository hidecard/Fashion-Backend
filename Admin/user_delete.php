    
    <?php 
        include('../dbcon.php');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from user where user_id='$id'";
            mysqli_query($conn,$sql);
            header("Location:index.php");

        }
    ?>



