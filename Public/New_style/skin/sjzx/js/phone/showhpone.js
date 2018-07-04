$(function() {
	 window.showPhone= function(fn,fn2){
var timeId = 0;
function setTime(){
		
			var p=$(".phone-modal-box");
			var url = p.attr("data-url");
			var id = p.attr("data-id")||0;
			var text= p.attr("data-text");
			$(".phone-modal-box .num").text(text)
			$(".phone-modal-box .tel-txt").hide();
			var timer = p.attr("data-time") ? Number(p.attr("data-time")) : 60;
			clearInterval(timeId);
			$.get(url, {
				id: id
			}, function(data) {
				$(".phone-modal-box .tel-txt").show();
				$(".phone-modal-box .time").text(timer.toString());
				$(".phone-modal-box .num").text(data.toString())
				 if(typeof fn==="function"){
				 	fn(id,data);
				 }
				var $this = p;
				// setInterval
				timeId = setInterval(function() {
					timer--;
					claerTime($this, timer,text);
				}, 1000);
			});
			
}

	function claerTime($this, timer,text) {
		var strTimer = timer >= 10 ? timer.toString() : "0" + timer.toString();
		if(timer === 0) {
			clearInterval(timeId);
			$(".phone-modal-close").click();
			$this.find(".num").text(text);
			$($this).removeAttr("data-show");
		}else{
			$this.find(".time").text(strTimer);
		}

	}
	// close modal box
	$(".phone-modal-close").click(function() {
		
		clearInterval(timeId);
		var p = $(this).parents(".phone-modal");
		var id = p.find(".phone-modal-box").attr("data-id");
		p.find(".phone-modal-box").fadeOut();
		p.find(".phone-modal-box").removeAttr("data-show");
		p.find(".phone-modal-mask").fadeOut();
		
		 if(typeof fn2==="function"){
		 	fn2(id,	$(".phone-modal-box .num").text());
		 }

	})

	// 点击显示 show  modal  box
	$(document).delegate(".phone-modal-btn", "click", function() {
		var id=$(this).attr("data-id")||0;
		var p = $(".phone-modal");
		var data_name=$(this).attr("data-name")||0;
		var data_vendor=$(this).attr("data-vendor")||0;
		$(".phone-modal-box .vendor-name").html(data_vendor);
		$(".phone-modal-box .phone-name").html(data_name);
		var phoneBox= p.find(".phone-modal-box");
		phoneBox.attr("data-id",id);
		phoneBox.show();
		p.find(".phone-modal-mask").show();
		if(!phoneBox.attr("data-show")){
			phoneBox.attr("data-show",true);
			setTime();
		}
	
	});

  
}

});


$(function() {
	/*srcoll top fixed*/
	var elmTop = parseFloat(($(".supply_info_cp").offset().top)) || 0;
	$(window).scroll(function() {
		var winTop = parseFloat($(window).scrollTop()) || 0;
		if(winTop >= elmTop) {
			$(".supply_info_cp").addClass("active");
			$(".supply_info_cp").animate({
				top: 0
			}, 400);
		} else {
			$(".supply_info_cp").removeClass("active");
		}
	})

})


$(function(){
	window.showPhone(function(id,data){
	//alert(id+"##"+data);
	},function(id,data){
	    //alert(id+"##"+data);
		$.get("/weixin/index.php/Home/Phone/phone_ax_un",{phoneX:'86'+data},function(data){
		}).error(function(){
		    alert("加载失败");
		})
	})
})