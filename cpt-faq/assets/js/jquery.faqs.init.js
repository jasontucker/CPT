jQuery(function($){
	$(document).ready(function(){

		// FAQs Toggle
		$(".faq-title").click(function(){
			$(this).toggleClass("active").next().slideToggle("normal");
			return false; //Prevent the browser jump to the link anchor
		});
		
	});
});