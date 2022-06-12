<?php 
        session_start();
        $title ='Blogs'; 
        $includeNav = '';
        $includeF = '';
        $includeBlog = '';
    include "includes/header.inc.php";
    ?>


<div class="blog">
<?php  include "includes/nav.inc.php"; ?>
</div>
        <div class="blog-land">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-land-title text-center text-white">
                            <h1>Our Blog</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>


            <div class="container">

            <!-- <div class="search-box">
                         <button class="btn-search"><i class="fas fa-search"></i></button>
                         <input type="text" class="input-search" placeholder="Type to Search...">
             </div> -->

             <!-- =========================  ajax search ========================  -->

                <script>
                    $(document).ready(function(){
                        $('#input-s').keyup(function(){

                                $.ajax({
                                    url: 'get-blog-search.php',
                                    type: 'POST',
                                    data: {search: $(this).val()},
                                    success:function(result){
                                            $('#blogs').html(result);
                                    }
                                });
                        });
                    });
                </script>


             <!-- =========================  ajax search ========================  -->
             
                <div class="form-search">
                <form action="" method="POST">
                    <input type="text" name="search" placeholder="Title of the blog" id="input-s">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    
                    <!-- <input type="submit" name="go" value="Search"> -->
                </form>
                </div>

                    <?php #==================== blog content .................. ?>

                    <div class="blogs" id="blogs">

                <?php
                    if(!isset($_POST['search'])){
                    $sql2 = mysqli_query($con,"select * from blogs");
                    while($row2 = mysqli_fetch_array($sql2)){
                        ?>

                    <div class="item" >
                        <img src="<?php echo $row2['bloogImage'] ?>" alt="<?php echo $row2['titre'] ?>">
                        <div class="content-blog">
                            <h5><?php echo $row2['titre'] ?></h5>
                            <p class="mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus? walid oumechtak</p>
                            <a class="ms-5" href="blog-page.php?idBlog=<?php echo $row2['id_blog'] ?>">Read More</a>
                            <span class="ms-4"><?php echo $row2['dateCreation'] ?></span>
                        </div>
                     </div>

                    <?php
                    }
                    }
                    ?>


                               
                            </div> 
                    </div>
        
           




            
            
        <?php 
    // =========================  end of about =================================
    include "includes/footer.inc.php";
?>