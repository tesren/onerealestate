/*Tooltips bs */
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

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

}else{
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