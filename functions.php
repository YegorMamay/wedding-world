<?php
/**
 * All the functions are in the PHP pages in the `inc/` folder.
 */

//show_admin_bar(false);

require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/auth.php';
require get_template_directory() . '/inc/admin.php';
require get_template_directory() . '/inc/login.php';
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/custom-logo.php';
require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/enqueues.php';
require get_template_directory() . '/inc/navbar.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/index-pagination.php';
require get_template_directory() . '/inc/split-post-pagination.php';
require get_template_directory() . '/inc/feedback.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/custom-post-types.php';

require get_template_directory() . '/inc/LoadMorePosts.php';

add_action( 'after_setup_theme', function () {
	if ( function_exists( 'pll_register_string' ) ) {
		pll_register_string( 'email', 'Email', 'Brainworks' );
		pll_register_string( 'address', 'Address', 'Brainworks' );
		pll_register_string( 'work-schedule', 'Work Schedule', 'Brainworks' );

		pll_register_string( 'social-vk', 'Vk', 'Brainworks' );
		pll_register_string( 'social-twitter', 'Twitter', 'Brainworks' );
		pll_register_string( 'social-youtube', 'YouTube', 'Brainworks' );
		pll_register_string( 'social-facebook', 'Facebook', 'Brainworks' );
		pll_register_string( 'social-linkedin', 'Linkedin', 'Brainworks' );
		pll_register_string( 'social-instagram', 'Instagram', 'Brainworks' );
		pll_register_string( 'social-google-plus', 'Google Plus', 'Brainworks' );
		pll_register_string( 'social-odnoklassniki', 'Odnoklassniki', 'Brainworks' );
	}
} );

remove_action( 'wp_head', '_wp_render_title_tag', 1 ); //удаляет тег title из header.php

// Изменяет порядок артикула по отношению к другим элементам на странице товара
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );

// Добавляет возможность задавать картинку для категорий кастомного поста Каталог, при включеном плагине ACF
if( function_exists('acf_add_local_field_group') ):
acf_add_local_field_group(array(
	'key' => 'group_5e6f1fdcc01d8',
	'title' => 'Category',
	'fields' => array(
		array(
			'key' => 'field_5e6f1fe7970b7',
			'label' => 'Изображение',
			'name' => 'cat_img',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;

//show hide content text

### Function: Enqueue JavaScripts
add_action( 'wp_enqueue_scripts', 'showhide_scripts' );
function showhide_scripts() {
    wp_enqueue_script( 'jquery' );
}

### Function: Load Translation
add_action( 'plugins_loaded', 'brainworks' );
function showhide_textdomain() {
    load_plugin_textdomain( 'brainworks', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

### Function: Short Code For Inserting Press Release Into Post
add_shortcode( 'showhide', 'showhide_shortcode' );
function showhide_shortcode( $atts, $content = null ) {
    // Variables
    $post_id = get_the_id();
    $word_count = number_format_i18n( sizeof( explode( ' ', strip_tags( $content ) ) ) );

    // Extract ShortCode Attributes
    $attributes = shortcode_atts( array(
        'type' => 'pressrelease',
        'more_text' => __( 'Show Press Release (%s More Words)', 'wp-showhide' ),
        'less_text' => __( 'Hide Press Release (%s Less Words)', 'wp-showhide' ),
        'hidden' => 'yes'
    ), $atts );

    // More/Less Text
    $more_text = sprintf( $attributes['more_text'], $word_count );
    $less_text = sprintf( $attributes['less_text'], $word_count );

    // Determine Whether To Show Or Hide Press Release
    $hidden_class = 'sh-hide';
    $hidden_css = 'display: none;';
    $hidden_aria_expanded = 'false';
    if( $attributes['hidden'] === 'no' ) {
        $hidden_class = 'sh-show';
        $hidden_css = 'display: block;';
        $hidden_aria_expanded = 'true';
        $tmp_text = $more_text;
        $more_text = $less_text;
        $less_text = $tmp_text;
    }

    // Format HTML Output
    $output = '<div id="' . $attributes['type'] . '-content-' . $post_id . '" class="sh-content ' . $attributes['type'] . '-content ' . $hidden_class . '" style="' . $hidden_css . '">' . do_shortcode( $content ) . '</div>';
    $output .= '<div id="' . $attributes['type'] . '-link-' . $post_id . '" class="sh-link ' . $attributes['type'] . '-link js-show-more ' . $hidden_class .'"><a href="#" class="btn-show-more" onclick="showhide_toggle(\'' . esc_js( $attributes['type'] ) . '\', ' . $post_id . ', \'' . esc_js( $more_text ) . '\', \'' . esc_js( $less_text ) . '\'); return false;" aria-expanded="' . $hidden_aria_expanded .'"><span id="' . $attributes['type'] . '-toggle-' . $post_id . '">' . $more_text . '</span></a></div>';

    return $output;
}

### Function: Add JavaScript To Footer
add_action( 'wp_footer', 'showhide_footer' );
function showhide_footer() {
    ?>
    <?php if( WP_DEBUG ): ?>
        <script type="text/javascript">
            function showhide_toggle(type, post_id, more_text, less_text) {
                var   $link = jQuery("#"+ type + "-link-" + post_id)
                    , $link_a = jQuery('a', $link)
                    , $content = jQuery("#"+ type + "-content-" + post_id)
                    , $toggle = jQuery("#"+ type + "-toggle-" + post_id)
                    , show_hide_class = 'sh-show sh-hide';
                $link.toggleClass(show_hide_class);
                $content.toggleClass(show_hide_class).toggle();
                if($link_a.attr('aria-expanded') === 'true') {
                    $link_a.attr('aria-expanded', 'false');
                } else {
                    $link_a.attr('aria-expanded', 'true');
                }
                if($toggle.text() === more_text) {
                    $toggle.text(less_text);
                    $link.trigger( "sh-link:more" );
                } else {
                    $toggle.text(more_text);
                    $link.trigger( "sh-link:less" );
                }
                $link.trigger( "sh-link:toggle" );
            }
        </script>
    <?php else : ?>
        <script type="text/javascript">function showhide_toggle(e,t,r,g){var a=jQuery("#"+e+"-link-"+t),s=jQuery("a",a),i=jQuery("#"+e+"-content-"+t),l=jQuery("#"+e+"-toggle-"+t);a.toggleClass("sh-show sh-hide"),i.toggleClass("sh-show sh-hide").toggle(),"true"===s.attr("aria-expanded")?s.attr("aria-expanded","false"):s.attr("aria-expanded","true"),l.text()===r?(l.text(g),a.trigger("sh-link:more")):(l.text(r),a.trigger("sh-link:less")),a.trigger("sh-link:toggle")}</script>
    <?php endif; ?>
    <?php
}