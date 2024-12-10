jQuery(document).ready(function ($) {
  $(window)
    .on('resize', function () {
      if ($(window).width() < 575) { // MOBILE
        // switch home featured articles slider and normal view
        const homeFeaturedArticlesDesktop = document.getElementById('home-featured-articles-desktop');
        const homeFeaturedArticlesMobile = document.getElementById('home-featured-articles-mobile');
        homeFeaturedArticlesDesktop.style.display = 'none';
        homeFeaturedArticlesMobile.style.display = 'block';
      } else { // DESKTOP
        // switch home featured articles slider and normal view
        const homeFeaturedArticlesDesktop = document.getElementById('home-featured-articles-desktop');
        const homeFeaturedArticlesMobile = document.getElementById('home-featured-articles-mobile');
        homeFeaturedArticlesDesktop.style.display = 'block';
        homeFeaturedArticlesMobile.style.display = 'none';
      }
    })
    .trigger('resize');
});
