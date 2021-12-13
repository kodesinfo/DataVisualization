<?php /* Template_ 2.2.8 2021/12/05 14:41:26 /webSiteSource/hkChart/web/_template/apiEditor.html 000016011 */ ?>
<?php $this->print_("top",$TPL_SCP,1);?>

<script type='text/javascript' src='/lib/dropzone/dropzone.js'></script>
<script type="text/javascript" src="/js/jquery.ajax-cross-origin.min.js"></script>
<body>
<?php $this->print_("left",$TPL_SCP,1);?>

<?php $this->print_("header",$TPL_SCP,1);?>

<?php $this->print_("right",$TPL_SCP,1);?>


	<!-- ########## START: MAIN PANEL ########## -->
	<div class="br-mainpanel">
		<div class="br-pagebody">
			<div class="br-section-wrapper pd-5-force">
				<form method="post" name="apiFrm" id="apiFrm" role="form">
				<input type="hidden" id="coid" name="coid" value="<?php echo $_SESSION["auth"]["coid"]?>"/>
				<input type="hidden" id="idx" name="idx" value="<?php echo $_GET['idx']?>"/>
				<div class="form-layout form-layout-4 pd-5 d-flex flex-wrap tx-black tx-normal">
					<div class="row col-xl-6 mg-y-5">
						<label class="col-sm-4 form-control-label">API ID<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="API ID명(알파벳, 숫자,-,_)" name="id" id="id" autocomplete="off" maxlength="60" value="<?php echo $TPL_VAR["list"]["apiList"][ 0]["id"]?>">
						</div>
					</div>
					<div class="row col-xl-6 mg-y-5">
						<label class="col-sm-4 form-control-label">제 목<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0 d-flex">
							<select id="grpId" name="grpId" class="select2" style="width:70px;">
								<option value="">그룹</option>
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["apiGroup"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
								<option value="<?php echo $TPL_V1["idx"]?>"><?php echo $TPL_V1["groupTitle"]?></option>
<?php }}?>
							</select>
							<input type="text" class="form-control" placeholder="API 명칭" name="title" id="title" autocomplete="off" maxlength="50" value="<?php echo $TPL_VAR["list"]["apiList"][ 0]["title"]?>" style="padding: 19px;">
							<select id="dataTerm" name="dataTerm" class="select2 wd-150">
								<option value="">데이터주기</option>
								<option value="일">일</option>
								<option value="월">월</option>
								<option value="분기">분기</option>
								<option value="년">년</option>
							</select>
						</div>
					</div>
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">제공사<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="정보 제공사명" name="provider" id="provider" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["provider"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["provider"]?><?php }else{?>한국은행<?php }?>">
						</div>
					</div>
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">API 문서 종류<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<select id="returnType" name="returnType" class="select2 wd-200">
								<option value="JSON">JSON</option>
								<option value="XML">XML</option>
							</select>
						</div>
					</div>	
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">API Key<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="API Key값" name="apiKey" id="apiKey" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["apiKey"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["apiKey"]?><?php }else{?>98HR5KGSPSFKE1JTE7VR<?php }?>">
						</div>
					</div>
					<div class="row col-xl-6 mg-y-5">
						<label class="col-sm-4 form-control-label">API Url<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0 input-group">
							<input type="text" class="form-control" placeholder="API URL주소(주소중 키값이 들어가는 곳은 <?php echo $TPL_VAR["key"]?>로 표기)" aria-describedby="button-addon1" name="url" id="url" value="<?php echo $TPL_VAR["list"]["apiList"][ 0]["url"]?>">
							<div class="input-group-prepend">
								<button class="btn btn-outline-secondary" type="button" id="bnt_dataCheck">데이터 검증</button>
							</div>
						</div>
					</div>
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">날짜 형식</label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="PHP 날짜 형식(20200801 => 'Ymd', 2020-08-01 => 'Y-m-d')" name="dateChar" id="dateChar" value='<?php if($TPL_VAR["list"]["apiList"][ 0]["dateChar"]==""){?>date("Ymd")<?php }else{?><?php echo htmlentities($TPL_VAR["list"]["apiList"][ 0]["dateChar"])?><?php }?>'>
						</div>
					</div>				
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">리스트 태그 (xml, json 배열 표기)</label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="Rss 형식의 경우 [channel][item]" name="listTag" id="listTag" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["listTag"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["listTag"]?><?php }else{?>['StatisticSearch']['row']<?php }?>">
						</div>
					</div>
					
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">주간 실행</label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0 ">
							<table class="table table-bordered bg-light text-center">
								<tr>
									<th class="text-center text-danger font-weight-bolder"><label for="sun ">일</label></th>
									<th class="text-center"><label for="mon">월</label></th>
									<th class="text-center"><label for="tue">화</label></th>
									<th class="text-center"><label for="wed">수</label></th>
									<th class="text-center"><label for="thu">목</label></th>
									<th class="text-center"><label for="fri">금</label></th>
									<th class="text-center text-primary font-weight-bolder"><label for="sat">토</label></th>
								</tr>
								<tr>
									<td><input type="checkbox" id="sun" name="workWeek[]" value="0"></td>
									<td><input type="checkbox" id="mon" name="workWeek[]" value="1"></td>
									<td><input type="checkbox" id="tue" name="workWeek[]" value="2"></td>
									<td><input type="checkbox" id="wed" name="workWeek[]" value="3"></td>
									<td><input type="checkbox" id="thu" name="workWeek[]" value="4"></td>
									<td><input type="checkbox" id="fri" name="workWeek[]" value="5"></td>
									<td><input type="checkbox" id="sat" name="workWeek[]" value="6"></td>
								</tr>
							</table>
						</div>
					</div>

					<div class="row col-xl-6 mg-b-6">
						<label class="col-sm-4 form-control-label">실행시간대</label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0 align-middle" style="display: flex;">
								<input type="text" class="form-control mg-r-5" placeholder="시작시간 (00:00)" name="startTime" id="startTime" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["startTime"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["startTime"]?><?php }else{?><?php echo date('H:i',strtotime('+1 minutes'))?><?php }?>">~
								<input type="text" class="form-control mg-l-5" placeholder="종료시간 (24:00)" name="endTime" id="endTime" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["endTime"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["endTime"]?><?php }else{?><?php echo date('H:i',strtotime('+6 minutes'))?><?php }?>">
							</div>

							<label class="col-sm-4 form-control-label">실행 간격</label>
							<div class="col-sm-8 mg-t-10 mg-sm-t-0">
								<input type="text" class="form-control" placeholder="시작시간 ~ 종료시간 까지의 실행 간격(분)" name="everyFewMinutes" id="everyFewMinutes" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["everyFewMinutes"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["everyFewMinutes"]?><?php }else{?>0<?php }?>">
							</div>
					</div>

					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">실행 간격</label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="시작시간 ~ 종료시간 까지의 실행 간격(분)" name="everyFewMinutes" id="everyFewMinutes" value="<?php if($TPL_VAR["list"]["apiList"][ 0]["everyFewMinutes"]){?><?php echo $TPL_VAR["list"]["apiList"][ 0]["everyFewMinutes"]?><?php }else{?>0<?php }?>">
						</div>
					</div>

					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">데이버베이스명</label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="저장할 데이터베이스 이름" name="database" id="database" value="api" readonly>
						</div>
					</div>
					<div class="row col-xl-6 mg-b-5">
						<label class="col-sm-4 form-control-label">테이블명<span class="tx-danger">*</span></label>
						<div class="col-sm-8 mg-t-10 mg-sm-t-0">
							<input type="text" class="form-control" placeholder="데이터를 저장할 테이블명" name="table" id="table" value="<?php echo $TPL_VAR["list"]["apiList"][ 0]["table"]?>">
						</div>
					</div>

					<div class="row col-sm-12">
						<label class="col-sm-2 form-control-label">테이블 세팅<button class="btn btn-success mg-l-10 btn-addRow" type="button">+</button></label>
						<div class="col-sm-9">
							<table id="collectionField" class="table table-striped">
								<tr>
									<th>연번</th>
									<th>API태그명</th>
									<th>저장 필드명</th>
									<th>키필드 여부</th>
									<th>기본값</th>
									<th>필드설명</th>
								</tr>
								<tr class="tmp_row">
									<td class="no"></td>
									<td><input type="text" class="form-control" placeholder="추가 태그명을 입력하세요" name="tag[]" id="tag[]"></td>
									<td><input type="text" class="form-control" placeholder="DB에 저장하시려면 필드명을 입력하세요" name="field[]" id="field[]"></td>
									<td><input type="checkbox" class="form-control" name="keyField[]" id="keyField[]" value=""></td>
									<td><input type="text" class="form-control" placeholder="기본값을 입력하세요" name="defaultValue[]" id="defaultValue[]"></td>
									<td class="d-flex flex-row">
										<input type="text" class="form-control" placeholder="설명문을 입력하세요" name="remark[]" id="remark[]">
									</td>
								</tr>

<?php if(is_array($TPL_R1=$TPL_VAR["list"]["apiList"][ 0]["tag"])&&!empty($TPL_R1)){$TPL_I1=-1;foreach($TPL_R1 as $TPL_V1){$TPL_I1++;?>
								<tr class="tr_row">
									<td class="no"><?php echo $TPL_I1+ 1?></td>
									<td><input type="text" class="form-control" placeholder="추가 태그명을 입력하세요" name="tag[]" id="tag[]" value="<?php echo $TPL_V1?>"></td>
									<td><input type="text" class="form-control" placeholder="DB에 저장하시려면 필드명을 입력하세요" name="field[]" id="field[]" value="<?php echo $TPL_VAR["list"]["apiList"][ 0]["field"][$TPL_I1]?>" <?php if($TPL_VAR["list"]["apiList"][ 0]["field"][$TPL_I1]!=""){?>readonly<?php }?>></td>
									<td><input type="checkbox" class="form-control" name="keyField[]" id="keyField_<?php echo $TPL_I1?>" value="<?php echo $TPL_I1?>" <?php if($TPL_VAR["list"]["apiList"][ 0]["keyField"][$TPL_I1]){?>checked<?php }?>></td>
									<td><input type="text" class="form-control" placeholder="기본값을 입력하세요" name="defaultValue[]" id="defaultValue[]" value="<?php echo htmlentities($TPL_VAR["list"]["apiList"][ 0]["defaultValue"][$TPL_I1])?>"></td>
									<td class="d-flex flex-row">
										<input type="text" class="form-control" placeholder="설명문을 입력하세요" name="remark[]" id="remark[]" value="<?php echo $TPL_VAR["list"]["apiList"][ 0]["remark"][$TPL_I1]?>">
									</td>
								</tr>
<?php }}?>
							</table>
						</div>
					</div>
				
					<div class="row col-xl-12 d-md-flex pd-y-20 pd-md-y-0 align-items-center justify-content-end">
						<button type="button" class="btn btn-success pd-y-7 pd-x-10 bd-0 mg-md-l-10 mg-t-10 tx-uppercase tx-13 tx-spacing-2" name="insertProcBtn" id="insertProcBtn">API Insert</button>
					</div>
				</div>
				</form>
			</div>
		</div>

	</div>
</div>

<script type="text/javascript">
<?php if($_GET['idx']==""){?>
	var action='insert';
<?php }else{?>
	var action='modify';
	$("#insertProcBtn").text('API Update');
<?php }?>

var dataTerm = '<?php echo $TPL_VAR["list"]["apiList"][ 0]["dataTerm"]?>';
var row = $(".tmp_row").clone();
$(".tmp_row").remove();

$("#bnt_dataCheck").click(function (){
	var key = $("#apiKey").val();
	var rt = $("#returnType").val();
	var apiUrl = $("#url").val();
	apiUrl = apiUrl.replace(/[{]key[}]/i,key);
	apiUrl = escape(apiUrl.replace(/[{]date[}]/i,'20200804'));

	$.ajax({
		crossOrigin: true,
		url: '/getApi.php?url='+apiUrl,
		method : 'GET',
		returnType : "json",
		success : function(data) {
			// obj = eval(data);
			obj = JSON.parse(data);
			var listTag = $("#listTag").val();
			if(listTag!=""){
				eval("obj = obj"+listTag);
			}
			var index = 1;
			$(".tr_row").remove();

			$.each(obj[0],function(key,value){
				var rowTmp = row.clone();
				rowTmp.find(".no").text(index++);
				rowTmp.find("[name^='tag']").val(key);
				rowTmp.find("[name^='keyField']").val(index-2);
				rowTmp.find("[name^='remark']").val(value);
				$("#collectionField").append(rowTmp);
			});
		}
	});
});

$(document).on('click','.btn-addRow',function (){
	var rowTmp = row.clone();
	var number = $("#collectionField").find("tr").length;
	rowTmp.find(".no").text($("#collectionField").find("tr").length);
	rowTmp.find('[type="checkbox"]').val(number-1);
	$("#collectionField").append(rowTmp);
});

$("#insertProcBtn").click(function (){
    if($('#title').val()==''){
        alert('제목을 입력하세요');
        $('#title').focus();
        return;
    }
    if($('#provider').val()==''){
        alert('제공사를 입력하세요');
        $('#apiTitle').focus();
        return;
    }
    if($('#apiKey').val()==''){
        alert('API키 값을 입력하세요');
        $('#apiTitle').focus();
        return;
    }
    if($('#url').val()==''){
        alert('읽어올 API URL을 입력하세요');
        $('#apiTitle').focus();
        return;
    }
    if($('#table').val()==''){
        alert('저당될 테이블명을 입력하세요');
        $('#table').focus();
        return;
    }

    $.ajax({
        url: '/api/'+action+'/ajax',
        method : 'POST',
        data : $('#apiFrm').serialize()
    }).done(function() {
		//location.href='/api/list';
		location.reload();
    });
});

$(document).ready(function() {
<?php if($TPL_VAR["list"]["apiList"][ 0]["workWeek"]){?>
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["apiList"][ 0]["workWeek"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
	$("[name^='workWeek'][value='<?php echo $TPL_V1?>']").attr("checked", true);
<?php }}?>
<?php }else{?>
	$("[name^='workWeek'][value='0']").attr("checked", true);
	$("[name^='workWeek'][value='1']").attr("checked", true);
	$("[name^='workWeek'][value='2']").attr("checked", true);
	$("[name^='workWeek'][value='3']").attr("checked", true);
	$("[name^='workWeek'][value='4']").attr("checked", true);
	$("[name^='workWeek'][value='5']").attr("checked", true);
	$("[name^='workWeek'][value='6']").attr("checked", true);
<?php }?>
	$("#dataTerm").val(dataTerm);
	$("#dataTerm").select2({width:'150',minimumResultsForSearch: Infinity});

	$("#grpId").val(<?php echo $TPL_VAR["list"]["apiList"][ 0]["grpId"]?>);
	$("#grpId").select2({width:'170',minimumResultsForSearch: Infinity});
});

$("#grpId").select2({width:'resolve'});

$("#id").change(function(){
	$("#table").val($("#id").val());
})
</script>
</body>
</html>