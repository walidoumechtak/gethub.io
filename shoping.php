<?php   
        session_start();
        ob_start();
        $title ='Shoping cart'; 
        $includeF = '';
        $includeNav = '';
        $includeShoping = "";
    include "includes/header.inc.php";
?>


<div class="shoping">
<?php  include "includes/nav.inc.php"; ?>
</div>


    <div class="container">
            <h3 id="title" class="text-center my-5"><span>Shop</span> Cart</h3>

            <table class="table-product" style="width:100% ;">
                <tr>
                    <th>Book details</th>
                    <th>Price</th>
                    <th></th>
                </tr>

                <?php 
                
                    if(isset($_SESSION['carte'])){

                        // print_r($_SESSION['carte']);

                    $total = 0;

                    $book_id = $_SESSION['carte'];

                    // for($i=0; $i<count($_SESSION['carte']); $i++)
                    $query = mysqli_query($con,"select * from books");
                while($row = mysqli_fetch_array($query)){
                    foreach($book_id as $idb){
                        if($idb == $row['id_book']){

                        
                        // $id = $_SESSION['carte'][$i];

                  
                ?>

                <tr>
                    <td id="flex-table">
                        <div class="image-box">
                            <img src="<?php echo $row['image'] ?>" alt="<?php echo $row['title'] ?>">
                        </div>
                        <div class="content">
                            <h4><?php echo $row['title'] ?></h4>
                            <p><span>product ID : </span> <?php echo $row['id_book'] ?></p>
                        </div>
                    </td>
                    <td>
                       <h5> <?php echo $row['price'] . "$" ?> </h5>
                       <?php $total += $row['price']; ?>
                    </td>
                    <td>
                        <a href="?deleteBook=<?php echo $row['id_book'] ?>">
                    <i class="fa-solid fa-circle-xmark"></i>
                    </a>
                    </td>
                </tr>
                
                <?php 
                            }
                         }
                        }
                   }else if(sizeof($_SESSION['carte']) == 0){

                            echo "<tr>
                                        <td colspan='3'>Your Shoping carte is empty go and add some books 
                                        <a style=\"color : orange; font-weight: bold; font-size:19px;\" href='books.php'>here</a></td>
                            </tr>";

                    }else{
                        echo "<tr>
                        <td colspan='3'>Your Shoping carte is empty go and add some books 
                        <a style=\"color : orange; font-weight: bold; font-size:19px;\" href='books.php'>here</a></td>
                          </tr>";
                    }
                
                ?>  
                          

                <!-- ====== ===== ===== === -->


            </table>


            <div class="total">
                <h5>Total : <span><?php if(isset($total)){ echo $total . "$"; } else { echo '0 $';} ?></span></h5>
                <button class="button-87" role="button"> CheckOut </button>
                <!-- <button class="button-52" role="button">Button 52</button> -->
            </div>
    </div>

                    <!--  ============================  delete item from shoiping carte =====================================  -->

                                    <?php
                                            if(isset($_GET['deleteBook'])){
                                                $idbookToDelete =$_GET['deleteBook'];
                                                foreach($_SESSION['carte'] as $key => $b){
                                                    if($b == $idbookToDelete){

                                                        unset($_SESSION['carte'][$key]);
                                                        header("Location: shoping.php");
                                                    }

                                                }
                                            }
                                                    
                                    
                                    ?>

                    <!--  ============================  delete item from shoiping carte =====================================  -->


<?php 
    // =========================  end of shoping  =================================
   
                                            // session_unset();
                                            // session_destroy();
    
    include "includes/footer.inc.php";
?>














        