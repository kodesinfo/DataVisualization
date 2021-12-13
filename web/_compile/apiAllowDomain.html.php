<?php /* Template_ 2.2.8 2021/10/28 18:09:50 /webSiteSource/hkChart/web/_template/apiAllowDomain.html 000001364 */ ?>
<?php $this->print_("top",$TPL_SCP,1);?>

<script type="text/javascript">
var chart="";

$(document).ready(function(){
	$('#btnSaveDomain').click(function(){
		saveDomain();
	});
});

function saveDomain(){
	var data = {};
	data['allowDomain'] = $("#allowDomain").val();
	$.ajax({
		url: "/api/saveAllowDomain",
		data : data,
		method : 'POST',
		dataType : "json"
	}).done(function(data){
		alert('저장되었습니다.');
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
			<h3>Domain 허용</h3>
			<div class="row pd-20">
				<textarea class="form-control" id="allowDomain" rows="15"><?php echo $TPL_VAR["list"]["allowDomain"]?></textarea>
			</div>

			<div class="row pd-l-10 mg-b-20">
				<div style="float:left;margin-left:50px;">
					<button type="button" class="btn btn-primary" id="btnSaveDomain"><i class="fa fa-save"></i> 저장</button>
				</div>
			</div>
        </div>
    </div>
</div>

</body>
</html>