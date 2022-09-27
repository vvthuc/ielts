<?php
add_filter('rwmb_meta', 'polylang_filter', 9, 4);
function polylang_filter()
{
	$args = func_get_args();
	if (count($args) == 4) {
		list($meta, $key, $opts, $option_name) = $args;
		$lang = pll_current_language();
		$field = rwmb_get_field_settings($key, $opts, $option_name);
		if ($field['type'] == 'image_advanced') {
			if (count($meta) == 0) {
				return [["full_url" => get_template_directory_uri() . '/images/no-image.svg', "url" => get_template_directory_uri() . '/images/no-image.svg']];
			}
		}
		if ($lang != "en") {
			$nkey = $key . "_" . $lang;
			$value = rwmb_get_value($nkey, $opts, $option_name);
			if ($value === FALSE) {
				return $meta;
			}
			return $value;
		}
		return $meta;
	}
}
pll_register_string('Liên hệ', 'contact', 'tech5s', true);
pll_register_string('Sản phẩm & dịch vụ', 'product&service', 'tech5s', true);
pll_register_string('Chính sách', 'policy', 'tech5s', true);
pll_register_string('Hỗ trợ', 'support', 'tech5s', true);
pll_register_string('Đối tác', 'Partner', 'tech5s', true);
pll_register_string('Khách hàng', 'Customer', 'tech5s', true);
pll_register_string('Nhận tin tức mới nhất từ Avani', 'footer_get_info', 'tech5s', true);
pll_register_string('Nhập địa chỉ e-mail của bạn để nhận những ưu đãi sớm nhất từ Avani', 'footer_get_email', 'tech5s', true);
pll_register_string('Địa chỉ', 'address', 'tech5s', true);
pll_register_string('Điện thoại', 'phone', 'tech5s', true);
pll_register_string('Email', 'email', 'tech5s', true);
pll_register_string('Website', 'website', 'tech5s', true);
pll_register_string('Bài viết liên quan', 'news-sanme', 'tech5s', true);
pll_register_string('Tải ứng dụng', 'Dowload', 'tech5s', true);
pll_register_string('Các dịch vụ khác', 'other-service', 'tech5s', true);
pll_register_string('Các giải pháp khác', 'other-solution', 'tech5s', true);
pll_register_string('Chính sách bảo hành', 'Warranty Policy', 'tech5s', true);
pll_register_string('TUYỂN DỤNG', 'RECRUIT', 'tech5s', true);
pll_register_string('Xem thêm', 'Đặc điểm nổi bật', 'tech5s', true);
pll_register_string('ĐĂNG KÝ TƯ VẤN', 'REGISTER FOR CONSULTATIONS', 'tech5s', true);
pll_register_string('TẢI CATALOG', 'Dowload catalog', 'tech5s', true);
pll_register_string('Sản phẩm tương tự', 'Similar product', 'tech5s', true);
pll_register_string('Tính năng', 'Feature', 'tech5s', true);
pll_register_string('Thông số kỹ thuật', 'Specifications', 'tech5s', true);
pll_register_string('Chứng nhận', 'Certifications', 'tech5s', true);
pll_register_string('Quy trình', 'Procedure', 'tech5s', true);
pll_register_string('Lợi ích', 'Benefit', 'tech5s', true);
pll_register_string('Chia sẻ', 'share', 'tech5s', true);
pll_register_string('Đặc điểm nổi bật', 'Outstanding Features', 'tech5s', true);
pll_register_string('Lợi ích', 'Benefit', 'tech5s', true);
pll_register_string('Đặc điểm nổi bật', 'Outstanding Features', 'tech5s', true);
pll_register_string('Khám phá', 'Khám phá', 'tech5s', true);
pll_register_string('Xem chi tiết', 'Xem chi tiết', 'tech5s', true);
pll_register_string('Sản phẩm đang được cập nhật!', 'Sản phẩm đang được cập nhật!', 'tech5s', true);
pll_register_string('Nhận tin tức mới nhất từ Avani', 'title_form_email', 'tech5s', true);
pll_register_string('Nhập địa chỉ e-mail của bạn để nhận những ưu đãi sớm nhất từ Avani', 'text_form_email', 'tech5s', true);
pll_register_string('Danh mục tin', 'category_news', 'tech5s', true);
pll_register_string('Tin tức liên quan', 'Related Posts', 'tech5s', true);
pll_register_string('Danh mục sự kiện', 'category_event', 'tech5s', true);
pll_register_string('Danh mục tuyển dụng', 'category_recruitment', 'tech5s', true);
pll_register_string('Tin nổi bật', 'news_hot', 'tech5s', true);
pll_register_string('Sự kiện nổi bật', 'event_hot', 'tech5s', true);
pll_register_string('Các bài tuyển dụng nổi bật', 'recruitment_hot', 'tech5s', true);
pll_register_string('Tags', 'tag', 'tech5s', true);
pll_register_string('Xem chi tiết', 'see_detail', 'tech5s', true);
pll_register_string('Điền thông tin', 'Fill in the information', 'tech5s', true);
pll_register_string('Gửi CV ngay', 'Send your CV now', 'tech5s', true);
pll_register_string('OUR SOLUTIONS', 'our_solution', 'tech5s', true);
pll_register_string('Ngày hết hạn', 'Expiration date', 'tech5s', true);
pll_register_string('Số lượng', 'Quantity', 'tech5s', true);
pll_register_string('Nhập từ khóa', 'Enter keywords', 'tech5s', true);
pll_register_string('Kết quả tìm kiếm tin tức với từ khóa', 'News search results with keyword', 'tech5s', true);
pll_register_string('Tin tức', 'News', 'tech5s', true);
pll_register_string('Sản phẩm', 'Product', 'tech5s', true);
pll_register_string('Thương hiệu', 'trademark', 'tech5s', true);
pll_register_string('Nộp hồ sơ ứng tuyển', 'Submit your application', 'tech5s', true);
pll_register_string('Dịch vụ', 'Service', 'tech5s', true);
pll_register_string('Kênh truyền thông', 'Media channel', 'tech5s', true);
pll_register_string('Tải ứng dụng', 'Dowload app', 'tech5s', true);
pll_register_string('Thứ tự', 'Order', 'tech5s', true);
pll_register_string('Vị trí', 'Nominee', 'tech5s', true);
pll_register_string('Số lượng', 'Quantity', 'tech5s', true);
pll_register_string('Hạn nộp hồ sơ', 'The deadline for submission', 'tech5s', true);
pll_register_string('Chi tiết', 'Detail', 'tech5s', true);
pll_register_string('Tải ứng dụng trên điện thoại', 'DownloadApp', 'tech5s', true);
pll_register_string('Trụ sở chính', 'Headquarters', 'tech5s', true);
pll_register_string('Chi nhánh', 'Branch', 'tech5s', true);
pll_register_string('Chọn loại', 'Choose ...', 'tech5s', true);
pll_register_string('Miền Nam', 'South', 'tech5s', true);
pll_register_string('Miền Trung', 'Central', 'tech5s', true);
pll_register_string('Miền Bắc', 'Northern', 'tech5s', true);
pll_register_string('Chọn miền', 'Choose place', 'tech5s', true);
pll_register_string('Nhập tên chi nhánh...', 'Enter branch name ...', 'tech5s', true);
pll_register_string('san-pham', '/en/san-pham', 'tech5s', true);
pll_register_string('giai-phap', '/en/giai-phap', 'tech5s', true);
pll_register_string('Không tìm thấy kết quả trùng khớp nào', 'No matches were found', 'tech5s', true);
pll_register_string('Kết quả tìm kiếm sản phẩm với từ khóa', 'Product search results with keyword', 'tech5s', true);
pll_register_string('Kết quả tìm kiếm Service với từ khóa', 'Service search results with keyword', 'tech5s', true);
