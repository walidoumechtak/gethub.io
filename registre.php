<?php
    session_start();
    $title = 'Registre';
    $includeregistreCss ='';
    include "includes/header.inc.php"; 

?>

        

<div class="container">

    <div class="cont">
        <div class="rows">
        <div class="title"><img class="mb-2" src="themes/image/logoB.png" alt="e-marrakech"></div>
    <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Fullname :</span>
                <input type="text" name="fullname" >
            </div>
            
            <div class="input-box">
                <span class="details">Email :</span>
                <input type="email" name="email" >
            </div>
            <div class="input-box">
                <span class="details">date birthday :</span>
                <input type="date" name="dateB" >
            </div>
            <div class="input-box">
                <span class="details" id="me">Country : </span> <br>


                   

                <select name="country">
                <?php 
                        $sql1 = mysqli_query($con, "SELECT * FROM country");

                        while($row = mysqli_fetch_array($sql1)){
                    ?>
                    <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>

                    <?php }  ?>
                            
                </select>
            </div>
            <div class="input-box">
                <span class="details">Password :</span>
                <input type="password" name="pass" >
            </div>
            <div class="input-box">
                <span class="details">retype password :</span>
                <input type="password" name="rpass" >
            </div>
        </div>
        <div class="regex-pass">
            <p><b class="text-warning">Note : </b> Passowrd Must be a minimum of 8 characters and Must contain at least 1 number</p>
            <p>Must contain at least one uppercase character , Must contain at least one lowercase character</p>
        </div>
        <div class="buttons">
            <span>Already have account ? <a href="login.php">Login</a></span>
            <input id="subform" type="submit" value="REGISTER" name="reg">
        </div>
    </form>
    </div>
    </div>
</div>


            <?php 
            
                            if(isset($_POST['reg'])){

                                function test_input($data) {
                                    $data = trim($data);
                                    $data = stripslashes($data);
                                    $data = htmlspecialchars($data);
                                    return $data;
                                  }

                                  $fullname = $email = $dateB = $country = $pass  = $rpass = '';

                                  $fullname = test_input($_POST['fullname']) ;
                                    $email = test_input( $_POST['email']);
                                    $dateB = test_input($_POST['dateB']);
                                    $country =test_input( $_POST['country']);
                                    $pass =test_input($_POST['pass']) ;


                                  $errores = array();

                                  if(empty($fullname)){
                                        $errores[] = 'fullName must be entered';
                                  }
                                  if(!preg_match("/^[a-zA-Z-' ]*$/", $fullname)){

                                    $errores[] = 'fullName must only contains letters and whitespace';

                                  }
                                  if( strlen($fullname) < 6){
                                        $errores[] = "full name must be more than 6 catactere";
                                  }
                                  
                                    
                                  

                                  if(empty($email)){
                                        $errores[] = 'Email is requered';
                                  }
                                  elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                        $errores[] = "Email is not well form";
                                  }
                                    
                                  

                                  if(empty($dateB)){
                                        $errores[] = "date is required"; 
                                  }
                                  


                                if($pass != $rpass){
                                    $errores[] = "confirmation password does not match";
                                }else{

                                    if(!preg_match('/^(?=\S{8,})$/', $pass)){
                                            $errores[] = "Passowrd Must be a minimum of 8 characters";
                                    }
                                    if(!preg_match('/^(?=\S*[a-z])$/', $pass)){
                                                $errores[] = 'Passowrd Must contain at least one lowercase character';
                                    }
                                    if(!preg_match('/^(?=\S*[A-Z])$/', $pass)){
                                        $errores[] = 'Passowrd Must contain at least one Upercase character';
                                    }
                                    if(!preg_match('/^(?=\S*[\d])$/', $pass)){
                                        $errores[] = 'Passowrd Must  contain at least 1 number';
                                    }
                                }

                               

                               
                                if(empty($errores)){

                                  


                                    mysqli_query($con,"INSERT into users values (NULL,'$fullname','$email','$pass',
                                  '$dateB','$country')");
                                }
                             




                               
                            }


            ?>

<?php if(isset($errores)){   ?>
                <div class="registre-errors alert alert-dismissible fade show" role="alert"">
                            <?php 
                            
                                if(isset($errores)){
                                        foreach($errores as $error){
                                                echo  "<p>" . $error . "</p>" . "\n";
                                        }
                                    
                                }

                            ?>

                    <button id="registreB" type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
 <?php  }  ?>

<?php
        include "includes/footer.inc.php"; 
?>