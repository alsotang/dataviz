;KISSY.add(function(S,Base,barchart){
	var $ = S.all,IO = S.io;
	function Generator(){
		this.init();
	}
	function pixelToNum(str){
			return (str+"").replace("px","");
	}
	function swapObjKey(obj,key1,key2){
			var tmp = obj[key1];
			obj[key1] = obj[key2];
			obj[key2] = tmp;
		return obj;
	}
	function replaceCfgByZoomType(cfg,zoomType){
		if(zoomType == "y"){
			if(cfg['yAxis'] && cfg['yAxis']['num']){
				cfg = swapObjKey(cfg,"xAxis","yAxis");
				cfg = swapObjKey(cfg,"yLabels","xLabels");
			}
		}else{
			if(cfg['xAxis'] && cfg['xAxis']['num']){
				cfg = swapObjKey(cfg,"xAxis","yAxis");
				cfg = swapObjKey(cfg,"yLabels","xLabels");
			}
		}
		return cfg;
	}
	S.extend(Generator,Base,{
		init:function(){
			var self = this;
			self.reRenderChart = S.buffer(function(){
				var cfg = self.getConfigData();
			self.renderChart(cfg);
			},200);	
			self.set("unit","℃");
			self.renderChart();
			self.bindEvt();
		},
		renderChart:function(cfg){
			var self = this;
			var config = self.config =  S.mix({
				renderTo:"#J_Preview",
		      yLabels:{
		        css:{
		          "marginLeft":"-4px",
		          "font-family":"Microsoft Yahei",
		          "font-size":"10px"
		        },
		        template:function(){
							return arguments[1]+$("#J_Unit").val()
						}
		      },
		      xLabels:{
		        css:{
		          "font-family":"Microsoft Yahei",
		           "font-size":"10px"
		        }
		      },
		      stackable: $("#J_Stackable").attr("checked")?true:false,
		      title:{
		              content:"Monthly Average Temperature"
		            },
		            subTitle:{
		              content:"Source: WorldClimate.com"
		            },
		       xAxis: {
		          text:['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
		                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
		            },
		            yAxis:{
		              num:7
		            },
		      series:[{
		                text: 'Tokyo',
		                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
		            }, {
		                text: 'New York',
		                data: [0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		            }
		            ],
		      legend:{
		         isShow:true,
		        layout:"horizontal",
		        align:"center",
		       	verticalAlign:'bottom',
		       	y:-10
		      },
		      tip:{
		        offset:{
		                    x:10,
		                    y:10
		                },
		        template:"<span >{{text}}</span><br/>{{y}}"+$("#J_Unit").val()
		      }
			},cfg,undefined,undefined,true);
			IO({
				url:"../service/getseries.php",
				dataType:"json",
				success:function(data){
					config.series = data.series;
					config.xAxis.text = data.axis;
					config = replaceCfgByZoomType(config,config.zoomType||"x")
					self.barchart = new barchart(config);
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
			//实心
			var isSolid = self.getRadiosVal($(".point-type")) == "实心";
			var isStackable = $("#J_Stackable").attr("checked")?true:false;
			var zoomType = $("#J_ZoomType").attr("checked")?"y":"x";
			var	config = {
					title:{
						content:$("#J_Title").val()
					},
					zoomType:zoomType,
					subTitle:{
						content:$("#J_SubTitle").val()
					},
					bars:{
						barsRatio:self.get("barsratio"),
						barRatio:self.get("barratio")
					},
					yLabels:{
						template:function(){
							return arguments[1]+self.get("unit");
						}
					},
					stackable:isStackable,
					yAxis:{
						num:self.get("coordnum"),
						min:$("#J_Min").val()
					},
					tip:{
				        template:"<span >{{text}}</span><br/>{{y}}"+self.get("unit")
				      }
				};
			return config;
		},
		//回填
		fillBack:function(){
			var self = this,
				cfg = self.barchart._cfg;
				$("#J_Unit").val(self.get("unit"));
				$("#J_Min").val(self.get("min")||(cfg.zoomType == "y"?self.barchart.coordNumX[0]:self.barchart.coordNum[0]));
				$("#J_CoordNum").val(self.get("coordnum") || cfg.yAxis.num || cfg.xAxis.num);
				$("#J_Title").val(cfg.title.content);
				$("#J_SubTitle").val(cfg.subTitle.content);
				$("#J_BarsRatio").val(cfg.bars.barsRatio);
				$("#J_BarRatio").val(cfg.bars.barRatio);
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
				IO({
					url:"../service/chart_gen.php",
					type:"post",
					dataType:"json",
					data:{id:guId,ctype:"barchart",cfg:S.JSON.stringify(S.mix(self.config,{
						renderTo:"#"+guId,anim:{}
					}))},
					success:function(data){
						var topWindow = window.top.window;
						var $tgt = S.one("#"+data.ctnid,topWindow.document.body);
						$tgt.html(data.html)
						var script = topWindow.document.createElement("script");
						script.innerHTML = data.script;
						$tgt[0].appendChild(script);
						$("<a href='#' class='del-chart'>删除</a>").prependTo($tgt);
						topWindow.$overlay.hide();
					}
				})
			})

			$(".btn-apply").on("click",function(){
				self.set("unit",$("#J_Unit").val());
				self.set("coordmin",$("#J_Min").val());
				self.reRenderChart();
			});

			$("#J_CoordNum").on("change",function(e){
				var val = e.target.value;
				self.set("coordnum",val);
				self.reRenderChart();
			});
			$("#J_BarRatio").on("change",function(e){
				var val = e.target.value;
				self.set("barratio",val);
				self.reRenderChart();
			});
			$("#J_BarsRatio").on("change",function(e){
				var val = e.target.value;
				self.set("barsratio",val);
				self.reRenderChart();
			});

			$("#J_Stackable").on("click",function(){
				self.reRenderChart();
			});

			$("#J_ZoomType").on("click",function(){
				self.reRenderChart();
			})

		}
	});
	return Generator;
},{requires:['base','gallery/kcharts/1.2/barchart/index']});