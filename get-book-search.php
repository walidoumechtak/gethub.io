<?php 
    include "includes/connexion.php";

        if(isset($_POST['search']) || $_SERVER['REQUEST_METHOD'] === 'POST'){
            
            $valueSearch = $_POST['search'];

            if(strlen($valueSearch) > 2){
                $sql1 = mysqli_query($con,"select * from books where title like '%$valueSearch%'");
                if(mysqli_num_rows($sql1) > 0){

               
                while($row1 = mysqli_fetch_array($sql1)){
?>

                            <div class="card py-0 px-0 mb-3" style="width: 13.125rem;">
                              <a href="product-page.php?id_pro=<?php echo $row1['id_book'] ?>">  <img src="<?php echo $row1['image'] ?>" class="card-img-top" alt="book"> </a>
                                <span class="prix"><?php echo $row1['price'] ?><span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2"><?php echo $row1['title'] ?></h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="includes/add-to-carte-scripte.php?idBookAdd=<?php echo $row1['id_book'] ?>&searchPage=1" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                            </div>


<?php
                }
            }else{
                echo "<div class='alert alert-warning'>opps there is no books wtih waht you type !!!</div>";
            }
        }else if(strlen($valueSearch) < 3 && strlen($valueSearch) > 0  ){
            echo "<div class='alert alert-warning'>Please type more than 2 character !!!</div>";
        }
        }
        // else{

           
            if($_POST['search'] == '' || empty($_POST['search'])){
                $sql2 = mysqli_query($con,"select * from books");
                while($row2 = mysqli_fetch_array($sql2)){
                    ?>

                        <div class="card py-0 px-0 mb-3" style="width: 13.125rem;">
                              <a href="product-page.php?id_pro=<?php echo $row2['id_book'] ?>">  <img src="<?php echo $row2['image'] ?>" class="card-img-top" alt="book"> </a>
                                <span class="prix"><?php echo $row2['price'] ?><span id="dollar">$</span> </span>
                                    <div class="card-body px-0 py-0">
                                        <h5 class="card-title mt-4 ms-3 mb-2"><?php echo $row2['title'] ?></h5>
                                        <div class="rating ms-3">
                                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-regular fa-star"></i><i class="fa-regular fa-star"></i> 
                                        </div> 
                                                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                                        <a href="includes/add-to-carte-scripte.php?idBookAdd=<?php echo $row2['id_book'] ?>&searchPage=1" class="btn "> <i class="fa-solid fa-cart-plus"></i> Add to carte</a>
                                    </div>
                        </div>

<?php

        }
    }
// }

?>