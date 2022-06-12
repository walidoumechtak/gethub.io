<?php 
  session_start();
  include "../includes/connexion.php";

  
                        $idA = $_SESSION['id_admin'];
                        
                        $sqlInfoAdmin = mysqli_query($con,"select * from admins where id_admin = $idA");

                        $rowInfoAdmin = mysqli_fetch_array($sqlInfoAdmin);
                        $_SESSION['job'] = $rowInfoAdmin['job'];
                  
?>


<?php  if(isset($_SESSION['login'])){ ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users / Profile</title>
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
  <script src="../themes/js/jquery-3.6.0.min.js"></script>

  <style>
    /* ============================= alert admin =========================*/


    .admin-alert-success{
      background-color: #4BB543 !important;
      color: white;
      width: 80% !important;
        padding: 10px 15px !important;
        position: absolute !important;
        top: 10px !important;
        left: 50% !important;
    }

    .admin-alert{
        width: 80% !important;
        padding: 10px 15px !important;
        background-color: rgb(243, 84, 84) !important;
        color: white !important;
        position: absolute !important;
        top: 10px !important;
        left: 50% !important;
        transform: translateX(-50%);
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
}

    #registreB:not(:disabled), [type=reset]:not(:disabled), #registreB:not(:disabled), #registreB:not(:disabled) {
        cursor: pointer !important;
        color: white;
        background-color: transparent;
        border: none;
        position: absolute;
        top: 2px;
        right: 2px;
        font-weight: bold;
        font-size: 24px;
    } 



/* ============================= alert admin =========================*/
  </style>

  
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include "includes/nav.inc.php"; ?>
<!-- End Header -->


  <!-- ======= Sidebar ======= -->

  <?php include "includes/aside.inc.php"; ?>

    <!-- End Sidebar-->
              



  <!-- ========================================= -->
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
              <h2><?php echo $_SESSION['fullname'] ?></h2>
              <h3><?php echo $_SESSION['job'] ?></h3>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

                

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">
                    heheheheheheheheheheheh
                  </p> -->

                 

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['fullName'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">date of birth</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['date_naissance'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Job</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['job'];   ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['country'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['address'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['phone'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $rowInfoAdmin['email'] ?></div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST">
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fullName" value="<?php echo $rowInfoAdmin['fullName'] ?>">
                      </div>
                    </div>

                    <!-- <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div> -->

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">date of birth</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="date" type="date" class="form-control" id="company" value="<?php echo $rowInfoAdmin['date_naissance'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="job" type="text" class="form-control" id="Job" value="<?php echo $rowInfoAdmin['job'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="country" type="text" class="form-control" id="Country" value="<?php echo $rowInfoAdmin['country'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="address" type="text" class="form-control" id="Address" value="<?php echo $rowInfoAdmin['address'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?php echo $rowInfoAdmin['phone'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $rowInfoAdmin['email'] ?>">
                      </div>
                    </div>

                   

                    <div class="text-center">
                      <input type="submit" name="go" class="btn btn-primary" value="Save Changes">
                    </div>

                      <!-- ==============================  srcipt php for updat =============================== -->

                      <?php

                      if(isset($_POST['go'])){

                        
                        $fullname = $_POST['fullName'];
                        $job = $_POST['job'];
                        $date = $_POST['date'];
                        $country = $_POST['country'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $address = $_POST['address'];
                        
                        
                        
                      $sss =  mysqli_query($con,"UPDATE admins set fullName = '$fullname',
                        job = '$job', date_naissance = '$date', country = '$country',
                        email = '$email', phone = '$phone', address = '$address' where id_admin = $idA");

                        if($sss){
                          ?>
                          <script>
                          setTimeout(function () {
                              window.location.href='users-profile.php'; 

                          },1);
                          </script>

  <?php
                          // header("location: users-profile.php");
                        }
                        

}

                      ?>

                      <!-- ==============================  srcipt php for updat =============================== -->


                  </form><!-- End Profile Edit Form -->

                </div>


                <!-- =======================  change pasowrd php ============================ -->

                    <?php 

                      if(isset($_POST['changePass'])){

                            $currentPassFromDatabases = $rowInfoAdmin['password'];
                            $currentPass = $_POST['password'];
                            $newpassword = $_POST['newpassword'];
                            $renewpassword = $_POST['renewpassword'];

                            if($newpassword == $renewpassword){
                                  $password = sha1($currentPass);
                                  if($password == $currentPassFromDatabases){
                                        $finalPassowrd = sha1($newpassword);
                                        $sqlPassword = mysqli_query($con, "UPDATE admins set password = '$finalPassowrd' where id_admin = $idA");
                                        if($sqlPassword){
                                        echo "<div class='admin-alert-success alert alert-dismissible fade show' role='alert'>
                                        Password chagne successufuly
                                    <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
                                     }
                                   }else{
                                    echo "<div class='admin-alert alert alert-dismissible fade show' role='alert'>
                                        The currente password and the new password are not match
                                    <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    </div>";
                                    $finalPassowrd = sha1($currentPass);
                                  }
                            }else{
                              echo "<div class='admin-alert alert alert-dismissible fade show' role='alert'>
                              the confirmation password is not inccorect
                              <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                  <span aria-hidden='true'>&times;</span>
                              </button>
                              </div>";
                              $finalPassowrd = sha1($currentPass);
                            }
                            

                            // $sqlPassword = mysqli_query($con, "UPDATE admins set password = '$finalPassowrd' ");

                      }

                    
                    ?>

                    <script>
                      setTimeout(function() {
                        $(".admin-alert").fadeOut();
                        }, 2000);
                      setTimeout(function() {
                        $(".admin-alert-success").fadeOut();
                        }, 2000);
                    </script>

                <!-- =======================  change pasowrd php ============================ -->


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="changePass">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                </div>

                

               

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include "includes/footer.inc.php"; ?>
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
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

</body>

</html>

<?php }else{
   header("Location: ../index.php");
   exit();
 } ?>