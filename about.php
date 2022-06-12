<?php   
        session_start();
        $title ='About'; 
        $includeNav = '';
        $includeF = '';
        $includeAbout = '';
    include "includes/header.inc.php";
    ?>


<div class="about">
<?php  include "includes/nav.inc.php"; ?>
</div>
        <div class="about-land">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="about-land-title text-center text-white">
                            <h1>About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="whoweare">
        <div class="container">
            <div class="title-who text-center">
            <h2 class="mb-5"><span>Who</span> We Are</h2>
            </div>
                    <div class="who">
                        <!-- <div class="col-md-6"> -->
                            <div class="image-box">
                                <img src="themes/image/aboutImage/about.gif" alt="about e-marrakech">
                            </div>
                        <!-- </div> -->
                        <!-- <div class="col-md-6"> -->
                                <div class="about-content">
                                    <h3>Our History</h3>

                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                        Natus sint animi possimus doloremque laborum, enim dolorem quis dolor quae aliquam.
                                        Natus sint animi possimus doloremque laborum, enim dolorem quis dolor quae aliquam.
                                        Natus sint animi possimus doloremque laborum, enim dolorem quis dolor quae aliquam.
                                    </p>

                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                        Natus sint animi possimus doloremque laborum, enim dolorem quis dolor quae aliquam.
                                    </p>

                                    <p>
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                        Natus sint animi possimus doloremque laborum, enim dolorem quis dolor quae aliquam.
                                    </p>

                                </div>
                        <!-- </div> -->
                    </div>
        </div>
        </div>


            <?php 
            
                    $countBook = mysqli_query($con, "select count(*) as cptBook from books");
                    $countBlog = mysqli_query($con, "select count(*) as cptBlog from blogs");

                    $rowCountBook = mysqli_fetch_array($countBook);
                    $rowCountblog = mysqli_fetch_array($countBlog);

            
            ?>


        <div class="inourstore">
            <div class="container">
                <h2 class="text-center mb-5"><span>In Our</span> Store</h2>
                

                    <div class="inour">
                        <div class="box box1">
                            <div class="title-count">
                                <h3>Books</h3>
                                <h1><?php echo $rowCountBook['cptBook'] ?></h1>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                 Voluptatem impedit ut praesentium dignissimos, expedita
                                  ipsam nesciunt distinctio voluptate.
                                </p>
                                <a href="books.php">Browse All</a>
                        </div>
                    

                    
                        <div class="box box2">
                            <div class="title-count">
                                <h3>Bolg</h3>
                                <h1><?php echo $rowCountblog['cptBlog'] ?></h1>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                 Voluptatem impedit ut praesentium dignissimos, expedita
                                  ipsam nesciunt distinctio voluptate.
                                </p>
                                <a href="blog.php">Browse All</a>
                        </div>
                    </div>

            </div>
        </div>


        <?php 
    // =========================  end of about =================================
    include "includes/footer.inc.php";
?>