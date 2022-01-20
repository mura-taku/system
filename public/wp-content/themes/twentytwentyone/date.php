<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header(); ?>

date.php

<?php

	
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
				
			// the_attachment_link( $the_query->post->ID ); //メディアをリンク付きで出力する
		
			// echo wp_get_attachment_link( $the_query->post->ID , 'thumbnail' ); //メディアへのリンクをHTML付きで返す
		
			$pdf_url = wp_get_attachment_url( $the_query->post->ID ); //メディアのURLを返す
			// if($pdf_url == home_url('wp-content/uploads/').date('Y/m/').date('Y/m/').$user -> user_login.'.pdf'): 
			if(strpos($pdf_url,$user -> display_name.'_'.the_time('Ym')) !== false):
		?>
			<iframe src="<?php echo esc_url($pdf_url); ?>"></iframe>
		<?php
		endif;	
		endwhile;
		else: 
		endif;

		wp_reset_query();


get_footer();
