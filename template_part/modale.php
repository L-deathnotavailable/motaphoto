<!doctype html>
<div id="modale">
    <button class="button_modale">X</button>
    <div class="modaleImgForm">
        <img class="modaleImg" src="<?php echo get_stylesheet_directory_uri() . '/assets/contact-header.png' ?>" alt="contact"/>
        <div class="modaleForm">
        <?php
            echo do_shortcode('[contact-form-7 id="ee1a5ff" title="Contact Form"]');
        ?>
        </div>
    </div>
</div>
