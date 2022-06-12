<?php 
  session_start();
  ob_start();
  include "../includes/connexion.php";
?>


<?php  if(isset($_SESSION['login'])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Books Control</title>
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

    .datatable img{
      width: 60px;
    }

.dataTable-table i{
  font-size: 18px;
  /* padding: 9px; */
  color: white;
}

 .dataTable-table #zra9{
        /* color: blue; */
        background-color: #4285F4;
        margin-right: 14px;
        padding: 6px 8px;
       }

 .dataTable-table #hmar{
        /* color: blue; */
        background-color: #ff4444;
        margin-right: 14px;
        padding: 6px 8px;
       }

       @media screen and (max-width: 558px){
        .dataTable-table th,
        .dataTable-table td{
            font-size: 10px !important;
            font-weight: bold;
         }

         .dataTable-table #zra9 i{
          color:  #4285F4 !important;

         }

              .dataTable-table #zra9{
                margin-right: 9px;
                padding: 0 !important;
                background-color: white;
            }

            .dataTable-table #hmar i{
              color: #ff4444 !important;
            }

            .dataTable-table #hmar{
              padding:0 !important;
              background-color: white !important;
            }


       }

    @media screen and (max-width: 648px) {
        .dataTable-table{
            font-size: 13px !important;
         }

         .dataTable-table i{
          font-size: 13px;
          /* padding: 9px; */
          color: white;
        }

        .dataTable-table #zra9{
          margin-right: 9px;
        padding: 4px 6px;
       }

 .dataTable-table #hmar{
        padding: 4px 6px;
       }
       
    }
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
      <h1> Books Data</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Books</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Books</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <!-- <th scope="col">#</th> -->
                    <th scope="col">Book</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                    <!-- <th scope="col">Delete</th> -->
                  </tr>
                </thead>
                <tbody>

                <?php 
                
                    $queryB = mysqli_query($con, "select * from books");

                    while($rowBooks = mysqli_fetch_array($queryB)){
                ?>


                  <tr>
                    <!-- <th scope="row"><?php //echo $rowUsers['id_user'] ?></th> -->
                    <td> <img src="../<?php echo $rowBooks['image'] ?>" alt="<?php echo $rowBooks['title'] ?>"></td>
                    <td><?php echo $rowBooks['title'] ?></td>
                    <td><?php echo $rowBooks['price'] . " $" ?></td>
                    <td>
                      <a href="forms-books.php?editeB=<?php echo $rowBooks['id_book'] ?>" id="zra9"><i class="bi bi-pencil-fill"></i></a>
                      <a href="?deleteB=<?php echo $rowBooks['id_book'];?>" id="hmar"><i class="bi bi-x-circle-fill"></i></a>
                    </td>
                    <!-- <td><a href="" class="btn btn-danger">Delete</a></td> -->
                  </tr>
                  
                  <?php }
                  

                      if(isset($_GET['deleteB'])){
                              $idBook = $_GET['deleteB'];
                              mysqli_query($con, "DELETE from books where id_book = $idBook");

                              header("Location: books-data.php");
                              ?>



                                    <!-- <script>
                                      setTimeout(function () {
                                            window.location.href='books-data.php'; // mossiba m3ak nta
                                 },0.5);
                                    </script> -->
                                <?php
                      }
                      


                  

                  ?>
               
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "includes/footer.inc.php"; ?><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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

</body>

</html>

<?php }else{
   header("Location: ../index.php");
   exit();
 } ?>