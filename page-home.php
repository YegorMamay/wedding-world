<?php
/**
 * Template Name: Home Page
 **/
?>

<?php get_header(); ?>

<?php $main_slider = get_field('main_slider'); ?>
<div class="main-slider">
    <?php echo do_shortcode($main_slider); ?>
</div>
<div class="top-section">
    <div class="container">
        <h2 class="main-title h2"><?php echo get_post_meta(get_the_ID(), 'top_block_title', true); ?></h2>
        <div class="top-section__wrapper">
            <?php $top_block_list = get_field('top_block_list'); ?>
            <?php foreach ($top_block_list as $items) { ?>
                <div class="top-section__item">
                    <img class="top-section__icon" src="<?php echo $items['top_block_icon']; ?>" alt="icon">
                    <div class="top-section__description">
                        <?php echo $items['top_block_description']; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="block-video">
    <div class="container">
        <?php $block_video = get_field('block_video'); ?>
        <?php echo do_shortcode($block_video); ?>
    </div>
</div>
<div class="main-catalog">
    <div class="container">
        <h2 class="main-title h2"><?php echo get_post_meta(get_the_ID(), 'catalog_title', true); ?></h2>
        <div class="main-catalog__description"><?php echo get_post_meta(get_the_ID(), 'catalog_description', true); ?></div>
    </div>
    <div class="main-catalog__wrapper">
        <?php $catalog_items = get_field('catalog_list'); ?>
        <?php foreach ($catalog_items as $content) { ?>
            <div class="main-catalog__item"
                 style='background: url("<?php echo $content['catalog_item_image']; ?>") no-repeat center/cover'>
                <div class="main-catalog__item-title"><?php echo $content['catalog_item_title']; ?></div>
                <a class="btn btn-primary"
                   href="<?php echo $content['catalog_item_url']; ?>"><?php echo $content['catalog_link_text']; ?></a>
            </div>
        <?php } ?>
    </div>
</div>
<div class="block-popular">
    <div class="container">
        <h2 class="main-title h2"><?php echo get_post_meta(get_the_ID(), 'popular_title', true); ?></h2>
        <div class="block-popular__description"><?php echo get_post_meta(get_the_ID(), 'popular_description', true); ?></div>
    </div>
    <div class="block-popular__wrapper">
        <?php $popular_list = get_field('popular_list'); ?>
        <?php foreach ($popular_list as $content) { ?>
            <div class="block-popular__item"
                 style='background: url("<?php echo $content['popular_image']; ?>") no-repeat center/cover'>
                <a href="<?php echo $content['popular_item_url']; ?>"
                   class="block-popular__item-title"><?php echo $content['popular_item_title']; ?></a>
                <div class="block-popular__price-section">
                    <span class="block-popular__price"><?php echo $content['popular_item_price']; ?></span>
                    <?php if (!empty($content['popular_item_price_old'])) { ?>
                        <span class="block-popular__price-old"><?php echo $content['popular_item_price_old']; ?></span>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="order-section">
    <img class="order-section__logo" src="/wp-content/themes/wedding-world/assets/img/logo-form.png" alt="logo">
    <div class="container">
        <div class="order-section__caption">
            <h2 class="main-title h2"><?php echo get_post_meta(get_the_ID(), 'order_title', true); ?></h2>
            <div class="order-section__description"><?php echo get_post_meta(get_the_ID(), 'order_description', true); ?></div>
        </div>
        <div class="order-section__wrapper" id="order-form">
            <?php $order_form = get_field('order_form'); ?>
            <?php echo do_shortcode($order_form); ?>
        </div>
    </div>
</div>
<div class="review-section">
    <div class="container">
        <h2 class="main-title text-left h2"><?php echo get_post_meta(get_the_ID(), 'review_title', true); ?></h2>
        <div class="review-section__wrapper">
            <?php echo do_shortcode('[bw-reviews]'); ?>
            <div class="review-section__container">
                <div class="review-section__description"><?php echo get_post_meta(get_the_ID(), 'review_description', true); ?></div>
                <button type="button" class="btn btn-primary js-send-review"><?php echo get_post_meta(get_the_ID(), 'review_button_text', true); ?></button>
            </div>
        </div>
    </div>
</div>
<div class="bottom-section">
    <div class="container">
        <div class="bottom-section__title"><?php echo get_post_meta(get_the_ID(), 'about_company_title', true); ?></div>
        <h2 class="bottom-section__main-title h2"><?php echo get_post_meta(get_the_ID(), 'about_company_name', true); ?></h2>
        <div class="bottom-section__description"><?php echo get_post_meta(get_the_ID(), 'about_company_description', true); ?></div>
        <div class="bottom-section__wrapper">
            <div class="bottom-section__container">
                <?php $advantages_list = get_field('about_company_list'); ?>
                <?php foreach ($advantages_list as $item) { ?>
                    <div class="bottom-section__item">
                        <p class="bottom-section__item-title">
                            <?php echo $item['about_item_title']; ?>
                        </p>
                        <div class="bottom-section__text">
                            <?php echo $item['about_item_description']; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php get_template_part('loops/content', 'home'); ?>
</div>
<?php get_footer(); ?>
