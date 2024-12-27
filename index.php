<?php 
    include('dbcon.php');
    include('head.php');
    include('topnav.php');
?>
    <div class="home-section">  

<?php 
    include('nav.php');
?>
    <div class="row p-4">
        <?php
            include('dbcon.php');
            if(isset($_POST['search'])){
                $data = $_POST['search_data'];
                $sql = "select product.*,category.* from product left join category on product.pro_category=category.cat_id where pro_name like '{$data}%' or cat_name like '{$data}%'";
                $res = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($res)){
        ?>
            
                    <div class="col-md-4 py-3 py-md-0">
                        <div class="card" style="background-color: #a9a9a926;">
                            <img src="./image/<?php echo $row['pro_img'];?>" alt="">
                            <div class="card-img-overlay">
                                <h5 class="card-titel"><?php echo $row['pro_name'];?></h5>
                                <p><?php echo $row['pro_detail']?></p>
                                <p><strong>$<?php echo $row['pro_price'];?> </strong></p>
                                <button type="submit"><a href="order.php">Order Now</a></button>
                            </div>
                        </div>
                    </div>
                
        <?php } ?>
    </div>
<?php
    }else{
        ?>
        <!-- home content -->
        <section class="home">
            <div class="content">
                <h3>Biggest Clothe Sale
                    <br> <span>Up To 50% Off</span>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque culpa, totam sed maxime animi facilis!</p>
                <button id="shopnow">Shop Now</button>
            </div>
            <div class="img">
                <img src="./image/b2.png" alt="">
            </div>
        </section>
        <!-- home content -->
    </div>

    <!-- top cards -->
    <div class="container" id="top-cards">
        <div class="row">

        <?php 
            include('dbcon.php');
            $sql = "select * from product order by pro_id desc limit 3";
            $res = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($res)):
        ?>
        <div class="col-md-4 py-3 py-md-0">
            <div class="card" style="background-color: #a9a9a926;">
                <img src="./image/<?php echo $row['pro_img'];?>" alt="">
                <div class="card-img-overlay">
                    <h5 class="card-titel"><?php echo $row['pro_name'];?></h5>
                    <p><?php echo $row['pro_detail'];?></p>
                    <p><strong>$<?php echo $row['pro_price'];?> </strong></p>
                    <a href="order.php?id=<?php echo $row['pro_id'];?>" class="btn btn-outline-dark">Order Now</a>
                </div>
            </div>
        </div>
        <?php endwhile;?>

        </div>
    </div>
    <!-- top cards -->

    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h1>Get Up To 50% Off</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, animi?</p>
            <div id="bannerbtn"><button>SHOP NOW</button></div>
        </div>
    </div>
    <!-- banner -->

    <!-- product cards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">PRODUCT</h1>
        <div class="row" style="margin-top: 30px;">

        <?php 
            include('dbcon.php');
            $sql = "select * from product limit 8";
            $res = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($res)):

        ?>
        <div class="col-md-3 py-3 py-md-0 mt-3">
            <div class="card">
                <img src="./image/<?php echo $row['pro_img'];?>" height="300px" alt="">
                <div class="card-body">
                    <h3><?php echo $row['pro_name'];?></h3>
                    <p><?php echo $row['pro_detail'];?></p>
                    <h5>$<?php echo $row['pro_price'];?> 
                        <a href="order.php?id=<?php echo $row['pro_id'];?>">
                            <span><i class="fa-solid fa-cart-shopping"></i></span>
                        </a>
                    </h5>
                </div>
            </div>
        </div>

        <?php endwhile;?>

        </div>
            <a href="clothe.php" id="viewmorebtn">View More</a>
        </div>
    <!-- product cards -->

    <!-- product -->
    <div class="container" style="margin-top: 100px;"> <hr>
    </div>
    <div class="container">
        <h3 style="font-weight: bold;">PRODUCT.</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque vero eius ipsam incidunt illum totam nostrum quidem sit cumque fugit. Accusamus rem praesentium labore tempore ullam porro quaerat fugiat cum ipsum, sint perferendis voluptate ad, quod reiciendis officia! In voluptate quae expedita sunt eum placeat alias soluta. Rem commodi, impedit error doloribus ratione at provident beatae, aut doloremque sunt possimus voluptas recusandae nam aliquid eos quia minus harum repellat quae eveniet laborum dolore esse voluptate sed. Voluptate ullam dolor sapiente neque labore hic nam odio qui consectetur porro minima nesciunt suscipit vitae obcaecati reiciendis itaque ipsum unde, debitis nemo soluta!</p>

        <hr>
    </div>
    <!-- product -->
    <?php } ?>
        
<?php 
    include('footer.php');
?>

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>