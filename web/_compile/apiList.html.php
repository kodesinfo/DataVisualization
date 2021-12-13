<?php /* Template_ 2.2.8 2021/12/01 10:27:24 /webSiteSource/hkChart/web/_template/apiList.html 000005658 */ ?>
<?php $this->print_("top",$TPL_SCP,1);?>

<script type="text/javascript">
var chart="";

$(document).ready(function(){
	$('#insertBtn').click(function(){
		location.href='/api/editor';
	});

	$('#delBtn').click(function(){
		var chkCompany = '';
		$("input[name=apiSelect]:checked").each(function(){
			chkCompany += $(this).val() + '|';
		});

		if(chkCompany == '' ){
			alert('Please select the api information to be deleted.');
		}else{
			apiDelete(chkCompany);
		}
	});

	$('#chkSelectAll').click(function(){
		$("input:checkbox[id='reportSelect']").prop('checked', $("input:checkbox[id='chkSelectAll']").is(":checked"));
	});
        
	$('#searchBtn').click(function(){
		$('#frm').attr('action','/api/list').submit();
	});

	$(".bntApiDel").click(function(){
		var idx = $(this).closest('tr').data('idx');
		if(confirm("정말삭제하시겠습니까?")){
		   $.ajax({
				url: '/api/delete/ajax',
				method : 'POST',
				data : {'apiId': idx}
			}).done(function() {
				location.reload();
			});
		}
	});

	$(".btnShowGraph").click(function(){
		var table = $(this).attr('data-graphid');
		$(".modal-header h5").text($(this).closest('tr').find('td:nth-child(2)').text());
		drawChart(table);
		$('#graphModal').show();
	});

	$(".bntCloseModal").click(function(){
		$('#graphModal').hide();
	});
	
});

function apiView(apiId){
    location.href = '/api/Edit?apiId='+apiId;
}

function drawChart(table){
	$.ajax({
		url: "/hkapi/get?id="+table+"&axisY=date&axisX=data",
		method : 'GET',
		dataType : "json"
	}).done(function(data){
		var labelData = new Array();
		var filedData = new Array();
		
		$("#chartDiv").empty().append("<canvas id='chart'></canvas>");

		var dataset = {
			labels:  data['axisY'],
			datasets: [
				{
					fill:false,
					label:  "",
					backgroundColor:"#3a9cff",
					borderColor:"#0866C6",
					data: data['axisX']
				}
			]
		};

		chart = new Chart(document.getElementById('chart'),{
			type: 'line',
			height: 400,
			data: dataset,

		});
	});
}
</script>
<body>
<?php $this->print_("left",$TPL_SCP,1);?>

<?php $this->print_("header",$TPL_SCP,1);?>

<?php $this->print_("right",$TPL_SCP,1);?>

	
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pagebody">
        <div class="br-section-wrapper pd-10-force">
            <form name="frm" id="frm">
            <div class="d-flex align-items-center justify-content-end ht-md-40 mg-b-5">
                <div class="col-lg-3 input-group mg-r-10 pd-b-0">
                    <input class="form-control " name="keyword" id="keyword" placeholder="검색어 입력" type="text" value="<?php echo $_GET["keyword"]?>">
                    <button class="btn input-group-addon pd-t-0 pd-b-0 wd-70" id="searchBtn" name="searchBtn"><i class="fa fa-search"></i> 검색</button>
                </div>
                <button type="button" class="btn btn-success pd-10 bd-0 mg-l-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="insertBtn" name="insertBtn"><i class="fa fa-plus"></i> 작성</button>
            </div>

            <div class="row col-12 pd-x-0 mg-x-0 rounded table-responsive">
                <table class="table mg-b-0 tx-black tx-normal w-100p">
                    <thead>
                        <tr>
							<th>제공사</th>
							<th>분류</th>
                            <th>제목</th>
							<th>주기</th>
							<th>Id</th>
                            <th>작성날짜</th>
							<th>수정날짜</th>
							<th>마지막 업데이트 날짜</th>
							<th></th>
                        </tr>
                    </thead>
                    <tbody>
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["apiList"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
                        <tr data-idx="<?php echo $TPL_V1["idx"]?>">
                            <td><?php echo $TPL_V1["provider"]?></td>
							<td><?php echo $TPL_V1["groupTitle"]?></td>
                            <td><strong><a href="/api/editor?idx=<?php echo $TPL_V1["idx"]?>"><?php echo $TPL_V1["title"]?></a></strong></td>
							<td><?php echo $TPL_V1["dataTerm"]?></td>
							<td><?php echo $TPL_V1["table"]?></td>
                            <td><?php echo $TPL_V1["createDate"]?>(<?php echo $TPL_V1["creater"]?>)</td>
							<td><?php echo $TPL_V1["updateDate"]?>(<?php echo $TPL_V1["updater"]?>)</td>
							<td><?php echo $TPL_V1["lastItemUpdate"]?></td>
							<td><button type="button" class="btn btnShowGraph" data-graphid='<?php echo $TPL_V1["table"]?>' asixx="<?php echo $TPL_V1["axisX"]?>" asixy="<?php echo $TPL_V1["axisY"]?>"><i class="fas fa-signal"></i></button> <button type="button" class="btn bntApiDel" aria-label="Close">X</button></td>
                        </tr>
<?php }}?>
                    </tbody>
                </table>
            </div>
            <div class="row">
<?php $this->print_("paging",$TPL_SCP,1);?>

            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="graphModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:700px;width:700px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn bntCloseModal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
		<div id="chartDiv">
			
		<div>
      </div>
    </div>
  </div>
</div>
<!-- ########## END: MAIN PANEL ########## -->
</body>
</html>