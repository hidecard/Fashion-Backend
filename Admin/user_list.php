    
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
                    <h3 class="mt-1">User Lists</h3>

                <form action="" class="p-3 mt-3" method="post">
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="uname" class="form-control" >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">User Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="uemail" class="form-control" >
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">User Password</label>
                        <div class="col-sm-10">
                            <input type="text" name="upass" class="form-control" >
                        </div>
                    </div>
                    <input type="submit" name="save" value="Save" class="btn btn-success mt-4">
                </form>

                <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User role</th>
                                    <th>User Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>User ID</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User role</th>
                                    <th>User Password</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>

                            <?php 
                                $sql = "select * from user";
                                $res = mysqli_query($conn,$sql);
                                $i = 1;
                                while($data=mysqli_fetch_assoc($res)){   
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $data['user_id'];?></td>
                                <td><?php echo $data['user_name'];?></td>
                                <td><?php echo $data['user_email'];?></td>
                                <td><?php echo $data['user_role'];?></td>
                                <td><?php echo $data['user_pass'];?></td>
                                <td><a href="user_edit.php?id=<?php echo $data['user_id'];?>" type="submit" class="btn btn-outline-success">Edit</a>
                                    <a href="user_delete.php?id=<?php echo $data['user_id'];?>" type="submit" class="btn btn-outline-danger">Delete</a></td>
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
