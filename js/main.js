// $(document).ready(function() {
//     $(window).scroll(function(){
//             if(window.scrollY > 1){
//                     $('.header').addClass('sticky');
//             }else{
//                     $('.header').removeClass('sticky');
//             };
//     });
// });


/* sticky with js */

let myheader = document.querySelector(".header");

window.addEventListener('scroll', function () {
        
        if(window.scrollY > 0){
                
                myheader.classList.add('sticky');
        }else{
                myheader.classList.remove('sticky')
        }
})


/* menu botton */



let menubutton = document.querySelector('.menu-btn');
let mynav = document.querySelector('nav');

menubutton.onclick = function(){
        this.classList.toggle('active');
        mynav.classList.toggle('active');
}



// typing animation ----------------------

let typed = new Typed(".typing", {
        strings: ['Web Dev', 'Designer', 'Freelancer'],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
})

let typed2 = new Typed(".typd2",

                {
                        strings: ['Walid Oumechtak', 'Walid Oumechtak'],
                        typeSpeed: 100,
                        backSpeed: 60,
                        loop: true
                }

)

// progress ------------------------------------------------

let mySklills = document.querySelector('.skills');

window.onscroll = function () {

        let OfTop = mySklills.offsetTop; // chhal bach b3iid element dyalnna
        let OfHeight = mySklills.offsetHeight; // chhal lheight dyal element dyalnna
        let InHeight = this.innerHeight; // lheight dyal chacha
        let OfTopScrool = this.pageYOffset;

  

        if(OfTopScrool > (OfTop + OfHeight - InHeight)){

            let mySpan = document.querySelectorAll('.allskills .skillbox .box span');

            mySpan.forEach(span => {

             span.style.width = span.dataset.progress;
             
            });

            }
            else if(OfTopScrool < (OfTop + OfHeight - InHeight)) {

                let mySpan = document.querySelectorAll('.allskills .skillbox .box span');

                mySpan.forEach(span => {

                 span.style.width = '0%';
                 
                });

            }
};
