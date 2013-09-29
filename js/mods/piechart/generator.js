;KISSY.add(function(S,Base,PieChart){
	var $ = S.all,IO = S.io;
	function Generator(){
		this.init();
	}
	function pixelToNum(str){
			return (str+"").replace("px","");
		}
	S.extend(Generator,Base,{
		init:function(){
			var self = this;
			self.reRenderChart = S.buffer(function(){
				var cfg = self.getConfigData();
				self.renderChart(cfg);
			},200);	
			self.renderChart();
			self.bindEvt();
		},
		renderChart:function(cfg){
			var self = this;
			var config = self.config =  S.mix({
				renderTo: "#J_Preview",
				cx: 350,
				cy: 130,
				rs: [100],
				donut: true,
				interval: 5,
				anim: {
					easing: 'swing',
					duration: 800
				}
			},cfg,undefined,undefined,true);
			IO({
				url:"../service/getseries.php",
				dataType:"json",
				success:function(data){
					config.data = data;
					self.config = S.clone(config);
					S.log(self.config)
					self.piechart = new PieChart(config);
					self.fillBack();
				}
			});

		},
		genGuId:function(){
			return "J_"+Math.round(Math.random() * 10000);
		},
		//获取配置项数据
		getConfigData:function(){
			var self = this;
			var	config = {
					
				};
			return config;
		},
		//回填
		fillBack:function(){
			
		},
		getRadiosVal:function(els){
			var val;
			els.each(function(){
				var $el = $(this);
				if($el.attr("checked")){
					val = $el.val();
					return false;
				} 
			})
			return val;
		},
		checkRadios:function(els,val){
			els.each(function(){
				var $el = $(this);
					if($el.val() == val){
					$el.attr("checked",true);
				}else{
					$el.attr("checked",false);
				}
			});
		},
		bindEvt:function(){
			var self = this;
			//生成图表
			$("#J_Gen").on("click",function(){
				var guId = self.genGuId();
				//处理config.data中多余的属性

				IO({
					url:"../service/chart_gen.php",
					type:"post",
					dataType:"json",
					data:{id:guId,ctype:"piechart",cfg:S.JSON.stringify(S.mix(self.config,{
						renderTo:"#"+guId,anim:{}
					}))},
					success:function(data){
						var topWindow = window.top.window;
						var $tgt = S.one("#"+data.ctnid,topWindow.document.body);
						$(".kc-gen-to-add",$tgt).remove();
						$(data.html).prependTo($tgt);
						var script = topWindow.document.createElement("script");
						script.innerHTML = data.script;
						$tgt[0].appendChild(script);
						$("<a href='#' class='del-chart'>删除</a>").prependTo($tgt);
						topWindow.$overlay.hide();
					}
				})
			})

			
		}
	});
	return Generator;
},{requires:['base','gallery/kcharts/1.2/piechart/index']});