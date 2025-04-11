<?php
/****
 * Blog PAGE Title
 ****/
if(is_home()){
    $page_for_posts_id = get_option( 'page_for_posts' );
    ?>
    <h1 class="blogpage-title sectional-title inview" 
        itemscope 
        itemprop="headline" 
        itemtype="https://schema.org/BlogPosting"
    ><?php echo get_the_title($page_for_posts_id); ?></h1>
<?php 
}

/****
 * Category Title
 ****/
if(is_category()){
    $category = get_queried_object(); ?>
    
    <h1 class="cat-title sectional-title inview" 
        itemscope 
        itemprop="name" 
        itemtype="https://schema.org/CollectionPage"
    ><?php echo get_cat_name( $category->term_id); ?></h1>
    <div class="sectional-description"><?php echo category_description($category->term_id); ?></div>
    
<?php
}

/****
 * Page Title
 ****/
if( is_page() && !is_front_page() ) {
    $pageID = get_the_ID();
    $altTitle = rwmb_meta('hs_altTitle', ['object_type' => 'post'], $pageID);
    
    if(!empty($altTitle)) {
        $pageTitle = $altTitle;
    } else {
        $pageTitle = get_the_title($pageID);
    }
?>
    <h1 class="page-title sectional-title inview" 
        itemscope 
        itemprop="headline" 
        itemtype="https://schema.org/WebPage"
    ><?php echo $pageTitle; ?></h1>
<?php
}

/****
 * Single Post Title
 ****/
if( is_single() && !is_page() ) {
?>
    <h1 class="singular-title sectional-title inview" 
        itemscope 
        itemprop="headline" 
        itemtype="https://schema.org/BlogPosting"
    ><?php echo get_the_title(get_the_ID()); ?></h1>
<?php
}

/****
 * WooCommerce Product Category Title
 ****/
if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
    if( is_product_category() ){
        global $wp_query;
        $cat = $wp_query->get_queried_object();
        ?>
        <h1 class="woo-product-category-title sectional-title inview" 
            itemscope 
            itemprop="name" 
            itemtype="https://schema.org/ProductCollection"
        ><?php echo $cat->name; ?></h1>
    <?php
    }
}

/****
 * Search Results Title
 ****/
if(is_search()){ ?>
    <h1 class="search-page-title" 
        itemscope 
        itemprop="headline" 
        itemtype="https://schema.org/SearchResultsPage"
    ><?php printf( esc_html__( 'Search Results for: %s', 'quark' ), '<span>&ldquo;' . get_search_query() . '&rdquo;</span>' ); ?></h1>
<?php
}

/****
 * Taxonomy Title (Tags)
 ****/
if(is_tag()){
?>
    <h1 class="tag-title sectional-title inview" 
        itemscope 
        itemprop="headline" 
        itemtype="https://schema.org/CollectionPage"
    ><?php printf( esc_html__( 'Tagged: %s', 'quark' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?>
    <?php if ( tag_description() ) { // Show an optional tag description ?>
        <div class="sectional-description"><?php echo tag_description(); ?></div>
    <?php } ?>
    </h1>                      
<?php
}

//woo
if ( in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))) ) {
    
    $pageID = wc_get_page_id('shop');
    
    if( function_exists('is_shop') && is_shop() ) {
        $altTitle = rwmb_meta('hs_altTitle', ['object_type' => 'post'], $pageID);
        
        if(!empty($altTitle)) {
            $pageTitle = $altTitle;
        } else {
            $pageTitle = get_the_title($pageID);
        }
        
    ?>
    <h1 class="woo-title sectional-title inview" 
        itemscope 
        itemprop="headline" 
        itemtype="https://schema.org/ProductCollection"
    ><?php echo $pageTitle; ?></h1>    
<?php
    }
}