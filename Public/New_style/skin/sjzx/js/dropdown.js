
(function(){
	
	$(function(){
		$(".dropdown-btn").hover(function(){

			var p=$(this).parents(".dropdown-p");
			
			$(".table-dropdowm",p).show();
			
			$(".table-dropdowm",p).css({
				top:$(p).position().top
				
			});
	
		});
		$(".table-dropdowm").mouseleave(function(){
			
			$(this).hide();
		})
		
	});
	
})()
