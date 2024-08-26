(function($){
$().ready(function(){
$(document).on('click' , '.acf-range-wrap', function() {

let range = $(this).find('input[type="range"]');
let number = $(this).find('input[type="number"]');

// console.log(range);


range.change(function() {
	
	// console.log($(this).val());
	number.val($(this).val());			
});
	
});
$(document).on('input', '.acfb-checkbox-true-false', function() {
	const v = $(this).val(); 
	v === '0' ? $(this).val('1') : $(this).val('0');
	const field = $(this).parents('.acfb_cs_field_root').find('.acfb_cs_field_main');
	v !== '1' ? field.show() : field.hide(); 
});

$(document).on('click', '.acf-label', function() {

	$(this).parent().find('.acfb-checkbox-true-false')[0].click();
	
});


});
})(jQuery);

