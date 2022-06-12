<?php 
        session_start();
        $title ='Profile'; 
        $includeNav = '';
        $includeF = '';
        $includeChangePaa = '';
    include "includes/header.inc.php";
    ?>


<?php  if(isset($_SESSION['login'])){ ?>

<div class="blog">
<?php  include "includes/nav.inc.php";




        $user_id =  $_SESSION['id_users'];

        if(isset($_POST['go'])){

                      $queryUser = mysqli_query($con, "select * from users where id_user = $user_id");
                      $rowInfoUesr = mysqli_fetch_array($queryUser);
    
                    $currentPassFromDatabases = $rowInfoUesr['password'];
                    $currentPass = $_POST['password'];
                    $newpassword = $_POST['newpassword'];
                    $renewpassword = $_POST['renewpassword'];

                    if($newpassword == $renewpassword){
                          $password = sha1($currentPass);
                          if($password == $currentPassFromDatabases){
                                $finalPassowrd = sha1($newpassword);
                                $sqlPassword = mysqli_query($con, "UPDATE users set password = '$finalPassowrd' where id_user = $user_id");
                                if($sqlPassword){
                                echo "<div class='change-alert-success alert alert-dismissible fade show' role='alert'>
                                Password chagne successufuly
                            <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                             }
                          }else{
                            echo "<div class='change-alert alert alert-dismissible fade show' role='alert'>
                                The currente password and the new password are not match
                            <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                            $finalPassowrd = sha1($currentPass);
                          }
                    }else{
                      echo "<div class='change-alert alert alert-dismissible fade show' role='alert'>
                      the confirmation password is not inccorect
                      <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                      </button>
                      </div>";
                      $finalPassowrd = sha1($currentPass);
                    }

                }


?>

            

</div>

 
           



<div class="container-xl px-4 mt-4 changePass">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="edite-user.php?idUser=<?php echo $user_id ?>">Profile</a>
        <a class="nav-link" href="changepassword.php?idUser=<?php echo $user_id ?>">Change Password</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form method="POST" >
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="currentPassword">Current Password</label>
                                <input class="form-control" name="password" id="currentPassword" type="password" placeholder="Enter current password">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">New Password</label>
                                <input class="form-control" name="newpassword" id="newPassword" type="password" placeholder="Enter new password">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="confirmPassword">Confirm Password</label>
                                <input class="form-control" name="renewpassword" id="confirmPassword" type="password" placeholder="Confirm new password">
                            </div>
                            <input name="go" class="btn btn-primary" type="submit" value="Save">
                        </form>
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