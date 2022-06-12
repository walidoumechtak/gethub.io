



<?php
    if(isset($includeF)){
        include "footer.php";
    }
 ?>

<script src="themes/js/jquery-3.6.0.min.js"></script>
<script src="themes/librjs/particles.js"></script>
<script src="themes/librjs/app.js"></script>
<script src="themes/js/bootstrap.min.js"></script>
<script src="themes/js/owl.carousel.min.js"></script>

<script>



                $(document).ready(function(){


                   

                        setTimeout(function() {
                        $(".login-alert").fadeOut();
                        }, 2000);

                        setTimeout(function() {
                        $(".registre-errors").fadeOut();
                        }, 5000);



                    $('#input-s').focus(function(){
                        $('#input-s').addClass('focus-input');
                    });

                    $('#input-s').blur(function(){
                        $('#input-s').removeClass('focus-input');
                    });
                    });
            



 
 $('.owl-carousel').owlCarousel({
    
  
    loop:true,
    autoplay:true,
    margin:25,
    nav:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
})


/* menu botton */



let menubutton = document.querySelector('.non');
let mynav = document.querySelector('nav');
let myshop = document.getElementById('#cart-nav');

menubutton.onclick = function(){
        this.classList.toggle('active');
        mynav.classList.toggle('active');
        myshop.classList.toggle('active');
}


/*-----------------------------------*/

let allnav = document.querySelectorAll('nav');

allnav.forEach(nv => {
        nv.addEventListener('click', (e) =>{

                if(mynav.classList.contains('active') && menubutton.classList.contains('active')){
                        mynav.classList.remove('active');
                        menubutton.classList.remove('active');
                }

        })
})


</script>

</body>
</html>