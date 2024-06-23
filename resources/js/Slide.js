$(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      items: 4, /* Số lượng items hiển thị, bạn có thể thay đổi */
      margin: 10,
      loop: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
          0: {
              items: 1
          },
          600: {
              items: 2
          },
          1000: {
              items: 4
          }
      }
  });
});

