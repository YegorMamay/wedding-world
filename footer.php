<footer class="footer js-footer">
    <?php if (is_active_sidebar('footer-widget-area')) : ?>
        <div class="pre-footer">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('footer-widget-area'); ?>
                </div>
            </div>
        </div><!-- .pre-footer end-->
    <?php endif; ?>

    <div class="container">
        <div class="copyright">
            <div class="date"><?php _e('All rights reserved', 'brainworks'); ?> &copy; <?php echo date('Y'); ?></div>
            <div class="developer">
                <?php _e('Developed by ', 'brainworks') ?><a class="footer__link" href="https://brainworks.pro/" target="_blank">BrainWorks</a>
            </div>
        </div>
    </div>
</footer>

</div><!-- .wrapper end Do not delete! -->

<?php scroll_top(); ?>

<div class="is-hide">
    <?php svg_sprite(); ?>
    <svg width="0" height="0" class="hidden">
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96.154 96.154" id="arrow_left">
            <path d="M75.183.561L17.578 46.513c-.951.76-.951 2.367 0 3.126l57.608 45.955c.689.547 1.717.709 2.61.414a2.67 2.67 0 0 0 .436-.186 2.004 2.004 0 0 0 1.057-1.765V2.093c0-.736-.405-1.414-1.057-1.762a2.581 2.581 0 0 0-.426-.184c-.903-.297-1.932-.136-2.623.414z"></path>
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 96.155 96.155" id="arrow_right">
            <path d="M20.972 95.594l57.605-45.951c.951-.76.951-2.367 0-3.127L20.968.56c-.689-.547-1.716-.709-2.61-.414a2.67 2.67 0 0 0-.436.186 2.002 2.002 0 0 0-1.056 1.764v91.967c0 .736.405 1.414 1.056 1.762.109.06.253.127.426.185.903.295 1.933.134 2.624-.416z"></path>
        </symbol>
    </svg>
</div>

<?php wp_footer(); ?>

</body>
</html>
