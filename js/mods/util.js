/*
	共用的格式化工具
*/
;KISSY.add(function(S){
			var $ = S.all;
			window.Util = {};
			//格式化数据
			function formatData(data){
					var axis = [],series,data2,texts = [];
					var data = S.trim(data).replace(/\n/g,",").split(",");
					for(var i in data){
						data[i] = S.trim(data[i]);
					}
					var axisIndex = !isDataRow(data[data.length-1].split(" ")) ? data.length-1 : (!isDataRow(data[0].split(" ")) ? 0 : undefined);
					//没有配置text则默认索引1,2,3
					if(axisIndex !== undefined){
						axis = formatAry(data[axisIndex].split(" "));
					}
					if(axisIndex === 0){
						data2 = data.splice(1,data.length - 1);
					}else if(axisIndex === undefined){
						data2 = data;
					}else{
						data2 = data.splice(0,data.length - 1);
					}
					data2 = formatAry(data2)
					for(var i in data2){
						data2[i] = data2[i].replace(/\s+/g,",").split(",");
						//去除text为空格的情况
						for(var j in data2[i]){
							//判断是否为数字
							if(isNaN(data2[i][j] - 0)){
								if(data2[i][j-1]!==undefined){
									data2[i][j-1] += " "+data2[i][j];
									data2[i].splice(j,1);
								}
							}
						}
						texts[i] = data2[i][0];
						data2[i] = data2[i].splice(1,data2[i].length-1);
					}
					series = getSeries(data2,texts);
					if(axisIndex === undefined){
						for(var i = 0 ;i < series[0]['data']['length'];i++){
							axis[i] = i;
						}
					}
					return {
						series:series,
						axis:axis
					};
			}
			//获取数据
			function getSeries(datas,txts){
				var obj = [];
				for(var i in datas){
					obj[i] = {};
					if(txts[i] !== undefined){
						obj[i]['text'] = txts[i];
					}
					obj[i]['data'] = datas[i];
				}
				return obj;
			}
			//去除array中多余的空格
			function formatAry(ary){
				for(var i in ary){
					if(ary[i] - 0 === 0){
							ary.splice(i,1);
					}
				}
				return ary;
			}

			function table2Data($tbl){
				var data = [],i=0;
				$("tr",$tbl).each(function(){
					var tmp = [];
					i++;
					$("td",$(this)).each(function(){
						tmp.push($("input",$(this)).val())
					});
					data.push(tmp.join(" ")+"\n");
				});
				return data.join(" ");
			}
			//填充成表格
			function data2Table(fdata){
				var html = "<table>",
					len = fdata.series.length;
					if(fdata.axis && fdata.axis.length){
						html += "<tr>";
						html+="<td>数据</td>"
						for(var i in fdata.axis){
							html += "<td><input type='text' value="+fdata.axis[i]+"></td>"
						}
						html+="</tr>"
					}
					for(var i in fdata.series){
						html += "<tr>";
						html+="<td><input type='text' value="+fdata.series[i]['text']+"></td>"
						for(var j in fdata.series[i]['data']){
							html += "<td><input type='text' value="+fdata.series[i]['data'][j]+"></td>"
						}
						html+="</tr>"
					}
					html+="</table>"
				return html;
			}
			//支持字符串的number判断
			function isNum(arg){
				if(S.isNumber(arg)) return true;
				if(!isNaN(arg-0)) return true;
				return false;
			}
			//若一个数字都没有 则判定为横轴数据 全为数字也不一定是datarow
			function isDataRow(args){
				var len = args.length || 0,
					j = 0;
				S.log(args)
				for(var i in args){
					if(!isNum(args[i])){
						j++;
					}
				}
				if(len > 0 && len == j){
					return false;
				}
				if(args[0]&&!isNum(args[0])&& j == 1){
					return true;
				}
				return false;
			}

		return S.mix(window.Util,{
			formatData:formatData,
			getSeries:getSeries,
			formatAry:formatAry,
			table2Data:table2Data,
			data2Table:data2Table,
			isNum:isNum,
			isDataRow:isDataRow
		});
});