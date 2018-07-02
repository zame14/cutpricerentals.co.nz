<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- .entry-header -->

    <?php echo get_the_post_thumbnail( $post_id, 'large' ); ?>

    <div class="entry-content">
        <?php
        if($post->ID <> 4) { ?>
            <div class="row">
                <div class="col-xl-12 page-title">
                    <h1><?=esc_html( get_the_title() )?></h1>
                </div>
            </div>
            <?php
        }
        ?>
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
            'after'  => '</div>',
        ) );
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-## -->