
<!-- Boxfin -->

<!-- <div class="sc-searchbar-area sc-mb-30 p-z-idex d-flex align-items-center justify-content-end">
    <form role="search" method="get" class="search-form" action="<?php //echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-field">
            <input type="search" id="<?php //echo esc_attr( uniqid( 'search-form-' ) ); ?>"  placeholder="<?php //esc_attr_e( 'Search', 'spria' ); ?>" value="<?php //echo get_search_query(); ?>" name="s" required="">
        </div>
        <div class="sc-submit sc-primary-btn">
            <i class="icon-search"></i>
            <input type="submit" id="submitOne" value="Subscribe Now">
        </div>
    </form>
</div> -->


<!-- Spria -->
  <div class="cate_form sc-mb-35">
    <label class="title sc-mb-23"><?php echo esc_html__('Search','spria'); ?></label>
    <form role="search" method="get" class="catergories-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search"  placeholder="<?php esc_attr_e( 'Search', 'spria' ); ?>" name="search" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
        <button type="submit" value="submit"><i class="ri-search-line"></i></button>
    </form>
</div>
