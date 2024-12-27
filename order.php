<?php

    include('dbcon.php');
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
        exit;
    }else if(isset($_SESSION['login'])){
        $uid = $_SESSION['uid'];
    }
    
      
    if(isset($_GET['id'])){
        $pro_id = $_GET['id'];
        $sql = "SELECT * FROM product WHERE pro_id='$pro_id'";
        $res = mysqli_query($conn, $sql);
        if($res && mysqli_num_rows($res) > 0){
            $data = mysqli_fetch_assoc($res);
            $price = $data['pro_price'];
        } 
    }

if(isset($_POST['order'])){
    $phno = $_POST['cus_phno'];
    $address = $_POST['cus_address'];
    $qty = $_POST['qty'];
    $amount = $qty * $price;
    date_default_timezone_set('Asia/Yangon');
    $date = date("Y-m-d H:i:s");

    $cus_id = 1; 

    $sql1 = "INSERT into orders (cus_id, order_date,total_amount) 
            values ('$cus_id', '$date', '$amount')";
    $order_done = mysqli_query($conn,$sql1);
    
    if($order_done){
        $order_id = "SELECT * FROM orders ORDER BY order_date DESC LIMIT 1";
        $order_found = mysqli_query($conn,$order_id);

        if($order_found){
            $order_data = mysqli_fetch_assoc($order_found);
            $o_id = $order_data['order_id'];

            $sql2 = "INSERT into order_product ( qty , amount, cus_phno, cus_address, order_id, pro_id) values ('$qty','$price', '$phno', '$address', '$o_id','$pro_id')";
            $order_product_done = mysqli_query($conn,$sql2);

            $from_balance = "SELECT * FROM balance where pro_id = '$pro_id' ORDER BY bl_date DESC LIMIT 1";
            $balance_found = mysqli_query($conn,$from_balance);

                if($balance_found){
                    $balance_data = mysqli_fetch_assoc($balance_found);
                    $balance = $balance_data['balance'];

                    $latest_balance = $balance - $qty;

                    $update_balance = "INSERT into balance (bl_date, income_qty,balance, pro_id, sale_qty) values ('$date', '0', '$latest_balance', '$pro_id', '$qty')";
                    $balance_done = mysqli_query($conn,$update_balance);
                    header("order.php");
 
                } else{
                    echo ("<script>alert('balance not found')</script>");
                }
                echo ("<script>alert('Order Done')</script>");
                header("order.php");
            }

        }

        header("order.php");

    }
?>
<?php 
    include('head.php');
    include('topnav.php');
    include('nav.php');
?>

<!-- login -->
<div class="container login">
    <div class="row">
        <div class="col-md-4 d-flex flex-column align-items-center justify-content-center bg-white" id="side1">
            <h3 style="margin-top:20px;color:black;"><?php echo $data["pro_name"];?></h3>
            <h4 style="text-align:center;">Price - $<span id="price"><?php echo $data['pro_price'];?></span></h4>
            <p><img src="image/<?php echo $data['pro_img'];?>" width="300px" alt=""></p>
        </div>

        <div class="col-md-8" id="side2">
            <h3>You will get it soon!</h3>
            <form action="" method="post">
                <div class="inp">
                    <input type="text" name="cus_phno" placeholder="Phone Number" required>
                    <input type="text" name="cus_address" placeholder="Address" required>
                    <input id="qty" type="number" name="qty" placeholder="Quantity" value='1' required>
                    <input id="total" type="number" name="amount" placeholder="Amount">
                </div>
                <div id="login" class="mt-5"><button type="submit" name="order">ORDER</button></div>
            </form>
        </div>


    </div>
</div>
<!-- login -->

<?php 
    include('footer.php');
?>

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    let qtyElement = document.querySelector('#qty');
    qtyElement.addEventListener('input', get_total);

    function get_total() {
        let totalElement = document.querySelector("#total");
        let priceElement = document.querySelector('#price');

        let price = Number(priceElement.textContent);
        let qty = Number(qtyElement.value); 
        let result = price * qty;

        totalElement.value = result ; 
    }
    
    get_total();
</script>

</body>
</html>