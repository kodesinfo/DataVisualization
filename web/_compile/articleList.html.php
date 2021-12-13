<?php /* Template_ 2.2.8 2021/07/13 02:09:49 /webSiteSource/hk/web/_template/articleList.html 000024128 */ ?>
<?php $this->print_("top",$TPL_SCP,1);?>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /
>
<script>
var pageWord = "newsView";
$(document).ready(function(){
    $('#searchBtn').click(function(){
        $("#searchForm").submit();
    })

    $('.table-responsive').responsiveTable({'stickyTableHeader':false,'addFocusBtn':false,'addDisplayAllBtn':false});

    $('#datetimepicker1, #datetimepicker2').datetimepicker({
        locale:'ko',
        format: 'L',
        sideBySide: true,
        toolbarPlacement: 'bottom',
        allowInputToggle: true
    });

     $('#category').val('<?php echo $_GET["category"]?>');

     $('#series').val('<?php echo $_GET["series"]?>');

	if('<?php echo $_GET["searchItem"]?>' != ''){
		$('#searchItem').val('<?php echo $_GET["searchItem"]?>');
	}else{
		$('#searchItem').val('title');
	}

<?php if($GLOBALS["Get"]["serviceType"]!="embago"){?>
<?php if($TPL_VAR["gSiteCode"]!=""){?>
	getPageView();
<?php }?>
<?php }?>

	if('<?php echo $_GET["series"]?>' != ''){
		$('#series').val('<?php echo $_GET["series"]?>').prop('selected',true);
	}

	/*<?php if($_GET["mainPlace"]){?>
    $("#mainPlace").val("<?php echo $_GET["mainPlace"]?>").prop("selected", true);
<?php }?>
	$('#mainPlace').on("change",function(){
		setBannerPlace();
	});
	setBannerPlace('<?php echo $_GET["placeNum"]?>');*/
});

$(function(){
	$("#keyword").on('keydown',function(key){
		if (key.keyCode == 13) {
			$("#searchForm").attr({'action':'/article/list','target':'_self'}).submit();
		}
	});
});

var getPageView =function(){
	filters = '<?php if(is_array($TPL_R1=$TPL_VAR["list"]["articleList"])&&!empty($TPL_R1)){$TPL_S1=count($TPL_R1);$TPL_I1=-1;foreach($TPL_R1 as $TPL_V1){$TPL_I1++;?>dimension1==<?php echo $TPL_V1["aid"]?><?php if($TPL_I1!=$TPL_S1- 1){?>,<?php }?><?php }}?>';
	$.ajax({
		url: "/statistics/pageview/ajax",
		method : 'POST',
		data: {"filters" : filters},
		dataType : "json"
	})
	.done(function(data){
        for(var i=0; i< data.length; i++){
			//console.log('before',$("#pv_"+data[i]['aid']).text());
			//console.log('pv',data[i]['pv']);
			$("#pv_"+data[i]['aid']).text($("#pv_"+data[i]['aid']).text()==""?Number(data[i]['pv']):Number($("#pv_"+data[i]['aid']).text())+Number(data[i]['pv']));
			//console.log('after',$("#pv_"+data[i]['aid']).text());
		}
	});
};

$(document).on('click',".articlePreview",function(){
	var aid=$(this).data('aid');
	var type = $(this).data('type');
	var domain = type=="mobile"?"<?php echo $TPL_VAR["domainMobile"]?>":"<?php echo $TPL_VAR["domain"]?>";
	 $.ajax({
		url: '/article/infojson?aid='+aid,
		type: 'GET',
		contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
		dataType: 'json',
		success: function (data) {
			if(data.firstPublishDate==undefined){
				$("#previewForm #title").val(data.title);
				$("#previewForm #subTitle").val(data.subTitle);
				$("#previewForm #expTitle").val(data.subTitle);
				$("#previewForm #expSubTitle").val(data.expSubTitle);
				$("#previewForm #content").val(data.content);
				$("#previewForm #aid").val(data.aid);
				$("#previewForm #firstPublishDate").val(data.writeDate);
				$("#previewForm #tags").val(data.tags);
				$("#previewForm #viewTmp").val(data.viewTmp);
				$("#previewForm").attr("method","POST");
				$("#previewForm").attr("action", domain+"/newsView/kuk0000000000");
				$("#previewForm").submit();
			}else{
				window.open(domain+"/newsView/"+data.aid, "_blank");
			}
		}
	 });
});

var coid = '<?php echo $_SESSION["coid"]?>';
function setBannerPlace(/*option*/ place){

    if($("#mainPlace option").length == 1 ){
        $("#mainPlace").hide();
        $("#placeNum").hide();
    }else{
        var layoutId = $("#mainPlace").val();
        $("#placeNum").empty();
        if(layoutId!=""){
            $.ajax({
                url: '/data/'+coid+'/'+layoutId+'Info.json',
                type: 'GET',
                cache: false,
                dataType: "json",
                success: function (data) {
                    var obj = JSON.parse(data);
                    $(obj).each(function(idx,obj){
                        if(obj.objType=="article"){
                            $("#placeNum").append("<option value='"+obj.objId+"'>"+obj.title+"</option>");
                        }
                    });
                },
                error:function(err){
                    $("#placeNum").append("<option value=''>기사영역 없음</option>");
                    $("#placeNum").val('').prop("selected", true);
                },
                complete : function(){
                    if(place!="") $("#placeNum").val(place).prop("selected", true);
                }
            });
        }
    }
}
</script>
<style>
.table th, .table td {
    padding: 5px 10px !important;
}
.publishedKind span {
    display: block;
    font-size: 12px;
}
.categories{font-size: 12px;}
div.tooltip-inner{background: #fff;border:1px solid #ddd;color:black;}
#the-list tr {height: 60px;
</style>
<body>
<?php $this->print_("left",$TPL_SCP,1);?>

<?php $this->print_("header",$TPL_SCP,1);?>

<?php $this->print_("right",$TPL_SCP,1);?>


<form name="previewForm" id="previewForm" target="_blank" method="post">
<input type="hidden" name="title" id="title">
<input type="hidden" name="subTitle" id="subTitle">
<input type="hidden" name="expTitle" id="expTitle"> 
<input type="hidden" name="expSubTitle" id="expSubTitle"> 
<input type="hidden" name="content" id="content"> 
<input type="hidden" name="aid" id="aid"> 
<input type="hidden" name="firstPublishDate" id="firstPublishDate">
<input type="hidden" name="tags" id="tags">
<input type="hidden" name="viewTmp" id="viewTmp">
</form>
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
	<div class="br-pagebody">
		<div class="br-section-wrapper pd-10-force">
            <form name="searchForm" id="searchForm">
			<div class="d-flex flex-wrap align-items-center justify-content-end ht-xl-40 mg-b-5">
                <input type='hidden' name='aid' id="aid"/>
                <input type="hidden" name="serviceType" value="<?php echo $_GET['serviceType']?>">
                <input type="hidden" name="sort" value="<?php echo $_GET['sort']?>">
                <input type="hidden" name="order" value="<?php echo $_GET['order']?>">

<?php if($_SESSION['auth']["authName"]=='슈퍼관리자'){?>
					<select name="coid" id="coid" class="form-control form-control-sm wd-150 mg-r-5 mg-b-0">
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["allCompany"]["companyList"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
							<option class="level-0" value="<?php echo $TPL_V1["coid"]?>"><?php echo $TPL_V1["companyName"]?></option>
<?php }}?>
					</select>
<?php }?>

                <select name="category" id="category" class="form-control form-control-sm wd-150 mg-r-5 mg-b-0">
                    <option value="">모든 카테고리</option>
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["allCategory"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
                    <option class="level-0" value="<?php echo $TPL_V1["categoryId"]?>"><?php for($i=0;$i<( $TPL_V1["depth"]-1)*3;$i++)echo "&nbsp";?><?php echo $TPL_V1["categoryName"]?></option>
<?php }}?>
                </select>
                <select name="series" id="series" class="form-control form-control-sm wd-150 mg-r-5 mg-b-0">
                    <option value="">모든 시리즈</option>
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["series"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
					<option value="<?php echo $TPL_V1["seriesId"]?>"><?php echo $TPL_V1["name"]?></option>
<?php }}?>
				</select>
                <select name="portal" id="portal" class="form-control form-control-sm wd-150 mg-r-5 mg-b-0">
                    <option value="">포털 전송기사</option>
                    <option class="level-0" value="naver">네이버</option>
                    <option class="level-0" value="daum">다음</option>
                </select>
                <select name="dateType" id="dateType" class="form-control form-control-sm wd-80 mg-r-5 mg-b-0">
                    <option value="writeDate">작성일</option>
                    <option value="modifyDate">수정일</option>
                    <option value="firstPublishDate">배포일</option>
                </select>
                <div class="input-group input-group-sm date wd-120 mg-r-5 mg-b-0" id="datetimepicker1" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" id='startDate' name='startDate' value="<?php echo $_GET["startDate"]?>"/>
                    <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
                <div class="input-group input-group-sm date wd-120 mg-r-5 mg-b-0" id="datetimepicker2" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" id='endDate' name='endDate' value="<?php echo $_GET["endDate"]?>"/>
                    <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
    
                <select name="searchItem" id="searchItem" class="form-control form-control-sm wd-150 mg-r-5 mg-b-0">
                    <option value="title+subTitle+content">모든 제목+본문</option>
					<option value="title">제목</option>
                    <option value="report">기자</option>
                    <option value="aid">기사 아이디</option>
                    <option value="oldId">과거 기사코드</option>
                </select>
                <div class="input-group input-group-sm mg-r-10 wd-200">
                    <input class="form-control " name="keyword" id="keyword" placeholder="검색어 입력" type="text" value="<?php echo $_GET["keyword"]?>">
                    <button type="button" class="btn input-group-addon pd-t-0 pd-b-0 wd-70" id="searchBtn" name="searchBtn"><i class="fa fa-search"></i> 검색</button>
                </div>
                <button type="button" class="btn btn-success pd-5 bd-0 mg-l-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="insertBtn" name="insertBtn" onclick="location.href='/article/editor';"><i class="fas fa-plus"></i>새기사</button>
            </div>
            </form>
            
            <div class="bd rounded">
				<div class="card bd-0">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]==''){?>active<?php }?>" href="/article/list&sort=writeDate&order=-1" role="tab" ><i class="far fa-list-alt"></i> 전체</a></li>
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]=='save'){?>active<?php }?>" href="/article/list?serviceType=save&sort=writeDate&order=-1" role="tab"><i class="fas fa-pencil-alt"></i> 작성중</a></li>
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]=='desk'){?>active<?php }?>" href="/article/list?serviceType=desk&sort=writeDate&order=-1" role="tab"><i class="fas fa-clipboard-check"></i> 데스크전송</a></li>
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]=='publish'){?>active<?php }?>" href="/article/list?serviceType=publish&sort=writeDate&order=-1" role="tab"><i class="fas fa-globe-asia"></i> 서비스중</a></li>
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]=='my'){?>active<?php }?>" href="/article/list?serviceType=my&reporterId=<?php echo $_SESSION["userId"]?>&sort=writeDate&order=-1" role="tab"><i class="fas fa-user-edit"></i> 내기사</a></li>
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]=='embago'){?>active<?php }?>" href="/article/list?serviceType=embago&sort=writeDate&order=-1" role="tab"><i class="far fa-clock"></i> 예약전송</a></li>
							<li class="nav-item"><a class="nav-link <?php if($_GET["serviceType"]=='isDelete'){?>active<?php }?>" href="/article/list?serviceType=isDelete&sort=writeDate&order=-1" role="tab"><i class="fas fa-trash-alt"></i> 휴지통</a></li>
						</ul>
					</div>
				<div class="card-body table-responsive">
					<?php  $TPL_VAR["sortUrl"] = preg_replace("/&sort=[^&]+&order=[1|-]+/im","",$_SERVER['REQUEST_URI']); ?>
					<table width="100%" class="table">
						<thead>
							<tr>
								<th scope="col" id="title" class="manage-column column-title column-primary sortable desc" style="min-width:200px;">제목</th>
								<th scope="col" id="categories" class="manage-column column-categories">분류</th>
								<th scope="col" id="attachedFile" class="manage-column column-attachedFile">첨부</th>
								<th scope="col" id="writeDate" class="manage-column column-date sortable asc wd-100"><a href="<?php echo $TPL_VAR["sortUrl"]?>&sort=writeDate&order=<?php if($_GET["sort"]=='writeDate'&&$_GET["order"]!= 1){?>1<?php }else{?>-1<?php }?>">작성일  <?php if($_GET["sort"]=='writeDate'&&$_GET["order"]== - 1){?>▼<?php }elseif($_GET["sort"]=='writeDate'&&$_GET["order"]== 1){?>▲<?php }?></a></th>
								<th scope="col" id="modifyDate" class="manage-column column-date sortable asc wd-100"><a href="<?php echo $TPL_VAR["sortUrl"]?>&sort=modifyDate&order=<?php if($_GET["sort"]=='modifyDate'&&$_GET["order"]!= 1){?>1<?php }else{?>-1<?php }?>">수정일  <?php if($_GET["sort"]=='modifyDate'&&$_GET["order"]== - 1){?>▼<?php }elseif($_GET["sort"]=='modifyDate'&&$_GET["order"]== 1){?>▲<?php }?></a>
								<th scope="col" id="publishedDate" class="manage-column column-publishedDate sortable asc wd-100"><a href="<?php echo $TPL_VAR["sortUrl"]?>&sort=firstPublishDate&order=<?php if($_GET["sort"]=='firstPublishDate'&&$_GET["order"]!= 1){?>1<?php }else{?>-1<?php }?>">최초배포일  <?php if($_GET["sort"]=='firstPublishDate'&&$_GET["order"]== - 1){?>▼<?php }elseif($_GET["sort"]=='firstPublishDate'&&$_GET["order"]== 1){?>▲<?php }?></a></th>
								<th scope="col" id="publishedKind" class="manage-column column-publishedKind sortable asc">상태</th>
								<th scope="col" id="repoter" class="manage-column column-repoter">기자명</th>
								<th scope="col" id="modifier" class="manage-column column-modifier">수정자</th>
								<th scope="col" id="comments" class="manage-column column-comments num sortable desc" style="text-align: center;"><a href="<?php echo $TPL_VAR["sortUrl"]?>&sort=hit2&order=<?php if($_GET["sort"]=='hit2'&&$_GET["order"]!= 1){?>1<?php }else{?>-1<?php }?>">PV</a><?php if($_GET["sort"]=='hit2'&&$_GET["order"]== - 1){?>▼<?php }elseif($_GET["sort"]=='hit2'&&$_GET["order"]== 1){?>▲<?php }?>(<img src='https://www.google.co.kr/favicon.ico' style="width:12px;">PV)</th>
								<th scope="col" class="manage-column" style="display:none;">미리보기</th>
							</tr>
						</thead>
						<tbody id="the-list">
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["docs"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
							<tr id="at_<?php echo $TPL_V1["aid"]?>" class="iedit author-other level-0 type-post status-publish format-standard has-post-thumbnail hentry category-autoinside <?php if($TPL_V1["using"]== 1){?>editing<?php }elseif($TPL_V1["deskRequest"]== 1){?>desking<?php }elseif($TPL_V1["publishDate"]==''){?>saved<?php }?> <?php if($TPL_V1["isEmbago"]){?>embargo<?php }?>" >
								<td class="title column-title has-row-actions column-primary page-title" data-colname="제목">
									<a class="row-title" href="/article/editor?aid=<?php echo $TPL_V1["aid"]?>" target="_self"><?php if(trim($TPL_V1["title"])==""){?>Untitled article<?php }else{?><?php echo $TPL_V1["title"]?><?php }?></a>
									<i class="fas fa-mobile articlePreview" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="모바일 기사보기" style="float:right;cursor:pointer;" data-aid="<?php echo $TPL_V1["aid"]?>" data-type="mobile"></i>
									<i class="fas fa-desktop articlePreview" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="PC 기사보기" style="float:right;cursor:pointer;padding-right: 5px;" data-aid="<?php echo $TPL_V1["aid"]?>" data-type="pc"></i>
<?php if($TPL_V1["mainPlace"]!=""){?><br/><span style=""><?php echo $TPL_V1["mainPlaceName"]?> - <?php echo $TPL_V1["placeName"]?></span><?php }?>
								</td>
								<td class="categories column-categories" data-colname="분류" style="font-size:9px;">
<?php if(is_array($TPL_R2=$TPL_V1["category"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
<?php if(preg_match('/^upi011/',$TPL_V2["categoryID"])&&$TPL_V2["categoryID"]!='upi011000000'){?> 포토 > <?php }?>
									<a href="/article/list?category=<?php echo $TPL_V2["categoryID"]?>"><?php echo $TPL_V2["categoryName"]?></a></br>
<?php }}?>
								</td>
								<td class="attachedFile column-attachedFile">
<?php if(is_array($TPL_R2=$TPL_V1["imageFile"])&&!empty($TPL_R2)){$TPL_S2=count($TPL_R2);$TPL_I2=-1;foreach($TPL_R2 as $TPL_V2){$TPL_I2++;?>
<?php if($TPL_I2== 1){?>
									<a data-toggle="tooltip" data-placement="right" data-html="true" title="<div class='imageTooltip'><img src='<?php if($TPL_V2["type"]=='doc'){?>/image/<?php echo $TPL_V2["ext"]?>.png<?php }else{?><?php echo preg_replace("/^(.+)([.][a-z]+)$/","$1.80X50.0$2",$TPL_V2["src"])?><?php }?>' style='margin:1px;height:50px;'>
<?php }else{?>
										<img src='<?php if($TPL_V2["type"]=='doc'){?>/image/<?php echo $TPL_V2["ext"]?>.png<?php }else{?><?php echo preg_replace('/^(.+)([.][a-z]+)$/','$1.80x50.0$2',$TPL_V2["src"])?><?php }?>' style='margin:1px;height:50px;'>
<?php }?>
<?php if($TPL_S2> 1&&($TPL_S2- 1)==$TPL_I2){?></div>"><i class="fas fa-plus-circle"></i></a><?php }?>
<?php }}?>
								</td>
								<td class="writeDate column-writeDate"><?php echo $TPL_V1["writeDate"]?></td> 
								<td class="modifyDate column-modifyDate"><?php echo $TPL_V1["modifyDate"]?></td>
								<td class="publishedDate column-writeDate"><?php echo $TPL_V1["firstPublishDate"]?></td>
								<td class="publishedKind column-publishedKind">
<?php if($TPL_V1["isEmbago"]){?>
									<i class="far fa-clock tx-12" title="<?php echo $TPL_V1["embagoDate"]?>"></i>
<?php }?>
<?php if($TPL_V1["using"]== 1){?>
									<span class="glyphicon glyphicon-lock" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["userName"]?> <?php echo $TPL_V1["useDate"]?>"></span>
<?php }?>
<?php if($TPL_V1["deskRequest"]== 1){?>
									<span class="glyphicon glyphicon-check" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["deskRequestDate"]?>"></span>
<?php }?>
<?php if($TPL_V1["publishDate"]!=""){?>
<?php if(is_array($TPL_R2=$TPL_V1["publishMedia"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
<?php if($TPL_V2["name"]=='site'){?>
											<i class="fa fa-globe" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["publishDate"]?>"></i>
<?php }elseif($TPL_V2["name"]=='naver'){?>
											<a href="https://search.naver.com/search.naver?where=news&query=<?php echo urlencode($TPL_V1["title"])?>&sm=tab_opt&sort=0&photo=0&field=0&reporter_article=&pd=0&ds=&de=&docid=&nso=&mynews=1&refresh_start=0&related=0" target="_blank"><img src='https://www.naver.com/favicon.ico' width='15px' data-toggle="tooltip" data-html="true" data-placement="right" title=" 입력:<?php echo $TPL_V1["publishMedia"]["naver"]["procData"]?><?php if($TPL_V1["publishModifyMedia"]["naver"]["procData"]){?><br /> 수정:<?php echo $TPL_V1["publishModifyMedia"]["naver"]["procData"]?><?php }?><?php if($TPL_V1["publishDeleteMedia"]["naver"]["procData"]){?><br /> 삭제:<?php echo $TPL_V1["publishDeleteMedia"]["naver"]["procData"]?><?php }?>" <?php if($TPL_V1["publishDeleteMedia"]["naver"]["procData"]){?> style="-webkit-filter: grayscale(100%);filter: gray;"<?php }?>></a>
<?php }elseif($TPL_V2["name"]=='daum'){?>
											<a href="https://search.daum.net/search?w=news&req=tab&q=<?php echo urlencode($TPL_V1["title"])?>&cluster=n&viewio=i&repno=0&n=10&p=1&pattern_yn=n&DA=NNS" target="_blnak"><img src='http://www.daum.net/favicon.ico' width='15px' data-toggle="tooltip"  data-html="true" data-placement="right" title=" 입력:<?php echo $TPL_V1["publishMedia"]["daum"]["procData"]?><?php if($TPL_V1["publishModifyMedia"]["daum"]["procData"]){?><br /> 수정:<?php echo $TPL_V1["publishModifyMedia"]["daum"]["procData"]?><?php }?><?php if($TPL_V1["publishDeleteMedia"]["daum"]["procData"]){?><br /> 삭제:<?php echo $TPL_V1["publishDeleteMedia"]["daum"]["procData"]?><?php }?>" <?php if($TPL_V1["publishDeleteMedia"]["daum"]["procData"]){?> style="-webkit-filter: grayscale(100%);filter: gray;"<?php }?> ></a>
<?php }elseif($TPL_V2["name"]=='zum'){?>
											<a href="http://search.zum.com/search.zum?method=news&option=accu&query=<?php echo urlencode($TPL_V1["title"])?>&rd=1&cluster=&startdate=&enddate=&datetype=&scp=1" target="_blank"><img src='http://zum.com/favicon.ico' width='15px' data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["publishDate"]?>"></a>
<?php }elseif($TPL_V2["name"]=='google'){?>
											<a href="https://www.google.com/search?q=<?php echo urlencode($TPL_V1["title"])?>&aqs=chrome..69i57j69i60l2.903j0j7&sourceid=chrome&ie=UTF-8" target="_blnak"><img src='https://www.google.co.kr/favicon.ico' width='15px' data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["publishDate"]?>"></a>
<?php }else{?>
											<i class="fa fa-<?php echo $TPL_V2["name"]?>" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["publishDate"]?>"></i>
<?php }?>
<?php }}?>
<?php }else{?>
<?php if($TPL_V1["deskRequest"]!= 1){?>
										<i class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="<?php echo $TPL_V1["repoter"][ 0]["name"]?> - <?php echo $TPL_V1["writeDate"]?>"></i>
<?php }?>
<?php }?>

<?php if($TPL_V1["isDelete"]=='1'){?>
										<i class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="right" title="삭제된 기사"></i>
<?php }?>
								</td>
								<td class="repoter column-repoter">
<?php if(is_array($TPL_R2=$TPL_V1["repoter"])&&!empty($TPL_R2)){foreach($TPL_R2 as $TPL_V2){?>
									<div><a href="/article/list?reporterId=<?php echo $TPL_V2["id"]?>"><?php echo $TPL_V2["name"]?></a></div>
<?php }}?>
								</td>
								<td class="modifier column-modifier"><a href="/article/list?modifier=<?php echo $TPL_V1["modifier"]?>" data-toggle="tooltip" data-placement="left" title="<?php echo $TPL_V1["modifyDate"]?>"><?php if($TPL_V1["modifyName"]!=''){?><?php echo $TPL_V1["modifyName"]?><?php }else{?><?php echo $TPL_V1["modifier"]?><?php }?></a></td>
								<td style="text-align:right; padding-right:10px;"><?php if($TPL_V1["hit2"]){?><?php echo number_format($TPL_V1["hit2"])?><?php }else{?><?php echo number_format($TPL_V1["hit"])?><?php }?>
									(<span id="pv_<?php echo $TPL_V1["aid"]?>" title='reffer보기' alt='reffer보기' style="cursor: pointer">0</span>)
								</td>
							</tr>
<?php }}?>
						</tbody>
					</table>
					<div class="row">
<?php $this->print_("paging",$TPL_SCP,1);?>

					</div>
				</div>
			</div>
	</div>
</div>
<!-- ########## END: MAIN PANEL ########## -->

<script>
	$('#coid').change(function(){
		$('#searchForm').submit();
	});

		$("#coid").val('<?php echo $_SESSION["coid"]?>');
</script>
</body>
</html>