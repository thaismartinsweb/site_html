$(function(){
	
	$('#formContact').submit(function(){
		
		$('.telefone').hide();
		$('.email').hide();
		$('.nome .site').hide();
		$('.site').hide();
		$('.all').hide();
		$('#sendOk .alert').hide();
		
		$.ajax({
			url: "send.php",
			type: "POST",
			data: $(this).serialize(),
		}).done(function(result) {

			if(result == 1){
				$('#sendOk .alert').show();
			} else {
				$('#sendFail').find('.' + result).show();
			}
		}).fail(function() {
			$('#sendFail').find('.all').show();
		});
		
		return false;
	});
	
	function isMobile(){
		 var isMobile = {
			  Android: function() {
			      return navigator.userAgent.match(/Android/i) && navigator.userAgent.match(/mobile|Mobile/i);
			  },
			  BlackBerry: function() {
			      return navigator.userAgent.match(/BlackBerry/i)|| navigator.userAgent.match(/BB10; Touch/);
			  },
			  iOS: function() {
			      return navigator.userAgent.match(/iPhone|iPod/i);
			  },
			  Opera: function() {
			      return navigator.userAgent.match(/Opera Mini/i);
			  },
			  Windows: function() {
			      return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/webOS/i) ;
			  },
			  any: function() {
			      return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
			  }
		};
	  return isMobile.any()
	}
	
	$('#menu').removeClass('in').css('height', '0');
	
	$('#onepage > li > a').click(function(){
		$('.collapse.in').removeClass('in').css('height', '0');
	});
	
	$('#onepage').onePageNav({
		begin: function() {
		},
	});
	
	jQuery("#slider").layerSlider({
		responsive: true,
		responsiveUnder: 768,
		layersContainer: 768,
		skin: 'fullwidth',
		navPrevNext: true,
		autoPlayVideos: true,
		skinsPath: '/js/skins/'
	});


	if(!isMobile()){
		$("#menu > ul > li").hover(
			function(){
				$(this).find('a').css('color', '#fff');
				$(this).find('.nav-hover').slideDown(200);
			}, function(){
				$(this).find('a').css('color', '#777');
				$(this).find('.nav-hover').slideUp(100);
			}
		);
		
		var altura = $(window).height();
		var alturaColuna = altura - 80;
		
		if(altura){
			$('#about').css('min-height', altura);
			$('#portfolio').css('min-height', altura);
			$('#contact').css('min-height', altura);
		}
	}

});