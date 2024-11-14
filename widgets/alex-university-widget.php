<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Alex_University_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'alex_university';
	}

	public function get_title() {
		return esc_html__( 'Alex University', 'elementor-alex-university-widget' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'university' ];
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

    public function get_script_depends() {
		return [ 'alex-university-script' ];
	}

	public function get_style_depends() {
		return [ 'alex-university-style' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-alex-university-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-alex-university-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => 'text',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// if ( empty( $settings['url'] ) ) {
		// 	return;
		// }

        $major_terms = get_terms( array(
            'taxonomy'   => 'p_university_major',
            'hide_empty' => false,
        ));

        $location_terms = get_terms( array(
            'taxonomy'   => 'p_university_location',
            'hide_empty' => false,
        ));
?>
		<div class="search-interest">
            <div class="search-interest-title">Know you’re making the right choice.</div>
            <div class="search-interest-input"><input type="text" class="" placeholder="I am interested in" /></div>
        </div>
		<div class="university">
            <div class="university-title"><span>Universities</span></div>
            <div class="university_name">
				<select name="text" id="text" class="input_name" >
					<option value="1" placeholder="Search By College name"></option>
				</select>
            </div>
            <div class="title">
                <h4 class="college_name">Find the right colleges for you.</h4>
                <p class="description">Use the filters above to narrow your search to schools that are a good fit for you.</p>
            </div>
	
            <div class="major">
                <select class="major_name">
                    <option value="" selected="selected" disabled="disabled">Select Majors</option>
                    <?php
                        foreach( $major_terms as $major_term ) {
                    ?>
                            <option value="<?php echo $major_term->term_id; ?>" placeholder="Majors"><?php echo $major_term->name; ?></option>
                    <?php
                        }
                    ?>
                </select>

                <select class="location">   
                    <option value="" selected="selected" disabled="disabled">Select Location</option>
                    <?php
                        foreach( $location_terms as $location_term ) {
                    ?>
                            <option value="<?php echo $location_term->term_id; ?>"><?php echo $location_term->name; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            
		</div>
        <div class="universities">
        <?php
                $args = array(
                    'post_type' => 'university',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'order' => 'ASC',
                    'orderby' => 'title'
                );
                
                $the_query = new WP_Query( $args );
                
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
             ?>
                        <div class="university_content"  >
                            <h4><?php the_title(); ?></h4>
                            <a href="/word/university?id=<?php the_id(); ?>">Learn more</a>
                        </div>
            <?php
                    }
                }

                wp_reset_postdata();
            ?>
        </div>
<?php
	}

}