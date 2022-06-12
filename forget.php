<?php
    session_start();
    $title = 'Forget';
    $includeForgetCss ='';
    include "includes/header.inc.php"; 

?>

<div class="container">
        <div class="text-center">
            <img src="themes/image/logoB.png" alt="e-marrakech">
        </div>
    <div class="rows">
        <form action="">
            <div class="info">
                <label for="email">Your Email :</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="go">
            <span> Don't receive emial ? <a href="">Resend</a></span>
            <input type="submit" name="go" value="Verify">
            </div>
        </form>
        </div>
</div>


<?php
        include "includes/footer.inc.php"; 
?>