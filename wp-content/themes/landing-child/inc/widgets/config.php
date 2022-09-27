<?php 
include_once("homepages/wg_slide_home.php");
include_once("homepages/wg_achievement.php");
include_once("homepages/wg_introduce_home.php");
include_once("homepages/wg_list_branch_home.php");
include_once("homepages/wg_product_home.php");
include_once("homepages/wg_partner_home.php");
include_once("homepages/wg_customer_home.php");
include_once("homepages/wg_solution_home.php");
include_once("homepages/wg_news_home.php");

include_once("introduces/wg_history_begin_introduce.php");
include_once("introduces/wg_certification_introduce.php");
include_once("introduces/wg_mission_vision_value_introduce.php");
include_once("introduces/wg_strength_introduce.php");
include_once("introduces/wg_our_tearm_introduce.php");
include_once("introduces/wg_introduce.php");
include_once("introduces/wg_map_company.php");

include_once("orther_pages/wg_list_branch_map.php");
include_once("orther_pages/wg_solution.php");

include_once("contacts/wg_map_contact.php");
include_once("contacts/wg_info_form_contact.php");

include_once("recuitment/wg_work_enviroment.php");
include_once("recuitment/wg_treatment.php");
include_once("recuitment/wg_image_company.php");
include_once("recuitment/wg_policy.php");

function init_widget_area() {
	register_sidebar(array(
		'name'          => 'Home Center Basato',
		'id'            => 'wg_home_center_area',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	
	register_sidebar(array(
		'name'          => 'Trang giới thiệu',
		'id'            => 'wg_page_introduce',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name'          => 'Trang chi nhánh',
		'id'            => 'wg_page_branch',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name'          => 'Trang liên hệ',
		'id'            => 'wg_page_contact',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name'          => 'Trang tuyển dụng',
		'id'            => 'wg_page_recruit',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
	register_sidebar(array(
		'name'          => 'Trang giải pháp',
		'id'            => 'wg_page_solution',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	));
}
add_action( 'widgets_init', 'init_widget_area' );
function create_custom_widget() {
	register_widget("Wg_Slide_Home");
	register_widget("Wg_achievement");
	register_widget("Wg_Introduce_Home");
	register_widget("Wg_List_Branch_Home");
	register_widget("Wg_History_Begin_Introduce");
	register_widget("Wg_Certification_Introduce");
	register_widget("Wg_Mission_Vision_Value_Introduce");
	register_widget("Wg_List_Branch_Map");
	register_widget("Wg_Map_Contact");
	register_widget("Wg_Strength_Introduce");
	register_widget("Wg_Product_Home");
	register_widget("Wg_Solution_Home");
	register_widget("Wg_Partner_Home");
	register_widget("Wg_Customer_Home");
	register_widget("Wg_News_Home");
	register_widget("Wg_Info_Form_Contact");
	register_widget("Wg_Our_Tearm_Introduce");
	register_widget("Wg_Work_Enviroment");
	register_widget("Wg_Treatment");
	register_widget("Wg_Image_Company");
	register_widget("Wg_Policy");
	register_widget("Wg_Introduce");
	
	register_widget("Wg_Solution");
	register_widget("Wg_Map_Company");
}
add_action( 'widgets_init', 'create_custom_widget' );