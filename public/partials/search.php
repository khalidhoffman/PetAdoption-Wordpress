<div class="search" id="search"><script>window.PetAdoption = {
    domain: "<?php echo get_option('pet_adoption_domain'); ?>",
    contactInfo: {
        tel: "<?php echo get_option('pet_adoption_tel'); ?>",
        email: "<?php echo get_option('pet_adoption_email'); ?>",
        web: "<?php echo get_option('pet_adoption_web'); ?>"
    }
};</script><div class="search-heading"><h1 class="search-heading__text"></h1></div><div class="search-preview"><div class="search-preview__wrap"></div></div><div class="search-cta"><h3 class="search-cta__text"><span><?php _e("Ready to adopt?", "boilerplate"); ?></span> <a href="tel:<?php echo get_option('pet_adoption_tel'); ?>"><?php echo get_option('pet_adoption_tel'); ?></a></h3></div><div class="search__wrap"><form class="search__form" action="#!"><div class="image"><?php $image_id = get_option('pet_adoption_image');
$image_url = '';
if (isset($image_id)){
    $image_url = wp_get_attachment_url($image_id);
}; ?><div class="image__placeholder" style="background-image: url('<?php echo $image_url; ?>')"></div></div><div class="instructions"><h5 class="instructions__heading"><?php _e("Instructions", "boilerplate"); ?></h5><p class="instructions__content"><?php echo get_option('pet_adoption_instructions'); ?></p></div><div class="search-fields"><div class="search-fields__wrap"><div class="advanced-options"><div class="advanced-options__wrap"><button class="button button--advanced-options usa-button-primary-alt" href="#"><?php _e("Advanced Options", "boilerplate"); ?></button><div class="advanced-options-view"><div class="button button--close remodal-close" data-remodal-action="close"></div><div class="advanced-options-view__wrap"></div><button class="remodal-confirm usa-button-primary" data-remodal-action="confirm"><?php _e("OK", "boilerplate"); ?></button><button class="remodal-cancel usa-button-secondary" data-remodal-action="cancel"><?php _e("Cancel", "boilerplate"); ?></button></div></div></div><div class="field field--species species"><select class="field__select input-species" name="species"><option value="cat">cat</option><option value="dog">dog</option></select></div></div></div><div class="button button--submit"><input class="button__input" type="submit" value="Search"></div></form></div><div class="search-chips"></div><div class="search-results"><div class="search-results__wrap"></div></div></div>