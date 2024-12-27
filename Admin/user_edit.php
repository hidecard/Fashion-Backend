    <?php 
        session_start();
        if(!isset($_SESSION['admin'])){
            header("Location:../index.php");
            exit;
        }
        include('../dbcon.php');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
    ?>
        
    <?php
        if(isset($_POST['save'])){
            $name = $_POST['uname'];
            $email = $_POST['uemail'];
            $pass = $_POST['upass'];

            $sql = "update user set user_name='$name',user_email='$email',user_pass='$pass' where user_id='$id'";
            mysqli_query($conn,$sql);
            header("Location:index.php");
        }
    ?>


    <?php include('nav.php') ?>
        <div id="layoutSidenav">

        <?php include('layout_side.php') ?>
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">User Lists</h1>

        <?php 
            include('../dbcon.php');
            $sql = "select * from user where user_id='$id'";
            $res = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($res)){
        ?>
        <form action="" class="p-3 mt-5" method="post">
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['user_id'];?>" disabled name="uid" class="form-control" >
                </div>
            </div>    
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['user_name'];?>" name="uname" class="form-control" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">User Email</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['user_email'];?>" name="uemail" class="form-control" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">User Password</label>
                <div class="col-sm-10">
                    <input type="text" value="<?php echo $row['user_pass'];?>" name="upass" class="form-control" >
                </div>
            </div>
            <input type="submit" name="save" value="Save" class="btn btn-success mt-4">
        </form>
        <?php }?>


                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
