$(function() {
				// 单项删除
				shop.deleteElm(function(id) {
					$.ajax({
						 url:cont+"/ajax_del",
    					 dataType:"JSON",
    					 type:'POST',
    					 data:{
    					 	"goods_id":id,
    					 	"user_id":user_id
    					},
						success:function(data){
							if(data > 0){
								$.info("数据删除成功！",1)
							}
						}
					})
					
				});

				// 选择删除
				shop.deleteSelectElm(function(items) {
					$.ajax({
						 url:cont+"/ajax_del",
    					 dataType:"JSON",
    					 type:'POST',
    					 data:{
    					 	"goods_id":items,
    					 	"user_id":user_id
    					},
						success:function(data){
							if(data > 0){
								$.info("数据删除成功！",1)
							}
						}
					})
				});
				
				// 订单跳转
				$(document).on("click",".jiesuan",function(){
					var goods_id =[]; 
					var goods_num = [];
				$('.shop-item-box input[name="goods_id"]:checked',$(this).parents(".shop-item")).each(function(){ 
					
					var _val=$(this).parents(".item").find(".num").val();

					goods_id.push($(this).val()); 
					goods_num.push(_val);

				}); 
				if(goods_id.length===0){
					$(this).alert('请选择结算商品');
					return false;
				}
				var goods_ids = goods_id.join(',');
				var goods_nums = goods_num.join(',');
				window.location.assign("order.html?goods_id="+goods_ids+'&goods_num='+goods_nums+'&user_id='+user_id);
				
			});
			
			});