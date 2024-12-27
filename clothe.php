<?php 
   
    include('head.php');
    include('topnav.php');
    include('nav.php');
?> 

    <!-- banner -->
    <div class="banner2">
        <div class="content2">
            <h1>Get More Product</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, animi?</p>
            <div id="bannerbtn2"><button>SHOP NOW</button></div>
        </div>
    </div>
    <!-- banner -->

    <?php
    if(isset($_GET['cid'])){
        $cid = $_GET['cid'];
    ?> 
        <!-- product cards -->
        <div class="container" id="product-cards">
            <div class="row" style="margin-top: 30px;">
            <?php
                $sql = "select * from product where pro_category = '$cid'";
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

            <?php endwhile; ?>

            </div>
        </div>
    <!-- product cards -->

    <?php } 
    else{ ?>

        <div class="container" id="product-cards">
            <div class="row" style="margin-top: 30px;">
            <?php
                $sql = "select * from product";
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

            <?php endwhile; ?>

            </div>
        </div>

    <!-- product -->
    <?php } ?>


   















   

    <div class="container" style="margin-top: 100px;">
    <hr>
    </div>
    <div class="container">
        <h3 style="font-weight: bold;">PRODUCT.</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque vero eius ipsam incidunt illum totam nostrum quidem sit cumque fugit. Accusamus rem praesentium labore tempore ullam porro quaerat fugiat cum ipsum, sint perferendis voluptate ad, quod reiciendis officia! In voluptate quae expedita sunt eum placeat alias soluta. Rem commodi, impedit error doloribus ratione at provident beatae, aut doloremque sunt possimus voluptas recusandae nam aliquid eos quia minus harum repellat quae eveniet laborum dolore esse voluptate sed. Voluptate ullam dolor sapiente neque labore hic nam odio qui consectetur porro minima nesciunt suscipit vitae obcaecati reiciendis itaque ipsum unde, debitis nemo soluta!</p>

        <hr>
    </div>
    <!-- product -->


<?php 
    include('footer.php');
?>

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>