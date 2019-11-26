<?php get_header(); ?>

<?php
    $query = new WP_Query( array( 'post_type' => 'movies' ) );

    if ( $query->have_posts() ) : ?>
    <h1>Archive-movies.php</h1>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <div class="entry">
        <h2 class="title"><?php the_title(); ?></h2>
        <?php the_content(); ?>
        <a href="<?php the_permalink(); ?>" class="btn btn-success">Read More...</a>
    </div>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
