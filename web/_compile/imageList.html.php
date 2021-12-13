<?php /* Template_ 2.2.8 2021/07/13 01:32:08 /webSiteSource/hk/web/_template/imageList.html 000016435 */ 
$TPL_companyList_1=empty($TPL_VAR["companyList"])||!is_array($TPL_VAR["companyList"])?0:count($TPL_VAR["companyList"]);?>
<?php $this->print_("top",$TPL_SCP,1);?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /
>
<script src='/lib/locale/ko.js'></script>

<script type='text/javascript' src='/lib/dropzone/dropzone.js'></script>


<link href="https://releases.transloadit.com/uppy/v1.27.0/uppy.min.css" rel="stylesheet">
<script src="https://releases.transloadit.com/uppy/v1.27.0/uppy.min.js"></script>
<script src="/js/lag-radar.js"/>
<script type="text/javascript">
import lagRadar from './lag-radar.js';

const destroy = lagRadar({
  frames: 50,    // number of frames to draw, more = worse performance
  speed: 0.0017, // how fast the sweep moves (rads per ms)
  size: 300,     // outer frame px
  inset: 3,      // circle inset px
  parent: document.body, // DOM node to attach to
});

// later ...
destroy();

var imgId = '';
var imgSrc = '';
var oimgSrc = '';
var imgPath = '';

$(document).ready(function(){
    if('<?php echo $_SESSION["auth"]?>'!='관리자'){
        $('#authField').hide();
        $('#coid').val('<?php echo $_SESSION["coid"]?>');
    }

    if('<?php echo $TPL_VAR["data"]["coid"]?>'){
        $('#coid').val('<?php echo $TPL_VAR["data"]["coid"]?>').prop('selected',true);
    }

    if('<?php echo $TPL_VAR["data"]["category"]?>'){
        $('#category').val('<?php echo $TPL_VAR["data"]["category"]?>').prop('selected',true);
    }

    $('#searchBtn').click(function(){
        $('#frm').attr('action','/image/list').attr('target','').submit();
    });

    $('#searchItem').val('<?php echo $_GET["searchItem"]?>').prop("selected", true);

    $('#datetimepicker1,#datetimepicker2').datetimepicker({
        locale:'ko',
        format:'L',
        allowInputToggle:true,
        showTodayButton:true,
        showClear:true
    });

    var drop = $('.preview').html();
	$('.preview').remove();

    $("div#dropzone").dropzone({ 
        url: "/file/upload",
        previewTemplate: drop,
        success:function(file){
            uploadInfo = JSON.parse(file.xhr.responseText);
            $('#frm_imgUpload').append(
                '<input type="hidden" id="mediaId[]" name="mediaId[]" value="'+uploadInfo['mediaId']+'">' 
            );
        }
    });

    $(document).on('click','#insertBtn',function(){
		console.log('d');
        $.ajax({
            url: '/image/bulkupdate/ajax',
            method : 'POST',
            data : $('#frm_imgUpload').serialize()
        }).done(function(data) {
            alert('저장되었습니다.');
			reload();
        });
    });

	
    $(document).on('click','#cancelBtn',function(){
        $('#myModal').modal('hide');
    });

    $('#myModal').on('hidden.bs.modal',function (){
    });
    
    $('#myModal').on('show.bs.modal',function (){
        $("#dropzone").empty();
        $('#mediaCaption').val('');
        $('#description').val('');
    });


    $("#keyword").keypress(function(e){
        if(e.keyCode==13){
            $("#frm").submit();
        }
    });

    $(document).on("contextmenu dragstart selectstart",function(e){
        return false;
    });

    $(document).on('mousedown', 'body', function(e){
        if($(e.target).hasClass('imgSelect')){
            console.log($(e.target).closest('.imgSelectWraper').data('src'));
            imgId = $(e.target).closest('.imgSelectWraper').data('imgid');
            imgSrc = $(e.target).closest('.imgSelectWraper').data('src');
            oimgSrc = $(e.target).closest('.imgSelectWraper').data('osrc');
            imgPath = $(e.target).closest('.imgSelectWraper').data('path');
        }else if($(e.target).hasClass('layerBtn')){
            console.log('layerbtn');
        }else{
            $('.menuLayer').hide();
        }
    });

    /* 클릭한 위치 근처에 레이어가 나타난다. */
	$(document).on('mousedown', '.imgSelect', function(e){
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

	$(document).on('click','#editorBtn',function(){
		window.open("/image/edit", "imageEdit", "width=1400,height=800");
    });
});

function goEdit(mediaId){
    window.open("/image/editor?mediaId="+mediaId, "imageEdit", "width=1400,height=784");
}

function imageDelete(mediaId,mediaStore,originMediaStore){
    if(confirm('해당 파일을 삭제하시겠습니까')){
        $.ajax({
            url: '/image/delete/ajax',
            method : 'POST',
            data : {'mediaId':mediaId,'mediaStore':mediaStore,'originMediaStore':originMediaStore}
        }).done(function(data) {
            location.href='/image/list';
        });
    }
}

// layer내 버튼 이벤트
function layerEdit(){
    goEdit(imgId);
}

function layerSave(){
    var url = "/download.php?file=."+imgPath;
    $('#downloadFrm').attr('src',url).onload();
}

function layerDelete(){
    imageDelete(imgId,imgSrc,oimgSrc);
}

function reload(){
    window.location = '/image/list'
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
<?php if($_SESSION["auth"]=='관리자'){?>
				<select name="coid" id="coid" class="form-control form-control-sm input-sm wd-150 mg-r-10">
					<option value="">회사 선택</option>
<?php if($TPL_companyList_1){foreach($TPL_VAR["companyList"] as $TPL_V1){?>
					<option value="<?php echo $TPL_V1["coid"]?>"><?php echo $TPL_V1["companyName"]?></option>
<?php }}?>
				</select>
<?php }?>
                <select name="type" id="type" class="form-control form-control-sm wd-150 mg-r-10">
                    <option value="">자료형태</option>
                    <option value="image">이미지</option>
                    <option value="doc">문서</option>
                </select>
                <div class="input-group input-group-sm date wd-150 mg-r-5 mg-b-0" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" id='startDate' name='startDate' value="<?php echo $_GET["startDate"]?>"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div class="input-group input-group-sm date wd-150 mg-r-5 mg-b-0" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" id='endDate' name='endDate' value="<?php echo $_GET["endDate"]?>"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div class="input-group wd-250 mg-r-10 mg-b-0" style="height:calc(1.8125rem + 2px);">
                    <span class="input-group-addon pd-0 bd-0">
                        <select name="searchItem" id="searchItem" class="form-control form-control-sm">
                            <option value="mediaCaption">캡션</option>
                            <option value="createName">업로더</option>
                            <option value="mediaId">이미지 ID</option>
                        </select>
                    </span>
                    <input type="text" class="form-control form-control-sm" id="keyword" name="keyword" placeholder="" value="<?php echo $_GET["keyword"]?>">
                </div>
                <button type="button" class="btn btn-info pd-5 bd-0 mg-r-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="searchBtn" name="searchBtn"><i class="fa fa-search"></i> 검색</button>
                <button type="button" class="btn btn-success pd-5 bd-0 mg-t-0 tx-uppercase tx-13 tx-spacing-2" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> 이미지등록</button>
            </div>
            </form>
            
            <div class="row col-12 pd-x-10 mg-x-0">
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["imageList"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
                <div class="col-md-2 mg-b-10">
                    <div class="card">
                        <div class="card-body pd-0 imgSelect imgSelectWraper" style="min-height: 160px;" data-imgid="<?php echo $TPL_V1["mediaId"]?>"  data-src="<?php echo $TPL_V1["mediaStore"]?>"  data-osrc="<?php echo $TPL_V1["originMediaStore"]?>" data-path="<?php echo $TPL_V1["originMediaPath"]?>">
                            <div class="bg-gray-100 tx-white wd-100p d-table imgSelect" onclick="javascript:goEdit('<?php echo $TPL_V1["mediaId"]?>')" style="width:100%;height:160px;">
<?php if($TPL_V1["mediaType"]!="doc"){?>
                                <span class="d-table-cell valign-middle text-center imgSelect" style="background-image: url('<?php echo $TPL_V1["mediaListPath"]?>');background-repeat: no-repeat;background-position:center;background-size:contain"></span>
<?php }else{?>
                                <a href="javascript:goEdit('<?php echo $TPL_V1["mediaId"]?>') imgSelect"><img class="imgSelect" src="/img/<?php echo $TPL_V1["ext"]?>.png" /></a>
<?php }?>
                            </span></div>
                            <div class="card-content pd-l-10 pd-t-5">
                                <a href="javascript:goEdit('<?php echo $TPL_V1["mediaId"]?>')"><i class="fas fa-edit"></i></a>
                                <!--span class="glyphicon glyphicon-tint"></span-->
                                <a href="/download.php?file=.<?php if($TPL_V1["originMediaPath"]!=''){?><?php echo $TPL_V1["originMediaPath"]?><?php }else{?><?php echo $TPL_V1["mediaPath"]?><?php }?>"><i class="fas fa-save"></i></a>
                                <a href="javascript:imageDelete('<?php echo $TPL_V1["mediaId"]?>','<?php echo $TPL_V1["mediaStore"]?>','<?php echo $TPL_V1["originMediaStore"]?>')"><i class="fas fa-trash"></i></a>
                            </div>
                            
                            <div class="card-action d-flex justify-content-end pd-r-10">
                                <span div class="pd-r-10"><?php echo $TPL_V1["createName"]?></span>
                                <span><?php echo $TPL_V1["createDate"]?></span>
                            </div>	
                        </div>
                    </div>
                </div>
<?php }}?>
            </div>
            <div class="row">
<?php $this->print_("paging",$TPL_SCP,1);?>

            </div>
        </div>
    </div>
</div>
<!-- ########## END: MAIN PANEL ########## -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content wd-800 ht-650">
			<div class="modal-header pd-y-10 pd-x-25">
				<h6 class="modal-title wd-600 tx-black" id="myModalLabel">이미지 업로드</h6>
				<button type="button" class="close tx-28" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
            <form name='frm_imgUpload' id='frm_imgUpload' onsubmit="return false;">
			<div class="modal-body tx-black tx-normal">
                <!--div id="dropzone" style="width:100%;height:300px;border:1px solid;overflow-y: scroll;overflow-x: hidden;" class="flex-container">
                </div>
                <div style="preImg">
                    <div class="preview">
                        <div style="width:135px; height:135px; margin:5px;float:left" class="dz-details flex-item"><img data-dz-thumbnail /></div>
                        <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span>
                    </div>
                </div-->
				<div id="drag-drop-area"></div>
            </div>
            <div class="form-layout form-layout-6">
                <div class="row no-gutters">
                    <div class="col-lg-2 col-sm-4 pd-5-force">캡션</div>
                    <div class="col-lg-10 col-sm-8 pd-5-force"><textarea class="form-control bd-1-force" name="mediaCaption" id="mediaCaption" rows="7"></textarea></div>
                </div>
                <div class="row no-gutters">
                    <div class="col-lg-2 col-sm-4 pd-5-force">메모</div>
                    <div class="col-lg-10 col-sm-8 pd-5-force"><textarea class="form-control bd-1-force" name="description" id="description"></textarea></div>
                </div>
            </div>
            </form>
            <div class="form-layout-footer mg-t-5 text-right">
                <!--button type="button" class="btn btn-secondary pd-10-force" id="cancelBtn">확인</button-->
                <button type="button" class="btn btn-info pd-10-force" id="insertBtn">저장</button>
            </div>
		</div>
	</div>
</div>
</div>
<!-- Modal -->

<div class="menuLayer bg-white bd bd-1">
	<div class="d-flex flex-column pd-10">
        <a href="javascript:layerEdit()" class="layerBtn"><i class="fas fa-edit"></i> 수정</a>
        <!--span class="glyphicon glyphicon-tint"></span-->
        <a href="javascript:layerSave()" class="layerBtn"><i class="fas fa-save"></i> 저장</a>
        <a href="javascript:layerDelete()" class="layerBtn"><i class="fas fa-trash"></i> 삭제</a>
    </div>
</div>
<iframe id="downloadFrm"></iframe>
<script>
var uppy = Uppy.Core({
		debug: true,
		autoProceed: false,
		restrictions: {
			//maxFileSize: 1000000,
			maxNumberOfFiles: 10,
			allowedFileTypes: ['image/*', 'video/*']
		},
		proudlyDisplayPoweredByUppy: false
	})
	.use(Uppy.Dashboard, {
		inline: true,
		target: '#drag-drop-area',
		height: 350,
		metaFields: [
			{ id: 'name', name: 'Name', placeholder: 'file name' },
			{ id: 'caption', name: 'Caption', placeholder: 'describe what the image is about' },
			{ id: 'memo', name: 'Memo', placeholder: 'file Memo' }
		]
	})
	.use(Uppy.ImageEditor, { target: Uppy.Dashboard })
	.use(Uppy.XHRUpload, {
		endpoint: '/file/upload2',
		formData: true,
		bundle: true,
		getResponseData (responseText, response) {
			console.log(responseText, response);
			return {
				url: responseText
			}
		}
	})

	uppy.on('complete', (result) => {
		console.log('Upload complete! We’ve uploaded these files:', result)
	})

	// caption, memo 변경시
	// uppy.getFiles().forEach(file=>{console.log(file);file.meta.memo="test";})

	$('#mediaCaption').on('change',function(){
		uppy.getFiles().forEach(file=>{file.meta.caption=$(this).val();});
	})
	$('#description').on('change',function(){
		uppy.getFiles().forEach(file=>{file.meta.memo=$(this).val();});
	})
	
</script>
</body>
</html>