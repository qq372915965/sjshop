
//placeholder  兼容ie8 ie9
$(function(){
	
	$("input[type='text']").each(function(){
	var place=$(this).attr("placeholder");
	$(this).val(place);
});
$("input[type='text']").focus(function(){
	var place=$(this).attr("placeholder");
	var val=$(this).val();
	if(place==val){
	$(this).val("");
	}
});
$("input[type='text']").blur(function(){
	var place=$(this).attr("placeholder");
	if($(this).val()==""){
		$(this).val(place);
	}
});
});
