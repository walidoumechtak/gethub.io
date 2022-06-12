<?php
        session_start();
        $title ='E-Marrakech Books';
        $includeF = '';
        $includeIndexCss = '';
        $includeNav = '';
        $navblack = '';
    include "includes/header.inc.php";
?>


<div class="landing-page" id="particles-js">
     <?php   include "includes/nav.inc.php"; ?>


     <div class="land1 row">
            <h1>
                <p>READ EVERY THING </p>
                <p>ON E-MARRAKECH </p>
            </h1>
            <div class="button-land">
                <!-- <div class="col-md-6"> -->
                    <?php 
                    if(isset($_SESSION['login'])){
                        ?>
                            <a href="blog.php" id="land-btn-1">Check Our Blogs</a>
                    <?php
                    }   else{
                    ?>
                         <a href="registre.php" id="land-btn-1">Create Account</a>
                    <?php
                    }
                    ?>

                <!-- </div> -->
                <!-- <div class="col-md-6"> -->
                        <a href="books.php" id="land-btn-2">Let's Shop</a>
                <!-- </div> -->
            </div>
            </div>

            <div class="container search">
                <form action="search-page.php" method="POST">
                    <!-- <label for="srch">Find your book here :</label> -->
                    <input type="text" id="srch" name="search" placeholder="Name of the book">
                    <input type="submit" value="Search" name="gobook">
                </form>
            </div>
        </div>

    <br><br>


            <?php #=====================  start top books ============================ ?>


                <div class="container my-5">
                    <h3 class="text-center">TopSeller Book</h3>
                    <div class="top-book my-5">
                        
                          <div class="row">
                          <div class="col-md-3 card py-0 px-0 mb-2" style="width: 13.125rem;">
                            <div class="image-box">
                                <img src="themes/image/booksimage/ebook1.jpg" class="card-img-top" alt="book">
                                </div>
                                <span class="prix">23<span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2">Tout les Femme</h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>
                          <div class="col-md-3 card py-0 px-0 mb-2" style="width: 13.125rem;">
                            <div class="image-box">
                                <img src="themes/image/booksimage/multimidialearning.jpg" class="card-img-top" alt="book">
                                </div>
                                <span class="prix">23<span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2">Tout les Femme</h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>
                          <div class="col-md-3 card py-0 px-0 mb-2" style="width: 13.125rem;">
                            <div class="image-box">
                                <img src="themes/image/booksimage/physics.jpg" class="card-img-top" alt="book">
                                </div>
                                <span class="prix">23<span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2">Tout les Femme</h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>
                          <div class="col-md-3 card py-0 px-0 mb-2" style="width: 13.125rem;">
                            <div class="image-box">
                                <img src="themes/image/booksimage/psychologie.jpg" class="card-img-top" alt="book">
                                </div>
                                <span class="prix">23<span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2">Tout les Femme</h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="#" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>
                         
                          </div>

                    </div>
                </div>


            <?php #=====================  end top books ============================ ?>

            <?php #=====================  start best offer ============================ ?>

                    <div class="best-offer">
                        <div class="container">
                            <div class="rows">
                                <div class="content">
                                <h3 class="mb-5">Best | <span>Offer</span> </h3>
                                <h4>40% OF On Book Stand</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur, obcaecati!</p>
                               <div class="bar">
                                <h2>23$</h2>
                                <a href="">Shop Now</a>
                               </div>
                            </div>
                                <div class="image-box">
                                    <img src="themes/image/booksimage/physics.jpg" alt="ebook">
                                </div>
                            </div>
                        </div>
                    </div>

            <?php #=====================  end best offer ============================ ?>


            <?php #=====================  start bolg ============================ ?>

            <div class="tesm my-5">
                <div class="container">
                        <h2 class="text-center  mb-5">Our Blog</h2>

                        <?php 
                        
                                    $blog_query = mysqli_query($con, "SELECT * from blogs LIMIT 10");
                                
                        ?>

                <div class="owl-carousel owl-theme">
                    <?php  while($blog_row = mysqli_fetch_array($blog_query)){    ?>
                    <div class="item" >
                        <img src="<?php echo $blog_row['bloogImage'] ?>" alt="">
                        <div class="content-blog">
                        <h4><?php echo $blog_row['titre'] ?></h4>
                        <p class="mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus? walid oumechtak</p>
                        <a href="blog-page.php?idBlog=<?php echo $blog_row['id_blog'] ?>">Read More</a>
                        <span><?php echo $blog_row['dateCreation'] ?></span>

                        </div>
                    </div>
                   <?php } ?>
                    
                </div>
                </div>
            </div>

            <?php #=====================  end bolg ============================ ?>


            <?php #=====================  satrt your journy here ============================ ?>

            <div class="journy">
                <div class="conatainer">
                    <div class="rows">
                        <h4>Start your new book journey with E-Marrakech</h4>
                        <a href="books.php"> <i class="fa-solid fa-bookmark"></i> SHOP NOW</a>
                    </div>
                </div>
            </div>

            <?php #=====================  end your journy here ============================ ?>


            
<?php 
    // =========================  end of index =================================
   
    
    include "includes/footer.inc.php";
?>