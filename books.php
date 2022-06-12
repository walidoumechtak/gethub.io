<?php 
        session_start();
        $title ='Books';
        $includeBooks = '';
        $includeNav = '';
        $includeF = '';
    include "includes/header.inc.php";
    ?>

    <div class="booksnav">
<?php  include "includes/nav.inc.php"; ?>
</div>
        <div class="books-land">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="books-land-title text-center text-white">
                            <h1>Surffe our amazing categories <br> E-books</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container booksPage">
                <div class="row">
                    <div class="col-md-3">
                            <!-- <div class="nav-left">
                                
                                    <a href="">Comics</a>
                                    <a href="">Education</a>
                                    <a href="">Sport</a>
                                    <a href="">Life</a>
                                    <a href="">Etc</a>
                                
                            </div> -->

                                                            <!-- The sidebar -->
                                <div class="sidebar">
                                <span>Categories</span>
                                <?php  
                                
                                    $queryCat = mysqli_query($con,"select * from categories");
                                    while($rowCat = mysqli_fetch_array($queryCat)){
                                ?>

                                <a href="?idCat=<?php echo $rowCat['id_cat'] ?>" > <?php echo $rowCat['designation'] ?> </a>

                                <?php } ?>

                                </div>

                                
                    </div>
                    <div class="col-md-9">
                                <!-- Page content -->
                                <div class="content">

                                <?php isset($_GET['idCat']) ? $id_cat = $_GET['idCat'] : $id_cat = 1 ;
                                
                                        $queryBook = mysqli_query($con, "select * from books where id_cat = $id_cat");

                                        while($rowBook = mysqli_fetch_array($queryBook)){
                                ?>                                
                                <div class="card py-0 px-0 mb-3" style="width: 13.125rem;">
                              <a href="product-page.php?id_pro=<?php echo $rowBook['id_book']?>&idCat=<?php echo $id_cat ?>">  <img src="<?php echo $rowBook['image'] ?>" class="card-img-top" alt="book"> </a>
                                <span class="prix"><?php echo $rowBook['price'] ?><span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2"><?php echo $rowBook['title'] ?></h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="includes/add-to-carte-scripte.php?idBookAdd=<?php echo $rowBook['id_book'] ?>&books=1" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>

                            <?php }  ?>


                             
                            

                                </div>
                    </div>
                </div>
        </div>



                <?php 
                
                        if(isset($_GET['bookIsAlreadyIn'])){
                            echo "<script>alert('book already in the carte')</script>"; 
                            echo "<script>window.location='books.php'</script>"; 
                        }

                        if(isset($_GET['bookAdded'])){
                            echo "<script>alert('Book Added Successfully')</script>"; 
                            echo "<script>window.location='books.php'</script>";
                        }


                ?>

    


<?php 
    // =========================  end of books =================================
    include "includes/footer.inc.php";
?>