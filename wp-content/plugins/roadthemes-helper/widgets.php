<?php

class vertical_menu_widgets extends WP_Widget {

	function __construct() {
		parent::__construct(
			'vertical_menu_widgets', 
			esc_html__('Vertial Menu Widgets', 'devita'), 

			// Widget description
			array( 'description' => esc_html__( 'Display vertical menu', 'devita' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		global $post;

		$devita_opt = get_option( 'devita_opt' );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo wp_kses($args['before_widget'], array(
			'aside'=> array(
				'id'=>array(),
				'class'=>array()
			)
		));
		if ( ! empty( $title ) )
			echo wp_kses($args['before_title'] . $title . $args['after_title'], array(
				'aside'=> array(
					'id'=>array(),
					'class'=>array()
				),
				'h3'=> array(
					'class'=>array()
				),
				'span'=> array(
					'class'=>array()
				)
			));
		
		$cat_menu_class = '';

		if(isset($devita_opt['categories_menu_home']) && $devita_opt['categories_menu_home']) {
			$cat_menu_class .=' show_home';
		}
		if(isset($devita_opt['categories_menu_sub']) && $devita_opt['categories_menu_sub']) {
			$cat_menu_class .=' show_inner';
		}
		?>
		<div class="categories-menu visible-large <?php echo esc_attr($cat_menu_class); ?>">
			<div class="catemenu-toggler"><span><?php if(isset($devita_opt)) { echo esc_html($devita_opt['categories_menu_label']); } else { esc_html_e('Category', 'devita'); } ?></span><i class="zmdi zmdi-chevron-down zmdi-hc-fw"></i></div>
			<div class="menu-inner">
				<?php wp_nav_menu( array( 'theme_location' => 'categories', 'container_class' => 'categories-menu-container', 'menu_class' => 'categories-menu' ) ); ?>
				<div class="morelesscate">
					<span class="morecate"><i class="fa fa-plus"></i><?php if ( isset($devita_opt['categories_more_label']) && $devita_opt['categories_more_label']!='' ) { echo esc_html($devita_opt['categories_more_label']); } else { esc_html_e('More Categories', 'devita'); } ?></span>
					<span class="lesscate"><i class="fa fa-minus"></i><?php if ( isset($devita_opt['categories_less_label']) && $devita_opt['categories_less_label']!='' ) { echo esc_html($devita_opt['categories_less_label']); } else { esc_html_e('Close Menu', 'devita'); } ?></span>
				</div>
			</div> 
		</div>

		<?php echo wp_kses($args['after_widget'], array(
			'aside'=> array(
				'id'=>array(),
				'class'=>array()
			),
			'h3'=> array(
				'class'=>array()
			),
			'span'=> array(
				'class'=>array()
			)
		));
	}
			
	// Widget Backend 
	public function form( $instance ) {
		// Widget admin form

		if( $instance) {
			$title = $instance[ 'title' ]; 
		} else {
			$title = ''; 
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'devita' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p> 
	<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : ''; 
		return $instance;
	}
}

class devita_widgets extends WP_Widget {

	function __construct() {
		parent::__construct(
			'devita_widgets', 
			esc_html__('Devita Widgets', 'devita'), 

			// Widget description
			array( 'description' => esc_html__( 'Display recent posts, comments, popular posts', 'devita' ), ) 
		);
	}

	// Creating widget front-end
	public function widget( $args, $instance ) {
		global $post;

		$devita_opt = get_option( 'devita_opt' );
		
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo wp_kses($args['before_widget'], array(
			'aside'=> array(
				'id'=>array(),
				'class'=>array()
			)
		));
		if ( ! empty( $title ) )
			echo wp_kses($args['before_title'] . $title . $args['after_title'], array(
				'aside'=> array(
					'id'=>array(),
					'class'=>array()
				),
				'h3'=> array(
					'class'=>array()
				),
				'span'=> array(
					'class'=>array()
				)
			));
		
		switch ($instance['type']) {
			
			case 'recent_posts':
				$postargs = array( 'posts_per_page' => $instance['amount'], 'order'=> 'DESC', 'orderby' => 'post_date' );
				$postslist = get_posts( $postargs );
				$thumbsize = explode(',', $instance['size']);
				$thumbsize[0] = (int)$thumbsize[0];
				$thumbsize[1] = (int)$thumbsize[1];
				?>
				<div class="recent-posts">
					<ul>
						<?php
						foreach ( $postslist as $post ) :
							setup_postdata( $post ); ?> 
							<li>
								<div class="post-wrapper">
									<div class="post-thumb">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumbsize); ?></a>
									</div>
									<div class="post-info">
										<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="post-date">
											<?php echo get_the_date(); ?>
										</div>
									</div>
								</div>
							</li>
						<?php
						endforeach;
						?>
					</ul>
				</div>
				<?php
				wp_reset_postdata();
			break;
			
			case 'popular_posts':
				$postargs = array( 'posts_per_page' => $instance['amount'], 'order'=> 'DESC', 'orderby' => 'comment_count' );
				$postslist = get_posts( $postargs );
				$thumbsize = explode(',', $instance['size']);
				$thumbsize[0] = (int)$thumbsize[0];
				$thumbsize[1] = (int)$thumbsize[1];
				?>
				<div class="recent-posts">
					<ul>
						<?php
						foreach ( $postslist as $post ) :
							setup_postdata( $post ); ?> 
							<li>
								<div class="post-wrapper">
									<div class="post-thumb">
										<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumbsize); ?></a>
									</div>
									<div class="post-info">
										<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="post-date">
											<?php echo get_the_date(); ?>
										</div>
									</div>
								</div>
							</li>
						<?php
						endforeach;
						?>
					</ul>
				</div>
				<?php
				wp_reset_postdata();
			break;
			
			case 'recent_comments':
				$commentargs = array(
					'status' => 'approve',
					'post_type' => 'post',
					'number' => $instance['amount']
				);
				$comments = get_comments($commentargs); ?>
				<ul>
					<?php foreach($comments as $comment) : ?>
					<li>
						<div class="post-wrapper">
							<div class="post-thumb">
								<?php echo get_avatar( $comment->comment_author_email, 50, '', '' ); ?>
							</div>
							<div class="post-info">
								<p><?php echo esc_html($comment->comment_author); ?> <?php esc_html_e('says', 'devita');?>:</p>
								<a href="<?php echo get_comments_link( $comment->comment_post_ID ); ?>" title="<?php echo esc_attr($comment->comment_author) .' on '. get_the_title( $comment->comment_post_ID );?>"><?php echo Devita_Class::devita_limitStringByWord($comment->comment_content, 30, '...'); ?></a>
							</div>
						</div>
					</li>
					<?php endforeach; ?>
				</ul>	
				<?php	
			break;
		}
		echo wp_kses($args['after_widget'], array(
			'aside'=> array(
				'id'=>array(),
				'class'=>array()
			),
			'h3'=> array(
				'class'=>array()
			),
			'span'=> array(
				'class'=>array()
			)
		));
	}
			
	// Widget Backend 
	public function form( $instance ) {
		// Widget admin form

		if( $instance) {
			$title = $instance[ 'title' ];
			$amount = esc_attr($instance['amount']);
			$size = esc_attr($instance['size']);
			$type = esc_attr($instance['type']);
		} else {
			$title = '';
			$amount = '12';
			$size = '50,50';
			$type = 'recent_posts';
		}
		?>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'devita' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'amount' )); ?>"><?php esc_html_e( 'Amount:', 'devita' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'amount' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'amount' )); ?>" type="text" value="<?php echo esc_attr($amount); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'size' )); ?>"><?php esc_html_e( 'Image size (example: 50,50):', 'devita' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'size' )); ?>" type="text" value="<?php echo esc_attr($size); ?>" />
		</p>
		<p>
		<label for="<?php echo esc_attr($this->get_field_id( 'type' )); ?>"><?php esc_html_e( 'Widget Type:', 'devita' ); ?></label> 
		<select id="<?php echo esc_attr($this->get_field_id( 'amount' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>">
			<option value="recent_posts" <?php if($type=='recent_posts') echo 'selected="selected"';?>><?php esc_html_e('Recent Posts', 'devita');?></option>
			<option value="popular_posts" <?php if($type=='popular_posts') echo 'selected="selected"';?>><?php esc_html_e('Popular Posts', 'devita');?></option>
			<option value="recent_comments" <?php if($type=='recent_comments') echo 'selected="selected"';?>><?php esc_html_e('Recent Comments', 'devita');?></option>
		</select>
		</p>
	<?php 
	}
		
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['amount'] = ( ! empty( $new_instance['amount'] ) ) ? strip_tags( $new_instance['amount'] ) : '3';
		$instance['size'] = ( ! empty( $new_instance['size'] ) ) ? strip_tags( $new_instance['size'] ) : '50,50';
		$instance['type'] = ( ! empty( $new_instance['type'] ) ) ? strip_tags( $new_instance['type'] ) : 'recent_posts';
		return $instance;
	}
}

//Override woocommerce widgets
function devita_override_woocommerce_widgets() {
	//Show mini cart on all pages
	if ( class_exists( 'WC_Widget_Cart' ) ) {
		unregister_widget( 'WC_Widget_Cart' ); 
		require_once( plugin_dir_path( __FILE__ ).'wc/class-wc-widget-cart.php' ); 
		register_widget( 'Custom_WC_Widget_Cart' );
	}
}

// Register and load the widget
function devitatheme_load_vertical_menu_widgets() {
	register_widget( 'vertical_menu_widgets' );
	register_widget( 'devita_widgets' );
}
add_action( 'widgets_init', 'devitatheme_load_vertical_menu_widgets' );
add_action( 'widgets_init', 'devita_override_woocommerce_widgets');