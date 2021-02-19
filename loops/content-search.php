<?php
/**
 * The Search Loop
 * ===============
 */
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
   
    <article id="post_<?php the_ID() ?>" class="row">
        <div class="col-12 col-sm-3 col-md-2 col-lg-2 col-xl-2">
            <a href="<?php the_permalink(); ?>"><?php  the_post_thumbnail('thumbnail') ?></a>
        </div>
        <div class="col-12 col-sm-9 col-md-10 col-lg-10 col-xl-10">
            <h4><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h4>
            <div class="sp-xs-2"></div>
            <a class="btn btn-secondary btn-sm" href="<?php the_permalink(); ?>"><?php _e('Go', 'brainworks') ?></a>   
        </div>
    </article>
    <div class="sp-xs-2"></div>
    <hr>
    <div class="sp-xs-2"></div>
    
<?php endwhile; else: ?>
    <div class="vh-xs-2 vh-sm-2 vh-md-2 vh-lg-2 vh-xl-2"></div>
    <div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> <?php _e('Sorry, your search yielded no results.', 'brainworks'); ?>
    </div>
<?php endif; ?>