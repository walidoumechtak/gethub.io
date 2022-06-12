<?php   
        session_start();
        $title ='Blog';
        $includeF = '';
        $includeNav = '';
        $includeblogPage = "";
    include "includes/header.inc.php";
?>



<div class="search">
<?php  include "includes/nav.inc.php"; ?>
</div>



    <div class="container blog-container">

        <?php 
        
                if(isset($_GET['idBlog'])){
                            $idBlog = $_GET['idBlog'];

                        $queryBlog = mysqli_query($con,"select * from blogs
                        where id_blog = $idBlog");

                        $rowBlog = mysqli_fetch_array($queryBlog);
                }
        
        ?>


        <div class="blogContent mb-5">
                <h1 class="text-center my-4"><?php echo $rowBlog['titre'] ?></h1>
                <div class="image-blog">
                <img src="<?php echo $rowBlog['bloogImage'] ?>" class="img-fluid rounded mb-4"  alt="<?php echo $rowBlog['titre'] ?>">   
                </div>
                
                    <?php 
                    
                    echo $rowBlog['contenu'];

                    ?>

                     <!-- <p> 
                        Veniam, libero magni consequatur natus hic quisquam dolorem voluptatibus? 
                        Dicta temporibus voluptas impedit consectetur cumque incidunt unde iure nihil provident,
                        in sequi.
                    </p> -->
        </div>
    </div>


    <div class="container">
        <div class="related-blog mt-5">
            <h1 class="text-center my-4">Related Blogs</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="themes/blogImage/129.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="themes/blogImage/129.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                </div>
            </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img class="card-img-top" src="themes/blogImage/129.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                </div>
            </div>

            </div>
            </div>
            </div>


    <?php 
    // =========================  end of blog page  =================================
    include "includes/footer.inc.php";
?>