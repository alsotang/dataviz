KISSY.add(function(S){
	var $ = S.all;
	function format(data){
		var data = S.trim(data).replace(/,|%/g,"").replace(/\n/g,",").split(",");
		for(var i in data){
			data[i] = S.trim(data[i]).split(/\t|\s+/g);
		}
		// S.log(data)
		var os = "";
		var name = "data";
		var yLabels = [];
		var xLabels = [];
		var points = [];
		if(data.length < 2) return "数据格式有误"; 
		var groupnum = data[1].length - 1;

		for(var i = 0; i < groupnum;i++){
			points[i] = [];
		}

		for(var i in data[0]){
			yLabels.push(data[0][i]);
		}

		S.log(points)
		for(var i in data)if(i > 0){
				xLabels.push(data[i][0]);
				

				for(var j in data[i])if(j>0){
					// S.log(data[i][j])
					S.log(j)
					points[j-1][i] = data[i][j];
				}
				
		}

		for(var i in xLabels){
			os += (" "+xLabels[i]);
		}
		os += "\n";
		for(var i in yLabels){
			os += yLabels[i] + " ";
			for(var j in points[i]){
				os += (" "+points[i][j]);
			}
			os += "\n";
		}


		return os;

	}


	$("#J_Output").val(format($("#J_Input").val()))

	$("#J_Input").on("paste change keyup blur",function(){
		$("#J_Output").val(format($("#J_Input").val()))
	})

})