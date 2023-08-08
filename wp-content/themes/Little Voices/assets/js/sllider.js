$(document).ready(function () {
  $(".your-slider").owlCarousel({
    items: 1,
    nav: true,
    loop: true,
    margin: 10,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1024: {
        items: 6,
      },
    },
  });

  // Обработчик события для кнопки Prev
  $(".categories-header-button.prev").on("click", function () {
    $(".your-slider").trigger("prev.owl.carousel");
  });

  // Обработчик события для кнопки Next
  $(".categories-header-button.next").on("click", function () {
    $(".your-slider").trigger("next.owl.carousel");
  });
});
