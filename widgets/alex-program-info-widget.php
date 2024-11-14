<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Elementor_Alex_Program_Info_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'alex_program_info';
	}

	public function get_title() {
		return esc_html__( 'Alex Program Info', 'elementor-alex-program-info-widget' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'program-info' ];
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

    public function get_script_depends() {
		return [ 'alex-program-info-script' ];
	}

	public function get_style_depends() {
		return [ 'alex-program-info-style' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elementor-alex-program-info-widget' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elementor-alex-program-info-widget' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'text',
				'placeholder' => 'text',
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        if ( empty( $_GET['id'] ) ) {
			return;
		}
        $id = $_GET['id'];
        $post = get_post($id);
        $arr = array(
            array('term' => 'p_curriculum', 'title' => 'Curriculum'),
            array('term' => 'p_requirements', 'title' => 'Entry Requirements'),
            array('term' => 'p_accrediation', 'title' => 'Accreditation'),
            array('term' => 'p_duration', 'title' => 'Duration and Format'),
            array('term' => 'p_opportunities', 'title' => 'Career Opportunities'),
            array('term' => 'p_tuition', 'title' => 'Tuition Fees and Financial Aid'),
            array('term' => 'p_process', 'title' => 'Application Process'),
            array('term' => 'p_testinomials', 'title' => 'Testimonials'),
            array('term' => 'p_university_location', 'title' => 'Location / Campus')
        );
?>
		<div class="program">
            <div class="u-name">
                <?php 
                    $majors = wp_get_post_terms($id, 'p_university_name');
                    if (!empty($majors) && is_array($majors)) {
                        $major  =implode(',', array_map(function($m) {
                            return html_entity_decode($m->name);
                        }, $majors));
                        echo '<h1>' . $major . '</h1>' ;
                    }
                    $locations = wp_get_post_terms($id, 'p_university_location');
                    if (!empty($locations) && is_array($locations)) {
                        $location  =implode(',', array_map(function($l) {
                            return html_entity_decode($l->name);
                        }, $locations));
                        echo '<p>' . $location . '</p>' ;    
                    }
                ?>
            </div>
            <div class="overview">
                <?php 
                    echo '<h2>Program Overview</h2>'; 
                    $descriptions = wp_get_post_terms($id, 'p_contact_info');
                    if (!empty($descriptions) && is_array($descriptions)) {
                        $description  =implode(',', array_map(function($m) {
                            return html_entity_decode($m->name);
                        }, $descriptions));
                        echo '<p>' . $description . '</p>' ;
                    }
                ?>
            </div>
            <div class="pg-info">
            <?php 
                foreach($arr as $item) {
                    echo '<div class="pg-info-item ' . $item['classname'] . '">';
                    echo '<h2>' . $item['title'] . '</h2>';
                    $taxonomy_info_arr = wp_get_post_terms($id, $item['term']);
                    if (!empty($taxonomy_info_arr) && is_array($taxonomy_info_arr)) {
                        $taxonomy_infos  =implode(',', array_map(function($info) {
                            return html_entity_decode($info->name);
                        }, $taxonomy_info_arr));
                        echo '<p>' . $taxonomy_infos . '</p>';
                    }
                    echo '</div>';
                }
            ?>
            </div>
		</div>
        <div class="interest">
            <div class="interest-title"><span>Interested in this program?</span></div>
            <div class="interest-box">
                <div class="interest-box-left">
                    <div><span>Name</span><input type="text" placeholder="Name" class="name" /></div>
                    <div><span>Email</span><input type="email" placeholder="example@mail.com" class="name" /></div>
                    <div><span>Phone Number</span><input type="text" placeholder="xx-xxxx-xxxx" class="name" /></div>
                </div>
                <div>
                    <div><span>Your message</span><textarea type="text" placeholder="Hello World!" class="name"></textarea></div>
                    <div><button class="send-msg">SEND MESSAGE</button></div>
                </div>
            </div>
        </div>
<?php
	}

}