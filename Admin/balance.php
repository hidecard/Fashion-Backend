    
    <?php 
        session_start();
        if(!isset($_SESSION['admin'])){
            header("Location:../index.php");
            exit;
        }

        include('../dbcon.php');


        if(isset($_POST['save'])){
            $pro_id = $_POST['pro_name'];
            $inc_qty = $_POST['inc_qty'];

            date_default_timezone_set('Asia/Yangon');
            $date = date("Y-m-d H:i:s");
 
            $latest_balance_sql = " SELECT * from balance where pro_id = '$pro_id' Order By bl_id Desc limit 1 ";
            
            $latest_bal = mysqli_query($conn, $latest_balance_sql);
            if($row = mysqli_fetch_assoc($latest_bal)){
                $balance_result = $row['balance']; // 35
                
                $total_bal = $balance_result + $inc_qty; // 15
                $sql = "INSERT into balance(pro_id,bl_date,income_qty,balance,sale_qty) 
                                values('$pro_id','$date','$inc_qty','$total_bal', '0')";
                mysqli_query($conn,$sql);
            } else{
                $sql = "INSERT into balance(pro_id,bl_date,income_qty,balance,sale_qty) values('$pro_id','$date','$inc_qty','$inc_qty', '0')";
                mysqli_query($conn,$sql);
            }

            
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
                    <h3 class="my-3">Balance Quantity</h3>

            <form action="" class="p-3 mt-1" method="post">
                <div class="mb-3 row">
                    <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                    <div class="col-sm-10">
                        <select name="pro_name" id="product_name" class="form-control">
                            <option value="">Choose Product Name</option>
                            <?php 
                                $sql = "select * from product";
                                $res = mysqli_query($conn,$sql);
                                while($row = mysqli_fetch_assoc($res)):
                            ?>
                            <option value="<?php echo $row['pro_id'];?>"><?php echo $row['pro_name'];?></option>
                            <?php endwhile;?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="" class="col-sm-2 col-form-label">Income Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" name="inc_qty" class="form-control" >
                    </div>
                </div>
                <input type="submit" name="save" value="Save" class="btn btn-success mt-4">
            </form>

            <div class="row w-50 my-5">
                <form action="" method="post" class="d-flex">
                    <select name="cat" id="" class="form-control mx-4">
                        <option value="">Search By category</option>
                        <?php 
                            $sql = "select * from category";
                            $res = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($res)):
                        ?>
                        <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                        <?php endwhile;?>
                    </select>
                    <input type="submit" name="search" class="btn btn-success" value="Search">
                </form>
            </div>

<?php 
if(isset($_POST['search'])){
    $cat = $_POST['cat'];

    $sql = "select balance.*,product.* from balance left join product on balance.pro_id=product.pro_id left join category on product.pro_category=category.cat_id  where category.cat_id='$cat' ORDER BY balance.bl_date DESC;";
    $res = mysqli_query($conn,$sql);
    $i = 1;
        ?>

        <table class="table" id="datatablesSimple">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Balance ID</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Income Quantity</th>
                  <th>Sale Quantity</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Balance ID</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Income Quantity</th>
                  <th>Sale Quantity</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
              </tfoot>
        <?php 
            while($row = mysqli_fetch_assoc($res)){
        ?>

        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $row['bl_id'];?></td>
            <td><?php echo $row['pro_name'];?></td>
            <td><?php echo $row['bl_date'];?></td>
            <td><?php echo $row['income_qty'];?></td>
            <th><?php echo $row['sale_qty'];?></th>
            <td><?php echo $row['balance'];?></td>
            <td><a href="balance_edit.php?id=<?php echo $row['bl_id'];?>" type="submit" class="btn btn-outline-success">Edit</a>
                <a href="balance_delete.php?id=<?php echo $row['bl_id'];?>" class="btn btn-outline-danger">Delete</a></td>
        </tr>
        <?php }?>
    </table>
            <?php 
                }else{
                    ?>

            <table class="table" id="datatablesSimple">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Balance ID</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Income Quantity</th>
                  <th>Sale Quantity</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Balance ID</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Income Quantity</th>
                  <th>Sale Quantity</th>
                  <th>Balance</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            <?php 
                $sql = "select * from balance left join product on balance.pro_id = product.pro_id ORDER BY balance.bl_date DESC";
                $res = mysqli_query($conn,$sql);
                $i = 1;
                while($row = mysqli_fetch_assoc($res)):
            ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['bl_id'];?></td>    
                <td><?php echo $row['pro_name'];?></td>
                <td><?php echo $row['bl_date'];?></td>
                <td><?php echo $row['income_qty'];?></td>
                <th><?php echo $row['sale_qty'];?></th>
                <td><?php echo $row['balance'];?></td>
                <td><a href="balance_edit.php?id=<?php echo $row['bl_id'];?>" type="submit" class="btn btn-outline-success">Edit</a>
                    <a href="balance_delete.php?id=<?php echo $row['bl_id'];?>" class="btn btn-outline-danger">Delete</a></td>
            </tr>
            <?php endwhile;?>
        </table>


                                <?php
                            }
                        ?>
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
