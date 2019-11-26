<?php get_header(); ?>

<div class="container pt-5 pb-5">
    <h1>front_page.php</h1>
    <div class="row">
        <div class="col-8">
            <?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3><?php the_title(); ?></h3>
                        <?php the_excerpt();?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-success">Read More...</a>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-4">
            <?php wp_list_categories(); ?>
            <br>
            <br>
            <!-- List all custom post types -->
            <?php 
                $args = array(
                    'public'   => true,
                    '_builtin' => false
                );
                foreach ( get_post_types( $args, 'objects', 'and' ) as $post_type ) {
                    echo '<a href="' . get_site_url() . '/' . $post_type->name . '">' . $post_type->name . '</a><br>';
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>