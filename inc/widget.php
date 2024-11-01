<?php
class Facebook_Live_Video_Widget extends WP_Widget {
	function __construct() {
		// Instantiate the parent object
		parent::__construct( false, 'Facebook Live Video' );
	}
	function widget( $args, $instance ) {
		// Widget output
        extract ($args);
        $title = apply_filters('widget_title', $instance['title']);
        $options = get_option('wp_facebook_live_video_settings');
        echo $before_widget;
        echo $before_title . $title . $after_title; 
        require ('widget-output.php');
        echo $after_widget;
	}
	function update( $new_instance, $old_instance ) {
		// Save widget options
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
	}
	function form( $instance ) {
		// Output admin widget options form
        if (! empty( $instance['title'] )) { $title = esc_attr($instance['title']); }
        require ('widget-options.php');
	}
}
function facebook_live_video_register_widgets() {
	register_widget( 'Facebook_Live_Video_Widget' );
}
add_action( 'widgets_init', 'facebook_live_video_register_widgets' );
?>