<?php 
        session_start();
        $title ='Profile'; 
        $includeNav = '';
        $includeF = '';
        $includeEdite_user_form = '';
    include "includes/header.inc.php";
    ?>

<?php  if(isset($_SESSION['login'])){ ?>

<div class="blog">
<?php  include "includes/nav.inc.php"; ?>
</div>

    <?php 

                    $user_id =  $_SESSION['id_users'];

                    $queryUser = mysqli_query($con, "select * from users where id_user = $user_id");
                    $rowUser = mysqli_fetch_array($queryUser);

    ?>



<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="edite-user.php?idUser=<?php echo  $_SESSION['id_users'] ?>">Profile</a>
        <a class="nav-link" href="changepassword.php?idUser=<?php echo  $_SESSION['id_users'] ?>">Change Password</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img style="width:184px ;" class="img-account-profile rounded-circle mb-2" 
                    src="<?php if(isset($rowUser['avatar']) && !empty($rowUser['avatar'])){ echo $rowUser['avatar']; } else { echo "themes/image/avatars/no.png";}  ?>" 
                    alt="<?php echo $rowUser['avatar']; ?>">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG, JPEG or PNG no larger than 4 MB</div>
                    <!-- Profile picture upload button-->
                    <form method="POST"  enctype="multipart/form-data">
                    <input type="file" name="image" class="btn border" value="Upload new Avatar">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <!-- <form> -->
                        <!-- Form Group (username)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Full Name</label>
                            <input class="form-control" name="fullname" id="inputUsername" type="text" value="<?php  echo $rowUser['fullname'] ?>">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">Email</label>
                                <input class="form-control" name="email" id="inputFirstName" type="text" value="<?php  echo $rowUser['email'] ?>">
                            </div>
                            <!-- Form Group (last name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputCountry">Country</label>
                                <select class="form-control" name="country" id="inputCountry">
                                    <?php 
                                        $sqlCountry = mysqli_query($con, "select * from country");

                                        while($rowCountry = mysqli_fetch_array($sqlCountry)){

                                            ?>
                                                  <option value="<?php echo $rowCountry['name'] ?>"><?php echo $rowCountry['name'] ?></option>
                                            <?php
                                        }


                                    ?>
                                </select>
                            </div>
                        </div>
                        <!-- Form Row        -->
                        
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Birthday </label>
                            <input class="form-control" id="inputEmailAddress" name="date" type="date" value="<?php echo $rowUser['date_birth'] ?>">
                        </div>
                        <!-- Form Row-->
                       
                        <!-- Save changes button-->
                        <input class="btn btn-primary bbttnn" type="submit" value="Save changes" name="go">

                    </form>

                        <?php 

                            if(isset($_POST['go'])){

                                    $fullname = $_POST['fullname'];
                                    $email = $_POST['email'];
                                    $country = $_POST['country'];
                                    $date = $_POST['date'];



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

                                    if(empty($fullname)){
                                        $allErrors[] = 'fullName must be entered';
                                  }
                                  if(!preg_match("/^[a-zA-Z-' ]*$/", $fullname)){

                                    $allErrors[] = 'fullName must only contains letters and whitespace';

                                  }
                                  if( strlen($fullname) < 6){
                                        $allErrors[] = "full name must be more than 6 catactere";
                                  }

                                  if(empty($email)){
                                        $allErrors[] = 'Email is requered';
                                  }
                                  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        $allErrors[] = "Email is not well form";
                                  }
                                    
                                  if(empty($date)){
                                        $allErrors[] = "date is required"; 
                                  }
                                 
                                

                                    if($image_size > 4194304){
                                    $allErrors[] = "<p> image size must be small than <strong> 4 MB </strong></p>";
                                    }

                                    ?>

                                    <?php if(isset($allErrors) && !empty($allErrors)){   ?>
                                        <div class="users-errors alert alert-dismissible fade show" role="alert"">
                                                    <?php 
                                                    
                                                                foreach($allErrors as $error){
                                                                        echo  "<p>" . $error . "</p>" . "\n";
                                                                }
            
                                                    ?>
            
                                            <button id="registreB" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                        <?php  } 
                                else {
            
            
                                    $image = rand(1,99999) . "_" . $image_name;
                                    move_uploaded_file($image_tmp_name, "themes/image/avatars/".$image);

                                    if(!empty($image_name)){

                                        $imageIncludeToDataBases = 'themes/image/avatars/'. $image;
                                    }else{
                                            $imageIncludeToDataBases = $rowUser['avatar'];
                                    }
            
            
                                  $updateUser =  mysqli_query($con, "UPDATE users set fullname = '$fullname',
                                    date_birth = '$date',
                                    email = '$email',
                                    avatar = '$imageIncludeToDataBases' where id_user = $user_id");
            
            
                                    if($updateUser){
                                    ?>
            
                                    <div class="addbook-success alert alert-dismissible fade show" role="alert"">
                                     Update successfully
                                    <button id="registreB" type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
            
                                    <?php
                                    }
            
            
            
            } 
            }  ?>




                      

         
                   
                </div>
            </div>
        </div>
    </div>
</div>





<?php 
    // =========================  end of edite user =================================
    include "includes/footer.inc.php";
?>

<?php }else{
   header("Location: index.php");
   exit();
 } ?>