<?php 
        session_start();
        ob_start();
        $title ='Profile'; 
        $includeNav = '';
        $includeF = '';
        $includeEdite_user = '';
    include "includes/header.inc.php";
    ?>

<?php  if(isset($_SESSION['login'])){ ?>

<div class="blog">
<?php  include "includes/nav.inc.php"; ?>
</div>


          <?php 
          
                $user_id = $_SESSION['id_users'];

                $query = mysqli_query($con , "select * from users where id_user = $user_id");
                $row = mysqli_fetch_array($query);
          ?>




                  <div class="container user-profile mt-4 mb-4 p-3 d-flex justify-content-center"> 
  <div class="card p-4"> 
    <div class=" image d-flex flex-column justify-content-center align-items-center"> 
      <button disabled class="btn btn-success image-button"> 
        <img src="<?php if(!empty($row['avatar'])){ echo $row['avatar']; } else { echo "themes/image/avatars/no.png";}  ?>" height="100" width="100" />
      </button> 


      <div class="d-flex flex-row justify-content-center align-items-center gap-2 mt-4 mb-2"> 
        <span class="idd1"> <b> Name : </b></span> <span><?php echo $row['fullname'] ?></span> 
      </div> 

      <!-- <span class="idd">@oumechtak</span> -->   

      <div class="d-flex flex-row justify-content-center align-items-center gap-2 my-2"> 
        <span class="idd1"> <b> Email : </b></span> <span><?php echo $row['email'] ?></span> 
      </div> 

      <div class="d-flex flex-row justify-content-center align-items-center my-2"> 
        <span ><b>Date of Birth : </b> <span class="follow"><?php echo $row['date_birth'] ?></span></span>
      </div>

      <div class="d-flex flex-row justify-content-center align-items-center my-2"> 
        <span><b>Country : </b> <span class="follow"><?php echo $row['country'] ?></span></span>
      </div>

      <div class="d-flex flex-row justify-content-center align-items-center my-2"> 
        <span><b>Joined : </b> <span class="follow"><?php echo $row['joinedAt']?></span></span>
      </div>

        <div class=" d-flex mt-2">
           <a href="edite-user.php?idUser=<?php echo $user_id ?>"  class="btn edite">Edit Profile</a>
       </div> 
      <div class="text mt-3"> 
        <span >Please fell free to chagne your information with a secure connexion</span>
      </div> 
      <!-- <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center"> 
        <span><i class="fas fa-twitter"></i></span> <span><i class="fas fa-facebook"></i></span>
        <span><i class="fa fa-instagram"></i></span> <span><i class="fas fa-linkedin"></i></span> 
      </div>  -->
      

      <div class=" d-flex mt-1">
           <a href="?idUserDelete=<?php echo $user_id ?>"  class="btn delete">Delete Account</a>
              <?php
              
                    if(isset($_GET['idUserDelete'])){
                          mysqli_query($con, "DELETE FROM `users` WHERE id_user = $user_id ");
                          session_unset();
                          session_destroy();
                          header("Location: login.php");
                    } 

              ?>

       </div> 
       <div class="mt-2">Please be careful before you delete your account !!!!!</div>

    </div> 
  </div>
        </div>
  







<?php 
    // =========================  end of books =================================
    include "includes/footer.inc.php";
?>


<?php }else{
   header("Location: index.php");
   exit();
 } ?>