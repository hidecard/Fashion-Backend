<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:../index.php");
        exit;
    }
    include('../dbcon.php');
    if(isset($_POST['save'])){
        $name = $_POST['uname'];
        $email = $_POST['uemail'];
        $pass = $_POST['upass'];
        $role = "Admin";

        $sql = "insert into user(user_name,user_email,user_pass,user_role) values('$name','$email','$pass','$role')";
        mysqli_query($conn,$sql);
    }
?>

 <?php include('nav.php') ?>
        <div id="layoutSidenav">
            <?php 
                include('layout_side.php');
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                    <h3 class="my-3">Incoming Message</h3>
                    <table class="table" id="datatablesSimple" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <?php 
                                $sql = "select * from contact";
                                $res = mysqli_query($conn,$sql);
                                $i = 1;
                                while($data=mysqli_fetch_assoc($res)){   
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $data['c_id'];?></td>
                                <td><?php echo $data['c_name'];?></td>
                                <td><?php echo $data['c_email'];?></td>
                                <td><?php echo $data['c_phno'];?></td>
                                <td><?php echo $data['c_message'];?></td>
                                <td><a href="message_delete.php?id=<?php echo $data['c_id'];?>" type="submit" class="btn btn-outline-danger">Delete</a></td>
                            </tr>
                            <?php }?>
                        </table>
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
