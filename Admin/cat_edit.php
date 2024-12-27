<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:../index.php");
        exit;
    }

    include('../dbcon.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        echo $id;
    }

    if(isset($_POST['save'])){
        $name = $_POST['cat_name'];
        $name = str_replace("'","\'",$name);
        $sql = "update category set cat_name='$name' where cat_id = '$id'";
        mysqli_query($conn,$sql);
        header("Location:category_list.php");
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
                        <h1 class="mt-4">Category Lists</h1>
                        <?php 
                            $sql = "select * from category where cat_id = '$id'";
                            $res = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($res)){
                        ?>
                        <form action="" class="p-3 mt-5" method="post">
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Category ID</label>
                                <div class="col-sm-10">
                                <input type="text" disabled value="<?php echo $row['cat_id'];?>" name="cat_id" class="form-control" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                <input type="text" value="<?php echo $row['cat_name'];?>" name="cat_name" class="form-control" >
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
