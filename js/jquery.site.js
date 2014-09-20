$(function(){
	$('.collapse').collapse();
	
	
	// MOBILE
	$("#menu > ul > li").hover(
		function(){
			$(this).find('a').css('color', '#fff');
			$(this).find('.nav-hover').slideDown(200);
		}, function(){
			$(this).find('a').css('color', '#777');
			$(this).find('.nav-hover').slideUp(100);
		}
	);

});