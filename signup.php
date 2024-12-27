    
    <?php 
        include('dbcon.php');
        if(isset($_POST['signup'])){
            $name = $_POST['uname'];
            $email = $_POST['uemail'];
            $pass = $_POST['upass'];
            $role = "user";

            $sql = "insert into user(user_name,user_email,user_pass,user_role)
            values('$name','$email','$pass','$role')";
            mysqli_query($conn,$sql);
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
                <div class="col-md-4" id="side1">
                    <h3>Welcome Back!!</h3>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <div id="btn"><a href="login.php">Login</a></div>
                </div>

                <div class="col-md-8" id="side2">
                    <h3>Create Account</h3>
                    <form action="" method="post">
                    <div class="inp">
                        <input type="text" name="uname" placeholder="Name" required>
                        <input type="email" name="uemail" placeholder="Email" required>
                        <input type="text" name="upass" placeholder="Password" required>
                    </div>
                    <div id="login" class="mt-5"><button type="submit" name="signup">SIGN UP</button></div>
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

</body>
</html>