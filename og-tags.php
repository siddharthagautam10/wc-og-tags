<?php
/*
Plugin Name: WooCommerce Open Graph Tags
Description: Adds Open Graph meta tags to WooCommerce product pages for proper sharing on Facebook, LinkedIn, and WhatsApp.
Version: 1.0
Author: Siddhartha G
*/

function add_woocommerce_og_tags() {
    global $post;
    
    if ( is_singular( 'product' ) ) {
        
        $title = get_the_title();
        $description = get_the_excerpt();
        $url = get_permalink();
        $image_url = get_the_post_thumbnail_url( $post->ID, 'full' );

        // Add the Open Graph meta tags to the header of the page.
        echo '<meta property="og:title" content="' . $title . '"/>';
        echo '<meta property="og:description" content="' . $description . '"/>';
        echo '<meta property="og:url" content="' . $url . '"/>';
        echo '<meta property="og:type" content="product"/>';
        echo '<meta property="og:image" content="' . $image_url . '"/>';

        ?>
<style>
    .og-share-buttons a{
        margin:0 10px;
    }

</style>
        <?php
    }
}
add_action( 'wp_head', 'add_woocommerce_og_tags' );


function add_woocommerce_social_share(){
    global $post;

    if ( is_singular( 'product' ) ) {
        $title = get_the_title();
        $description = get_the_excerpt();
        $url = get_permalink();
        $image_url = get_the_post_thumbnail_url( $post->ID, 'full' );
        // Add social sharing buttons to the WooCommerce product page.
        echo '<div class="og-share-buttons"> Share ';
        echo '<a href="whatsapp://send?text=' . $title . ' ' . $url . '" target="_blank"><i class="fa fa-whatsapp"></i></a>';
        echo '<a href="https://www.facebook.com/sharer/sharer.php?u=' . $url . '" target="_blank"><i class="fa fa-facebook"></i></a>';
        echo '<a href="https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '" target="_blank"><i class="fa fa-twitter"></i></a>';
        echo '<a href="https://www.linkedin.com/sharing/share-offsite/?url=' . $url . '" target="_blank"><i class="fa fa-linkedin"></i></a>';
        echo '<a href="https://www.instagram.com/?url=' . $url . '" target="_blank"><i class="fa fa-instagram"></i></a>';
        echo '</div>';
    }
}
add_action( 'woocommerce_single_product_summary', 'add_woocommerce_social_share' );