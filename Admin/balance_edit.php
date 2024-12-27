    
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
        if(isset($_POST['save'])){
            $pro_id = $_POST['pro_id'];
            $inc_qty = $_POST['inc_qty'];
            $balance = $_POST['balance'];

            $latest_balance = $balance + $inc_qty;
            //echo $balance;
            date_default_timezone_set('Asia/Yangon');
            $date = date("Y-m-d H:i:s");

            $sql = "insert into balance (bl_date, income_qty,balance,pro_id,sale_qty) values ('$date','$inc_qty','$latest_balance', '$pro_id','0')";
            mysqli_query($conn,$sql);
            header("Location:balance.php");
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
                        <h1 class="mt-4">Balance Quantity</h1>
                        <?php 
                            $sql = "select * from balance left join product on balance.pro_id=product.pro_id  where bl_id='$id'";
                            $res = mysqli_query($conn,$sql);
                            while($row = mysqli_fetch_assoc($res)):
                        ?>
                        <form action="" class="p-3 mt-5" method="post">
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Balance ID</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="<?php echo $row['bl_id'];?>" name="bl_id" class="form-control" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="<?php echo $row['pro_name'];?>" name="" class="form-control" >
                                    <input type="hidden" value="<?php echo $row['pro_id'];?>" name="pro_id">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Balance</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly value="<?php echo $row['balance'];?>" name="balance" class="form-control" >
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Income Quantity</label>
                                <div class="col-sm-10">
                                    <input type="text" value="" name="inc_qty" class="form-control" >
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
