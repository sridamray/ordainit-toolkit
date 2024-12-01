<?php
	/**
	 * ordainit-toolkit Sidebar Posts Image
	 *
	 *
	 * @author 		Theme_Pure
	 * @category 	Widgets
	 * @package 	ordainit-toolkit/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	*/

Class OD_Post_footer_Widget extends WP_Widget{

	public function __construct(){
		parent::__construct('od-latest-postss', 'Recent Posts', array(
			'description'	=> 'Latest Blog Post Widget by Ordainit'
		));
	}


	public function widget($args, $instance){
		extract($args);
		extract($instance);

 		echo $before_widget;
 		if($instance['title']):
 		echo $before_title; ?>
 			<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
 		<?php echo $after_title; ?>
 		<?php endif; ?>

		

		<div class="it-footer-widget-post-wrap">
			<ul>
			
	           	 <?php
					$q = new WP_Query( array(
						'post_type'     => 'post',
						'posts_per_page'=> ($instance['count']) ? $instance['count'] : '3',
						'order'			=> ($instance['posts_order']) ? $instance['posts_order'] : 'DESC',
						'orderby' => 'date'
					));

					if( $q->have_posts() ):
					while( $q->have_posts() ):$q->the_post();
				?>

				<li>
				<div class="it-footer-widget-post-item d-flex align-items-center">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="it-footer-widget-post-thumb">
						<img src="<?php the_post_thumbnail_url(); ?>" alt="">
					</div>
				<?php endif; ?>

					<div class="it-footer-widget-post-content">
						<h5><a class="border-line-white" href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 5, ''); ?></a></h5>
						<span>
							<svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.96728 6.74385C7.90276 6.74385 8.7127 6.41156 9.37467 5.75596C10.0364 5.10045 10.3721 4.29841 10.3721 3.37182C10.3721 2.44555 10.0365 1.6434 9.37457 0.987684C8.71259 0.33229 7.90265 0 6.96728 0C6.03169 0 5.22186 0.33229 4.55999 0.987791C3.89812 1.64329 3.5625 2.44545 3.5625 3.37182C3.5625 4.29841 3.89812 5.10056 4.55999 5.75606C5.22207 6.41146 6.03202 6.74385 6.96728 6.74385ZM5.14582 1.56788C5.65368 1.06491 6.24944 0.820418 6.96728 0.820418C7.68501 0.820418 8.28087 1.06491 8.78884 1.56788C9.2967 2.07096 9.54367 2.6611 9.54367 3.37182C9.54367 4.08276 9.2967 4.67278 8.78884 5.17586C8.28087 5.67894 7.68501 5.92344 6.96728 5.92344C6.24965 5.92344 5.6539 5.67884 5.14582 5.17586C4.63786 4.67289 4.39088 4.08276 4.39088 3.37182C4.39088 2.6611 4.63786 2.07096 5.14582 1.56788Z" fill="currentcolor"></path>
							<path d="M12.9252 10.7654C12.9062 10.4927 12.8675 10.1951 12.8107 9.88084C12.7533 9.56425 12.6795 9.26496 12.591 8.99142C12.4996 8.70869 12.3754 8.42949 12.2217 8.16192C12.0625 7.88421 11.8752 7.64239 11.6651 7.4434C11.4455 7.23523 11.1765 7.06786 10.8654 6.94577C10.5555 6.82433 10.212 6.7628 9.84455 6.7628C9.70025 6.7628 9.56069 6.82144 9.29118 6.99522C9.12531 7.10236 8.93129 7.22626 8.71473 7.3633C8.52955 7.48015 8.2787 7.58963 7.96885 7.68875C7.66655 7.78563 7.35961 7.83476 7.05656 7.83476C6.75372 7.83476 6.44678 7.78563 6.14427 7.68875C5.83474 7.58974 5.58378 7.48025 5.39893 7.3634C5.18442 7.22764 4.99029 7.10374 4.82194 6.99512C4.55264 6.82133 4.41308 6.7627 4.26878 6.7627C3.90123 6.7627 3.55784 6.82433 3.248 6.94588C2.93718 7.06775 2.66809 7.23512 2.44819 7.44351C2.2381 7.64261 2.05088 7.88432 1.89169 8.16192C1.73822 8.42949 1.61398 8.70858 1.52253 8.99153C1.4342 9.26507 1.36032 9.56425 1.30295 9.88084C1.246 10.1946 1.2075 10.4923 1.18841 10.7658C1.16965 11.0331 1.16016 11.3114 1.16016 11.5925C1.16016 12.3233 1.39473 12.9149 1.85729 13.3512C2.31414 13.7818 2.91852 14.0001 3.65372 14.0001H10.4603C11.1952 14.0001 11.7996 13.7818 12.2566 13.3512C12.7193 12.9152 12.9538 12.3234 12.9538 11.5924C12.9537 11.3103 12.9441 11.0321 12.9252 10.7654ZM11.6854 12.7568C11.3836 13.0414 10.9828 13.1797 10.4602 13.1797H3.65372C3.13098 13.1797 2.73022 13.0414 2.42845 12.7569C2.13241 12.4778 1.98854 12.0969 1.98854 11.5925C1.98854 11.3302 1.99728 11.0711 2.01475 10.8225C2.03179 10.5785 2.06662 10.3105 2.11828 10.0258C2.16929 9.74455 2.23422 9.48062 2.31144 9.24168C2.38553 9.01257 2.48659 8.7857 2.61191 8.56717C2.73151 8.35888 2.86912 8.18019 3.02097 8.03621C3.16301 7.90152 3.34204 7.79129 3.55299 7.70862C3.74809 7.63214 3.96735 7.59027 4.20537 7.58397C4.23438 7.59924 4.28604 7.6284 4.36973 7.68245C4.54002 7.79236 4.73631 7.91775 4.9533 8.05501C5.1979 8.20945 5.51303 8.34895 5.88953 8.46933C6.27444 8.59259 6.66701 8.65518 7.05667 8.65518C7.44632 8.65518 7.839 8.59259 8.2237 8.46943C8.60052 8.34884 8.91554 8.20945 9.16047 8.05479C9.38253 7.91423 9.57331 7.79246 9.74361 7.68245C9.8273 7.62851 9.87896 7.59924 9.90797 7.58397C10.1461 7.59027 10.3654 7.63214 10.5606 7.70862C10.7714 7.79129 10.9504 7.90162 11.0925 8.03621C11.2443 8.18008 11.3819 8.35878 11.5015 8.56727C11.627 8.7857 11.7281 9.01268 11.8021 9.24157C11.8794 9.48083 11.9445 9.74465 11.9954 10.0257C12.0469 10.311 12.0819 10.5791 12.0989 10.8226V10.8228C12.1165 11.0705 12.1253 11.3294 12.1254 11.5925C12.1253 12.097 11.9815 12.4778 11.6854 12.7568Z" fill="currentcolor"></path>
							</svg>
							<?php echo esc_html__('Post By', 'mcssa') . ' ' . get_the_author() . ' ' . get_the_time('Y'); ?>
						</span>
					</div>
				</div>
				</li>
          <?php endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>

	   

		<?php echo $after_widget; ?>

		<?php
	}



	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'ordainit-toolkit' );
		$posts_order = ! empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', 'ordainit-toolkit' );
		$choose_style = ! empty( $instance['choose_style'] ) ? $instance['choose_style'] : esc_html__( 'style_1', 'ordainit-toolkit' );
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>">How many posts you want to show ?</label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('posts_order'); ?>">Posts Order</label>
			<select name="<?php echo $this->get_field_name('posts_order'); ?>" id="<?php echo $this->get_field_id('posts_order'); ?>" class="widefat">
				<option value="" disabled="disabled">Select Post Order</option>
				<option value="ASC" <?php if($posts_order === 'ASC'){ echo 'selected="selected"'; } ?>>ASC</option>
				<option value="DESC" <?php if($posts_order === 'DESC'){ echo 'selected="selected"'; } ?>>DESC</option>
			</select>
		</p>

	<?php }


}

add_action('widgets_init', function(){
	register_widget('OD_Post_footer_Widget');
});
