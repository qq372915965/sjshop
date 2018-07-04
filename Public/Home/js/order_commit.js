$(function() {
				// 计算运费
				total_freight()
				// 第一次添加
				var vd1 = vd.create(".form");
				vd1.init();
				$(".form .vd-btn").on("click", function() {
						var $this = this;
						// 是否验证成功
						vd1.isSuccess(function(obj) {
						vd1.disabled($(vd1.formName).find(".vd-item")); //禁用
						vd1.disabled($this); //禁用
						//vd1.enabled(this); //激活
						$($this).text("提交正在中...");
						//alert(JSON.stringify(obj));

						}, function(obj) {
						//alert(obj.errorMsg)
							obj.el.focus();

						});
				});

				// 使用新地址
				var vd2 = vd.create(".form2");
				vd2.init();
				$(".form2 .vd-btn").on("click", function() {
					var $this = this;
					// 是否验证成功
					vd2.isSuccess(function(obj) {
						$.ajax({
						 url:cont+"/add_address",
    					 dataType:"JSON",
    					 type:'POST',
    					 data:{
    					 	"address":obj,
    					 	"user_id":user_id
    					},
						success:function(data){
							if(data > 0){
								window.location.reload();
							}
						}
					})
						vd2.disabled($(vd2.formName).find(".vd-item")); //禁用
						vd2.disabled($this); //禁用
						vd1.enabled(this); //激活
						$($this).text("提交正在中...");


					}, function(obj) {
						//alert(obj.errorMsg)
						obj.el.focus();

					});
				});
	

				// 设为默认地址
				order.selectAddress(function(address_id) {
					$.ajax({
						 url:cont+"/address_default",
    					 dataType:"JSON",
    					 type:'POST',
    					 data:{
    					 	"address_id":address_id,
    					 	"user_id":user_id
    					},
						success:function(data){
							// console.log(data);
						}
					})
				});

				// 修改收货地址
				order.editAddress(function(vd3, el,id) {
					// 是否验证成功
						vd3.isSuccess(function(obj) {
						vd3.disabled($(vd3.formName).find(".vd-item")); //禁用
						vd3.disabled(el); //禁用
						//vd1.enabled(this); //激活
						$(el).text("提交正在中...");
						$.ajax({
						 	url:cont+"/add_address",
    					 	dataType:"JSON",
    					 	type:'POST',
    					 	data:{
    					 	"address":obj,
    					 	"user_id":user_id,
    					 	"address_id":id
    						},
							success:function(data){
							if(data > 0){
								window.location.reload();
								}
							}
						})

					}, function(obj) {
						obj.el.focus();

					});
				})

				// 三联地址
				treeSelectAddress.init();
			});

			//	计算运费
			$('.freight').on("blur",function(){
				total_freight();
			})


			

			// 提交订单
			$('.order_submit').click(function(event){
				event.preventDefault();
				var datas = {};
				var goods_id = [];
				var freight = [];
				$('.goods_id').each(function(){ 
					goods_id.push($(this).text()); 

				}); 
				
				// 获取运费
				$('.freight').each(function(){ 
					freight.push($(this).val()); 

				});

				datas['address_id'] = $(".order-attr-r .item .radio.active").attr("data-id");
				if(!datas['address_id']){
					alert('请选择收货地址');
					return false;
				}
				datas['user_id'] = user_id;
				datas['goods_id'] = goods_id;
				datas['order_total'] = $('.order_total').text();
				datas['remark'] = $('.order_remark').val();
				datas['pay_code'] = $(".order-list-pay-1 .active").attr('data-type');
				datas['postage_code'] = $(".order-list-pay-2 .active").attr('data-type');
				datas['order_freight'] = freight;
				datas['invoice_type'] = $(".order-list-invoice-2 .active").attr('data-type');
				$('.order_submit').attr('disabled',true);
				$('.order_submit').val('正在提交中...');
				$.ajax({
						 	url:cont+"/add_order",
    					 	dataType:"JSON",
    					 	type:'POST',
    					 	data:{'order_info':datas},
							success:function(data){
							if(data > 0){
								window.location.assign(module+'/order?user_id='+user_id); // 跳转到个人中心;
								}else{
									alert('请勿重复提交订单');
								}
							}
						})
						
				})


			function total_freight(){
				var total=0;
				var items=$(".order-list-info").find(".item");
				items.each(function(){
				var _v=	$(this).find(".freight").val()||"";
					_v=Number(_v);
					if(_v < 0){
						_v=0;
						$(this).find(".freight").val(_v);
						alert('请合理输入运费');
					}
					total+=_v;
				})
				var total_goods = $('.total_goods').text();
				$(".total_postage").text(total+'.00');
				$(".order_freight").text(total+'.00');
				$(".order_total").text(Number(total)+Number(total_goods)+'.00');
				$(".totalnum").text(Number(total)+Number(total_goods)+'.00');
				$(".order_total").text(Number(total)+Number(total_goods)+'.00');
			}
