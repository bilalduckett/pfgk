<?

	/**
	 * Footer Social widget
	 */
	class FooterSocialWidget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		function __construct() {
			parent::__construct(
				'footer_social',
				'Footer Social Widget',
				['description' => 'Set the image and copy for the footer']
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget($args, $instance) {
			echo $args['before_widget'];

			$template = '<div class="footer-social">';

			foreach($instance as $key => $item) {
				$template .= $this->makeWidgetTemplate($key, $item);
			}

			$template .= '</div>';

			echo __($template, 'text_domain');
			echo $args['after_widget'];
		}

		/**
		 * Make's template for each social icon
		 *
		 * @param $socialNetwork
		 * @param $instance
		 * @return string
		 */
		public function makeWidgetTemplate($socialNetwork, $instance) {
			$socialType = strval($socialNetwork);

			if(strlen($socialType) > 0) {
				$SVG     = file_get_contents(TEMPLATEPATH . '/assets/svg/social-' . $socialType . '.svg');
				$link    = $instance;
				$content = '<a class="footer-social__item" href="' . $link . '">' . $SVG . '</a>';

				return $content;
			}
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 * @return string|void
		 */
		public function form($instance) {
			isset($instance['instagram']) ?
				$instagram = $instance['instagram'] :
				$instagram = __('', 'text_domain');

			isset($instance['facebook']) ?
				$facebook = $instance['facebook'] :
				$facebook = __('', 'text_domain');

			isset($instance['twitter']) ?
				$twitter = $instance['twitter'] :
				$twitter = __('', 'text_domain');

			isset($instance['youtube']) ?
				$youtube = $instance['youtube'] :
				$youtube = __('', 'text_domain');

			isset($instance['email']) ?
				$email = $instance['email'] :
				$email = __('', 'text_domain');

			?>
			<p>
				<label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram Link:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" name="<?php echo $this->get_field_name('instagram'); ?>" type="text" value="<?php echo esc_attr($instagram); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook Link:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo esc_attr($facebook); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter Link:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo esc_attr($twitter); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('youtube'); ?>"><?php _e('Youtube Link:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('youtube'); ?>" name="<?php echo $this->get_field_name('youtube'); ?>" type="text" value="<?php echo esc_attr($youtube); ?>">
			</p>

			<p>
				<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email:'); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo esc_attr($email); ?>">
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update($new_instance, $old_instance) {
			$instance              = [];
			$instance['instagram'] = (!empty($new_instance['instagram'])) ? strip_tags($new_instance['instagram']) : '';
			$instance['facebook']  = (!empty($new_instance['facebook'])) ? strip_tags($new_instance['facebook']) : '';
			$instance['twitter']   = (!empty($new_instance['twitter'])) ? strip_tags($new_instance['twitter']) : '';
			$instance['youtube']   = (!empty($new_instance['youtube'])) ? strip_tags($new_instance['youtube']) : '';
			$instance['email']     = (!empty($new_instance['email'])) ? strip_tags($new_instance['email']) : '';

			return $instance;
		}

	}

	add_action('widgets_init', function () {
		register_widget('FooterSocialWidget');
	});