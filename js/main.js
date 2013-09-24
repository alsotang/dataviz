/*
	TODO	构造overlay 
			图表类型选择
			调用不同图表的生成器模块
*/
;KISSY.add(function(S,Base,Overlay,Resizable,DD,Constrain){
	var $ = S.all,IO = S.io;

	function Main(){
		this.init();
	}

	function wrapTag(tagName,innerHTML){
		return "<"+tagName+">"+innerHTML+"</"+tagName+">";
	};
	function getElementTagString($el,wrap){
		if(!$el || !$el[0]) return "";
		var tagNameStr = $el[0].tagName.toLowerCase();
		var className = $el.attr("class")||"";
		var style = $el.attr("style")||"";
		var wrap = wrap||"";
		var id = $el.attr("id") || "";
		return "<"+tagNameStr+" id='"+id+"' class='"+className+"' style='"+style+"'>"+wrap+"</"+tagNameStr+">";
	}

	S.extend(Main,Base,{
		init:function(){
			var self = this;
			self.__setDDAndResizable();
			self.renderBtnSave();
			self.bindEvt();
		},
		//设置可拖动
		__setDDAndResizable:function(){
			var self = this;
			$(".kc-gen-graph").each(function(){
				self.setDDAndResizable($(this));
			});
			
		},
		setDDAndResizable:function(node){
			 var constrain=new Constrain({
		        constrain: ".kc-gen-container"
		    });
			var resize = new Resizable({
					node:$(node),
					handlers:["b"],
					minHeight:250,
			        minWidth:250,
			        maxWidth:950
				});

			// resize.on("resizeEnd",function(e){
			// 	var $container = $(".kc-gen-wrapper",$(node));
			// 	if($container.attr("id")&&window["KC_Gen_"+$container.attr("id")]){
			// 		$container.width(e.target["_width"]);
			// 		$container.height(e.target["_height"]);
			// 		var linechart = window["KC_Gen_"+$container.attr("id")];
			// 		linechart.init();
			// 	}
			// });
				 // var drag=new DD.Draggable({
			  //       node:$(node),
			  //       cursor:'move',
			  //       move:true,
			  //        plugins:[
			  //           constrain
			  //       ]
			  //   });
		},
		initOverlay:function(content){
			var self = this;
			window.$overlay = self.overlay = self.overlay || new Overlay.Dialog({
				elStyle:{
	                border:"2px solid gray",
	                lineHeight:0,
	                background:"#fff"
	            },
	            width:800, //配置高和宽
	            height:600,
	            mask:true,
	            headerContent:"<span>图表生成器</span>",
	            bodyContent:''
			});
			self.overlay.set("bodyContent",content);
			self.overlay.center();
			self.overlay.show();
		},
		bindEvt:function(){
			var self = this;

			$(".kc-gen-container").on("click",function(e){
				e.preventDefault();
				var $tgt = $(e.target);
				if($tgt.hasClass("del-chart")){
					$tgt.parent().html('<a href="#" class="kc-gen-to-add">点击添加图表</a>');
				}else if($tgt.hasClass("kc-gen-graph")||$tgt.hasClass("kc-gen-to-add")){
					if($tgt.hasClass("kc-gen-to-add")){
						$tgt = $tgt.parent();
					}
					var params = {
							width:$tgt.width(),
							id:$tgt[0].id,
							height:$tgt.height(),
							t:Math.random()
						};
						//选择哪种图表
						self.initOverlay("<iframe scrolling='no' src='./common/charttype.php?"+S.param(params)+"'></iframe>");
				}
			});

			$("#J_SavePage").on("click",function(){
				if(confirm("确定保存？")){
					var content = self.getHTMLAndScript();
					if(!content) return;
					IO({
						url:"./service/savepage.php?type=a",
						type:"post",
						data:{content:content},
						success:function(id){
							window.location.href="./service/savepage.php?type=q&pageid="+id;
						}
					});
				}
			});

			$("#J_AddDiv").on("click",function(){
				var guid = "J_Paper"+Math.round(Math.random()*100000);
				var $div = $('<div id='+guid+'><a href="#" class="kc-gen-to-add">点击添加图表</a></div>').addClass("kc-gen-graph").appendTo(S.one(".kc-gen-container"));
				self.setDDAndResizable($div)
			});
		},
		//获取容器html和js
		getHTMLAndScript:function(){
			var self  = this,
				html = "";
			$(".kc-gen-graph").each(function(){
				var container = S.one("div",$(this));
				html += getElementTagString($(this),getElementTagString(container));
				var script = $("script",$(this)).html();
				html += script ? wrapTag("script",script) :"";
			})
			return html;
		},
		renderBtnSave:function(){
			var self = this;
			$("<div class='kc-gen-save-banner'><a href='#' id='J_AddDiv' class='btn-add-div'>插入容器</a><a href='#' id='J_SavePage' class='btn-save-page'>保存页面</a></div>").appendTo($("body"));
		}
	})
	return Main;
},{requires:['base','overlay','resizable','dd','dd/plugin/constrain']});