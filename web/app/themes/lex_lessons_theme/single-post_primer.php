<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lex_lessons_theme
 */
$img = wp_get_attachment_image( get_field('image')['ID'], 'full');

get_header();

?>

	<main id="primary" class="site-main" style="margin: 0 auto; justify-content:center;background-color:<?php echo get_field('background_color'); ?>;text-decoration-color:<?php echo get_field('text_color'); ?>  ">
<!--        --><?php //dump(get_field('image')); ?>
        <span><?php echo get_field('guten'); ?> <br></span>
        <span> <?php echo get_field('autor'); ?><br></span>
        <span><?php echo get_field('role'); ?><br></span>
       <span> <?php echo $img ?><br></span>
        <span><?php echo get_field('background_color'); ?><br></span>
        <span><?php echo get_field('text_color'); ?><br></span>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'lex_lessons_theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'lex_lessons_theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
