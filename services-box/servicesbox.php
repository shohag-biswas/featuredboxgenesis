<?php 

/*
Plugin Name: servicebox
Plugin URI: http://shohag.me/genpro
Description: Contact details for WordPress
Author: Shohag Biswas
Version: 1.0
Author URI: http://shohag.me
*/


class servicebox extends WP_Widget{
	
	function servicebox(){
		parent::WP_Widget (false, $name = "Service box Widgets");
	}
	
	
		
	function widget($args, $instance) {
		
			extract( $args );

			// these are the widget options
			$title = apply_filters('widget_title', $instance['title']);
			$service = $instance['service'];
			$buttonlink = $instance['buttonlink'];
			$buttontext = $instance['buttontext'];
			
			
			echo $before_widget;

			// Display the widget
			
			// Check if title is set
			if ( $title ) {
				echo '<p class="servicebox-title" style="font-size:20px;text-align:center; border-bottom: 1px solid #000;">'.$title.'</p>';
			}
			

			// Check if options are set
			
			
			if( $service ) {
				echo '<p class="servicebox" style="font-size:12px;">'.$service.'</p>';
			}
			
			
			?> <div class="service-button"> <a href="<?php echo $buttonlink; ?>"> <?php echo $buttontext; ?> </a> </div><?php
			
			echo $after_widget; 
	}
	
	
	function update($new_instance,$old_instance){
		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['service'] = strip_tags($new_instance['service']);
		$instance['buttonlink'] = strip_tags($new_instance['buttonlink']);
		$instance['buttontext'] = strip_tags($new_instance['buttontext']);
		
		return $instance;
	}
	
	function form($instance){
		
		$title = esc_attr($instance['title']);
		$service = esc_attr($instance['service']);
		$buttonlink = esc_attr($instance['buttonlink']);
		$buttontext = esc_attr($instance['buttontext']);
		
		?>
		
		<p>

        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title'); ?><br/></label>

        <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	    </p>

		
		<p>

        <label for="<?php echo $this->get_field_id('service'); ?>"><?php _e('Your service details:'); ?><br/></label>

        <textarea id="<?php echo $this->get_field_id('service'); ?>" name="<?php echo $this->get_field_name('service'); ?>" type="text"> <?php echo $service; ?> </textarea>

	    </p>
		
		<p>

        <label for="<?php echo $this->get_field_id('buttonlink'); ?>"><?php _e('Button link'); ?><br/></label>

        <input id="<?php echo $this->get_field_id('buttonlink'); ?>" name="<?php echo $this->get_field_name('buttonlink'); ?>" type="text" value="<?php echo $buttonlink; ?>" />
	    </p>
		
		<p>

        <label for="<?php echo $this->get_field_id('buttontext'); ?>"><?php _e('Button text'); ?><br/></label>

        <input id="<?php echo $this->get_field_id('buttontext'); ?>" name="<?php echo $this->get_field_name('buttontext'); ?>" type="text" value="<?php echo $buttontext; ?>" />
	    </p>
		
		<?php
		
	}
	
	
	
}

add_action('widgets_init', create_function('', 'return register_widget("servicebox");'));