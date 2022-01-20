<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( ! is_front_page() ) : ?>
		<header class="entry-header alignwide">
			<?php get_template_part( 'template-parts/header/entry-header' ); ?>
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php elseif ( has_post_thumbnail() ) : ?>
		<header class="entry-header alignwide">
			<?php twenty_twenty_one_post_thumbnail(); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>

	<div class="entry-content">
		<?php
		$user = wp_get_current_user();
		echo $user -> display_name;
		echo $user -> user_login;

		//test
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$terms = get_terms( 'tenant-category', '' );
		$the_query = new WP_Query( 
			array(
				'post_status' => 'any',
				'post_type' => 'attachment' ,
				'post_mime_type' => 'application/pdf' ,
				'posts_per_page' => 12,
				'nopaging' => false, 
				'paged' => $paged,
				)
			);
 
		if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); 
		
			$pdf_url = wp_get_attachment_url( $the_query->post->ID ); //メディアのURLを返す
			// if($pdf_url == home_url('wp-content/uploads/').date('Y/m/').date('Y/m/').$user -> user_login.'.pdf'): 
			if(strpos($pdf_url,$user -> display_name.'_'.date('Ym')) !== false):
		?>
			<iframe src="<?php echo esc_url($pdf_url); ?>"></iframe>
		<?php
		endif;
		endwhile;
		else: 
		endif;
		wp_reset_query();
		?>

		<?php
		$now_year = date('Y');
		for($year = date('Y'); $year > $now_year - 5; $year--):
		?>
		<p><?php echo $year; ?>年</p>
			<?php
			//今年の表示方法
				if($year == $now_year){
					$now_month = date('m');
					for($month = $now_month-1; $month > 0;$month--){
						if ($the_query->have_posts()){
							while ($the_query->have_posts()){ 
								$the_query->the_post(); 
								$pdf_url = wp_get_attachment_url( $the_query->post->ID ); //メディアのURLを返す
								if(strpos($pdf_url,$user -> display_name.'_'.$year.str_pad($month,2,0,STR_PAD_LEFT))){
									echo '<a href="'.$pdf_url.'" target="_blank">'.$month.'月</a>';
								}
							}
						}
					}
			//去年以前の表示方法
				}elseif($year !== $now_year){
					for($month = 12; $month > 0; $month--){
						if ($the_query->have_posts()){
							while ($the_query->have_posts()){ 
								$the_query->the_post(); 
								$pdf_url = wp_get_attachment_url( $the_query->post->ID ); //メディアのURLを返す
								if(strpos($pdf_url,$user -> display_name.'_'.$year.str_pad($month,2,0,STR_PAD_LEFT))){
									echo '<a href="'.$pdf_url.'" target="_blank">'.$month.'月</a>';
								}
							}
						}
					}
				}
					
			?>
					
			
		<?php
		endfor;//年のループ終わり
		?>

		
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'twentytwentyone' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'twentytwentyone' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer default-max-width">
			<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers. */
					esc_html__( 'Edit %s', 'twentytwentyone' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
