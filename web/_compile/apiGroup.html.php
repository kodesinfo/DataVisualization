<?php /* Template_ 2.2.8 2021/11/30 19:03:44 /webSiteSource/hkChart/web/_template/apiGroup.html 000006340 */ ?>
<?php $this->print_("top",$TPL_SCP,1);?>

<style>
.btnGrpEdit{cursor:pointer}
.btnGrpDel{cursor:pointer}
.ui-state-highlight {margin:10px; width:250px; border:1px dotted black; border-radius:3px; height: 100px; line-height: 1.2em; }
#grpList .grpBox{margin:10px;}
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
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
            </form>
			<div class="grpList d-flex flex-wrap" id="grpList">

				<div class="grpBox bg-white rounded shadow-base overflow-hidden wd-250 pd-b-20 position-relative">
					<div class="position-absolute" style="right:5px;"><i class="fas fa-edit btnGrpEdit"></i> <i class="fas fa-trash-alt tx-danger btnGrpDel"></i></div>
					<div class="pd-x-20 pd-t-20 d-flex align-items-center">
					   <div class="mg-l-20">
					   	 <input type="hidden" name="idx" id="idx[]" value="1">
						 <p class="tx-32 tx-inverse tx-lato tx-black mg-b-5 lh-1 grpTitle"></p>
						  <span class="modifyData tx-10 tx-roboto tx-gray-400">임성묵</span>
					   </div>
					</div>
				</div>

			</div>			
			<div class="mg-20 text-right"><button class="btn btn-primary" id="btnSortSave" name="btnSortSave"><i class="fas fa-save"></i> 순서저장</button></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="groupModal" tabindex="-1" aria-labelledby="groupModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:300px;width:300px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="groupModalLabel">Group Input</h5>
        <button type="button" class="btn bntCloseModal" aria-label="Close">X</button>
      </div>
      <div class="modal-body d-flex" style="align-items: flex-end">
		<label class="col-sm-4 form-control-label">제 목</label>
		<input type="hidden" id="idx" value="">
		<input type="text" class="form-control" placeholder="그룹 이름" name="title" id="title" autocomplete="off" maxlength="60">
      </div>
	  <div class="d-flex pd-10 justify-content-around">
		<button class="btn btn-danger btnSave" id="bntCancel" name="bntCancel"><i class="fas fa-ban"></i> 취소</button>
		<button class="btn btn-primary" id="btnGrpSave" name="btnGrpSave"><i class="fas fa-save"></i> 저장</button>
	  </div>
    </div>
  </div>
</div>
<!-- ########## END: MAIN PANEL ########## -->
<script>
var chart="";

$(document).ready(function(){
	var grpBoxTmp = $(".grpBox").clone();
	$(".grpBox").remove();

	$.ajax({
		url: '/api/groupList?returnType=ajax',
		method : 'POST',
		dataType : "json",
		contentType: "application/json; charset=utf-8",
	}).done(function(result) {
		result.list.apiList.forEach(function(item, index){
			var obj = grpBoxTmp.clone();
			var worker = (item.modifer ? item.modifer+"("+item.modifyDate+")" : item.maker+"("+item.makeDate+")");
			obj.find('[name=idx]').val(item.idx);
			obj.find('.grpTitle').text(item.groupTitle);
			obj.find('.modifyData').text(worker);

			$(".grpList").append(obj);
		});
	});
	

	$( "#grpList" ).sortable({
		placeholder: "ui-state-highlight"
    });

	$('#searchBtn').click(function(){
		$('#frm').attr('action','/api/list').submit();
	});

	$(".bntCloseModal").click(function(){
		$('#groupModal').hide();
	});

	$("#insertBtn").on("click",function(){
		$('#groupModal').show();
		$('#groupModal #groupModalLabel').text('Group Input');
		$('#groupModal #idx').val("");
		$('#groupModal #title').val("");

		return;
	});

	$("#btnSortSave").click(function(){
		var idx = [];
		$(".grpList [id^=idx]").each(function(index,item){
			idx.push(item.value);
		});
		
		$.ajax({
			url: '/api/groupSort/ajax',
			method : 'POST',
			data : {'idxs': JSON.stringify(idx)},
			dataType : "json"
		}).done(function(result) {
			
		});
	});

	$(".grpList").on("click",".btnGrpEdit",function(){
		var parent = $(this).closest(".grpBox");
		var idx = parent.find("input[id^=idx]").val();
		var title = parent.find(".grpTitle").text();
		$('#groupModal').show();
		$('#groupModal #groupModalLabel').text('Group Modify');
		$('#groupModal #idx').val(idx);
		$('#groupModal #title').val(title);
	});

	$(".grpList").on("click",".btnGrpDel", function(){
		if(confirm("정말 삭제하시 겠습니까?")){
			var parent = $(this).closest(".grpBox");
			var idx = parent.find("input[id^=idx]").val();
			var title = parent.find(".grpTitle").text();

			$.ajax({
				url: '/api/groupDelete/ajax',
				method : 'POST',
				data : {'idx': idx,'groupTitle':title},
				dataType : "json"
			}).done(function(result) {
				$(".grpList").find("[name='idx']").filter('[value='+result.data.idx+']').closest(".grpBox").remove();
			});
		}
	});	

	$(document).on("click","#btnGrpSave",function (){
		var parent = $(this).closest('.modal-content');
		var idx = parent.find("#idx").val();
		var title = parent.find("#title").val();

		$.ajax({
			url: '/api/groupUpdate',
			method : 'POST',
			data : {'idx': idx,'groupTitle':title}
		}).done(function() {
			location.reload();
		});
	});
});
</script>
</body>
</html>