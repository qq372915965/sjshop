$(function() {
	
	
	$("#vendor").bind("click keyup",function(){
       //alert($("#cinvname").val());
	   var cinvname_src = $("#cinvname").val();
	   $("#vendor").attr("data-src","/weixin/index.php/Home/ajaxinput/ajax_input_vendor?cinvname="+cinvname_src+"&");
    });
	
	$("#cinvstd").bind("click keyup",function(){
       //alert($("#cinvname").val());
	   var cinvname_src = $("#cinvname").val();
	   var vendor_src = $("#vendor").val();
	   //alert($("#vendor").val());
	   $("#cinvstd").attr("data-src","/weixin/index.php/Home/ajaxinput/ajax_input_cinvstd?cinvname="+cinvname_src+"&vendor="+vendor_src+"&");
    });


	
	

	$(".autocomplete").click(function(e) {
		$(".autocomplete-big").find(".autocomplete-content").hide();
		var v = $(this).val();
		var p = $(this).parents(".autocomplete-big");
		var $wrap = $(".autocomplete-content", p);
		$wrap.fadeIn()
		$wrap.html("");
		//if(v === "") {
		$.get($(this).attr('data-src'), {
			term: $(this).val()
		}, function(data) {
			data=JSON.parse(data);
			data = data || [];
			for(var i = 0; i < data.length; i++) {
				var li = document.createElement("li");
				li.tabIndex = "-1";
				li.innerText = data[i];
				$wrap.append(li);
			}
		});
		//	}

		$(document).one("click", function() {

			$(".autocomplete-content", p).hide();
		});

		e.stopPropagation();

	});

	$(".autocomplete").keyup(function(e) {

		e.stopPropagation();
		e.preventDefault();

		var v = $(this).val();
		var p = $(this).parents(".autocomplete-big");
		var $wrap = $(".autocomplete-content", p);
		$wrap.show();
		$wrap.html("");
		setTimeout(function(){
			
		$.get($(this).attr('data-src'), {
			term: $(this).val()
		}, function(data) {
			data=JSON.parse(data);
			data = data || [];
			for(var i = 0; i < data.length; i++) {
				var li = document.createElement("li");
				li.tabIndex = "-1";
				li.innerText = data[i];
				$wrap.append(li);
			}

		});
	}.bind(this),1000);
	});

	$(".autocomplete-content").delegate("li", "click", function() {

		var p = $(this).parents(".autocomplete-big");
		$(".autocomplete", p).val($(this).text().trim());
		$(".autocomplete-content", p).hide();

	});

	//api 的接受的参数 名称为term 例如mvc api => GetName(string term){}

});