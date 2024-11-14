<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Alex_Program_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'alex_program';
	}

	public function get_title() {
		return esc_html__( 'Alex Program', 'elementor-alex-program-widget' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'program' ];
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

    public function get_script_depends() {
		return [ 'alex-program-script' ];
	}

	public function get_style_depends() {
		return [ 'alex-program-style' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-alex-program-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-alex-program-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => 'text',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        $category_terms = get_terms( array(
            'taxonomy'   => 'p_category',
            'hide_empty' => false,
        ));
        ?>
        <div class="university-widget">
            <?php
        if ( !empty( $_GET['id'] ) ) {
            $id = $_GET['id'];
            $post = get_post($id);
?>
            <div class="u-name">
                <?php 
                    echo '<h1>' . $post->post_title . '</h1>'; 
                    $locations = wp_get_post_terms($id, 'p_university_location');
                    if (!empty($locations) && is_array($locations)) {
                        $location  =implode(',', array_map(function($l) {
                            return html_entity_decode($l->name);
                        }, $locations));
                        echo '<p>' . $location . '</p>' ;    
                    }
                    
                    $descriptions = wp_get_post_terms($id, 'p_university_description');
                    if (!empty($descriptions) && is_array($descriptions)) {
                        $description  =implode(',', array_map(function($m) {
                            return html_entity_decode($m->name);
                        }, $descriptions));
                        echo '<p>' . $description . '</p>' ;
                    }
                ?>
            </div>
            <div class="contact-info">
                <h2 class="contact-info-title">Contact Info</h2>
            <?php 
                $taxonomy_info_arr = wp_get_post_terms($id, 'p_university_contact_info');
                if (!empty($taxonomy_info_arr) && is_array($taxonomy_info_arr)) {
                    $taxonomy_infos  =implode(',', array_map(function($info) {
                        return html_entity_decode($info->name);
                    }, $taxonomy_info_arr));
                    echo '<p>' . $taxonomy_infos . '</p></div>';
                }
            ?>
            </div>
            <?php } ?>
            <div class="prog">
                <div class="prog-title"><span>Programs</span></div>
                <div class="prog-box">
                    <?php
                        foreach($category_terms as $category_term) {
                            echo '<div class="prog-box-item">' . $category_term->name . '</div>';
                        } 
                    ?>
                </div>
                <div class="prog-items">
                    <?php
                        $args = array(
                            'post_type' => 'prog',
                            'posts_per_page' => -1,
                            'post_status' => 'publish',
                            'order' => 'ASC',
                            'orderby' => 'title'
                        );
                        $image_url = dirname(plugin_dir_url( __FILE__ )) . '/assets/default-prog.png';
                        $the_query = new WP_Query( $args );
                        // // $id = the_id();
                        // $universities = wp_get_post_terms($id, 'university_name');
                        // $university_infos = '';
                        // if (!empty($universities) && is_array($universities)) {
                        //     $university_infos = implode(',', array_map(function($info) {
                        //         return $info->name;
                        //     }, $universities));
                        // }
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();
                                
                    ?>
                                <div class="prog-item">
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="My Plugin Image">
                                    <h4 class="prog-item-title"><span><?php the_title(); ?></span></h4>
                                    <div class="prog-item-university">University Name</div>
                                    <div><i class="prog-item-description">Description</i></div>
                                    <a href="/word/program?id=<?php the_id(); ?>">Learn more</a>
                                </div>
                    <?php
                            }
                        }

                            wp_reset_postdata();
                        ?>
                </div>
            </div>
        </div>
<?php
	}

}