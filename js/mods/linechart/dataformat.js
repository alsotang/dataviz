KISSY.add(function(S,LineChart,Util){
			var $ = S.all;
			
	return {
		renderChart:function(){
			var self = this;
			var linechart = new LineChart({
				renderTo:"#J_Preview",
				canvasAttr:{
					width:600,
					height:200,
					y:10,
					x:50
				},
			      yLabels:{
			        css:{
			          "marginLeft":"-4px",
			          "font-family":"Microsoft Yahei",
			          "font-size":"10px"
			        }
			      },
			      xLabels:{
			        css:{
			          "font-family":"Microsoft Yahei",
			           "font-size":"10px"
			        }
			      },
			      title:{
			      		isShow:false,
			              content:"Monthly Average Temperature"
			      },
			      subTitle:{
			      	isShow:false,
			         content:"Source: WorldClimate.com"
			      },
			      lineType:"arc",
			      xAxis: {
			          text:self.fdata.axis
			      },
			      yAxis:{
			          num:7
			      },
			      series:self.fdata.series,
			      legend:{
			         isShow:true
			      },
			      points:{
			      	attr:{
			      		type:"auto"
			      	}
			      },
			      tip:{
			        offset:{
			                    x:10,
			                    y:10
			                },
			        template:"<span >{{text}}</span><br/>{{y}}"
			      }
			});
		},
		_data2TableHandler:function(){
			var self = this;
				var fdata = Util.formatData($("#J_Data").val());
				var series = fdata.series;
				var axis = fdata.axis;
				$("#J_Tbl").html(Util.data2Table(fdata));
				self.fdata = fdata;
				self.renderChart();
				self.bindEvt();
		},
		saveSeries:function(cb){
			S.io({
				url:"../service/saveseries.php",
				data:{
					series:S.JSON.stringify(this.fdata)
				},
				type:"post",
				success:function(data){
					cb && cb(data);
				}
			});
		},
		bindEvt:function(){
			var self = this;
			$("input",$("#J_Tbl")).on("blur",function(e){
				$("#J_Data").val(Util.table2Data($("#J_Tbl")));
				self.data2TableHandler();
			});
		},
		init:function(){
			var self = this;
			self.data2TableHandler = S.buffer(function(){
				self._data2TableHandler()
			},100);
			self.data2TableHandler();
			$("#J_Data").on("keyup",function(){
				self.data2TableHandler();
			});
			$("#J_CreateChart").on("click",function(e){
				e.preventDefault();
				//保存数据
				self.saveSeries(function(data){
					if(data && data == "success"){
						window.location.href = $(e.currentTarget).attr("href");
					}else{
						alert("error")
					}
				});
			});
		}
	};

},{requires:['gallery/kcharts/1.2/linechart/index','../util.js']});