jQuery(function($){
	$(document).ready(function() {
			
		//Options for the faqs filter
		var $filterType = $('#faqs-cats a.active').attr('rel');
		var $holder = $('ul.faqs-content');
		var $data = $holder.clone();
		
		$('#faqs-cats li a').click(function(e) {
		$('#faqs-cats a').removeClass('active');
			var $filterType = $(this).attr('rel');
			$(this).addClass('active');
			
			if ($filterType == 'all') {
				var $filteredData = $data.find('li.faqs-container');
			}
			else {
				var $filteredData = $data.find('li.faqs-container[data-type~=' + $filterType + ']');
			}
			
			$holder.quicksand($filteredData, {
				duration: 400,
				adjustHeight: "dynamic",
				easing: 'easeInOutQuad'
	
				}, function() {
				
				// callback functions here
				jQuery(function($){	
						
					// FAQs Toggle
					$(".faqs-content").css("height", "auto");
					$(".faq-title").click(function(){
						$(this).toggleClass("active").next().slideToggle("normal");
						return false; //Prevent the browser jump to the link anchor
					});
					
				});
		  	});
		  
		  return false;
		});
	});
});