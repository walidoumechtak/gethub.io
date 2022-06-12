<?php
    session_start();
    $title = 'Login';
    $includeLoginCss ='';
    include "includes/header.inc.php"; 

?>

    <?php  
    
            if(isset($_SESSION['login'])){
                    header('location: index.php');
                    exit();
            }else{

                if(isset($_POST['go'])){
                $email = $_POST['email'];
                $pass = sha1($_POST['pass']);


                // admins sql ==========================================================================================
                
                $queryA = mysqli_query($con,"select * from admins where email = '$email' and password = '$pass'");
                
                if(mysqli_num_rows($queryA) == 1){
                        $rowA = mysqli_fetch_array($queryA);

                        $_SESSION['id_admin'] = $rowA['id_admin'];
                        $_SESSION['fullname'] = $rowA['fullName'];
                        $_SESSION['login'] = $email;
                        $_SESSION['pass'] = $pass;

                        header('location: index.php');
                        exit();
                }else{
                    echo "<div class='login-alert alert alert-dismissible fade show' role='alert'>Your Email or password is incorrect
                    
                    <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
                }

                // users sql ============================================================================================

                $query = mysqli_query($con,"select * from users where email = '$email' and password = '$pass'");
                
                if(mysqli_num_rows($query) == 1){
                        $row = mysqli_fetch_array($query);

                        $_SESSION['id_users'] = $row['id_user'];
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['login'] = $email;
                        $_SESSION['pass'] = $pass;

                        header('location: index.php');
                        exit();
                }else{
                    echo "<div class='login-alert alert alert-dismissible fade show' role='alert'>Your Email or password is incorrect
                    
                    <button id='registreB' type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
                }


            }
            }

    ?>


<div class="container">
        <div class="text-center">
            <img src="themes/image/logoB.png" alt="e-marrakech">
        </div>
        <div class="rows">
            <div class="image-box">
                <img src="themes/image/login/login.gif" alt="login book">    
            </div>
            <form action="" method="POST">
                <div class="infor">
                    <!-- <div class="email"> -->
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" required>
                    <!-- </div> -->
                    <!-- <div class="pass"> -->
                        <label for="pass">Your Password</label>
                        <input type="password" name="pass" id="pass" required>
                    <!-- </div> -->
                    </div>
                    <div class="fob">
                        <a href="forget.php">Forget Password ?</a>
                        <input type="submit" name="go" value="LOGIN">
                    </div>
                    <div class="create">
                        Don't have account ? <span><a href="registre.php">Create one now</a></span>
                    </div>
            </form>
        </div>
    </div>


    <script src="../themes/js/bootstrap.min.js"></script>
<?php
        include "includes/footer.inc.php"; 
?>