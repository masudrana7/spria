<?php 
    use SoftCoders\spria\spria;
    if (spria::$options['preloader']) {

        $preloader_text = spria::$options['preloader_text'];
        $character_array = str_split($preloader_text);
?>
<!-- preloader -->
<div id="preloader" class="preloader">
    <div class="animation-preloader">
        <div class="spinner">
            <div class="loader-icon">
                <?php
                if (!empty( spria::$options['preloader_img'] )) {
                    $preloader_img = wp_get_attachment_image( spria::$options['preloader_img'], 'full' );
                    echo wp_kses_post($preloader_img);
                } else { 
                    $preloader_img = '';
                } ?>
                
            </div>
        </div>
        <div class="txt-loading">
            <?php if(is_array($character_array) || is_object($character_array) ) { 
                foreach ($character_array as $key => $value ) {
                ?>
                <span data-text-preloader="<?php echo esc_html(ucfirst($value));?>" class="letters-loading"> <?php echo esc_html(ucfirst($value));?> </span>
            <?php } } else { ?> 
                <span data-text-preloader="B" class="letters-loading"> <?php echo esc_html__("B","spria");?> </span>
                <span data-text-preloader="O" class="letters-loading"> <?php echo esc_html__("O","spria");?> </span>
                <span data-text-preloader="X" class="letters-loading"> <?php echo esc_html__("X","spria");?> </span>
                <span data-text-preloader="F" class="letters-loading"> <?php echo esc_html__("F","spria");?> </span>
                <span data-text-preloader="I" class="letters-loading"> <?php echo esc_html__("I","spria");?> </span>
                <span data-text-preloader="N" class="letters-loading"> <?php echo esc_html__("N","spria");?> </span>
            <?php } ?>
        </div>
    </div>
</div>
<?php }