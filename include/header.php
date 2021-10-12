  <header class="header-area header-2-area">
        <div class="header-nav">
            <div class="container custom-container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <a class="navbar-brand" href="index.php"><img src="assets/images/logo-2.png" alt=""></a> <!-- logo -->
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button> <!-- navbar toggler -->
                                                                  
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav m-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Home</a>
                                           
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about.php">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="restaurant.php">Restaurant</a>
                                        </li>
                                        <?php  
                                        
                                        if(isset($_SESSION['userid'])){
                                        $id=$_SESSION['userid'];
                                      $getall="SELECT COUNT(id) FROM user_cart WHERE user_id='{$id}' ";
$got =mysqli_query($conn,$getall);
$gotusercount=mysqli_fetch_array($got);
   $e=$gotusercount['0'];
                                        }else{
                                            $e="0";
                                        }
                                        
                                        ?>
                                       <style>
                                           
                                            .header-nav .navigation .navbar .navbar-btn ul li:first-child a::before {
            
              content: '<?php echo $e;?>';}
                                       </style>
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.php">Conact</a>
                                        </li>
                                    </ul>
                                </div> <!-- navbar collapse -->
                                <div class="navbar-btn d-none d-md-flex">
                                    <ul>
                                        <li><a href="cart.php" id="c"><i class="fas fa-shopping-basket"></i></a></li>
                                        <li><a href="userarea.php"><i class="fas fa-user"></i></a></li>
                                    </ul>
                                  <?php if(isset($_SESSION['userid'])){
                                  echo '  <a class="main-btn" href="logout.php">Logout</a>';
                                  
                                  }else{
                                  echo '  <a class="main-btn" href="login.php">Sign in</a>';
                                  
                                  }?>
                                </div>
                            </nav>
                        </div> <!-- navigation -->
                    </div>
                </div>
            </div>
        </div>
    </header>