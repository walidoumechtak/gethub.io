<?php
        session_start();
        $title ='Book';
        $includeF = '';
        $includeNav = '';
        $includeProuctPage = "";
    include "includes/header.inc.php";

    
                
    if(isset($_GET['bookIsAlreadyIn'])){
        echo "<script>alert('book already in the carte')</script>"; 
        echo "<script>window.location='product-page.php'</script>"; 
    }

    if(isset($_GET['bookAdded'])){
        echo "<script>alert('Book Added Successfully')</script>"; 
        echo "<script>window.location='product-page.php'</script>";
    }


?>




<div class="shoping">
<?php  include "includes/nav.inc.php"; ?>
</div>


        <?php 
        
                if(isset($_GET['id_pro'])){

                    $_SESSION['bookPageId'] = $_GET['id_pro'];
                    $id_pro = $_SESSION['bookPageId'] ;
                  $queryBookShow =  mysqli_query($con, "select * from books where id_book = $id_pro");

                   global $rowBookShow;
                   $rowBookShow = mysqli_fetch_array($queryBookShow);
                }
        
        
        ?>



    <div class="container conatiner2">
        <div class="product my-5">
            <div class="image-box">
                <img src="<?php echo $rowBookShow['image'] ?>" alt="<?php echo $rowBookShow['title'] ?>">
            </div>
            <div class="content">
                    <div class="title-share">
                        <h3> <?php echo $rowBookShow['title'] ?></h3>
                        <i class="fa-solid fa-share-nodes"></i>
                    </div>

                    <div class="description">
                        <p>
                        <?php echo $rowBookShow['desc'] ?>
                        </p>
                    </div>

                    <div class="price">
                        <h2><?php echo $rowBookShow['price'] ?>$ <s style="font-size:19px ;">34$</s> </h2>
                    </div>

                    <div class="available">
                        <p> <span> Available : </span> <i class="fa-solid fa-circle-check"></i> in stock <b> | </b> <span> Product id : </span> <?php echo $rowBookShow['id_book'] ?></p>
                    </div>

                    <div class="add-to-cart">
                        <a href="includes/add-to-carte-scripte.php?idBookAdd=<?php echo $rowBookShow['id_book'] ?>&productPage=1">
                            <i class="fa-solid fa-cart-plus"></i>
                            Add to cart
                        </a>
                    </div>

            </div>
        </div>
    </div>


    <div class="container container3">
        <h3 class="text-center my-5">Related Books</h3>



            <div class="rel-books">
                        <div class="row">

        <?php 
                if(isset($_GET['idCat'])){
                        $id_cat = $_GET['idCat'];
                        $queryRelated = mysqli_query($con, "select * from books where id_cat = $id_cat");
                        while($rowRealted = mysqli_fetch_array($queryRelated)){

                            if($rowRealted['id_book'] != $id_pro){
        ?>

                            <div class="card py-0 px-0 mb-3" style="width: 13.125rem;">
                                <img src="<?php echo $rowRealted['image'] ?>" class="card-img-top" alt="book">
                                <span class="prix"><?php echo $rowRealted['price'] ?><span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2"><?php echo $rowRealted['title'] ?></h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="includes/add-to-carte-scripte.php?idBookAdd=<?php echo $rowRealted['id_book'] ?>" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>
                          

                            <?php
                                    }
                                }
                             }?>
                           
                          

            </div>
            </div>
    </div>

                             
                            
  





<?php 
    // =========================  end of product page  =================================
    include "includes/footer.inc.php";
?>


