$(function(){var d;$(".side-section .btns li").mouseenter(function(){var e=$(this);if(e.hasClass("selected")){return}var f=$(this).index()+1;d=setTimeout(function(){var g=$(".sidefloor .detail .item.active");$(".side-section .btns li").removeClass("selected");e.addClass("selected");g.removeClass("active").addClass("hide");$(".sidefloor .detail .item"+f).show();$(".sidefloor .detail .item"+f).removeClass("hide").addClass("active");
	$("#sumaAreaPop,#sumaCargoPop,#sumaResultPop").hide()},200)}).mouseleave(function(){clearTimeout(d)});$(".floor1 .f-right .tab").click(function(){if($(this).hasClass("selected")){return}$(".floor1 .f-right .tab").toggleClass("selected");$(".floor1 .f-right .subitem").toggle()});var c=new uc.SliderPlayer({wrap:"#marketSliderPlayer",elementSelector:".marketelement",size:{width:280,height:210},playTimes:5000});b();function b(){var e=$(".main_image .element").length;if(e<=1){return}for(var f=1;f<=e;f++){$('<a href="#">'+f+"</a>").appendTo(".main_visual .flicking_con")}$dragBln=false;$(".main_image").touchSlider({flexible:true,speed:800,btn_prev:$("#btn_prev"),btn_next:$("#btn_next"),paging:$(".flicking_con a"),counter:function(g){$(".flicking_con a").removeClass("on").eq(g.current-1).addClass("on")}});$(".main_image").bind("mousedown",function(){$dragBln=false});$(".main_image").bind("dragstart",function(){$dragBln=true});$(".main_image .flicking_con a").click(function(){if($dragBln){return false}});timer=setInterval(function(){$("#btn_next").click()},5000);$(".main_visual").hover(function(){clearInterval(timer)},function(){timer=setInterval(function(){$("#btn_next").click()},5000)});$(".main_image").bind("touchstart",function(){clearInterval(timer)}).bind("touchend",function(){timer=setInterval(function(){$("#btn_next").click()},5000)})}$(window).scroll(function(){var e=$(window).scrollTop();if(e>100){$("#homeRightBar").fadeIn(200)}else{$("#homeRightBar").fadeOut(200)}});$("#searchProduct").click(function(){var e=$("#productKey").val();a(e)});$("#findHelper").click(function(){var e=$("#productKey2").val();a(e)});function a(e){if(e&&$.trim(e)){e=$.trim(e);window.open(window.basePath+"/mall.html?keyWord="+e)}else{window.open(window.basePath+"/mall.html")}}$(".ref-btn").click(function(){var e=this;clearInterval(d);d=setTimeout(function(){$(e).closest(".recentprice").find(".offer").load(window.basePath+"/refFirstFloorInfo.html");$(e).next().show();setTimeout(function(){$(e).next().hide()},2000)},200)});$("#deliverySearch").click(function(){var e=$("#deliveryNum").val();var f=/^[0-9]*$/;if(e==""){ksShowComfirmNotice("",'<span class="fz14">您的输入有误，运单号不能为空</span>',4);return}if(!f.test(e)){ksShowComfirmNotice("",'<span class="fz14">运单号只能为数字，请填写有效的运单号码</span>',4);return}window.open("//www.sumawuliu.com/portal/home/orderProcess.jsp?orderId="+e)});$("#floor2Tab").find("a").click(function(){if($(this).hasClass("selected")){return}$("#floor2Tab").find("a").toggleClass("selected");$("#floor2Right").find(".subtab").toggle()})});