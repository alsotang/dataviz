KISSY.add(function(S, PieChart, Util) {
	var $ = S.all;

	return {
		renderChart: function(fdata) {
			var self = this;
			$("#J_Preview").html("");
			var data = S.clone(fdata);
			var piechart = new PieChart({
				renderTo: "#J_Preview",
				data:data,
				cx: 350,
				cy: 130,
				rs: [100],
				donut: true,
				interval: 5,
				anim: {
					easing: 'swing',
					duration: 800
				}
			});
		},
		_data2TableHandler: function() {
			var self = this;
			var fdata = self.formatData($("#J_Data").val());
			$("#J_Tbl").html(self.data2Table(fdata));
			self.renderChart(fdata);
			self.bindEvt();
		},
		data2Table:function(data){
			var self = this;
			var str = "<table>"

			for(var i in data){
				if(data[i] && data[i]['label'] && data[i]['data']){
					str += "<tr><td><input type='text' value="+data[i]['label']+"></td><td><input type='text' value="+data[i]['data']+"></td></tr>";
				}
			}
			str += "</table>";
			return str;
		},
		table2Data:function($tbl){
				var data = [];
				$("tr",$tbl).each(function(){
					var tmp = [];
					$("td",$(this)).each(function(){
						tmp.push($("input",$(this)).val())
					});
					data.push(tmp.join(" ")+"\n");
				});
				return data.join(" ");
		},
		formatData: function(data) {
			var self = this;
			var data = S.trim(data).replace(/\n/g, ",").split(",");
			var fdata = [];
			for (var i in data) {
				data[i] = S.trim(data[i]) ? S.trim(data[i]).split(/\s+|\t+/g) : "";
				data[i] && fdata.push({
					label: data[i][0],
					data: data[i][1]/1
				})
			}
			self.fdata = fdata;
			S.log("----")
			S.log(self.fdata)
			return fdata;
		},
		saveSeries: function(cb) {
			S.io({
				url: "../service/saveseries.php",
				data: {
					series: S.JSON.stringify(this.fdata)
				},
				type: "post",
				success: function(data) {
					cb && cb(data);
				}
			});
		},
		bindEvt: function() {
			var self = this;
			$("input", $("#J_Tbl")).on("blur", function(e) {
				$("#J_Data").val(self.table2Data($("#J_Tbl")));
				self.data2TableHandler();
			});
		},
		init: function() {
			var self = this;
			self.data2TableHandler = S.buffer(function() {
				self._data2TableHandler()
			}, 100);
			self.data2TableHandler();
			$("#J_Data").on("keyup", function() {
				self.data2TableHandler();
			});
			$("#J_CreateChart").on("click", function(e) {
				e.preventDefault();
				//保存数据
				self.saveSeries(function(data) {
					if (data && data == "success") {
						window.location.href = $(e.currentTarget).attr("href");
					} else {
						alert("error")
					}
				});
			});
		}
	};

}, {
	requires: ['gallery/kcharts/1.2/piechart/index', '../util.js']
});