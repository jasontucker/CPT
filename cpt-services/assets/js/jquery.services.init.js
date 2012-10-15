jQuery(function($){
	$(document).ready(function(){
		
		$('.service-tab-content').hide();
		$('#service-content .service-tab-content:first').show();
		$('ul#service-tabs li:first').addClass('active');
		 
		$('ul#service-tabs a').click(function(){
			$('ul#service-tabs li').removeClass('active');
			$(this).parent().addClass('active');
			var currentTab = $(this).attr('href');
			$('#service-content .service-tab-content').hide();
			$(currentTab).fadeIn(1000);
			return false;
		});
		
	});
});