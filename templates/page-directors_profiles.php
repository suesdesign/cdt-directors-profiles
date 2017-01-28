<?php
/*
Template Name: Directors profiles
*** Suesdesign 1.0 ***
*   
*/
?>

<?php get_header(); ?>

<div class="container">
	<div class="column2" >
	<main id="maincontent">
          
	<?php if ( have_posts () ) : while ( have_posts() ) : the_post();?>

	<article class="page" id="post-<?php the_ID(); ?>">
	<header>
		<h1 class="entry-title">
			<?php the_title(); ?>
		</h1>
	</header>
       
	<div class="entry">
		<?php the_content() ?>
	</div><!--.entry-->
	</article><!-- finish enclosing post-->  
	<?php endwhile; ?>
	<?php else : endif; ?>
	
	<?php if ( have_posts () ) : ?>

	<?php $args = array(
		'posts_per_page' => '-1',
		'post_type' => 'cdt_directors',
		'order' => 'ASC'
	);

	$cdt_directors = new WP_Query ( $args );

	while ( $cdt_directors->have_posts() ) : $cdt_directors->the_post(); ?>

	<h2><?php the_title(); ?></h2>
		
	<div class="entry">
		<?php
			if ( has_post_thumbnail() ) {
			the_post_thumbnail('medium');
		} ?>
<?php
/*
 * Fields using Advanced Custom Fields
*/
?>
		<h3>Position held on the board</h3>
		<?php the_field('position_on_the_board'); ?>
		
		<h3>What skills, experience and knowledge do you bring to Chapeltown Development Trust?</h3>
		<?php the_field('what_skills'); ?>
		
		<h3>Are you involved in other voluntary activities?</h3>
		<?php the_field('voluntary_activities'); ?>
		
		<h3>What is your vision for Chapeltown Development Trust?</h3>
		<?php the_field('your_vision'); ?>
	
	</div><!--.entry-->
      
    <?php endwhile; else :?>

	<?php wp_reset_postdata(); ?>
     
	<?php endif; ?>

	</main>
</div><!--.column2-->
<?php get_sidebar();?>
<?php get_footer();?>