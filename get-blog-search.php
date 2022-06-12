<?php 
    include "includes/connexion.php";

        if(isset($_POST['search'])){
            
            $valueSearch = $_POST['search'];

            if(strlen($valueSearch) > 2){
                $sql1 = mysqli_query($con,"select * from blogs where titre like '%$valueSearch%'");
                while($row1 = mysqli_fetch_array($sql1)){
?>

                                <div class="item" >
                                    <img src="<?php echo $row1['bloogImage'] ?>" alt="<?php echo $row1['titre'] ?>">
                                    <div class="content-blog">
                                        <h5><?php echo $row1['titre'] ?></h5>
                                        <p class="mt-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus? walid oumechtak</p>
                                        <a class="ms-5" href="blog-page.php?idBlog=<?php echo $row1['id_blog'] ?>">Read More</a>
                                        <span class="ms-4"><?php echo $row1['dateCreation'] ?></span>
                                    </div>
                                 </div>


<?php
                }
            }
            
        }
        // else{

           
            if($_POST['search'] == '' || empty($_POST['search'])){
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
// }

?>