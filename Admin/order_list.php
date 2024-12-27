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
                    <h3 class="my-4">Order Lists</h3>
                        <table class="table" id="datatablesSimple" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phno</th>
                                    <th>Customer Address</th>
                                    <th>Product Name</th>
                                    <th>Order Date</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phno</th>
                                    <th>Customer Address</th>
                                    <th>Product Name</th>
                                    <th>Order Date</th>
                                    <th>Quantity</th>
                                    <th>Amount</th>
                                </tr>
                            </tfoot>
                            <?php 
                                $sql = "select * from orders left join order_product on orders.order_id=order_product.order_id left join user on orders.cus_id=user.user_id left join product on order_product.pro_id=product.pro_id";
                                $res = mysqli_query($conn,$sql);
                                $i = 1;
                                while($row = mysqli_fetch_assoc($res)):
                            ?>
                            <tr>
                                <td><?php echo $i++;?></td>
                                <td><?php echo $row['order_id'];?></td>
                                <td><?php echo $row['user_name'];?></td>
                                <td><?php echo $row['cus_phno'];?></td>
                                <td><?php echo $row['cus_address'];?></td>
                                <td><?php echo $row['pro_name'];?></td>
                                <td><?php echo $row['order_date'];?></td>
                                <td><?php echo $row['qty'];?></td>
                                <td><?php echo $row['total_amount'];?></td> 
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
