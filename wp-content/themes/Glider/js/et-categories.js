jQuery(document).ready(function() {
	var $custom_portfolio_box = jQuery('#et_custom_categories_content'),
		$et_custom_categories = $custom_portfolio_box.find('#et_portfolio_categories_box');
	
	if ($custom_portfolio_box.find('input#et_portfolio_page:checked').length) {
		$custom_portfolio_box.find('#et_portfolio_categories_box').css('display','block');
	}
	
	$custom_portfolio_box.find('input#et_portfolio_page').click(function(){
		if (jQuery(this).attr('checked')) {
			$et_custom_categories.css({'display':'block','opacity':'0'}).animate({opacity:1},500);
		} else {
			$et_custom_categories.css({'display':'block'}).animate({opacity:0},500,function(){
				jQuery(this).css('display','none');
			});
		}
	});
});