$(function() {

			// 获取chat列表
			getChatList();
			// 轮询
			clearId=setInterval("getChatList()",interTime);

			$(".chat .sendbtn").on("click", function() {

					// 添加信息
					addMessage();

					// 获取chat列表
					//getChatList();
			});

			$(document).on("keyup", function(event) {
					if(event.keyCode === 13) {
						// 添加信息
						addMessage();
					}
				});
});

			function getMessage(list) {

				list = list || [];
				var template = Handlebars.compile(document.getElementById("template_chat").innerHTML);
				var context = {
					list: list
				};
				var _html = template(context);
				$(".chat-l-cont .chatsend").append(_html);
				
				
				var _last=$(".chatsend .clearfix").last();

				if(list.length===0){
					return;
				}
				if(_last.length>0){$(".chat-l-cont")[0].scrollTop=$(".chat-l-cont")[0].scrollHeight;} // scroll top

			}

			// 添加信息
			function addMessage() {

				clearInterval(clearId);
				var v = $(".chat-l-btn .txt").val() || "";
				$(".chat-l-btn .txt").focus();

				if($.trim(v) === "") {
					var _last=$(".chatsend .clearfix").last();
					if(_last.length>0){$(".chat-l-cont")[0].scrollTop=$(".chat-l-cont")[0].scrollHeight;} // scroll top 
					return;
				}

				// 清空文本框
				$(".chat-l-btn .txt").val("");

				// 获取最新的时间
				var p = $(".chatsend .clearfix").last().prev();
				var lastDate = $(".date", p).text();

				// 添加信息
				var o = {
					content: v,
					date: (new Date()).getTime().toString(),
					src: "__PUBLIC__/Home/img/service.png",
					user_ida:user_ida,
					user_idb:user_idb,
					status:1,

				}
				//var arrs = [];
				//arrs.push(o);
				$(".sendbtn").val("发送中...");
				$.ajax({
						 	url:cont+"/insert_chat",
    					 	dataType:"JSON",
    					 	type:'POST',
    					 	data:{o},
							success:function(data){
								$(".sendbtn").val("发送");
								getChatList();
								clearId=setInterval("getChatList()",interTime);
								
							},
							error:function(){
								$(".sendbtn").val("发送");
								getChatList();
								clearId=setInterval("getChatList()",interTime);
							}
						})
			}

			// 获取chat列表
			function getChatList() {
					// 获取最新的时间
					var p = $(".chatsend .clearfix").last().prev();
					var lastDate = $(".date", p).text()||"";
					lastDate=$.trim(lastDate);
					//=Number(lastDate);
					var _times=new Date(lastDate).getTime();
					_times=_times||0;
					// console.log(lastDate)
					$.get("chat_json?user_ida="+user_ida+"&"+"user_idb="+user_idb+"&"+"time="+_times, function(data) {
						data = typeof data === "string" ? JSON.parse(data) : data;
						data=data||[];
						getMessage(data);
					});

			}