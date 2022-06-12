<!-- <div class="container homeNav"> -->
    
    <div <?php  if(!isset($navblack)) echo 'id="nav-cont"' ?> class="allnav">
    <div class="container" >
<header  class="ms-0">
    <div class="logo">
            <!-- E-Marrakech -->
            <a href="index.php">
                <img src="themes/image/logo.png" alt="logo-ebooking">
            </a>
    </div>
    <nav>
        <a href="index.php">Home</a>
        <a href="books.php">Books</a>
        <a href="about.php">About Us</a>
        <a href="blog.php">Our Blog</a>
        <a href="contact.php">Contact Us</a>
        <div class="dipani">
            <div class="shop-div">
                <a class="ntala1" href="shoping.php"> <i class="fa-solid fa-cart-shopping"></i> </a> 
                <span id="nmb-card">
                    <?php
                    
                     if(isset($_SESSION['carte'])){
                            $count = count($_SESSION['carte']);
                          echo $count; 
                          } else {
                               echo 0;
                         } ?>
                </span>
                </div>
                <?php 
                    if(!isset($_SESSION['login'])){
                ?>
                <a class="ntala1" href="login.php">Login</a>
                <?php
                    }else{
                ?>
                <!-- <a href="profile-user.php"><?php //echo $_SESSION["fullname"] ?> -->
                
                
                <div class="btn-group">
                    <a class="ntala1" id="user-profile">
                     <?php echo $_SESSION["fullname"] ?>
                    </a>
                     <ul class="dropdown-me">
                         <i class="fa-solid fa-caret-up"></i>
                         <?php if(isset($_SESSION['id_admin'])){ ?>
                         <li><a class="ntala1 dropdown-it" href="admin/index.php">dashbord</a></li>
                         <?php } ?>
                         <li><a class="ntala1 dropdown-it" href="<?php 
                       if(isset($_SESSION['id_admin'])){
                            echo 'admin/users-profile.php';
                       }else{
                           echo 'user-profile.php';
                       }
                        ?>">Profile</a></li>
                         <li><a  class="ntala1 dropdown-it" href="includes/logout.php">Logout</a></li>
                         
                        </ul>
                    </div>



                <!-- </a> -->
                <?php
                }
                ?>
            </div>
    </nav>

    <div class="cart-nav" id="cart-nav">
           <div class="oui">
                <a href="shoping.php"> <i class="fa-solid fa-cart-shopping"></i> </a> 
                <span id="nmb-card">
                <?php
                if(isset($_SESSION['carte'])){
                            $count = count($_SESSION['carte']);
                          echo $count; 
                          } else {
                               echo 0;
                         } ?>

                </span> <span> | </span>
                
                <?php 
                    if(!isset($_SESSION['login'])){
                ?>
                <a href="login.php">Login</a>
                <?php
                    }else{
                ?>
                <!-- <a href="profile-user.php"><?php //echo $_SESSION["fullname"] ?> -->
                
                
                <div class="btn-group">
                    <a  id="user-profile">
                     <?php echo $_SESSION["fullname"] ?>
                    </a>
                     <ul class="dropdown-me">
                         <i class="fa-solid fa-caret-up"></i>
                         <?php if(isset($_SESSION['id_admin'])){ ?>
                         <li><a class="dropdown-it" href="admin/index.php">dashbord</a></li>
                         <?php } ?>
                         <li><a class="dropdown-it" href="<?php 
                       if(isset($_SESSION['id_admin'])){
                            echo 'admin/users-profile.php';
                       }else{
                           echo 'user-profile.php';
                       }
                        ?>">Profile</a></li>
                         <li><a class="dropdown-it" href="includes/logout.php">Logout</a></li>
                         
                        </ul>
                    </div>



                <!-- </a> -->
                <?php
                }
                ?>
            </div>
           <div class="non">

           </div>
    </div>
</header>
</div>
</div>
<!-- </div> -->