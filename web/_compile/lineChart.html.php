<?php /* Template_ 2.2.8 2021/09/26 18:10:48 /webSiteSource/hk/web/_template/lineChart.html 000015668 */ 
$TPL_list_1=empty($TPL_VAR["list"])||!is_array($TPL_VAR["list"])?0:count($TPL_VAR["list"]);?>
<!doctype html>
<html lang="en">
  <head>
    <title>Hankyumg.com Chart Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<script src="/js/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script src="/js/xlsx.mini.js"></script>
<script>
var dataSet = '';
$(function(){
	dataSet = $('#dataSet div').clone();
})

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
	$("#displayExcelHtml").html(XLSX.utils.sheet_to_html (sheet));
	$("#displayExcelHtml table").addClass('table table-striped table-bordered');
	$("#displayExcelHtml").css({'height':'250px','overflow-y':'auto'});
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
			html+='<input type="input" id="tableTitle[]" name="tableTitle[]" style="width:90px;"/><select id="graphType[]" name="graphType[]"><option value="line">Line</option><option value="bar">Bar</option><option value="bubble">Bubble</option><option value="pie">Circle</option><option value="doughnut">Doughnut</option><option value="radar">Radar</option></select><input type="color" class="form-control-color" id="color[]" name="color[]" title="Choose your color">';
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

	//axisY = $("#"+table+" #tableY").val()-1;
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

	for(var j=0;j<title.length;j++){
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

	for(var j=0;j<title.length;j++){
		dataset.datasets.push({
			label:  title[j],
			fill:false,
			backgroundColor:color[j],
			borderColor:color[j],
			data: data['axisX'][j],
			type:type[j]
		});
	}

	drawChart(dataset, type[0], 'chart1');

	
	// script 태그 생성
	script = "<canvas id='chart'></canvas>\n";
	script += "new Chart(document.getElementById('chart'),{";
	script += "	type: '"+type[0]+"',";
	script += "	data: {";

	script += "labels : " + data.axisY.toString();
	script += "datasets:[ ";
	for(var j=0;j<title.length;j++){
		if(j!=0){
	script += "			, ";
		}
	script += "			{ ";
	script += "				label:" + title[j] + ",";
	script += "				fill:false,";
	script += "				backgroundColor:" + color[j] + ",";
	script += "				borderColor:" + color[j] + ",";
	script += "				type:" + type[j] + ",";
	script += "				data:" + data.axisX[j].toString();
	script += "			} ";
	}
	script += "			] ";

	script += "}";
	script += "});";
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
	let cnt = $('#tableExport tr:first td').length;
	let html='';
	for(let i=0;i<cnt;i++){
		html+="<td contenteditable='true'></td>";
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
		$($('#tableExport tr')[i]).find('td').prop('contenteditable',true)
	}
	
	$(eval($('#tableExport tr:first td')[$('#tableExport tr:first td').length-1])).html('<input type="input" id="tableTitle[]" name="tableTitle[]" style="width:100px;"/><select id="graphType[]" name="graphType[]"><option value="line">Line</option><option value="bar">Bar</option><option value="bubble">Bubble</option><option value="pie">Circle</option><option value="doughnut">Doughnut</option><option value="radar">Radar</option></select><input type="color" class="form-control-color" id="color[]" name="color[]" value="#563d7c" title="Choose your color">');
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
	$('#canvasImage').html(imageTag);
	$('#graphImage').attr('src',dataURL);
}

function canvasToScript(){
	$('#canvasScript').val(script);
}
</script>

  </head>
  <body>
	<div class="container-xxl">
		<h1 class="align-middle">Hankyumg.com Chart Example</h1>

		<div class="cnt row mt-4">
			<div class="chartArea col">
				<div class="card">
					<div class="card-header"><h4 class="card-heading">Selector</h4></div>
					<div class="card-body">
						
						<div class="toolBox row">

							<div class="col-md-3">
								<select id="dataKind" class="form-select" data-placeholder="데이터 선택">
									<option></option>
									<option	 value="input">직접입력</option>
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
									<option value="<?php echo $TPL_V1["id"]?>"><?php echo $TPL_V1["title"]?></option>
<?php }}?>
								</select>
							</div>

							<div class="col-md-2">
								<select id="axisX" class="form-select" data-placeholder="X축">
									<option></option>
									<option value="GDP">GDP</option>
									<option value="Year">년도</option>
								</select>
							</div>

							<div class="col-md-2">
								<select id="axisY" class="form-select"  data-placeholder="Y축">
									<option></option>
									<option value="Year">년도</option>
									<option value="GDP">GDP</option>
								</select>
							</div>

							<div class="col-md-2">
								<select id="startDate" class="form-select" data-placeholder="시작일자">
									<option></option>
									<option value="1953">1953</option>
									<option value="1953">1953</option>
									<option value="1953">1953</option>
									<option value="1953">1953</option>
								</select>
							</div>

							<div class="col-md-2">
								<select id="endDate" class="form-select" data-placeholder="종료일자">
									<option></option>
									<option value="2021">2021</option>
								</select>
							</div>

							<div class="col-md-1">
								<input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Choose your color">
							</div>
						</div>

						<div class="row">
							<div class="col-md-12" id="excelExport">
								<div>엑셀 <input type="file" id="excelFile" name="excelFile" onchange="excelExport(event)"/></div>
								<div id="displayExcelHtml"></div>
							</div>

							<div class="col-md-12" id="tableExport">
								테이블 데이터로 그래프 그리기
								<input type="button" value="행 추가" onclick="javascript:tableRowAdd();"/>
								<input type="button" value="행 삭제" onclick="javascript:tableRowDel();"/>
								<input type="button" value="열 추가" onclick="javascript:tableCellAdd();"/>
								<input type="button" value="열 삭제" onclick="javascript:tableCellDel();"/>
								<table class="table table-striped table-bordered">
									<tbody>
										<tr>
											<td><!--input type="input" id="tableY" name="tableY"/--></td>
											<td>
												<input type="input" id="tableTitle[]" name="tableTitle[]" style="width:100px;"/>
												<select id="graphType[]" name="graphType[]">
													<option value="line">Line</option>
													<option value="bar">Bar</option>
													<option value="bubble">Bubble</option>
													<option value="pie">Circle</option>
													<option value="doughnut">Doughnut</option>
													<option value="radar">Radar</option>
												</select>
												<input type="color" class="form-control-color" id="color[]" name="color[]" value="#563d7c" title="Choose your color">
											</td>
										</tr>
										<tr>
											<td contenteditable='true'></td>
											<td contenteditable='true'></td>
										</tr>
									</tbody>
								</table>

							<div class="col-md-12">
								<input type="button" id="tableGraph" name="tableGraph" value="그래프 그리기(엑셀)" onclick="javascript:tableDraw('displayExcelHtml');"/>
								<input type="button" id="tableGraph" name="tableGraph" value="그래프 그리기(테이블)" onclick="javascript:tableDraw('tableExport');"/>
							</div>

							<div class="col-md-12">
								<input type="button" id="canvasData" name="canvasData" value="이미지 태그" onclick="canvasToURL()"/>
								<input type="button" value="스크립트 태그" onclick="canvasToScript()"/>
							</div>


						</div>
					</div>
				</div>
			</div>


				<div class="card">
					<div class="card-header"><h4 class="card-heading">Image Graph</h4></div>
					<div class="card-body">
						<div><img src="" id="graphImage" style="width:100%;"/></div>
					</div>
				</div>
			</div>

			<div class="chartArea col">
				<div class="card">
					<div class="card-header"><h4 class="card-heading">Script Graph</h4></div>
					<div class="card-body">
						<div><figure class="chart" id="chart1"></figure></div>
					</div>
				</div>

				
				<div class="card">
					<div class="card-header"><h4 class="card-heading">javascript</h4></div>
					<div class="card-body">
						<textarea id="canvasScript" name="canvasScript" style="width:100%; height:200px;"></textarea>
					</div>
				</div>
			</div>
		</div>

	</div>

<script>
 // http://hk.kode.co.kr/lineChart/field?apiIdx=6;

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
				backgroundColor:"#ED7E17",
				borderColor:"#ED7E17",
				data: data['axisX']
			}
		]
	};


	new Chart(document.getElementById('chart1'),{
		type: 'line',
		height: 400,
		data: dataset
	});
})
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
	$('#dataKind').select2({});
	$('#axisX').select2({minimumResultsForSearch: Infinity});
	$('#axisY').select2({minimumResultsForSearch: Infinity});
	$('#startDate').select2({minimumResultsForSearch: Infinity});
	$('#endDate').select2({minimumResultsForSearch: Infinity});
});
</script>
<style>
.card {
    border: none;
    -webkit-box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
    box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
	margin-bottom:20px;
}
.card-heading {
    margin-bottom: 0;
    font-size: .9rem;
    font-weight: 400;
    text-transform: uppercase;
    letter-spacing: .2em;
}
.card-header {
    position: relative;
    padding: 1.5rem;
    border-bottom: none;
    background-color: #fff;
    -webkit-box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
    z-index: 2;
}
.card-header:first-child {
    border-radius: calc(1rem - 1px) calc(1rem - 1px) 0 0;
}
.card-body {
    flex: 1 1 auto;
    padding: 2rem;
}

table { table-layout:fixed; }
</style>
  </body>
</html>