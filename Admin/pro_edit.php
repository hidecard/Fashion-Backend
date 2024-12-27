    
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
            $name = $_POST['name'];
            $price = $_POST['price'];
            $new_img = $_POST['new_img'];
            $old_img = $_POST['old_img'];
            $des = $_POST['des'];
            $cat = $_POST['cat'];

            if($new_img != ''){
                $sql = "update product set pro_name='$name',pro_price='$price',pro_img='$new_img',pro_detail='$des',pro_category='$cat' where pro_id='$id'";
                mysqli_query($conn,$sql);
                header("Location:pro_list.php");
            } else{
                $sql = "update product set pro_name='$name',pro_price='$price',pro_img='$old_img',pro_detail='$des',pro_category='$cat' where pro_id='$id'";
                mysqli_query($conn,$sql);
                header("Location:pro_list.php");
            }
        }
    ?>
 
<?php 
    // session_start();
    // if(!isset($_SESSION['auth'])){
    //     header("location:../login.php");
    // }
?>
 <?php include('nav.php') ?>
        <div id="layoutSidenav">
            <?php 
                include('layout_side.php');
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Product Lists</h1>

    <?php 
        $sql = "select * from product left join category on product.pro_category=category.cat_id where pro_id = '$id'";
        $res = mysqli_query($conn,$sql);
        while($data = mysqli_fetch_assoc($res)):
    ?>
    <form action="" class="p-3 mt-5" method="post">
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Product Name</label>
            <div class="col-sm-10">
            <input type="text" value="<?php echo $data['pro_name'];?>" name="name" class="form-control" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-10">
            <input type="text" name="price" value="<?php echo $data['pro_price'];?>" class="form-control" >
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-10">
            <input type="file"  name="new_img" class="form-control" >
            <input type="hidden" name="old_img" value="<?php echo $data['pro_img'];?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
            <input type="text" value="<?php echo $data['pro_detail'];?>" name="des" class="form-control">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
            <select name="cat" id="" class="form-control">
                <option value="<?php echo $data['pro_category'];?>"><?php echo $data['cat_name'];?></option>

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
    <?php endwhile;?>
    
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
