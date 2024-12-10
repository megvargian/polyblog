jQuery(document).ready(function ($) {
  $(window)
    .on('resize', function () {
      if ($(window).width() < 575) { // MOBILE
        // switch home featured articles slider and normal view
        const homeFeaturedArticlesDesktop = document.getElementById('home-featured-articles-desktop');
        const homeFeaturedArticlesMobile = document.getElementById('home-featured-articles-mobile');
        homeFeaturedArticlesDesktop.style.display = 'none';
        homeFeaturedArticlesMobile.style.display = 'block';

        // home three featured articles hide
        const threeFeaturedArticlesBlock = document.getElementById('three-featured-articles-block');
        threeFeaturedArticlesBlock.style.display = 'none';
      } else { // DESKTOP
        // switch home featured articles slider and normal view
        const homeFeaturedArticlesDesktop = document.getElementById('home-featured-articles-desktop');
        const homeFeaturedArticlesMobile = document.getElementById('home-featured-articles-mobile');
        homeFeaturedArticlesDesktop.style.display = 'block';
        homeFeaturedArticlesMobile.style.display = 'none';

        // home three featured articles show
        const threeFeaturedArticlesBlock = document.getElementById('three-featured-articles-block');
        threeFeaturedArticlesBlock.styles.display = 'block';
      }
    })
    .trigger('resize');
});
