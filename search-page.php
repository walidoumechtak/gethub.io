<?php   
        session_start();
        $title ='Search Books';
        $includeF = '';
        $includeNav = '';
        $includeSearch = "";
    include "includes/header.inc.php";
?>



<div class="search">
<?php  include "includes/nav.inc.php"; ?>
</div>


 <!-- =========================  ajax search ========================  -->

 <script>
                    $(document).ready(function(){
                        $('#ssss').keyup(function(){

                                $.ajax({
                                    url: 'get-book-search.php',
                                    type: 'POST',
                                    data: {search: $(this).val()},
                                    success:function(result){
                                            $('#search-book').html(result);
                                    }
                                });
                        });
                    });
                </script>


             <!-- =========================  ajax search ========================  -->


<div class="search-land">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="search-land-title text-center text-white">
                            
                                    <form action="" autocomplete="off" method="POST">
                                        <input type="text" name="search" placeholder="Type your book name" id="ssss">
                                        <input style="display: none;" type="submit" name="gobook" value="Search">
                                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="container">
                    <div class="search-book" id="search-book">
                    

                            <?php 
                                    if(isset($_POST['gobook'])){

                                            $bookSearch = $_POST['search'];

                                            
                                            
                                            
                                            $querySearch = mysqli_query($con , "select * from books where title like '%$bookSearch%'");
                                            if(mysqli_num_rows($querySearch) > 0){
                                         while($rowSearch = mysqli_fetch_array($querySearch)){   

                                   
                            
                            ?>




                            <div class="card py-0 px-0 mb-3" style="width: 13.125rem;">
                              <a href="product-page.php?id_pro=<?php echo $rowSearch['id_book'] ?>">  <img src="<?php echo $rowSearch['image'] ?>" class="card-img-top" alt="book"> </a>
                                <span class="prix"><?php echo $rowSearch['price'] ?><span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2"><?php echo $rowSearch['title'] ?></h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="includes/add-to-carte-scripte.php?idBookAdd=<?php echo $rowSearch['id_book'] ?>&searchPage=1" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>

                           <?php

                                      }
                                      
                                    }else{
                                        echo "<div class='alert alert-warning'>opps there is no books wtih waht you type !!!</div>";
                                    }


                                    } 


                                ?> 

                          
                        

           



                    </div>
        </div>


        <?php 
                
                if(isset($_GET['bookIsAlreadyIn'])){
                    echo "<script>alert('book already in the carte')</script>"; 
                    echo "<script>window.location='search-page.php'</script>"; 
                }

                if(isset($_GET['bookAdded'])){
                    echo "<script>alert('Book Added Successfully')</script>"; 
                    echo "<script>window.location='search-page.php'</script>";
                }


        ?>


<?php 
    // =========================  end of search page  =================================
    include "includes/footer.inc.php";
?>