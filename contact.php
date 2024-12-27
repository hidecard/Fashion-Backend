<?php 
    
    include('dbcon.php');
    include('head.php');
    include('topnav.php');
    include('nav.php');
?>

<?php
    include('dbcon.php');
    if(isset($_POST['mes'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phno = $_POST['phno'];
        $message = $_POST['message'];
        
        $sql = "insert into contact(c_name,c_email,c_phno,c_message) values('$name','$email','$phno','$message')";
        mysqli_query($conn,$sql);
    }
?>

        <!-- contact -->
        <div class="container" id="contact">
            <h1 class="text-center">CONTACT US</h1>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <i class="fas fa-phone"> Phone</i>
                        <h6>+00000000000000000</h6>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <i class="fa-solid fa-envelope"> Email</i>
                        <h6>example@gmail.com</h6>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <i class="fa-solid fa-location-dot"> Address</i>
                        <h6>Karachi Sinfh Pakistan</h6>
                    </div>
                </div>
            </div>

    <form method="post">
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-4 py-3 py-md-0">
                <input type="text" class="form-control form-control" name="name" placeholder="Name">
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <input type="text" class="form-control form-control" placeholder="Email" name="email">
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <input type="number" class="form-control form-control" placeholder="Phone" name="phno">
            </div>
            <div class="form-group" style="margin-top: 30px;">
            <textarea class="form-control" name="message" id=""rows="5" placeholder="Message"></textarea>
            </div>
            <div id="messagebtn" class="text-center"><button type="submit" name="mes">Message</button></div>
        </div>
    </form>

        </div>
        <!-- contact -->

<?php 
    include('footer.php');
?>

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>