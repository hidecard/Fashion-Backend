<?php 
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location:../index.php");
        exit;
    }
?>
    <?php include('nav.php') ?>
        <div id="layoutSidenav">
            <?php include('layout_side.php') ?>
            <div id="layoutSidenav_content">
               <main>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-info">
                                <span class="h5">Welcome Back Admin</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>34</h5>
                                    <span>Order List <i class="fa-solid fa-truck ms-2"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>50</h5>
                                    <span>User List <i class="fa-solid fa-users ms-2"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>$ 340,000</h5>
                                    <span>Income Balance <i class="fa-solid fa-money-check-dollar ms-2"></i></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 mt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5>12</h5>
                                    <span>Message Noti <i class="fa-solid fa-message ms-2"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Order List</h4>

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
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>Phyo Thuta</td>
                                                <td>098752345</td>
                                                <td>Yangon Hlaing</td>
                                                <td>Nike DunkLow</td>
                                                <td>23/4/2024</td>
                                                <td>2</td>
                                                <td>300</td>
                                            </tr>
                                        </tbody>
                                       
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
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
