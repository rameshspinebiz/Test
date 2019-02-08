<?php
//add new custom control type switch
if(class_exists( 'WP_Customize_control')):
	class Wp_store_WP_Customize_Switch_Control extends WP_Customize_Control {
		public $type = 'switch';
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="switch_options">
					<span class="switch_enable"><?php esc_html_e('Yes','wp-store'); ?></span>
					<span class="switch_disable"><?php esc_html_e('No','wp-store'); ?></span>  
					<input type="hidden" id="switch_yes_no" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" />
				</div>
			</label>
			<?php
		}
	}
	class Wp_store_WP_Customize_help_Control extends WP_Customize_Control{            
		public function render_content() {
			$input_attrs = $this->input_attrs;
			$info = isset($input_attrs['info']) ? $input_attrs['info'] : '';
			?>
			<div class="help-info">
				<h4><?php esc_html_e('Instruction', 'wp-store'); ?></h4>
				<div style="font-weight: bold;">
					<?php echo wp_kses_post( $info ); ?>
				</div>
			</div>
			<?php
		}
	}
	endif;