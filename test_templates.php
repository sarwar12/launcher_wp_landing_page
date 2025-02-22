<?php 
/**
 * Template Name: Test Templates
 */
?>

<?php get_header(); ?>
<body <?php body_class(); ?>>
    <section class="container"> 
        <h2><?php the_title(); ?></h2>
        <p><?php the_content(); ?></p>
    </section>
</body>

<?php get_footer(); ?>