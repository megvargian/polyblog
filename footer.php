<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */
?>
</div><!-- #content -->
</div><!-- #page -->
<footer class="bg-black footer-container py-5">
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row">
                    <div class="col-8 px-1">
                        <button data-bs-toggle="modal" data-bs-target="#contact-us">
                            about us
                        </button>
                        <button>
                            Editorial line
                        </button>
                        <button>
                            Join our collective
                        </button>
                        <div class="row">
                            <div class="col-6">
                                <button>
                                    contact us
                                </button>
                                <button class="full">
                                    Be our advocate
                                </button>
                            </div>
                            <div class="col-6">
                                <img class="wi-100 d-block" src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/social_media_cell.png" alt="cell">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 px-1">
                        <div class="custom-rotate">
                            <button>
                                Mission
                            </button>
                            <button>
                                Vision
                            </button>
                            <button>
                                Causes
                            </button>
                        </div>
                        <div class="row">
                            <button class="full text-center custom-width">Donate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade custom-modal" id="contact-us" tabindex="-1" aria-labelledby="contact-usLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close m-0 remove-border-onFocus" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus sit ipsa tenetur magnam fugit. Laborum, iure nulla nisi dolores alias ipsum sit tempora ab cumque corporis incidunt, repellendus quaerat!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus sit ipsa tenetur magnam fugit. Laborum, iure nulla nisi dolores alias ipsum sit tempora ab cumque corporis incidunt, repellendus quaerat!
            </div>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
    });
</script>
<?php wp_footer(); ?>
</body>
</html>