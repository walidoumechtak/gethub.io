<?php 
  session_start();
  ob_start();
    include "../includes/connexion.php";

      // $id_book = $_GET['editeB'];
      // $queryInfoBook = mysqli_query($con,"select * from books where 	
      // id_book = $id_book");
      // $rowInfoBook = mysqli_fetch_array($queryInfoBook);

?>

<?php  if(isset($_SESSION['login'])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Edite Book</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  



          <style>
             /* ============================== add book errors alert ======================================*/

                    .addbook-success{
                        width: 50.5%;
                        padding: 16px 23px;
                        background-color: #4BB543;
                        color: white;
                        position: absolute;
                        top: 130px;
                        left: 49.8%;
                        transform: translateX(-50%);
                        border-radius: 5px;
                        -webkit-border-radius: 5px;
                        -moz-border-radius: 5px;
                        -ms-border-radius: 5px;
                        -o-border-radius: 5px;
                        font-size: 13px;
                }
                    .addbook-errors{
                        width: 48%;
                        padding: 10px 15px;
                        background-color: rgb(243, 84, 84);
                        color: white;
                        position: absolute;
                        top: 100px;
                        left: 50%;
                        transform: translateX(-50%);
                        border-radius: 5px;
                        -webkit-border-radius: 5px;
                        -moz-border-radius: 5px;
                        -ms-border-radius: 5px;
                        -o-border-radius: 5px;
                        font-size: 13px;
                }

                #registreB:not(:disabled),  #registreB:not(:disabled), #registreB:not(:disabled) {
                    cursor: pointer !important;
                    background-color: transparent;
                    border: none;
                    position: absolute;
                    top: -3px;
                    right: 2px;
                    font-weight: bold;
                    font-size: 24px;
                    color: white;
                }

                /* ============================== add book error alert ======================================*/
          </style>



</head>

<body>

 <!-- ======= Header ======= -->
 <?php include "includes/nav.inc.php"; ?>
<!-- End Header -->


  <!-- ======= Sidebar ======= -->

  <?php include "includes/aside.inc.php"; ?>

    <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Book</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">book</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-10">

         


        <div class="col-lg-10">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Book</h5>

              <!-- Vertical Form -->
              <form method="POST" enctype="multipart/form-data" class="row g-3">
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Title</label>
                  <input type="text" class="form-control" id="inputNanme4" name="title"">
                </div>

                <!--  -->

                <div class="col-12">
                  <label for="inputEmail4" class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-10">
                    <textarea  name="desc" id="inputEmail4"  class="form-control" style="height: 100px"></textarea>
                  </div>
                </div>


                <!--  -->

                
                <div class="col-12">
                  <label for="inputPassword4" class="form-label">Price</label>
                  <input type="number" class="form-control" name="price" id="inputPassword4">
                </div>


                <div class="col-12">
                  <label for="inputAddress" class="form-label">Categories</label>

                  <select class="form-select" name="cat" id="inputAddress">
                      <?php 
                      
                          $queryCat = mysqli_query($con, "select * from categories");

                      while($rowCat = mysqli_fetch_array($queryCat)){
                      ?>
                            <option value="<?php echo $rowCat['id_cat'] ?>"><?php echo $rowCat['designation'] ?></option>
                      <?php
                     }
                      ?>
                  </select>
                </div>

                <div class="col-12">
                 <label for="inputNumber" class="col-sm-2 col-form-label">Image Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" name="image" id="formFile">
                  </div>
                </div>
              
                <div class="text-center">
                  <button type="submit" name="go" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- Vertical Form -->

            </div>
          </div>


          <?php 

                      if(isset($_POST['go'])){

                            $title = $_POST['title'];
                            $desc = $_POST['desc'];
                            $price = $_POST['price'];
                            $cat = $_POST['cat']; 
                        

                            $image_name = $_FILES['image']['name'];
                            $image_type = $_FILES['image']['type'];
                            $image_tmp_name = $_FILES['image']['tmp_name'];
                            $image_size = $_FILES['image']['size'];
                          

                            $image_allowed_extension = array('png','jpg','jpeg');
                            $explode_extension = explode(".",$image_name);
                            $image_extension = strtolower(end($explode_extension));

                            $allErrors = array();


                            if(!empty($image_extension) &&  ! in_array($image_extension, $image_allowed_extension)){
                                    $allErrors[] = "<p> image extension is not <strong> allowed </strong> </p>";
                            }

                            if(empty($title)){
                              $allErrors[] = "<p> Title is <strong> Required </strong> </p>";
                            }
                            if(empty($desc)){
                              $allErrors[] = "<p> Description is <strong> Required </strong> </p>";
                            }
                            if(empty($price)){
                              $allErrors[] = "<p> Price is <strong> Required </strong> </p>";
                            }

                            if(!empty($price) && !is_numeric($price)){
                              $allErrors[] = "<p> Please entre a <strong> Valid </strong> Price </p>";
                            }

                            if(empty($image_name)){
                              $allErrors[] = "<p> image is <strong> Require </strong></p>";
                            }

                            if($image_size > 4194304){
                              $allErrors[] = "<p> image size must be small than <strong> 4 MB </strong></p>";
                            }


                             ?>


                        <?php
                        
                        if(isset($allErrors) && !empty($allErrors)){   ?>
                                        <div class="addbook-errors alert alert-dismissible fade show" role="alert"">
                                                    <?php 
                                                    
                                                    
                                                                foreach( $allErrors as $key => $error){
                                                                        echo  $error . "\n";
                                                                }
                                                    
                                                        

                                                    ?>

                                            <button id="registreB" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                        <?php  
                        
                                     }else{


                                                $image = rand(1,99999) . "_" . $image_name;
                                                move_uploaded_file($image_tmp_name, "../themes/image/booksimage/".$image);
                                                $imageIncludeToDataBases = 'themes/image/booksimage/'. $image;


                                             $sqlAddBooko = mysqli_query($con, "INSERT into `books` (`title`,`desc`,`price`,`image`, `id_cat`) 
                                                values ('$title', \"$desc\", $price ,'$imageIncludeToDataBases',$cat)");


                                        if($sqlAddBooko){
                                            ?>

                                            <div class="addbook-success alert alert-dismissible fade show" role="alert"">
                                                   Nice sure You have been added a book successfully
                                            <button id="registreB" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                             </div>

                                            <?php
                                        }



                                     }  
                                     

                        
                        ?>

                      

                    <?php


                            
                        //   $sqlUpdate =  mysqli_query($con, " UPDATE books SET title = '$title', `desc` = \"$desc\", price = $price
                        //    WHERE id_book = $id_book ");

                        // if($sqlUpdate){
                          
                        //       header("Location: books-data.php");
                        // }

        ?>
                          <!-- <script>
                        setTimeout(function () {
                              window.location.href='users-data.php'; // mossiba m3ak nta
                        },0.001);
                        </script> -->
          <?php

                      }

            ?>

         

         

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "includes/footer.inc.php"; ?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../themes/js/jquery-3.6.0.min.js"></script>
  <script src="../themes/js/bootstrap.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


                          <script>


                        setTimeout(function() {
                        $(".addbook-errors").fadeOut();
                        }, 3000);

                        
                        setTimeout(function() {
                        $(".addbook-success").fadeOut();
                        }, 3000);


                        </script>

</body>

</html>

<?php }else{
   header("Location: ../index.php");
   exit();
 } ?>