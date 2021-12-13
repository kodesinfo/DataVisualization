<?php /* Template_ 2.2.8 2021/10/11 15:58:59 /webSiteSource/hk/web/_template/lineChart2.html 000031207 */ 
$TPL_list_1=empty($TPL_VAR["list"])||!is_array($TPL_VAR["list"])?0:count($TPL_VAR["list"]);?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="/js/xlsx.mini.js"></script><!-- Excel 관련 라이브러리 -->

	
<script>
var defColor=['#4dc9f6','#f67019','#f53794','#537bc4','#acc236','#166a8f','#00a950','#58595b','#8549ba'];

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


function excelExport(event){
	excelExportCommon(event, handleExcelDataAll);
}
function excelExportCommon(event, callback){
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var fileData = reader.result;
        var wb = XLSX.read(fileData, {type : 'binary'});
        var sheetNameList = wb.SheetNames; // 시트 이름 목록 가져오기 
        var firstSheetName = sheetNameList[0]; // 첫번째 시트명
        var firstSheet = wb.Sheets[firstSheetName]; // 첫번째 시트 
        callback(firstSheet);      
    };
    reader.readAsBinaryString(input.files[0]);
}
function handleExcelDataAll(sheet){
	handleExcelDataHeader(sheet); // header 정보 
	handleExcelDataJson(sheet); // json 형태
	handleExcelDataCsv(sheet); // csv 형태
	handleExcelDataHtml(sheet); // html 형태
}
function handleExcelDataHeader(sheet){
    var headers = get_header_row(sheet);
    $("#displayHeaders").html(JSON.stringify(headers));
}
function handleExcelDataJson(sheet){
    $("#displayExcelJson").html(JSON.stringify(XLSX.utils.sheet_to_json (sheet)));
}
function handleExcelDataCsv(sheet){
    $("#displayExcelCsv").html(XLSX.utils.sheet_to_csv (sheet));
}
function handleExcelDataHtml(sheet){
	$("#displayExcelHtml").html(XLSX.utils.sheet_to_html (sheet, {header:"<table border='1'>", footer:"</table>"}));

	var range = XLSX.utils.decode_range(sheet['!ref']);
    var C, R = range.s.r; /* start in the first row */
    /* walk every column in the range */

	/* Header 추가 */
	var html = '';
    for(C = range.s.c; C <= range.e.c; ++C) {
		if(C==0){
			html+='<td></td>';
		}else{
			html+="<td>";
			html+='<input type="input" id="tableTitle[]" name="tableTitle[]"/><select id="graphType[]" name="graphType[]"><option value="line">Line Graph</option><option value="bar">Bar Graph</option><option value="bubble">Bubble Graph</option><option value="pie">Circle Graph</option><option value="doughnut">Doughnut Graph</option><option value="radar">Radar Graph</option></select><input type="color" class="form-control-color" id="color[]" name="color[]" value="#563d7c" title="Choose your color">';
			html+="</td>";
		}
	}
	$("#displayExcelHtml tbody").prepend("<tr>"+html+"</tr>");
}
// 출처 : https://github.com/SheetJS/js-xlsx/issues/214
function get_header_row(sheet) {
    var headers = [];
    var range = XLSX.utils.decode_range(sheet['!ref']);
    var C, R = range.s.r; /* start in the first row */
    /* walk every column in the range */
    for(C = range.s.c; C <= range.e.c; ++C) {
        var cell = sheet[XLSX.utils.encode_cell({c:C, r:R})] /* find the cell in the first row */

        var hdr = "UNKNOWN " + C; // <-- replace with your desired default 
        if(cell && cell.t) hdr = XLSX.utils.format_cell(cell);

        headers.push(hdr);
    }
    return headers;
}


function tableDraw(target){
	tableToGraph(target);
}
/**
 * Table 정보를 읽어서 그래프를 그린다.
 **/
var script='';
function tableToGraph(table){
    var data = [];
	data['axisX'] = [];
	data['axisY'] = [];

	axisY = 0;

	title = [];
	$("#"+table+" input[id='tableTitle[]']").each(function(){
		title.push($(this).val());
	});
	/*axisX = [];
	$("#"+table+" input[id='tableX[]']").each(function(){
		axisX.push($(this).val());
	});*/
	type = [];
	$("#"+table+" select[id='graphType[]']").each(function(){
		type.push($(this).val());
	});
	$("#"+table+" #graphType option:selected").val();
	color = [];
	$("input[id='color[]']").each(function(){
		color.push($(this).val());
	});

	for(let j=0;j<title.length;j++){
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
			/*{
				label:  title,
				fill:false,
				backgroundColor:color,
				borderColor:color,
				data: data['axisX']
			}*/
		]
	};

	for(let j=0;j<title.length;j++){
		/*var datatemp=[];
		datatemp.label=title[j];
		datatemp.fill=false;
		datatemp.backgroundColor=color[j];
		datatemp.borderColor=color[j];
		datatemp.data=data['axisX'][j];
		if(j!=0){datatemp.type=type[j];}*/
		
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
			//backgroundColor:color[j],
			//borderColor:color[j],
			backgroundColor:colors,
			borderColor:colors,
			data: data['axisX'][j],
			type:type[j]
		});
		//dataset.datasets.push(datatemp);
	}

	drawChart(dataset, type[0], 'chart1');

	
	// script 태그 생성
	script = "<canvas id='chart'></canvas>\n";
	script += "<script>\n";
	script += "new Chart(document.getElementById('chart'),{\n";
	script += "	type: '"+type[0]+"',\n";
	script += "	data: {\n";

	script += "		labels : ";
	
	for(let i=0;i<data.axisY.length;i++){
	script += (i==0?"[":"")+"'"+data.axisY[i]+"'"+(i==data.axisY.length-1?'], \n':',');
	}

	script += "		datasets:[ \n";
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
			script += "			, \n";
		}
		script += "			{ \n";
		script += "				label: '" + title[j] + "',\n";
		script += "				fill:false,\n";
		script += "				backgroundColor: " + colors + "' \n";
		script += "				borderColor: " + colors + "' \n";
		script += "				type: '" + type[j] + "',\n";
		script += "				data:";

		for(let i=0;i<data.axisX[j].length;i++){
		script +=  (i==0?"[":"")+"'"+data.axisX[j][i]+"'"+(i==data.axisX[j].length-1?']\n':',');
		}

		script += "			} \n";
	}
	script += "			] \n";

	script += "}\n";
	script += "});\n";
	script += "</"+"script>";
	// script 태그 생성
}

function makeCanvas(id) {
	var container = document.getElementById(id);
	var canvas = document.createElement('canvas');
	var ctx = canvas.getContext('2d');

	container.innerHTML = '';
	canvas.width = container.offsetWidth;
	canvas.height = container.offsetHeight;
	container.appendChild(canvas);

	return ctx;
}
function drawChart(dataset, type, div){
	new Chart(makeCanvas('chart1'),{
		type: type,
		data: dataset
	});
}

function tableRowAdd(){
	let firsttype = $("#tableExport select[id='graphType[]']:first").val();

	let cnt = $('#tableExport tr:first td').length;
	let html='';
	for(let i=0;i<cnt;i++){
		html+="<td contenteditable='true'>"+((firsttype=="pie" || firsttype=="doughnut") && i!=0 ?'<input type="color" class="form-control-color" id="mcolor[]" name="mcolor[]" value="'+defColor[
		($('#tableExport tr').length-1)%defColor.length]+'" title="Choose your color">':"")+"</td>";
	}
	$('#tableExport tbody').append("<tr>"+html+"</tr>");
}

function tableRowDel(){
	if($('#tableExport tr').length>1){
		$('#tableExport tr')[$('#tableExport tr').length-1].remove();
	}
}

function tableCellAdd(){
	for(let i=0;i<$('#tableExport tr').length;i++){
		$('#tableExport tr')[i].insertCell(-1);
		$($('#tableExport tr')[i]).find('td').prop('contenteditable',true);
	}
	
	$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).html('<input type="input" id="tableTitle[]" name="tableTitle[]"/><select id="graphType[]" name="graphType[]"><option value="line">Line Graph</option><option value="bar">Bar Graph</option><option value="bubble">Bubble Graph</option><option value="pie">Circle Graph</option><option value="doughnut">Doughnut Graph</option><option value="radar">Radar Graph</option></select><input type="color" class="form-control-color" id="color[]" name="color[]" value="'+defColor[($('#tableExport tr:first td').length-1)%defColor.length]+'" title="Choose your color">');

	
	let firsttype = $("select[id='graphType[]']:first").val();
	if(firsttype == 'pie' || firsttype == 'doughnut'){
		$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).find("select[id='graphType[]']").val(firsttype);

		$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).find("select[id='graphType[]'] option").prop('disabled',true);
		$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).find("select[id='graphType[]'] option[value='"+firsttype+"']").prop('disabled',false);
	}else{
		$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).find("select[id='graphType[]'] option").prop('disabled',false);
		$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).find("select[id='graphType[]'] option[value='pie']").prop('disabled',true);
		$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).find("select[id='graphType[]'] option[value='doughnut']").prop('disabled',true);
	}
}

function tableCellDel(){
	if($('#tableExport tr:first td').length>2){
		for(let i=0;i<$('#tableExport tr').length;i++){
			$('#tableExport tr')[i].deleteCell(-1);
		}
	}
}

function datasetAdd(){
	$('#dataSet').append(dataSet);
}

function datasetDel(){
	if($('#dataSet div').length>1){
		$('#dataSet div')[$('#dataSet div').length-1].remove()
	}
}

function canvasToURL(){
	var canvas = document.getElementById('chart1').getElementsByTagName('canvas')[0];
	var dataURL = canvas.toDataURL();
	var imageTag = "<img src='"+dataURL+"'/>";
	$('#canvasImage').val(imageTag);
	$('#graphImage').attr('src',dataURL);
}

function canvasToScript(){
	$('#canvasScript').val(script);
}

function tableAdd(){
}

$(document).on("contextmenu dragstart selectstart",function(e){
	return false;
});

/* 클릭한 위치 근처에 레이어가 나타난다. */
$(document).on('mousedown', 'td', function(e){
	if(e.which == 3){
		//alert('마우스 우측 이벤트')
		var sWidth = window.innerWidth;
		var sHeight = window.innerHeight;

		var oWidth = $('.menuLayer').width();
		var oHeight = $('.menuLayer').height();

		// 레이어가 나타날 위치를 셋팅한다.
		var divLeft = e.clientX + 10;
		var divTop = e.clientY + 5;

		// 레이어가 화면 크기를 벗어나면 위치를 바꾸어 배치한다.
		if( divLeft + oWidth > sWidth ) divLeft -= oWidth;
		if( divTop + oHeight > sHeight ) divTop -= oHeight;

		// 레이어 위치를 바꿔서 상단기준점(0,0) 밖으로 벗어난다면 상단기준점(0,0)에 배치한다.
		if( divLeft < 0 ) divLeft = 0;
		if( divTop < 0 ) divTop = 0;

		$('.menuLayer').css({
			"top": divTop,
			"left": divLeft,
			"position": "absolute"
		}).show();
	}
});

</script>
<style>
#displayExcelHtml, #tableExport{height:200px;overflow-y:scroll;}
#displayExcelHtml table, #tableExport table{width:100%;}
td{border: 1px solid #3e3e3e;min-width:100px;}
</style>
<title>Hankyumg.com Chart Example</title>
</head>
<body>
<div class="menuLayer bg-white bd bd-1">
	<div class="d-flex flex-column pd-10">
        <a href="javascript:layerDelete()" class="layerBtn">삭제</a>
    </div>
</div>

<div class="container-xxl">
	<h1 class="align-middle">Hankyumg.com Chart Example</h1>

	<div class="toolBox row">

		<div class="col-md-2">
			<label for="dataKind" class="form-label">데이터 종류</label>
			<select id="dataKind" class="form-select">
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
				<option value="<?php echo $TPL_V1["id"]?>"><?php echo $TPL_V1["title"]?></option>
<?php }}?>
			</select>
		</div>

		<div class="col-md-2">
			<label for="dataKind" class="form-label">X축</label>
			<select id="dataKind" class="form-select">
				<option value="GDP">GDP</option>
				<option value="Year">년도</option>
			</select>
		</div>

		<div class="col-md-2">
			<label for="dataKind" class="form-label">Y축</label>
			<select id="dataKind" class="form-select">
				<option value="Year">년도</option>
				<option value="GDP">GDP</option>
			</select>
		</div>

		<div class="col-md-2">
			<label for="dataKind" class="form-label">시작일자</label>
			<select id="dataKind" class="form-select">
				<option value="1953">1953</option>
				<option value="1953">1953</option>
				<option value="1953">1953</option>
				<option value="1953">1953</option>
			</select>
		</div>

		<div class="col-md-2">
			<label for="dataKind" class="form-label">종료일자</label>
			<select id="dataKind" class="form-select">
				<option value="2021">2021</option>
			</select>
		</div>

		<div class="col-md-1">
			<label for="exampleColorInput" class="form-label">대상색상</label>
			<input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
		</div>

		<div class="col-md-1">
			<button>-</button>
			<button>+</button>

		</div>

		<div class="col-md-12" id="excelExport">
			<div>엑셀 <input type="file" id="excelFile" name="excelFile" onchange="excelExport(event)"/></div>

			<!--div id="displayHeaders"></div>
			<div id="displayExcelJson"></div-->
			<div id="displayExcelHtml"></div>
		</div>

		<div class="col-md-12" id="tableExport">
			테이블 데이터로 그래프 그리기
			<input type="button" value="테이블 추가" onclick="javascript:tableAdd();"/>
			<input type="button" value="행 추가" onclick="javascript:tableRowAdd();"/>
			<input type="button" value="행 삭제" onclick="javascript:tableRowDel();"/>
			<input type="button" value="열 추가" onclick="javascript:tableCellAdd();"/>
			<input type="button" value="열 삭제" onclick="javascript:tableCellDel();"/>
			<table border="1">
				<tbody>
					<tr>
						<td><!--input type="input" id="tableY" name="tableY"/--></td>
						<td>
							<input type="input" id="tableTitle[]" name="tableTitle[]"/>
							<select id="graphType[]" name="graphType[]">
								<option value="line">Line</option>
								<option value="bar">Bar</option>
								<option value="bubble">Bubble</option>
								<option value="pie">Circle</option>
								<option value="doughnut">Doughnut</option>
								<option value="radar">Radar</option>
							</select>
							<input type="color" class="form-control-color" id="color[]" name="color[]" value="#4dc9f6" title="Choose your color">
						</td>
					</tr>
					<tr>
						<td contenteditable='true'></td>
						<td contenteditable='true'></td>
					</tr>
				</tbody>
			</table>
		</div>

		<!--div class="col-md-12" id="tableDraw">
			<label for="tableY" class="form-label">라벨</label> : <input type="input" id="tableY" name="tableY"/>

			<input type="button" value="데이터 추가" onclick="javascript:datasetAdd();"/>
			<input type="button" value="데이터 삭제" onclick="javascript:datasetDel();"/>

			<div id="dataSet">
				<div class="dataSet">
					<label for="tableTitle[]" class="form-label">타이틀</label> : <input type="input" id="tableTitle[]" name="tableTitle[]"/>

					<label for="tableX[]" class="form-label">데이타</label> : <input type="input" id="tableX[]" name="tableX[]"/>

					<label for="graphType[]" class="form-label">타입</label> :
						<select id="graphType[]" name="graphType[]">
							<option value="line">Line Graph</option>
							<option value="bar">Bar Graph</option>
							<option value="bubble">Bubble Graph</option>
							<option value="pie">Circle Graph</option>
							<option value="doughnut">Doughnut Graph</option>
							<option value="radar">Radar Graph</option>
						</select>
					
					<label for="color[]" class="form-label">대상색상</label>
					<input type="color" class="form-control-color" id="color[]" name="color[]" value="#563d7c" title="Choose your color">
				</div>
			</div>
		</div-->

		<div class="col-md-12">
			<input type="button" id="tableGraph" name="tableGraph" value="그래프 그리기(엑셀)" onclick="javascript:tableDraw('displayExcelHtml');"/>
			<input type="button" id="tableGraph" name="tableGraph" value="그래프 그리기(테이블)" onclick="javascript:tableDraw('tableExport');"/>
		</div>
		
		<div class="col-md-12">
			<div>이미지 주소 <input type="button" id="canvasData" name="canvasData" value="이미지 태그" onclick="canvasToURL()"/></div>
			<div><textarea id="canvasImage" name="canvasImage" style="width:100%;"></textarea></div>
		</div>
		
		<div class="col-md-12">
			<div>스크립트 태그 <input type="button" value="스크립트 태그" onclick="canvasToScript()"/></div>
			<div><textarea id="canvasScript" name="canvasScript" style="width:100%;" cols="6"></textarea></div>
		</div>

	</div>

	<div class="cnt row mt-4">
		<div class="chartArea col">
			<!--canvas id="chart1" class="chart"></canvas-->
			<div><figure class="chart" id="chart1"></figure></div>

			<div><img src="" id="graphImage" style="width:100%;"/></div>
			<!--div class="chartTitle">Line Graph</div>
			<canvas id="chart2" class="chart"></canvas>
			<div class="chartTitle">Bar Graph</div>

			<canvas id="chart4" class="chart"></canvas>
			<div class="chartTitle">Bubble Chart</div>
		</div>
		<div class="chartArea col">
			<canvas id="chart3" class="chart"></canvas>
			<div class="chartTitle">Circle Graph</div>

			<canvas id="chart5" class="chart"></canvas>
			<div class="chartTitle">Doughnut Chart</div>

		</div>
		<div class="chartArea col">
			<canvas id="chart6" class="chart"></canvas>
			<div class="chartTitle">Radar Chart</div-->

		</div>
	</div>
</div>



<style>
.tox .tox-insert-table-picker {
    display: flex;
    flex-wrap: wrap;
    width: 170px;
}
.tox .tox-insert-table-picker>div {
    border-color: #ccc;
    border-style: solid;
    border-width: 0 1px 1px 0;
    box-sizing: border-box;
    height: 17px;
    width: 17px;
}
</style>
<div id="tableTooltip" class="tox">
	<div class="tox-insert-table-picker">
		<div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div>
		<div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div>
		<div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div>
		<div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div>
		<div role="button" tabindex="-1"></div>
		<div role="button" tabindex="-1"></div>
		<div role="button" tabindex="-1"></div>
		<div role="button" tabindex="-1"></div>
		<div role="button" tabindex="-1"></div>
		<div role="button" tabindex="-1"></div>
		<div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div>
		<div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1" class="tox-insert-table-picker__selected"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><div role="button" tabindex="-1"></div><span id="size-label_3416117002211632988122469" class="tox-insert-table-picker__label">4x5</span></div>
</div>

<script>
$.ajax({
	url: "http://hk.kode.co.kr/hkapi/get?id=krGDP&axisY=Year&axisX=GDP",
	method : 'GET',
	dataType : "json"
}).done(function(data){
	var labelData = new Array();
	var filedData = new Array();

	var dataset = {
		labels:  data['axisY'],
		datasets: [
			{
				label:  "대한민국 GDP",
				fill:false,
				backgroundColor:"#ED7E17",
				borderColor:"#ED7E17",
				data: data['axisX']
			}
		]
	};
	
	drawLineChart(dataset);
})

function drawLineChart(dataset){
	new Chart(makeCanvas('chart1'),{
		type: 'line',
		data: dataset
	});
}
</script>

<!--script>
$.ajax({
	url: "http://hk.kode.co.kr/hkapi/get?id=krGDP&axisY=Year&axisX=GDP",
	method : 'GET',
	dataType : "json"
}).done(function(data){
	var labelData = new Array();
	var filedData = new Array();

	var dataset = {
		labels:  data['axisY'],
		datasets: [
			{
				label:  "대한민국 GDP",
				fill:false,
				backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#884EA0', '#D35400'],
				borderColor:"#ED7E17",
				data: data['axisX']
			}
		]
	};


	new Chart(document.getElementById('chart2'),{
		type: 'bar',
		data: dataset
	});
})
</script>


<script>
$.ajax({
	url: "http://hk.kode.co.kr/hkapi/get?id=krGDP&axisY=Year&axisX=GDP",
	method : 'GET',
	dataType : "json"
}).done(function(data){
	var labelData = new Array();
	var filedData = new Array();

	var dataset = {
		labels:  data['axisY'],
		datasets: [
			{
				label:  "대한민국 GDP",
				fill:false,
				backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#884EA0', '#D35400'],
				data: data['axisX']
			}
		]
	};


	new Chart(document.getElementById('chart3'),{
		type: 'pie',
		data: dataset,
	});
})
</script>

<script>
$.ajax({
	url: "http://hk.kode.co.kr/hkapi/get?id=krGDP&axisY=Year&axisX=GDP",
	method : 'GET',
	dataType : "json"
}).done(function(data){
	var labelData = new Array();
	var filedData = new Array();

	var dataset = {
		labels:  data['axisY'],
		datasets: [
			{
				label:  "대한민국 GDP",
				fill:false,
				backgroundColor: ['#CB4335', '#1F618D', '#F1C40F'],
				data: data['axisX']
			}
		]
	};


	new Chart(document.getElementById('chart4'),{
		type: 'bubble',
		data: dataset,
	});
})
</script>
<script>
$.ajax({
	url: "http://hk.kode.co.kr/hkapi/get?id=krGDP&axisY=Year&axisX=GDP",
	method : 'GET',
	dataType : "json"
}).done(function(data){
	var labelData = new Array();
	var filedData = new Array();

	var dataset = {
		labels:  data['axisY'],
		datasets: [
			{
				label:  "대한민국 GDP",
				fill:false,
				backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#884EA0', '#D35400','#DDDDDD'],
				data: data['axisX']
			}
		]
	};


	new Chart(document.getElementById('chart5'),{
		type: 'doughnut',
		data: dataset,
	});
})
</script>

<script>
$.ajax({
	url: "http://hk.kode.co.kr/hkapi/get?id=krGDP&axisY=Year&axisX=GDP",
	method : 'GET',
	dataType : "json"
}).done(function(data){
	var labelData = new Array();
	var filedData = new Array();

	var dataset = {
		labels:  data['axisY'],
		datasets: [
			{
				label:  "대한민국 GDP",
				fill:false,
				backgroundColor: ['#CB4335', '#1F618D', '#F1C40F', '#27AE60', '#884EA0', '#D35400','#DDDDDD'],
				data: data['axisX']
			}
		]
	};


	new Chart(document.getElementById('chart6'),{
		type: 'radar',
		data: dataset,
	});
})
</script-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

	
    <link rel="stylesheet" href="/css/coloris.css">
	<script src="/js/coloris.js"></script>
<input type="text" class="coloris" value="#cc458faa">
    <script type="text/javascript">
Coloris({
  el: '.coloris'
});
    </script>
  </body>
</html>