<?php /* Template_ 2.2.8 2021/12/07 15:16:28 /webSiteSource/hkChart/web/_template/chart.html 000012429 */ 
$TPL_list_1=empty($TPL_VAR["list"])||!is_array($TPL_VAR["list"])?0:count($TPL_VAR["list"]);?>
<!doctype html>
<html lang="en">
<head>
<title>경제지표 차트</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/bootstrap-popover-x.min.css">
<link rel="stylesheet" href="/css/hkChart.css?v=2021110401">
<link rel="stylesheet" href="/css/coloris.css">

<script src="/js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="/js/xlsx.mini.js"></script>
<script src="/js/bootstrap-popover-x.min.js"></script>
<script src="/js/coloris.js?v=123123123"></script>  

<style>
label.input-group-text {width: 80px;text-align: center;display: flex;justify-content: center;}
</style>
</head>
<body>
<div class="container-xxl">
	<div class="cnt row mt-2">
		<div class="chartArea col">
			<div class="card">
				<div class="card-body">
					<div class="input-group pb-1"><label for="chartTitle" class="input-group-text">차트제목</label><input type="text" id="chartTitle" name="chartTitle" class="form-control"/></div>
					<div class="input-group pb-1"><label for="unitTitle" class="input-group-text">단 &nbsp;&nbsp;&nbsp;&nbsp;위</label><input type="text" id="unitTitle" name="unitTitle" class="form-control"/></div>
					<div class="input-group pb-1"><label for="source" class="input-group-text">자료출처</label><input type="text" id="source" name="source" class="form-control"/></div>
						<input type="hidden" id="gIdx">
						<input type="hidden" id="makeDate" value="<?php echo date('Ym')?>">
						<select id="dataKind" class="form-select" data-placeholder="데이터 선택">
							<option	value="input">통계 데이터 입력</option>
							<option	value="maked">과거 그래프</option>
<?php if($TPL_list_1){foreach($TPL_VAR["list"] as $TPL_V1){?>
							<option value="<?php echo $TPL_V1["idx"]?>" data-table="<?php echo $TPL_V1["table"]?>" data-provider="<?php echo $TPL_V1["provider"]?>" data-unit="<?php echo $TPL_V1["unit_name"]?>"><?php echo $TPL_V1["title"]?><?php if($TPL_V1["dataTerm"]){?>[<?php echo $TPL_V1["dataTerm"]?>]<?php }?></option>
<?php }}?>
						</select>
						<div id="apiTools"  class="mt-1" style="display:none;">
							<select id="field1" class="form-select" data-placeholder="필드 선택">
							</select>

							<select id="field2" class="form-select" data-placeholder="필드 선택">
							</select>

							<select id="startDate" class="form-select" data-placeholder="필드 선택">
							</select>

							<select id="endDate" class="form-select" data-placeholder="필드 선택">
							</select>
							<!-- button id="selectData" type="button" class="btn btn-primary btn-sm">완료</button -->
						</div>
						<div id="excelTools" class="mt-1">
							<input type="file"  class="form-control form-control-sm" id="excelFile" name="excelFile" onchange="excelExport(event)"/>
						</div>
						<div id="tableTool">
							<span class="tableButton">
								<span class="toolButton" tabindex="0" data-toggle="popover">
									<svg width="24" height="24" class="addTable" data-bs-toggle="tooltip" data-bs-placement="bottom" title="표 만들기"><path fill-rule="nonzero" d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h14zM5 14v4h6v-4H5zm14 0h-6v4h6v-4zm0-6h-6v4h6V8zM5 12h6V8H5v4z"></path></svg>
								</span>

								<span class="rowFieldChange" data-bs-toggle="tooltip" data-bs-placement="bottom" title="기준축 변경"><img src="/image/row_field_change.svg" style="wdith:22px;height:22px;margin:2px;"></span>

								<svg width="24" height="24" class="prependRow" data-bs-toggle="tooltip" data-bs-placement="bottom" title="위에 1행 삽입"><path fill-rule="nonzero" d="M6 4a1 1 0 110 2H5v6h14V6h-1a1 1 0 010-2h2c.6 0 1 .4 1 1v13a2 2 0 01-2 2H5a2 2 0 01-2-2V5c0-.6.4-1 1-1h2zm5 10H5v4h6v-4zm8 0h-6v4h6v-4zM12 3c.5 0 1 .4 1 .9V6h2a1 1 0 010 2h-2v2a1 1 0 01-2 .1V8H9a1 1 0 010-2h2V4c0-.6.4-1 1-1z"></path></svg>

								<svg width="24" height="24" class="addRow" data-bs-toggle="tooltip" data-bs-placement="bottom" title="아래에 1행 삽입"><path fill-rule="nonzero" d="M12 13c.5 0 1 .4 1 .9V16h2a1 1 0 01.1 2H13v2a1 1 0 01-2 .1V18H9a1 1 0 01-.1-2H11v-2c0-.6.4-1 1-1zm6 7a1 1 0 010-2h1v-6H5v6h1a1 1 0 010 2H4a1 1 0 01-1-1V6c0-1.1.9-2 2-2h14a2 2 0 012 2v13c0 .5-.4 1-.9 1H18zM11 6H5v4h6V6zm8 0h-6v4h6V6z"></path></svg>

								<svg width="24" height="24" class="delRow" data-bs-toggle="tooltip" data-bs-placement="bottom" title="행 삭제"><path fill-rule="nonzero" d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h14zm0 2H5v3h2.5v2H5v2h2.5v2H5v3h14v-3h-2.5v-2H19v-2h-2.5V9H19V6zm-4.7 1.8l1.2 1L13 12l2.6 3.3-1.2 1-2.3-3-2.3 3-1.2-1L11 12 8.5 8.7l1.2-1 2.3 3 2.3-3z"></path></svg>

								<svg width="24" height="24" class="prependColumn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="왼쪽에 1열 삽입"><path fill-rule="nonzero" d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H4a1 1 0 01-1-1v-2a1 1 0 012 0v1h8V6H5v1a1 1 0 11-2 0V5c0-.6.4-1 1-1h15zm0 9h-4v5h4v-5zM8 8c.5 0 1 .4 1 .9V11h2a1 1 0 01.1 2H9v2a1 1 0 01-2 .1V13H5a1 1 0 01-.1-2H7V9c0-.6.4-1 1-1zm11-2h-4v5h4V6z"></path></svg>

								<svg width="24" height="24" class="addColumn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="오른쪽에 1열 삽입"><path fill-rule="nonzero" d="M20 4c.6 0 1 .4 1 1v2a1 1 0 01-2 0V6h-8v12h8v-1a1 1 0 012 0v2c0 .5-.4 1-.9 1H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h15zM9 13H5v5h4v-5zm7-5c.5 0 1 .4 1 .9V11h2a1 1 0 01.1 2H17v2a1 1 0 01-2 .1V13h-2a1 1 0 01-.1-2H15V9c0-.6.4-1 1-1zM9 6H5v5h4V6z"></path></svg>

								<svg width="24" height="24" class="delColumn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="열 삭제"><path fill-rule="nonzero" d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h14zm-4 4h-2V6h-2v2H9V6H5v12h4v-2h2v2h2v-2h2v2h4V6h-4v2zm.3.5l1 1.2-3 2.3 3 2.3-1 1.2L12 13l-3.3 2.6-1-1.2 3-2.3-3-2.3 1-1.2L12 11l3.3-2.5z"></path></svg>
							</span>
						</div>

						<div id="displayData">
							<table class="table table-striped table-bordered">
								<thead><tr><th></th><th></th></tr></thead>
								<tbody>
									<tr><td></td><td></td></tr>
									<tr><td></td><td></td></tr>
									<tr><td></td><td></td></tr>
									<tr><td></td><td></td></tr>
									<tr><td></td><td></td></tr>
									<tr><td></td><td></td></tr>
									<tr><td></td><td></td></tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>

			<div class="chartArea col">
				<div class="card">
					<div class="card-body" style="height: 607px;">
						<div style="height: 500px;"><figure class="chart" id="chart1"></figure></div>


						<div class="col-md-12 mt-3" style="text-align: right;text-align: right;position: absolute;bottom: 20px;right: 10px;}">
							<input type="button" class="btn btn-success" id="tableGraph" name="tableGraph" value="그래프 그리기" onclick="javascript:tableDraw('displayData');"/>
							<input type="button" id="btnGraphComplate" class="btn btn-primary" value="완료"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<div class="card" id="makedList" style="display:none;">
	<div class="card-header">
		<h4 class="card-heading">과거 리스트</h4>
		<div class="input-group makedSearch" >
		  <input type="text" id="searchKeyword" class="form-control" placeholder="검색어입력">
		  <button class="btn btn-success" type="button" id="btnSearch">검색</button>
		</div>
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	<div class="card-body">
		<table id="makedListTable" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th>제목</th><th>만든사람</th><th>만든날짜</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<nav aria-label="Page navigation" class="d-flex justify-content-center">
		  <ul class="pagination"> 
		  </ul>
		</nav>
	</div>
</div>


<ul class="contextmenu">
	<li style="display: flex;flex-wrap: wrap;align-items: center;">
		 <div class="full"><input type="text" class="coloris" id="graphColor" name="graphColor" title="Choose your color">&nbsp;</div> <label for="graphColor">그래프 색상</label>
	</li>
	<li>
		<select id="graphType" name="graphType" class="form-control">
			<option value="line">Line</option>
			<option value="bar">Bar</option>
			<option value="bubble">Bubble</option>
			<option value="pie">Circle</option>
			<option value="doughnut">Doughnut</option>
			<option value="radar">Radar</option>
		</select>
	</li>
	<li><a href="javascript:moveToHead();" id="toHead">기본축으로 지정</a></li>
	<!-- li><a href="javascript:return false" class="rowFieldChange"><img src="/image/row_field_change.svg" width="24" height="24"> 기준축 변경</a></li -->
	<li><a href="javascript:tableRowAdd();"><svg width="24" height="24" class="addRow" data-title="1행 삽입
"><path fill-rule="nonzero" d="M12 13c.5 0 1 .4 1 .9V16h2a1 1 0 01.1 2H13v2a1 1 0 01-2 .1V18H9a1 1 0 01-.1-2H11v-2c0-.6.4-1 1-1zm6 7a1 1 0 010-2h1v-6H5v6h1a1 1 0 010 2H4a1 1 0 01-1-1V6c0-1.1.9-2 2-2h14a2 2 0 012 2v13c0 .5-.4 1-.9 1H18zM11 6H5v4h6V6zm8 0h-6v4h6V6z"></path></svg> 1행 삽입</a></li>
	<li><a href="javascript:tableColumnAdd();"><svg width="24" height="24" class="addField" data-title="1열 삽입
"><path fill-rule="nonzero" d="M20 4c.6 0 1 .4 1 1v2a1 1 0 01-2 0V6h-8v12h8v-1a1 1 0 012 0v2c0 .5-.4 1-.9 1H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h15zM9 13H5v5h4v-5zm7-5c.5 0 1 .4 1 .9V11h2a1 1 0 01.1 2H17v2a1 1 0 01-2 .1V13h-2a1 1 0 01-.1-2H15V9c0-.6.4-1 1-1zM9 6H5v5h4V6z"></path></svg> 1열 삽입</a></li>
	<li><a href="javascript:tableRowDel();"><svg width="24" height="24" class="delRow" data-title="행 삭제"><path fill-rule="nonzero" d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h14zm0 2H5v3h2.5v2H5v2h2.5v2H5v3h14v-3h-2.5v-2H19v-2h-2.5V9H19V6zm-4.7 1.8l1.2 1L13 12l2.6 3.3-1.2 1-2.3-3-2.3 3-1.2-1L11 12 8.5 8.7l1.2-1 2.3 3 2.3-3z"></path></svg> 행 삭제</a></li>
	<li><a href="javascript:tableColumnDel();"><svg width="24" height="24" class="delField" data-title="열 삭제"><path fill-rule="nonzero" d="M19 4a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6c0-1.1.9-2 2-2h14zm-4 4h-2V6h-2v2H9V6H5v12h4v-2h2v2h2v-2h2v2h4V6h-4v2zm.3.5l1 1.2-3 2.3 3 2.3-1 1.2L12 13l-3.3 2.6-1-1.2 3-2.3-3-2.3 1-1.2L12 11l3.3-2.5z"></path></svg> 열 삭제</a></li>
	<li class="d-flex"><button type="button" class="form-control btn-success w-50" onclick="javascript:graphSetting();">확인</button><button type="button" class="form-control btn-light w-50" onclick="javascript:$('.contextmenu').hide();">취소</button></li>
</ul>

<!-- PopoverX content -->
<div id="popover-content" class="popover popover-x popover-default">
	<div class="popover-body popover-content d-flex">
		<input type='text' id='row' name='row' class="form-control"/>
		<span>x</span>
		<input type='text' id='column' name='column' class="form-control"/>
	</div>
	<div class="popover-footer">
		<button type="button" class="btn btn-sm btn-primary" onclick="javascript:createTable();">확인</button><button type="button" class="btn btn-sm btn-default btn-outline-secondary" onclick="javascript:$('#popover-content').hide();">취소</button>
	</div>
</div>
<script src="/js/hkChartScript.js?v=2021120701"></script>
</body>
</html>