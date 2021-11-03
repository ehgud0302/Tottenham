
$(function() {
    //Team Page FullPage
      $('#fullpage').fullpage({
          //options here
          navigation: true,
          navigationPosition: 'right',
          navigationTooltips: ['Start', 'Map','Video', 'Information', 'Site'],
          showActiveTooltip: true,
          loopBottom: true,
          loopTop: true
      });
  
    //Team Page Slide
    var swiper = new Swiper('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      loop: true,
    
      // If we need pagination
      pagination: {
        el: '.swiper-pagination',
        clickable:true
      },
    
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      }
    });
  });