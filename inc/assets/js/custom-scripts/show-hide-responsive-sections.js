jQuery(document).ready(function ($) {
  $(window)
    .on('resize', function () {
      if ($(window).width() < 575) { // MOBILE
        const homeFeaturedArticlesDesktop = document.getElementById('home-featured-articles-desktop');
        const homeFeaturedArticlesMobile = document.getElementById('home-featured-articles-mobile');
        homeFeaturedArticlesDesktop.style.display = 'none';
        homeFeaturedArticlesMobile.style.display = 'block';

        const threeFeaturedArticlesBlock = document.getElementById('three-featured-articles-block');
        threeFeaturedArticlesBlock.style.display = 'none';
      } else { // DESKTOP
        const homeFeaturedArticlesDesktop = document.getElementById('home-featured-articles-desktop');
        const homeFeaturedArticlesMobile = document.getElementById('home-featured-articles-mobile');
        homeFeaturedArticlesDesktop.style.display = 'block';
        homeFeaturedArticlesMobile.style.display = 'none';

        const threeFeaturedArticlesBlock = document.getElementById('three-featured-articles-block');
        threeFeaturedArticlesBlock = 'block';
      }
    })
    .trigger('resize');
});
