<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:../index.php");
        exit;
    }
    include('../dbcon.php');
?>
 

 <?php include('nav.php') ?>
        <div id="layoutSidenav">
        <?php 
            include('layout_side.php');
        ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-1 ">Category Lists</h3>

                            <form action="" class="p-3 mt-1" method="post">
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                <input type="text" name="cat_name" class="form-control" require>
                                </div>
                            </div>
                            <input type="submit" name="save" value="Save" class="btn btn-success mt-4">
                        </form>
                        
                        <?php 
                            if(isset($_POST['save'])){
                                $name = $_POST['cat_name'];
                                $sql = "insert into category(cat_name) values('$name')";
                                mysqli_query($conn,$sql);
                            }
                        ?>
                        <table class="table" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                            <?php 
                                $sql = "select * from category";
                                $res = mysqli_query($conn, $sql);
                                $i = 1;
                                while($data = mysqli_fetch_assoc($res)):
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $data['cat_id'];?></td>
                                <td><?php echo $data['cat_name'];?></td>
                                <td>
                                    <a href="cat_edit.php?id=<?php echo $data['cat_id'];?>" class="btn btn-outline-success">Edit</a>
                                </td>
                                <td>
                                    <a href="cat_delete.php?a=<?php echo $data['cat_id'];?>" class="btn btn-danger">Danger</a>
                                </td>
                            </tr> 
                            <?php endwhile;?>
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
