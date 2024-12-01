<?php
	/**
	 * ordainit-toolkit Sidebar Form Widget
	 *
	 *
	 * @author 		Theme_Pure
	 * @category 	Widgets
	 * @package 	ordainit-toolkit/Widgets
	 * @version 	1.0.0
	 * @extends 	WP_Widget
	 */
	add_action('widgets_init', 'od_sidebar_form_widget');
	function od_sidebar_form_widget() {
		register_widget('od_sidebar_form_widget');
	}
	
	
	class od_sidebar_form_widget  extends WP_Widget{
		
		public function __construct(){
			parent::__construct('od_sidebar_form_widget',esc_html__('Solvra Sidebar Form','ordainit-toolkit'),array(
				'description' => esc_html__('Solvra Sidebar Form Widget by Theme_Pure','ordainit-toolkit'),
			));
		}
		
		public function widget($args,$instance){
			extract($args);
			extract($instance);
		 	print $before_widget; 

		 	if ( ! empty( $title ) ) {
				print $before_title . apply_filters( 'widget_title', $title ) . $after_title;
			}
		?>

			<?php if( !empty($od_form_shortcode) ): ?>
			<div class="sidebar_form_widget">
                <div class="od_sidebar_form sidebar__contact">
                    <?php print do_shortcode($od_form_shortcode); ?>
                </div>
            </div>
            <?php endif; ?>  

	    	<?php print $after_widget; ?>  

		<?php
		}
		

		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$od_form_shortcode  = isset($instance['od_form_shortcode'])? $instance['od_form_shortcode']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','ordainit-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>">

			<p>
				<label for="title"><?php esc_html_e('Form Shortcode:','ordainit-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('od_form_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('od_form_shortcode')); ?>" value="<?php print esc_attr($od_form_shortcode); ?>">	
			
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['subscribe_style'] = ( ! empty( $new_instance['subscribe_style'] ) ) ? strip_tags( $new_instance['subscribe_style'] ) : '';
			$instance['od_form_shortcode'] = ( ! empty( $new_instance['od_form_shortcode'] ) ) ? strip_tags( $new_instance['od_form_shortcode'] ) : '';
			return $instance;
		}
	}