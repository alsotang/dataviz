;KISSY.add(function(S,Base,LineChart){
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
			self.set("pointstyle","auto")
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
		      title:{
		              content:"Monthly Average Temperature"
		            },
		            // anim:{},
		            subTitle:{
		              content:"Source: WorldClimate.com"
		            },
		            lineType:"arc",
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
		                data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
		            }
		            , {
		                text: 'Berlin',
		                data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
		            }, {
		                text: 'London',
		                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
		            }
		            ],
		      legend:{
		         isShow:true,
		        layout:"horizontal",
		        align:"center",
		       	verticalAlign:'bottom',
		       	y:-10
		      },
		      points:{
		      	attr:{type:"auto"}
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
					S.log(config)
					self.linechart = new LineChart(config);
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
			var	config = {
					title:{
						content:$("#J_Title").val()
					},
					subTitle:{
						content:$("#J_SubTitle").val()
					},
					points:{
						attr:{
							type:self.get("pointstyle") || "auto",
							fill:isSolid ? "{COLOR}": "#fff",
							"stroke" : isSolid ? "#fff" : "{COLOR}",
							r:$("#J_PointRadius").val(),
							"stroke-width":$("#J_PointStrokeWidth").val()
						},
						hoverAttr:{
							fill:isSolid ? "{COLOR}": "#fff",
							"stroke" : isSolid ? "#fff" : "{COLOR}",
							r:isSolid ? $("#J_PointRadius").val() : $("#J_PointRadius").val() - 0 + 1,
							"stroke-width":isSolid ? 0 : $("#J_PointStrokeWidth").val()
						}
					},
					yLabels:{
						template:function(){
							return arguments[1]+self.get("unit");
						}
					},
					yAxis:{
						num:self.get("coordnum"),
						min:$("#J_Min").val()
					},
					line:{
						attr:{
							"stroke-width":$("#J_LineWidth").val()
						},
						hoverAttr:{
							"stroke-width":$("#J_LineWidth").val() - 0 + 1
						}
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
				cfg = self.linechart._cfg,
				lineWidth = pixelToNum(cfg.line.attr['stroke-width']),
				pointStrokeWidth = pixelToNum(cfg.points.attr['stroke-width']),
				pointRadius = pixelToNum(cfg.points.attr['r']);
				$("#J_LineWidth").val(lineWidth)
				self.set("linewidth",lineWidth)
				$("#J_PointRadius").val(pointRadius)
				self.set("pointradius",pointRadius)
				$("#J_PointStrokeWidth").val(pointStrokeWidth)
				self.set("pointstrokewidth",pointStrokeWidth)
				self.set("pointtype","实心")
				$("#J_Unit").val(self.get("unit"));
				$("#J_Min").val(self.get("min")||self.linechart.coordNum[0]);
				$("#J_CoordNum").val(self.get("coordnum") || cfg.yAxis.num);
				$("#J_Title").val(cfg.title.content);
				$("#J_SubTitle").val(cfg.subTitle.content);
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
					data:{id:guId,ctype:"linechart",cfg:S.JSON.stringify(S.mix(self.config,{
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

			$("#J_LineWidth").on("change",function(e){
				var val = e.target.value;
				self.linechart._cfg.line.attr['stroke-width'] = val;
				for(var i in self.linechart._lines){
					self.linechart._lines[i]['line'].attr({"stroke-width":val});
				}
				self.set("linewidth",val);
				self.reRenderChart();
			})

			$(".point-style").on("change",function(e){
				self.set("pointstyle",e.currentTarget.value);
				self.reRenderChart();
			});

			$(".point-type").on("change",function(e){
				self.set("pointtype",e.currentTarget.value);
				self.reRenderChart();
			});

			$("#J_PointRadius").on("change",function(e){
				var val = e.target.value;
				self.set("pointradius",val)
				self.reRenderChart();
			})

			$("#J_PointStrokeWidth").on("change",function(e){
				var val = e.target.value;
				for(var i in self.linechart._stocks){
					for(var j in self.linechart._stocks[i]['stocks']){
						self.linechart._stocks[i]['stocks'][j].attr({"stroke-width":val});
					}
				}
				self.set("pointstrokewidth",val)
				self.reRenderChart();
			})
		}
	});
	return Generator;
},{requires:['base','gallery/kcharts/1.1/linechart/index']});