
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="./image/logo.png" alt="" width="180px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: white;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="clothe.php">Clothe</a>
                  </li>


        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #1c1c50;">
          <?php
            include('dbcon.php');
            $sql = "select * from category";
            $res = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($res)):
          ?>
            <li><a class="dropdown-item" href="clothe.php?cid=<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></a></li>
            <?php endwhile;?>
          </ul>
        </li>

                  <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                </ul>
               
                <form class="d-flex" method="post">
                  <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit"name="search" id="search-btn">Search</button>
                </form>

                
              </div>
            </div>
          </nav>
        <!-- navbar -->

