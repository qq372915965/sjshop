$(document).ready(function() { 
$('.bianse').addClass('odd'); 
$('bianse:even').addClass('even'); //奇偶变色，添加样式 
}); 

$(function(){
	$(".list li").hover(function(){
		$(this).find("#div1").show();
	},function(){
		$(this).find("#div1").hide();
	});
});
$(function(){
	$(".list li").hover(function(){
		$(this).find("#div2").show();
	},function(){
		$(this).find("#div2").hide();
	});
});
$(function(){
	$(".list li").hover(function(){
		$(this).find("#div3").show();
	},function(){
		$(this).find("#div3").hide();
	});
});
$(function(){
	$(".list li").hover(function(){
		$(this).find("#div4").show();
	},function(){
		$(this).find("#div4").hide();
	});
});

