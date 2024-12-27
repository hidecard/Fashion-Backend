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
                    <h3 class="mt-4">Product Lists</h3>

    <form action="" class="p-3 mt-1" method="post">
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
            <input type="text" name="price" class="form-control" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
            <input type="file" name="img" class="form-control" >
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <input type="text" name="des" class="form-control" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
            <select name="cat" id="" class="form-control">
                <option value="">Choose Category</option>
                <?php 
                    $sql = "select * from category";
                    $res = mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($res)):
                ?>
                <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                <?php endwhile;?>
            </select>
            </div>
        </div>
        <input type="submit" name="save" value="Save" class="btn btn-success mt-4">
    </form>

                <?php 
                    if(isset($_POST['save'])){
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $img = $_POST['img'];
                        $des = $_POST['des'];
                        $cat = $_POST['cat'];

                        $sql = "insert into product(pro_name,pro_price,pro_img,pro_detail,pro_category) values('$name','$price','$img','$des','$cat')";
                        mysqli_query($conn,$sql);
                    }
                ?>

                <table class="table" id="datatablesSimple" >
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Detail</th>
                            <th>Image</th>
                            <th colspan=2>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Detail</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                    <?php 
                        $sql = "select * from product left join category on product.pro_category=category.cat_id";
                        $res = mysqli_query($conn, $sql);
                        $i = 1;
                        while($data = mysqli_fetch_assoc($res)):
                    ?>
                    <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $data['pro_id'];?></td>
                        <td><?php echo $data['pro_name'];?></td>
                        <td><?php echo $data['pro_price'];?></td>
                        <td><?php echo $data['cat_name'];?></td>
                        <td><?php echo $data['pro_detail'];?></td>
                        
                        <td><img src="../image/<?php echo $data['pro_img'];?>" width="100px" alt=""></td>
                        <td><a href="pro_edit.php?id=<?php echo $data['pro_id'];?>" type="submit" class="btn btn-outline-success">Edit</a>
                            <a href="pro_delete.php?id=<?php echo $data['pro_id'];?>" type="submit" class="btn btn-outline-danger">Delete</a></td>
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
