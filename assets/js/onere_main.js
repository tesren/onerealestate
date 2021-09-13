/*Tooltips bs */
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

//Logo en Menú movil
if($(window).width() <= 992){
    
    const navListEle = document.createElement("li");
    navListEle.setAttribute('class', 'nav-item py-3');
    navListEle.setAttribute('id', 'logo-mobile');

    const navListAnc = document.createElement("a");
    navListAnc.setAttribute('href', '/');
    navListAnc.setAttribute('class', 'navbar-brand ms-2 d-lg-none');
    navListAnc.setAttribute('id', 'logo-anchor');
    navListEle.appendChild(navListAnc);

    const navListImg = document.createElement("img");
    const logoImg = document.getElementById('nav_heder_logo');
    srcLogo = logoImg.getAttribute('src');
    navListImg.setAttribute('src', srcLogo);
    navListImg.setAttribute('class', 'w-75');
    navListAnc.appendChild(navListImg);
        
    const element = document.getElementById("navbarSupportedContent");
    element.prepend(navListEle);       
}

/**Contact form */
$('.wpcf7 textarea').attr('rows', 5);

//carrusel de cards

if ($(window).width() < 768) {
    $(document).ready(function() {
        $('#recipeCarousel').lightSlider({
            autoWidth:false,
            loop:false,
            item:1,
            
        onSliderLoad: function() {
            $('#recipeCarousel').removeClass('cS-hidden');
        } 
    });  
    }); 

}else if($(window).width() >= 768 && $(window).width() < 992){
    $(document).ready(function() {
        $('#recipeCarousel').lightSlider({
            autoWidth:false,
            loop:false,
            item:2,
            
        onSliderLoad: function() {
            $('#recipeCarousel').removeClass('cS-hidden');
        } 
    });  
    });

}
else{
    $(document).ready(function() {
        $('#recipeCarousel').lightSlider({
            autoWidth:false,
            loop:false,
            item:3,
            
        onSliderLoad: function() {
            $('#recipeCarousel').removeClass('cS-hidden');
        } 
    });  
    });
}