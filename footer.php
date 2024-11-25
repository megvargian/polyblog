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
<footer class="footer-container py-5">
    <div class="container pt-3">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row">
                    <div class="col-8 px-1">
                        <button data-bs-toggle="modal" data-bs-target="#contact-us">
                            about us
                        </button>
                        <button data-bs-toggle="modal" data-bs-target="#contact-us">
                            Editorial line
                        </button>
                        <button data-bs-toggle="modal" data-bs-target="#contact-us">
                            Join our collective
                        </button>
                        <div class="row">
                            <div class="col-6">
                                <button data-bs-toggle="modal" data-bs-target="#contact-us">
                                    contact us
                                </button>
                                <button class="full" data-bs-toggle="modal" data-bs-target="#contact-us">
                                    Be our advocate
                                </button>
                            </div>
                            <div class="col-6 justify-content-center d-flex">
                                <img class="d-block" style="background-color: black;"
                                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/phone.svg"
                                    alt="phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 px-1">
                        <div class="custom-rotate">
                            <button data-bs-toggle="modal" data-bs-target="#contact-us">
                                Mission
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#contact-us">
                                Vision
                            </button>
                            <button data-bs-toggle="modal" data-bs-target="#contact-us">
                                Causes
                            </button>
                        </div>
                        <div class="row">
                            <button class="full text-center custom-width donate" data-bs-toggle="modal"
                                data-bs-target="#contact-us">
                                <img class="heart"
                                    src="<?php echo get_template_directory_uri(); ?>/inc/assets/images/heart-green.svg"
                                    alt="heart-donate">
                                Donate
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="modal fade custom-modal" id="contact-us" tabindex="-1" aria-labelledby="contact-usLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close m-0 remove-border-onFocus" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus sit ipsa tenetur magnam fugit.
                Laborum, iure nulla nisi dolores alias ipsum sit tempora ab cumque corporis incidunt, repellendus
                quaerat!
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis minus sit ipsa tenetur magnam fugit.
                Laborum, iure nulla nisi dolores alias ipsum sit tempora ab cumque corporis incidunt, repellendus
                quaerat!
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php wp_footer(); ?>
</body>

</html>