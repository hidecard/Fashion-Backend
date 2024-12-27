
    <?php 

        include('dbcon.php');
        session_start();
        if(isset($_POST['login'])){ 
            $name = $_POST['uname']; 
            $pass = $_POST['upass'];
            $role = $_POST['urole'];
            $sql = "select * from user where user_name='$name' and user_pass='$pass' and user_role='$role'";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){ 
                $data = mysqli_fetch_assoc($res);
                if($name == $data['user_name'] and $pass==$data['user_pass'] and $role=="user"){
                    $_SESSION['uid'] = $data['user_id'];
                    $_SESSION['login'] = true;
                    header("Location:index.php");
                }elseif($name == $data['user_name'] and $pass==$data['user_pass'] and $role == "Admin"){
                    $_SESSION['admin'] = true;
                    header("Location:Admin/index.php"); 
                }else{ 
                    echo ("<script> alert('cant find your account') </script> ");
                }
            }else{
                echo ("<script> alert('cant find your account') </script> ");
            }
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
                    <h3>Hello Friend!</h3>
                    <p>Create New Account</p>
                    <div id="btn"><a href="signup.php">Sign up</a></div>
                </div>

    <div class="col-md-8" id="side2">
        <h3>Login Account</h3>
        <form action="" method="post">
        <div class="inp">
            <input type="text" name="uname" placeholder="User Name" required>
            <input type="text" placeholder="Password" name="upass" required><br>
            <select name="urole" id="" style="width: 500px;margin-top: 20px;height: 36px;align-items: center;" class="inp">
                <option value="user">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
        <p>Forgot Your Password</p>
        <div id="login" class="mt-3"><button type="submit" name="login">LOG IN</button></div>
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