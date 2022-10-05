<?php get_header(); ?>

<?php if(is_product_category()) : 
        cn_include_content(281); 
?>
<?php endif; ?>

<div class="container">
        <?php woocommerce_content(); ?>
</div>

<?php get_footer(); ?>