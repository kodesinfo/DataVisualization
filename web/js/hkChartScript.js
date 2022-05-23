var targetNode = ''; // TH, TD
var rowIndex=-1; // 행의 순서
var columnIndex=-1; // 열의 순서
var lastRow=$("#displayData table tbody tr").index();
var lastField=$("#displayData table tbody td:last-child").index();
var defColor=['#4dc9f6','#f67019','#f53794','#537bc4','#acc236','#166a8f','#00a950','#58595b','#8549ba']; // chart default color
var contentChange = false;

// 그래프 Type 변경시 
$(document).on('change',"select[id='graphType[]']",function(){
	let idx = $($(this).parent()).index();
	let type = $(this).val();
	let target = $(this).parent().parent().parent().parent().parent().prop("id");

	if(type == 'pie' || type == 'doughnut'){
		for(let i=1;i<$("#"+target+ " tr").length;i++){
			if(idx==1){
				let _obj =$(eval($(eval($("#"+target+ " tr")[i])).find("td")));
				for(let j=1;j<_obj.length;j++){
					let _text = $(eval($(_obj)[j])).text();
					$(eval($(_obj)[j])).html('<input type="color" class="form-control-color" id="mcolor[]" name="mcolor[]" value="'+defColor[(i-1)%defColor.length]+'" title="Choose your color">'+_text);
				}
			}else{
				let text = $(eval($(eval($("#"+target+ " tr")[i])).find("td")[idx])).text();
				$(eval($(eval($("#"+target+ " tr")[i])).find("td")[idx])).html('<input type="color" class="form-control-color" id="mcolor[]" name="mcolor[]" value="#563d7c" title="Choose your color">');
			}
		}
	}else{
		for(let i=1;i<$("#"+target+ " tr").length;i++){
			if(idx==1){
				$(eval($(eval($("#"+target+ " tr")[i])).find("td"))).find('.form-control-color').remove();
			}else{
				$(eval($(eval($("#"+target+ " tr")[i])).find("td")[idx])).find('.form-control-color').remove();
			}
		}
	}

	if(idx==1){
		if(type == 'pie' || type == 'doughnut'){
			for(let i=0;i<$("#"+target+ " tr").length;i++){
				$($("#"+target+ " tr")[i]).find("select[id='graphType[]']").val(type);
			}

			$("#"+target+" tr:first td").find("select[id='graphType[]'] option").prop('disabled',true);
			$("#"+target+" tr:first td").find("select[id='graphType[]'] option[value='"+type+"']").prop('disabled',false);
			$(eval($("#"+target+" tr:first td")[1])).find("select[id='graphType[]'] option").prop('disabled',false);
		}else{
			for(let i=0;i<$("#"+target+ "tr").length;i++){
				if($($("#"+target+ "tr")[i]).find("select[id='graphType[]']").val()=="pie" || $($("#"+target+ " tr")[i]).find("select[id='graphType[]']").val() =="doughnut"){
					$($("#"+target+ " tr")[i]).find("select[id='graphType[]']").val(type);
				}
			}
			for(let i=1;i<$("#"+target+" tr:first td").length;i++){
				let _type = $($("#"+target+" tr:first td")[i]).find("select[id='graphType[]'] option:selected").val();
				if(_type=="pie" || _type =="doughnut"){
					$($("#"+target+" tr:first td")[i]).find("select[id='graphType[]']").val(type);
				}
			}

			$("#"+target+" tr:first td").find("select[id='graphType[]'] option").prop('disabled',false);
			$("#"+target+" tr:first td").find("select[id='graphType[]'] option[value='pie']").prop('disabled',true);
			$("#"+target+" tr:first td").find("select[id='graphType[]'] option[value='doughnut']").prop('disabled',true);
			$(eval($("#"+target+" tr:first td")[1])).find("select[id='graphType[]'] option").prop('disabled',false);
		}
	}
});

// excel load시 동작
function excelExport(event){
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var fileData = reader.result;
        var wb = XLSX.read(fileData, {type : 'binary'});
        var sheetNameList = wb.SheetNames; // 시트 이름 목록 가져오기 
        var firstSheetName = sheetNameList[0]; // 첫번째 시트명
        var firstSheet = wb.Sheets[firstSheetName]; // 첫번째 시트 
		handleExcelDataJson(firstSheet);
    };
    reader.readAsBinaryString(input.files[0]);
}


// excel loding 후 cell 데이터를 table에 기록
function handleExcelDataJson(sheet){
	var data = XLSX.utils.sheet_to_json (sheet);
	var maxFieldNum= Object.keys(data[0]).length;
	var colorNum = defColor.length;

	$("#displayData").empty();
	$("#displayData").append("<table id='dataTable'></table>");
	$("#displayData table").addClass('table');
	$("#displayData table").addClass('table-striped');
	$("#displayData table").addClass('table-bordered');

	// 해더처리
	var tmp=' <thead><tr>'
	for(i=0; i<maxFieldNum;i++){
		let bgColor = (i==0?'fff':defColor[(i-1)%colorNum]);
		tmp += '<th data-color="'+bgColor+'" style="background-color:'+bgColor+'" contenteditable="true">&nbsp;';
		if(i!=0){
		let type = 'line';
		tmp += '<img src="/svg/'+type+'.svg" class="graphKind" >';
		tmp += '<input type="hidden" id="color[]" name="color[]" value="'+bgColor+'"/>';
		tmp += '<input type="hidden" id="graphType[]" name="graphType[]" value="'+type+'"/>';
		}
		tmp += '</th>';
	}
	tmp+='</tr></thead>';

	$("#dataTable").append(tmp);
	$("#dataTable").append("<tbody></tdody>");
	$.each(data, function (i, row) {
		tmp="<tr>";
		$.each(row, function (j, field) {
			tmp+="<td contenteditable='true'>"+field+"</td>";
		});
		tmp+="</tr>";

		$("#dataTable>tbody").append(tmp);
	});
	$("#chartTitle").val($('#excelFile')[0].files[0].name.replace(/[.]?[a-z]+$/gm, ''));
}

/**
 * Table 정보를 읽어서 그래프를 그린다.
 **/
var script='';
function tableDraw(table){
    var data = [];
	data['axisX'] = [];
	data['axisY'] = [];

	axisY = 0;

	title = [];
	$('#displayData th').each(function(){
		if($(this).index()!=0){
			title.push($(this).text());
		}
	});

	type = [];
	$("#"+table+" input[id='graphType[]']").each(function(){
		type.push($(this).val());
	});
	color = [];
	$("input[id='color[]']").each(function(){
		color.push($(this).val());
	});

	if(color){
		for(let j=0;j<$("#displayData table tbody td:last-child").index();j++){
			data['axisX'][j] = [];
		}

		$('#'+table+" table tr").each(function(i,n){
			if(i!=0){
				var _row = $(n);

				var rowData = {};
				data['axisY'].push(_row.children()[axisY].innerText);
				
				for(var j=1;j<$(_row).find('td').length;j++){
					data['axisX'][j-1].push(_row.children()[j].innerText);
				}
			}
		});

		var dataset = {
			labels:  data['axisY'],
			datasets: [
			]
		};

		for(let j=0;j<$("#displayData table tbody td:last-child").index();j++){
		
			let colors = color[j];
			if(type[j] == 'pie' || type[j] == 'doughnut'){
				mcolor = [];
				colors = '';
				$("#"+table+" tr td:nth-child("+(j+2)+") input[id='mcolor[]']").each(function(i){
					mcolor.push($(this).val());
				});
				colors=mcolor;
			}

			dataset.datasets.push({
				label:  title[j],
				fill:false,
				backgroundColor:colors,
				borderColor:colors,
				data: data['axisX'][j],
				type:type[j]
			});
		}

		drawChart(dataset, type[0], 'chart1');

		
		// script 태그 생성
		script ="<script>\nvar chartText =  {\n"
	+"	id : 'chartText',\n"
	+"	beforeDraw : function(chart){\n"
	+"		var source = '"+$("#source").val().trim()+"';\n"
	+"		if(source != ''){\n"
	+"			chart.ctx.textAlign = 'bottom';\n"
	+"			chart.ctx.font = 'normal 13px silver';\n"
	+"			chart.ctx.fillText('출처 : '+source, 10, (chart.height - 10));\n"
	+"		}\n"
	+"	}\n"
	+"};";
	script +="var chart = new Chart(document.getElementById('chart'),{\n"
				+"type: '"+type[0]+"',\n"
				+"options: {\n"
				+"layout: {padding: {bottom: 18}},"
				+"plugins :{\n"
				+"title: {align:'start',display: true,text:'"+$('#chartTitle').val()+"',font: {weight:'bold',size: 16}},\n"
				+"subtitle: {align:'start',display: true,text:'"+$('#unitTitle').val()+"',font: {weight:'normal',size: 13}}\n"
				+"},\n"
				+"indexAxis: 'x',\n"
				+"elements: {\n"
				+"bar: {\n"
				+"borderWidth: 2,\n"
				+"}\n"
				+"}\n"
				+"},\n";
		script += "plugins: [chartText]";
		script += "});\n";
		if(!isNumber($('#dataKind').find(":selected").val()) && $('#field1').find(":selected").val()==undefined && $('#field2').find(":selected").val()==undefined && $('#endDate').find(":selected").text()!="최신자"){
			script += "chart.data={";
			script += "labels : ";
			
			for(let i=0;i<data.axisY.length;i++){
				script += (i==0?"[":"")+"'"+data.axisY[i]+"'"+(i==data.axisY.length-1?'], \n':',');
			}
			
			script += "		datasets:[";
			for(let j=0;j<title.length;j++){
				
				let colors = "'"+color[j]+"'";
				if(type == 'pie' || type == 'doughnut'){
					mcolor = [];
					colors = '';
					$("#"+table+" tr td:nth-child("+(j+2)+") input[id='mcolor[]']").each(function(i){
						mcolor.push($(this).val());
					});
					for(let i=0;i<mcolor.length;i++){
						colors += (i==0?"[":"'")+"'"+mcolor[i]+"'"+(i==mcolor.length-1?']':',');
					}
					colors=mcolor;
				}

				if(j!=0){
					script += ",";
				}
				script += "			{";
				script += "				label: '" + title[j] + "',";
				script += "				fill:false,";
				script += "				backgroundColor: " + colors + ",";
				script += "				borderColor: " + colors + ",";
				script += "				type: '" + type[j] + "',";
				script += "				data:";

				for(let i=0;i<data.axisX[j].length;i++){
				script +=  (i==0?"[":"")+"'"+data.axisX[j][i]+"'"+(i==data.axisX[j].length-1?']\n':',');
				}

				script += "}";
			}
			script += "]";
			script += "};";
			script += 'chart.update();';
		}else{
			script +='$.ajax({'
						+'url: "/api/get?id='+$('#dataKind').find(':selected').attr('data-table')+'&axisY='+$('#field1').val()+'&axisX='+$('#field2').val()+'&startDate='+$('#startDate').val()+'",'
						+'method : "GET",'
						+'dataType : "json"'
						+'}).done(function(data){'
						+'var labelData = new Array();'
						+'var filedData = new Array();'
						+'chart.data = {'
						+'	labels:  data["axisY"],'
						+'	datasets: ['
						+'		{'
						+'			label:  "'+title[0]+'",'
						+'			fill:false,'
						+'			backgroundColor:"'+color[0]+'",'
						+'			borderColor:"'+color[0]+'",'
						+'			data: data["axisX"],'
						+'			type: "'+type[0]+'",'
						+'		}'
						+'	]'
						+'};'
						+'chart.update();'
					+'});';
		}
		script += '</script>';
	}
}

// 그래프를 그리기 위한 Canvas Tag 생성
function makeCanvas(id) {
	var container = document.getElementById(id);
	var canvas = document.createElement('canvas');
	var ctx = canvas.getContext('2d');
	ctx.fillStyle = "white";
	ctx.fillRect(0, 0, canvas.width, canvas.height);

	container.innerHTML = '';
	canvas.width = container.offsetWidth;
	canvas.height = 400; //container.offsetHeight;
	container.appendChild(canvas);

	return ctx;
}

// 차트를 Canvas tag에 출력
function drawChart(dataset, type, div){

	var paddingBottom = 18;
	var source = $("#source").val().trim();
	if(source == ""){
		paddingBottom = 0;
	}

	new Chart(makeCanvas('chart1'),{
		type: type,
		data: dataset,
		options: {
			layout: {
				padding: {
					bottom: paddingBottom
				}
			},
			plugins :{
				title: {
					display: true,
					align:'start',
					font:{weight:'bold',size: 16},
					text: $('#chartTitle').val()
				},
				subtitle: {
					display: true,
					align:'start',
					font:{weight:'normal',size: 13},
					text: $('#unitTitle').val()
				}
			}
		},
		plugins: [chartText]
	});
}

// 하단 출처를 그래프에 생성
var chartText =  {
	id : "chartText",
	beforeDraw : function(chart){
		var source = $("#source").val().trim();
		if(source != ""){
			chart.ctx.textAlign = "bottom";
			chart.ctx.font = "normal 13px silver";
			chart.ctx.fillText("출처 : "+source, 10, (chart.height - 10));
		}
	}
}


// 데이터 table 앞쪽에 줄 추가
function tableRowPreAdd(){
	var tmpRow = $("#displayData table tbody tr:last-child").clone();
	tmpRow.find('td').text('');
	$("#displayData table tbody tr:nth-child("+((columnIndex==-1?0:columnIndex)+1)+")").before('<tr>'+tmpRow.html()+'</tr>');
}

// 데이터 table 다음에 줄 추가
function tableRowAdd(){
	var tmpRow = $("#displayData table tbody tr:last-child").clone();
	$("#displayData table tbody tr:nth-child("+((columnIndex==-1?0:columnIndex)+1)+")").after('<tr>'+tmpRow.html()+'</tr>');
	$("#displayData table tbody tr:nth-child("+((columnIndex==-1?0:columnIndex)+2)+")").find('td').text('');
}

// 데이터 table 줄 삭제
function tableRowDel(){
	$("#displayData table tbody tr:nth-child("+(columnIndex+1)+")").remove();
}

// 데이터 table 컬럼 추가
function tableColumnAdd(idx){
	if(!idx) idx=rowIndex!=-1?rowIndex+1:$('#displayData table thead th').length;

	$("#displayData table thead th:nth-child("+(idx)+")").after('<th contenteditable="true"></th>');
	$("#displayData table tbody td:nth-child("+(idx)+")").after('<td contenteditable="true"></td>');
}

// 데이터 table 컬럼 제거
function tableColumnDel(){
	let idx = rowIndex!=-1?rowIndex+1:$('#displayData table thead th').length-1;
	$('#displayData table thead tr th:nth-child('+idx+')').remove()
	$('#displayData table tbody tr td:nth-child('+idx+')').remove()
}

// 그래프 이미지 URL 처리
function canvasToURL(){
	let canvas = document.getElementById('chart1').getElementsByTagName('canvas')[0];
	let dataURL = canvas.toDataURL();
	let imageTag = "<img src='"+dataURL+"'/>";
	$('#canvasImage').html(imageTag);
	$('#graphImage').attr('src',dataURL);
}

// 그래프 이미지 저장
function canvasToImage(){
	// 저장 시 원하는 그래프 크기로 변경하여 저장
	changeCavasWidth('600px');
	setTimeout(saveImage,80);
}

// cavas 크키 조절
function changeCavasWidth(width){
	$('#chart1').css('width',width);
}

// 이미지 저장
function saveImage(){
	let canvas = $('#chart1>canvas')[0];
	let data={};
	data['idx'] = $("#gIdx").val();
	data['photo'] = canvas.toDataURL();
	$.ajax({
		method: "POST",
		url:'/chart/toImage',
		data : data,
	}).done(function(data){
		canvasToFile();
	});
}

// 그래프 스크립트 코드 화면 처리
function canvasToScript(){
	$('#canvasScript').val(script);
}

// 그래프 스크립트 저장
function canvasToFile(){
	let data={};
	data['idx'] = $("#gIdx").val();
	data['html'] = script;

	$.ajax({
		method: "POST",
		url:'/chart/toFile',
		data : data,
	}).done(function(data){
		var idx = $("#gIdx").val();
		var makeDate = $("#makeDate").val();
		window.opener.postMessage("<iframe frameborder='0' width='600px' height='400px' src='/data/"+makeDate+"/"+idx+".html' data-img='/photo/chartimage/"+makeDate+"/"+idx+".png' data-thumb='/photo/chartimage/"+makeDate+"/"+idx+"_thumb.png'></iframe><br /><br />", "*");
		window.close();
	});
}

// 그래프 table 세팅
function graphSetting(){
	let color = $('#graphColor').val();
	let type = $('#graphType').val();

	let target = '';
	if(targetNode=='TH'){
		target = $('#displayData table').find(targetNode.toLowerCase()).eq(rowIndex);
	}else if(targetNode=='TD'){
		target = $('#displayData table').find('tr').eq(columnIndex+1).find('td').eq(rowIndex);
	}

	if(type == 'pie' || type == 'doughnut'){
		$(target).css('backgroundColor','white');
		$(target).css('color','black');

		for(var i=0;i<defColor.length;i++){
			$('#displayData table tbody tr:nth-child('+defColor.length+'n+'+(i+1)+') td:nth-child('+(rowIndex+1)+')').css('background-color',defColor[i]).append('<input type="hidden" id="mcolor[]" name="mcolor[]" value="'+defColor[i]+'"/>');
		}
	}else if(targetNode=='TH'){
		$(target).css('backgroundColor',color);
		$(target).css('color',getComplementaryColor(color));
		if( !(type == 'pie' || type == 'doughnut')){
			$('#displayData table tbody td').css('backgroundColor','white');
			$('#displayData table tbody td').css('color','black');
			$('input[id^=mcolor]').remove();
		}
	}else{
		$(target).css('backgroundColor',color);
		$(target).css('color',getComplementaryColor(color));
	}

	$(target).find('img').remove();
	$(target).find('input').remove();

	if(targetNode=='TH'){
		$(target).append('<img src="/svg/'+type+'.svg" class="graphKind" >');
		$(target).append('<input type="hidden" id="color[]" name="color[]" value="'+color+'"/>');
		$(target).append('<input type="hidden" id="graphType[]" name="graphType[]" value="'+type+'"/>');
	}else if(targetNode=='TD'){
		$(target).append('<input type="hidden" id="mcolor[]" name="mcolor[]" value="'+color+'"/>');
	}

	$(".contextmenu").hide();
}

// 컬러의 보색의 값을 리턴
function getComplementaryColor(color){
	return '#'+(0Xffffff - parseInt('0X'+color.substr(1,6))).toString(16).padStart(6,"0");
}

// 새로운 테이블을 세팅
function createTable(){
	let row = $('#row').val();
	let column = $('#column').val();
	
	$("#displayData").empty().append("<table id='dataTable'></table>");
	$("#displayData table").addClass('table');
	$("#displayData table").addClass('table-striped');
	$("#displayData table").addClass('table-bordered');

	let tag = "";
	for(let j = 0; j < row; j++){
		if(j==0){
			tag += '<thead><tr>';
		}else if(j==1){
			tag += "<tbody><tr>";
		}else{
			tag += "<tr>";
		}

		for (let i = 0; i < column; i++) {
			if(j==0){
				tag += "<th contenteditable='true'></th>";
			}else{
				tag += "<td contenteditable='true'></td>";
			}
		}

		if(j==0){
			tag += "</tr></thead>";
		}else if(j==row-1){
			tag += "</tr></tbody>";
		}else{
			tag += "</tr>";
		}
	}

	$("#displayData table").append(tag);
	$('#popover-content').hide();
}

// 기본축으로 지정시 동작
function moveToHead(){
	let type = 'line';

	$("#displayData table tbody tr:nth-child("+(columnIndex+1)+") td").each(function(i,v){
		$("#displayData table thead th:nth-child("+($(this).index()+1)+")").text($(this).text());
		if(i!=0){
		$("#displayData table thead th:nth-child("+($(this).index()+1)+")").append('<img src="/svg/'+type+'.svg" class="graphKind" >');
		$("#displayData table thead th:nth-child("+($(this).index()+1)+")").append('<input type="hidden" id="color[]" name="color[]" value="'+defColor[(i-1)]+'"/>');
		$("#displayData table thead th:nth-child("+($(this).index()+1)+")").append('<input type="hidden" id="graphType[]" name="graphType[]" value="'+type+'"/>');
		}
	});
	$("#displayData table tbody tr:nth-child("+(columnIndex+1)+")").remove();
	$('.contextmenu').hide();
}

// 테이블 Tool Button 
$(".tableButton svg").on("click",function(){
	var action = $(this).attr("class");
	switch(action){
		case "prependRow":
			tableRowPreAdd();
		break;
		case "addRow":
			tableRowAdd();
		break;
		case "delRow":
			tableRowDel();
		break;
		case "prependColumn":
			tableColumnAdd(rowIndex);
		break;
		case "addColumn":
			tableColumnAdd(rowIndex+1);
		break;
		case "delColumn":
			tableColumnDel();
		break;
		default:
	}
});

// 테이블의 td 클릭시 위치를 저장
$("#displayData table tbody").on("click",'td',function(){
	columnIndex = $(this).closest("tr").index(); 
	rowIndex = $(this).index();
	lastRow=$("#displayData table tbody tr:last-child").index();
	lastField=$("#displayData table tbody td:last-child").index();
});

// 통계 자료 변경시 동작 (직업 입력, 과거 그래프, API 테이터)
$("#dataKind").change(function(){
	var dataKind = $(this).val();
	if(dataKind=="input"){
		$("#excelFile").show();
		$("#apiTools").hide();
		$("#makedList").hide("slow");
	}else if(dataKind=="maked"){
		$("#makedList").show("slow");
		$("#apiTools").hide();
		$(".chartArea .card-body").css("height","200px;");
		getMakedList(0);
	}else{
		$("#excelFile").hide();
		$("#makedList").hide("slow");
		$("#apiTools").show();
		$("#chartTitle").val($(this).find(":selected").text());
		$("#source").val($(this).find(":selected").attr('data-provider'));
		$("#unitTitle").val($(this).find(":selected").attr('data-unit'));

		$.ajax({
			method: "GET",
			url:'/chart/Field?apiIdx='+dataKind,
			dataType:'json'
		}).done(function(data){
			$("#field1").empty();
			$("#field2").empty();

			$("#field1").append("<option>X축 선택</option>");
			$("#field2").append("<option>Y축 선택</option>");
			data.forEach(function(item,index){
				$("#field1").append("<option value='"+item['field']+"'>"+item['remark']+"</option>");
				$("#field2").append("<option value='"+item['field']+"'>"+item['remark']+"</option>");
			});
		});
	}
});

// API 테이터 선택시 X축 선택
$("#field1").change(function(){
	var dataKind = $("#dataKind").val();
	var field = $(this).val();
	$.ajax({
			method: "GET",
			url:'/chart/date?apiIdx='+dataKind+'&field='+field,
			dataType:'json'
		}).done(function(data){
			$("#startDate").empty();
			$("#endDate").empty();
			$("#startDate").append("<option>날짜선택</option>");
			$("#endDate").append("<option>최신자</option>");
			var maxNum = data.length;
			data.forEach(function(item,index){
				$("#startDate").append("<option value='"+item[field]+"'>"+item[field+"Dp"]+"</option>");
				$("#endDate").append("<option value='"+data[(maxNum-1-index)][field]+"'>"+data[(maxNum-1-index)][field+"Dp"]+"</option>");
			});
		});
});

// api 테이터를 테이터 table에 기록
function makeApiToTable(){
	var dataKind = $("#dataKind").val();
	var field1 = $("#field1").val();
	var field2 = $("#field2").val();
	var startDate = $("#startDate").val();
	var endDate = $("#endDate").val();

	$.ajax({
			method: "GET",
			url:'/chart/data?apiIdx='+dataKind+'&field1='+field1+'&field2='+field2+'&startDate='+startDate+'&endDate='+endDate,
			dataType:'json'
		}).done(function(data){
			$("#displayData").empty().append("<table id='dataTable'></table>");
			$("#displayData table").addClass('table table-striped table-bordered');

			let tag = "<thead><tr><th contenteditable='true'>"+$("#field1 option:checked").text()+"</th><th contenteditable='true' style='background-color: rgb(77, 201, 246); color: white;'><img src='/svg/line.svg' class='graphKind'><input type='hidden' id='color[]' name='color[]' value='#4dc9f6'><input type='hidden' id='graphType[]' name='graphType[]' value='line'>"+$("#field2 option:checked").text()+"</th></tr></thead><tbody></tbody>";
			$("#displayData table").append(tag);

			data.forEach(function(item,index){
				tag = "<tr><td contenteditable='true'>"+item[field1]+"</td><td contenteditable='true'>"+item[field2]+"</td></tr>";
				$("#displayData table tbody").append(tag);
			});
	});
}

// 과거 데이터 layer 닫기
$("#makedList .btn-close").click(function(){
	$("#makedList").hide("slow");
	$("#dataKind").val('input').trigger('change');
});

// 그래프 완료 버튼 클릭시
$("#btnGraphComplate").click(function(){
    var sendData = {};
	var dataKind = $("#dataKind").val();

	sendData['title'] = $("#chartTitle").val();
	sendData['unitTitle'] = $("#unitTitle").val();
	sendData['source'] = $("#source").val();
	sendData['field1'] = $("#field1").val();
	sendData['field2'] = $("#field2").val();
	sendData['startDate'] = $("#startDate").val();
	sendData['endDate'] = $("#endDate").val();
	sendData['axisX'] = [];
	sendData['axisY'] = [];

	axisY = 0;

	sendData['fieldTitle'] = [];
	$('#displayData th').each(function(){
		if($(this).index()!=0){
			sendData['fieldTitle'].push($(this).text());
		}
	});
	
	sendData['type'] = [];
	$("#displayData table input[id='graphType[]']").each(function(){
		sendData['type'].push($(this).val());
	});

	sendData['color'] = [];
	$("#displayData table input[id='color[]']").each(function(){
		sendData['color'].push($(this).val());
	});

	for(let j=0;j<$("#displayData table tbody td:last-child").index();j++){
		sendData['axisX'][j] = [];
	}

	$('#displayData table tr').each(function(i,n){
		if(i!=0){
			var _row = $(n);

			var rowData = [];
			sendData['axisY'].push(_row.children()[axisY].innerText);
			
			for(var j=1;j<$(_row).find('td').length;j++){
				sendData['axisX'][j-1].push(_row.children()[j].innerText);
			}
		}
	});
	$('#chart1').css('width','600px');

	if(contentChange){
		$.ajax({
				method: "POST",
				url:'/chart/recode',
				data : sendData,
				async: false,
				dataType:'json'
		}).done(function(data){
			$("#gIdx").val(data['idx']);
			$("#chart1>canvas").style;
			canvasToImage();
		});
	}else{
		canvasToImage();
	}
});

// 과거 그래프 선택시 처리
$("#makedListTable tbody").on("click","tr",function(){
	var idx = $(this).find("td:first").data("idx");

	$.ajax({
		method: "GET",
		url:'/chart/makedview?idx='+idx,
		dataType:'json'
	}).done(function(data){
		$("#makedList").hide("slow");
		$("#chartTitle").val(data[0]['title']);
		$("#unitTitle").val(data[0]['unitTitle']);
		$("#source").val(data[0]['source']);
		$("#makeDate").val(data[0]['makeDate'].replace(/([0-9]+)[-]([0-9]+)[-]([0-9]+)[ ]([0-9]+)[:]([0-9]+)[:]([0-9]+).*/, `$1$2`));
		$('#field1').val(undefined);
		$('#field2').val(undefined);
		$('#endDate').val(undefined);

		data[0]['axisX']=JSON.parse(data[0]['axisX']);
		data[0]['axisY']=JSON.parse(data[0]['axisY']);
		data[0]['color']=JSON.parse(data[0]['color']);
		data[0]['fieldTitle']=JSON.parse(data[0]['fieldTitle']);
		data[0]['type']=JSON.parse(data[0]['type']);

		

		fieldSize = data[0]['axisX'].length+1;
		rowSize = data[0]['axisX'][0].length;
		$("#gIdx").val(data[0]['idx']);

		$("#displayData").empty();
		$("#displayData").append('<table id="dataTable" class="table table-striped table-bordered"><thead><tr></tr></thead><tbody></tbody></table>');
		// header 세팅
		var tmp = '';
		for(var i = 0 ; i < fieldSize ; i++  ){
			if(i == 0 ){
				tmp='<th data-color="fff" style="background-color:fff" contenteditable="true">&nbsp;</th>';
			}else{
				tmp+='<th data-color="'+data[0]['color'][(i-1)]+'" style="background-color:'+data[0]['color'][(i-1)]+'" contenteditable="true">'+data[0]['fieldTitle'][(i-1)]+'<img src="/svg/'+data[0]['type'][(i-1)]+'.svg" class="graphKind"><input type="hidden" id="color[]" name="color[]" value="'+data[0]['color'][(i-1)]+'"><input type="hidden" id="graphType[]" name="graphType[]" value="'+data[0]['type'][(i-1)]+'"></th>';
			}
		}
		$("#displayData thead tr").append(tmp);
		
		for(var i = 0 ; i < rowSize ; i++  ){
			tmp = "<tr>";
			for(var j = 0 ; j < fieldSize ; j++  ){
				if(j == 0 ){
					tmp+='<td contenteditable="true">'+data[0]['axisY'][i]+'</td>';
				}else{
					tmp+='<td contenteditable="true">'+data[0]['axisX'][j-1][i]+'</td>';
				}
			}
			tmp += "</tr>";
			$("#displayData tbody").append(tmp);
		}
		tableDraw('displayData');

		contentChange = false;
	});
});

// 옵션에 따른 그래프 Type display
function graphKindOption(state) {
  if (!state.id) {
    return state.text;
  }

  var baseUrl = "/svg/";
  var $state = $('<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.svg" class="graphImage" /> ' + state.text + '</span>');

  $state.find("span").text(state.text);
  $state.find("img").attr("src", baseUrl + "/" + state.element.value.toLowerCase() + ".svg");

  return $state;
};

// 과거 그래프창 검색 키보드 Event 처리
$("#searchKeyword").keyup(function(){
	if (window.event.keyCode == 13) {
		getMakedList();
    }
});

// 과거 그래프창 search 버튼 click Event
$("#btnSearch").click(function(){
	getMakedList();
});

// 과거 그래프 리스트 처리
function getMakedList(page){
	var keyword = $("#searchKeyword").val();
	var page = (!page?1:page);

	$('#makedListTable tbody').empty();

	$.ajax({
		method: "GET",
		url:'/chart/makedList?keyword='+keyword+'&page='+page,
		dataType:'json'
	}).done(function(data){
		data['list'].forEach(function(item,index){
			$('#makedListTable tbody').append('<tr><td data-idx="'+item['idx']+'">'+item['title']+'</td><td>'+item['makeName']+'</td><td>'+item['makeDate']+'</td></tr>');
		});

		var pnc = 10;

		var totPage = Math.ceil(data['maxnum'] / data['prn']);
		// 네비게이션 시작과 끝을 계산
		var startPage = (Math.floor((page-1) / pnc) * pnc) + 1;
		var endPage = startPage + pnc;
		if (endPage > totPage) endPage = totPage;

		$("#makedList .card-body .pagination").empty();
		if(startPage > pnc){
			$("#makedList .card-body .pagination").append('<li class="page-item"><a class="page-link" href="javascript:getMakedList('+(startPage-1)+')">Previous</a></li>');
		}

		for(i=startPage ; i <= endPage ; i++){
			$("#makedList .card-body .pagination").append('<li class="page-item active"><a class="page-link '+(i == page?"active":"")+'" href="javascript:getMakedList('+i+')">'+i+'</a></li>');
		}
		if(endPage < totPage){
			$("#makedList .card-body .pagination").append('<li class="page-item"><a class="page-link" href="javascript:getMakedList('+(endPage+1)+')">Next</a></li>');
		}
	});
}

// table 위치 기록
$(document).on('mousedown', 'td', function(e){
	rowIndex = $(e.target).index();
	columnIndex = $(e.target).parent().index();
})

// 우측마우스 버튼 이벤트 처리
$(document).ready(function(){
	Coloris({
		el: '.coloris'
	});

	var $targ = $('.toolButton');
	$targ.popoverButton({target: '#popover-content', placement: 'bottom'});
	$targ.on('click', function() {});

	// UI 관련 이벤트 //
	$('#dataKind').select2({width:'100%'});
	$('#field1').select2({width:'100px', minimumResultsForSearch: Infinity});
	$('#field2').select2({width:'100px', minimumResultsForSearch: Infinity});
	$('#startDate').select2({width:'110px', minimumResultsForSearch: Infinity});
	$('#endDate').select2({width:'110px', minimumResultsForSearch: Infinity});

	$("#graphType").select2({width:'100%',templateResult: graphKindOption,minimumResultsForSearch: Infinity});

	$("#displayData td").attr('contenteditable',true);
	$("#displayData th").attr('contenteditable',true);
	// UI 관련 이벤트 //

	$("#apiTools select").on('change',function(){
		var field1 = $("#apiTools #field1").val();
		var field2 = $("#apiTools #field2").val();
		var startDate = $("#apiTools #startDate").val();
		var endDate = $("#apiTools #endDate").val();
		startDate = startDate ? startDate:"";
		endDate = endDate ? endDate:"";

		if(field1!= null && field2 != null && startDate!= "" && endDate!= ""){
			makeApiToTable();
		}
	});

	$(document).contextmenu(function(e){
		if(e.target.nodeName == 'TD' || e.target.nodeName == 'TH'){
			showContextMenu(e);
			return false;
		}else{
			$(".contextmenu").hide();
			return false;
		}
	});
	// 마우스 우측 버튼 이벤트 //
	
	$(document).on('click','.graphKind',function(e){
		showContextMenu(e);
	});

	function showContextMenu(e){
		targetNode = e.target.nodeName;

		if(targetNode=="IMG"){
			targetObj=e.target.parentNode;
			targetNode = targetObj.nodeName;
		}else{
			targetObj=e.target;
		}
		rowIndex = $(targetObj).index();
		columnIndex = $(targetObj).parent().index();

		let thisColor = $(targetObj).find('input[id="color[]"]').val()?$(targetObj).find('input[id="color[]"]').val():'#4dc9f6';
		let thisType = $(targetObj).find('input[id="graphType[]"]').val()?$(targetObj).find('input[id="graphType[]"]').val():'line';
		$('#graphColor').val(thisColor);
		$('.clr-field button').css('color',thisColor)
		$('#graphType').val(thisType);
		$("#graphType").trigger("change");
		
		if(rowIndex == 0 || targetObj.nodeName == 'TD'){
			$('#graphColor').prop('disabled','disabled');
			$('#graphType').prop('disabled','disabled')
		}else{
			$('#graphColor').prop('disabled','');
			$('#graphType').prop('disabled','')
		}

		if(targetObj.nodeName ==' TH' ){
			$('#toHead').prop('disabled','disabled');
		}else{				
			$('#toHead').prop('disabled','');
		}

		let thType = $("#displayData table thead th:eq("+(rowIndex)+") input[id='graphType[]']").val();

		// console.log(rowIndex+":"+columnIndex+":"+e.target.nodeName+":"+thType+":"+thisColor+":"+thisType);

		if( thType == 'pie' ||  thType == 'doughnut'){
			$('#graphColor').prop('disabled','');
		}

		let firstGraphtype = $("#displayData table thead th:eq(1) input[id='graphType[]']").val();
		if(rowIndex > 1 && (firstGraphtype=='pie' || firstGraphtype=='doughnut')){
			$("#graphType option").prop('disabled',true);
			$("#graphType option[value='"+firstGraphtype+"']").prop('disabled',false);
			$("#graphType").val(firstGraphtype);
			$("#graphType").trigger("change");
		}else{
			$("#graphType option").prop('disabled',false);
			$("#graphType").trigger("change");
		}

		//Get window size:
		var winWidth = $(document).width();
		var winHeight = $(document).height();
		
		//Get pointer position:
		var posX = e.pageX;
		var posY = e.pageY;
		
		//Get contextmenu size:
		var menuWidth = $(".contextmenu").width();
		var menuHeight = $(".contextmenu").height();
		
		//Security margin:
		var secMargin = 10;
		//Prevent page overflow:
		if(winHeight >= posY + menuHeight){
			posTop = posY + secMargin + "px";
		}else{
			posTop = winHeight - menuHeight - secMargin;
		}

		if(winWidth >= (posX + menuWidth)){
			posLeft = posX - secMargin + "px";
		}else{
			posLeft = menuWidth - menuWidth + "px";
		}

		//Display contextmenu:
		$(".contextmenu").css({
			"left": posLeft,
			"top": posTop
		}).show();
		//Prevent browser default contextmenu.
	}

	$(document).on("change","#graphColor",function(){
		$(this).closest('.clr-field').find('button').css('color',$(this).val());
	});
});


$(".rowFieldChange").on("click",function(){
	var tableArray= Array($('#displayData tr th').length).fill(null).map(()=>Array());
	var graphType = $("#displayData th [id*=graphType]")[0].value;
	$('#displayData tr').each(function(i,row){
		$(row).children().each(function(j, field){
			tableArray[j][i]=$(field).text();
		});
	});

	$('#dataTable').empty();
	$('#dataTable').append('<thead></thead>');
	$('#dataTable').append('<tbody></tbody>');
	tableArray.forEach(function(row, i){
		var rowTxt = "<tr>";
		var defColNum = defColor.length;

		row.forEach(function(field, j){
			if(i == 0){
				if(j == 0 ){
					rowTxt+='<th data-color="fff" style="background-color:fff" contenteditable="true">&nbsp;</th>';
				}else{
					colNum = (j-1) % defColNum;
					rowTxt+='<th data-color="'+defColor[colNum]+'" style="background-color:'+defColor[colNum]+'" contenteditable="true">'+tableArray[i][j]+'<img src="/svg/'+graphType+'.svg" class="graphKind"><input type="hidden" id="color[]" name="color[]" value="'+defColor[colNum]+'"><input type="hidden" id="graphType[]" name="graphType[]" value="'+graphType+'"></th>';
				}
			}else{
				rowTxt += "<td contenteditable='true'>"+field+"</td>";
			}
		});
		rowTxt += "</tr>";
		if(i==0){
			$('#dataTable thead').append(rowTxt);
		}else{
			$('#dataTable tbody').append(rowTxt);
		}
	});

});

// 숫자인지 확인
function isNumber(s) {
  s += '';
  s = s.replace(/^\s*|\s*$/g, '');
  if (s == '' || isNaN(s)) return false;
  return true;
}


// 툴팁
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});

// table 데이터 변경시 
$('#displayData').on("DOMSubtreeModified","table", function(){
	contentChange = true;
});
