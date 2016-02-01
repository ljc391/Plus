var main = function() {
  $('.dropdown-toggle').click(function() {
    $('.dropdown-menu').toggle();
  });
  

   var activeDiv = 1;
    showDiv(activeDiv);
    var timer = setInterval(changeDiv, 4000);


    function changeDiv() {
        activeDiv++;
        if (activeDiv == 5) {
            activeDiv = 1;
        }
        showDiv(activeDiv);
    }

    function showDiv(num) {
        $('.slide').fadeOut(0);
        $('#s' + num).fadeIn();
         
    }




  $('.arrow-next').click(function() {
    var currentSlide = $('.active-slide');
    var nextSlide = currentSlide.next();

    var currentDot = $('.active-dot');
    var nextDot = currentDot.next();

    if(nextSlide.length === 0) {
      nextSlide = $('.slide').first();
      nextDot = $('.dot').first();
    }
    
    currentSlide.fadeOut(600).removeClass('active-slide');
    nextSlide.fadeIn(600).addClass('active-slide');

    currentDot.removeClass('active-dot');
    nextDot.addClass('active-dot');
  });


  $('.arrow-prev').click(function() {
    var currentSlide = $('.active-slide');
    var prevSlide = currentSlide.prev();

    var currentDot = $('.active-dot');
    var prevDot = currentDot.prev();

    if(prevSlide.length === 0) {
      prevSlide = $('.slide').last();
      prevDot = $('.dot').last();
    }
    
    currentSlide.fadeOut(600).removeClass('active-slide');
    prevSlide.fadeIn(600).addClass('active-slide');

    currentDot.removeClass('active-dot');
    prevDot.addClass('active-dot');
  });

    $(".col-md-5").on({
        mouseenter: function(){

            $(this).children().find('img').animate({ height: '120px' }, 500); 
            $(this).children().find('p').animate({size:'35px', letterSpacing: '0.3em' }, 500);
        },   
        mouseleave: function(){
            $(this).children().find('img').animate({ height: '100px' }, 500); 
            $(this).children().find('p').animate({size:'30px', letterSpacing: 'none'}, 500);
        },  
    });
    $(".col-md-5").on({
        mouseenter: function(){

            $(this).children().find('h3').animate({size:"" }, 500); 
            $(this).children().find('p').animate({size:'35px', letterSpacing: '0.3em' }, 500);
        },   
        mouseleave: function(){
            $(this).children().find('img').animate({ height: '100px' }, 500); 
            $(this).children().find('p').animate({size:'30px', letterSpacing: 'none'}, 500);
        },  
    });
 
 


}

$(document).ready(main);