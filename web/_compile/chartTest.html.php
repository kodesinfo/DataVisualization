<?php /* Template_ 2.2.8 2021/10/12 11:26:35 /webSiteSource/hk/web/_template/chartTest.html 000121698 */ ?>
<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>wcms kodes - </title>

<!-- vendor css -->
<!--link href="/lib/font-awesome/css/font-awesome.css" rel="stylesheet"-->
<link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link href="/lib/Ionicons/css/ionicons.css" rel="stylesheet">
<link href="/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
<link href="/lib/jquery-switchbutton/jquery.switchButton.css" rel="stylesheet">
<link href="/lib/highlightjs/github.css" rel="stylesheet">
<link href="/lib/select2/css/select2.min.css" rel="stylesheet">
<link href="/lib/jquery-toggles/toggles-full.css" rel="stylesheet">
<link href="/lib/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

<!-- Bracket CSS -->
<link href="/lib/bootstrap/bootstrap.css" rel="stylesheet">
<link href="/css/bracket.css" rel="stylesheet">

<link href="/css/mojaik.css" rel="stylesheet">

<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/lib/popper.js/popper.js"></script>
<script src="/lib/bootstrap/bootstrap.js"></script>
<script src="/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="/lib/moment/moment.js"></script>
<script src="/lib/jquery-switchbutton/jquery.switchButton.js"></script>
<script src="/lib/peity/jquery.peity.js"></script>
<script src="/lib/highlightjs/highlight.pack.js"></script>
<script src="/lib/select2/js/select2.min.js"></script>
<script src="/lib/jquery-toggles/toggles.min.js"></script>
<script src="/lib/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="/js/jquery.ui.touch-punch.min.js"></script>

<script src="/js/bracket.js"></script>
<script src="/js/mojaik.js"></script>

<link href="/lib/rwd-table/rwd-table.min.css" rel="stylesheet">
<script src="/lib/rwd-table/rwd-table.js"></script>
</head>
<script src='/lib/tinymce/tinymce.min.js'></script>
<!--script src="https://cdn.tiny.cloud/1/cz23xxy0ib8coqyccv501s1zguwe1b1f7tjvk92ts9jzarhu/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />
<script src='/lib/locale/ko.js'></script>

<script type='text/javascript' src='/lib/dropzone/dropzone.js'></script>
<style>
.t_height{height: calc(1.5em + 0.75rem );}
.popover-body {padding: 5px;}

.tox-form__group{display: flex;}
.tox-form__group label{width:100px !important;}

#tempsave{
position: fixed;
bottom: 0;
right: 20px;
padding: 10px;
font-size: 12px;
width: 150px;
height: 50px;
}

.img-copy{
	position: absolute;
    bottom: 42px;
    right: 1px;
    z-index: 10;
    color: #ffffff;
    background: #f50733;
    padding: 1px 3px;
}

#wmPositionTool img {border: 1px solid #ffffff;}

.tox-statusbar__branding{display:none;}
</style>
<body>
<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a class="nav-link" href="" style="margin: 0 auto;padding: 0;"><span>[</span>KODES<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
        <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
        <a class="br-menu-link" href="/dashboard" target="_self"  data-link="">	<div class="br-menu-item">		<i class="br-menu-icon icon fas fa-home"></i>		<span class="menu-item-label">Dashboard</span>	</div></a><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow fa fa-edit"></i>		<span class="menu-item-label">데스크</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/article/list" target="_self" data-link=""><i class="fa fa-edit"></i> 기사</a></li><li class="nav-item"><a class="nav-link" href="/image/list" target="_self" data-link=""><i class="fa fa-image"></i> 파일</a></li></ul><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow fas fa-chart-area"></i>		<span class="menu-item-label">로그 분석</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/ranking/many" target="_self" data-link=""><i class=""></i> 포털 언론 통계</a></li><li class="nav-item"><a class="nav-link" href="/statistics/article" target="_self" data-link=""><i class=""></i> 기사별 통계</a></li><li class="nav-item"><a class="nav-link" href="/statistics/user" target="_self" data-link=""><i class=""></i> 방문자 통계</a></li><li class="nav-item"><a class="nav-link" href="/statistics/page" target="_self" data-link=""><i class=""></i> 페이지뷰 통계</a></li><li class="nav-item"><a class="nav-link" href="/statistics/country" target="_self" data-link=""><i class=""></i> 지역별 통계</a></li><li class="nav-item"><a class="nav-link" href="/statistics/source" target="_self" data-link=""><i class=""></i> 유입경로 통계</a></li><li class="nav-item"><a class="nav-link" href="/statistics/system" target="_self" data-link=""><i class=""></i> 시스템 통계</a></li></ul><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow fas fa-sitemap"></i>		<span class="menu-item-label">면편집</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/layout/patch" target="_blank" data-link=""><i class=""></i> 메인면 편집</a></li><li class="nav-item"><a class="nav-link" href="/layout/event" target="_self" data-link=""><i class=""></i> 이벤트 페이지</a></li></ul><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow fas fa-ad"></i>		<span class="menu-item-label">배너관리</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/banner/list" target="_self" data-link="/banner/editor"><i class=""></i> 배너관리</a></li></ul><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow fas fa-user-edit"></i>		<span class="menu-item-label">사이트관리</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/category/list" target="_self" data-link=""><i class="fa fa-th-list"></i> 카테고리</a></li><li class="nav-item"><a class="nav-link" href="/series/list" target="_self" data-link="/series/editor"><i class="fa fa-th-list"></i> 시리즈</a></li><li class="nav-item"><a class="nav-link" href="/tag/list" target="_self" data-link=""><i class="fa fa-hashtag"></i> Tag</a></li><li class="nav-item"><a class="nav-link" href="/comment/list" target="_self" data-link=""><i class="far fa-comment-alt"></i> 댓글</a></li><li class="nav-item"><a class="nav-link" href="/character/list" target="_self" data-link=""><i class="fa fa-exchange-alt"></i> 문자치환</a></li><li class="nav-item"><a class="nav-link" href="/user/list" target="_self" data-link="/user/editor"><i class="fa fa-user"></i> 기자</a></li><li class="nav-item"><a class="nav-link" href="/auth/list" target="_self" data-link="/auth/editor"><i class="fas fa-users-cog"></i> 권한</a></li><li class="nav-item"><a class="nav-link" href="/company/list" target="_self" data-link=""><i class="fa fa-sitemap"></i> 회사정보</a></li></ul><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow far fa-edit"></i>		<span class="menu-item-label">게시물관리</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/board/list?type=jebo" target="_self" data-link=""><i class="far fa-newspaper"></i> 기사제보</a></li><li class="nav-item"><a class="nav-link" href="/board/list?type=partner" target="_self" data-link=""><i class="far fa-handshake"></i> 제휴문의</a></li><li class="nav-item"><a class="nav-link" href="/board/list?type=ad" target="_self" data-link=""><i class="fas fa-ad"></i> 광고문의</a></li></ul><a class="br-menu-link" href="/report/list" target="_self"  data-link="/report/view | /report/editor">	<div class="br-menu-item">		<i class="br-menu-icon icon far fa-clipboard"></i>		<span class="menu-item-label">정보보고</span>	</div></a><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow fab fa-neos"></i>		<span class="menu-item-label">네이버</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/naver/page" target="_self" data-link=""><i class=""></i> 뉴스스탠드</a></li><li class="nav-item"><a class="nav-link" href="/naver/xml" target="_self" data-link=""><i class=""></i> 뉴스스탠드 XML</a></li><li class="nav-item"><a class="nav-link" href="/naver/mobilenews" target="_self" data-link=""><i class=""></i> 모바일뉴스</a></li></ul><a class="br-menu-link" href="javascript:void(0);" target="_self"  data-link="">	<div class="br-menu-item">		<i class="menu-item-arrow far fa-envelope"></i>		<span class="menu-item-label">뉴스레터</span><i class="menu-item-arrow fa fa-angle-down"></i>	</div></a><ul class="br-menu-sub nav flex-column"><li class="nav-item"><a class="nav-link" href="/letter/list" target="_self" data-link=""><i class=""></i> 뉴스레터 목록</a></li><li class="nav-item"><a class="nav-link" href="/letter/setting" target="_self" data-link=""><i class=""></i> 뉴스레터 설정</a></li></ul><a class="br-menu-link" href="/paper/list" target="_self"  data-link="/paper/view | /paper/editor">	<div class="br-menu-item">		<i class="br-menu-icon icon far fa-newspaper"></i>		<span class="menu-item-label">지면관리</span>	</div></a>
    </div>
</div>
<!-- ########## END: LEFT PANEL ########## -->
<script>
var path = location.toString();

$('.br-sideleft a').each(function(){
    var link = $(this).attr('href');
    var link2 = $(this).attr('data-link');

    if(path.indexOf(link) > -1){
        $(this).addClass('active');
        $(this).parent().parent().prev().addClass('show-sub');
    }else{
        var paths = path.split('/');
        paths[2] = 'list';
        const tmp = paths.join('/');

        if(link2){
            if(path.indexOf(link2) > -1){
                $(this).addClass('active');
                $(this).parent().parent().prev().addClass('show-sub');
            }
        }
        if(link.indexOf(tmp) > -1){
        }
    }
});
</script>
<!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
        <nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down">admin</span>
              <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
				<li><a href="/logout"><i class="icon ion-power"></i> Log Out</a></li>
				<li><a href="/user/modify"><i class="icon ion-power"></i> 개인정보 변경</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
	<div class="br-pagebody">
    <div class="br-section-wrapper pd-10-force">

    <form name="articleForm" id="articleForm" action="/article/proc" method="post">
    <div class="row mg-t-10">
        <input type='hidden' name='imgSortedId' id='imgSortedId' value="">
        <input type='hidden' name='action' id='action' value="">
        
        <input type='hidden' name='modifyDate' id='modifyDate' value="2021-10-08 10:32:58">
        <input type='hidden' name='modifier' id='modifier' value="admin">
        <input type='hidden' name='publisher' id='publisher' value="admin">
        <input type='hidden' name='isDelete' id='isDelete' value="">
        <input type='hidden' name='published' id='published' value="1">
        <input type='hidden' name='listUrl' id='listUrl' value="%2Farticle%2Flist">
<input type='hidden' name='oldCategory[]' id='oldCategory[]' value="kwn001000000">        <input type='hidden' name='mainext' id='mainext' value='N'/>

        <div class="col-lg-8">
            <div class="row pd-x-15">
                <div class="input-group mg-b-5">
                    <input type="text" class="form-control" name="title" id="title" placeholder="제목을 입력하세요." value='테스트' required="">
                    <div class="input-group-addon input-group-btn pd-0">
                        <button data-objid="title" class="btn btn-default insert-character t_height" type="button"><i class="mce-ico mce-i-charmap"></i></button>
                        <button class="btn btn-default t_height" type="button" disabled="disabled"><span id="titleByte">0</span> byte</button>
                    </div>
                </div>
                <div class="input-group mg-b-5">
                    <textarea  name="subTitle" id="subTitle" size="30" cols="86" class="form-control form-group"  placeholder='부제목을 입력하세요.'></textarea>
                    <div class="input-group-addon input-group-btn pd-0">
                        <button data-objid="title" class="btn btn-default btnSpecialChar" type="button"><i class="mce-ico mce-i-charmap"></i></button>
                        <button class="btn btn-default" type="button" disabled="disabled"><span id="subTitleByte">0</span> byte</button>
                    </div>
                </div>
                <div class="input-group mg-b-5">
                    <input type="text" class="form-control" name="expTitle" id="expTitle" placeholder="노출 제목을 입력하세요." value='' required="">
                    <div class="input-group-addon input-group-btn pd-0">
                        <button data-objid="title" class="btn btn-default btnSpecialChar t_height" type="button"><i class="mce-ico mce-i-charmap"></i></button>
                        <button class="btn btn-default t_height" type="button" disabled="disabled"><span id="expTitleByte">0</span> byte</button>
                    </div>
                </div>
                <div class="input-group mg-b-5">
                    <textarea  name="expSubTitle" id="expSubTitle" size="30" cols="86" class="form-control form-group"  placeholder='노출 부제목을 입력하세요.'></textarea>
                    <div class="input-group-addon input-group-btn pd-0">
                        <button data-objid="title" class="btn btn-default btnSpecialChar" type="button"><i class="mce-ico mce-i-charmap"></i></button>
                        <button class="btn btn-default" type="button" disabled="disabled"><span id="expSubTitleByte">0</span> byte</button>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-start mg-b-5 flex-wrap">
                <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id="bylineBtn" name="bylineBtn">바이라인</button>

                    <!-- 배포된 기사는 출고 후 수정 권한이 있을 경우만 버튼 표출 -->
                    <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id='saveBtn'>기사저장</button>

                <!--button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id='previewBtn'>미리보기</button-->


				<div class="mg-x-20">
					<input name="articleType" type="checkbox" value="자체기사">
					<span>자체기사</span>&nbsp;
					<input name="articleType" type="checkbox" value="기타">
					<span>기타</span>
				</div>

                <div class="form-group mg-b-0 wd-80">
                    <div class="input-group">
                       <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id="articlePublish">발행</button>
                        <div class="input-group-append">
                           <button type="button" class="btn btn-sm btn-info bd-1 tx-11 tx-spacing-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 0.2rem 0 0 0.2rem;"><i class="fas fa-arrow-alt-circle-down"></i></button>
                            <ul class="dropdown-menu" style="padding:5px;width:200px;">
                                <li style="font-size:12px;"><span style="margin-left:20px;">전송처</span><span style="float:right;"> 입력 | 수정 | 삭제<span></li>
								<li>  
<b>사이트</b>									<!-- input type='checkbox' name='publishDeleteMedia[]' value="site" style="float:right;margin-right:10px;" alt="사이트 삭제"  title="사이트 삭제"  >  
									<input type='checkbox' name='publishModifyMedia[]' value="site" style="float:right;margin-right:13px;" alt="사이트 수정" title="사이트 수정"   --> 
									<input type='checkbox' name='publishMedia[]' value="site" id="siteInsert" title="사이트 입력" alt="사이트 입력" style="float:right;margin-right:69px;" checked disabled >
								</li>
                            </ul>
                        </div>
                    </div>
                </div>

				<i class="fas fa-desktop articlePreview pd-x-10 tx-16" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="PC 기사보기" style="cursor:pointer;" data-type="pc" id='previewBtn'></i>
				<i class="fas fa-mobile articlePreview pd-x-10 tx-16" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="모바일 기사보기" style="cursor:pointer;" data-type="mobile" id='previewMBtn'></i>
                
                <button type="button" id="deleteArticle" class="btn btn-sm btn-danger bd-1 mg-l-5 tx-11 tx-spacing-2"><span class="fa fa-eraser"></span> 삭 제</button>

				<button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id='listBtn' onclick="location.href='/article/list';">목록</button>
            </div>

            <div class="d-flex align-items-center justify-content-start mg-b-5">

                <div class="form-group mg-b-0 wd-300">
                    <div class="input-group date mg-r-5 mg-lg-b-5 mg-b-0" id="datetimepicker1" data-target-input="#embago">
                        <div class="input-group-prepend input-group-sm bg-white">
                            <span class="input-group-addon">예약전송</span>
                        </div>
                        <div class="input-group-prepend input-group-sm">
                            <span class="input-group-addon"><input type="checkbox" name="isEmbago" id="isEmbago" aria-label="예약 세팅" value="1"></span>
                        </div>
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" id='embago' name='embago' value=""/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <select name="mainPlace" id="mainPlace" class="form-control form-control-sm wd-95 mg-l-5 tx-11">
                    <option value="">위치 지정</option>
                    <option value="main">메인페이지</option>
                    <option value="sectionIssue">섹션 - Issue</option>
                    <option value="sectionESG">섹션 - ESG</option>
                    <option value="sectionECO">섹션 - ECO</option>
                    <option value="header">헤더</option>
                </select>

                <select name="placeNum" id="placeNum" class="form-control form-control-sm wd-150 mg-l-5 tx-11">
                </select>
                <input type="hidden" name="oldMainPlace" value="">
                <input type="hidden" name="oldPlaceNum" value="">

				<button type="button" id="btnGraph" class="btn btn-sm btn-primary" ><img src="/svg/bar.svg" style="width:20px;height:20px;"></button>
				<style>
					.st0{fill:#FFFFFF !important;}
				</style>
            </div>
            
            <!-- 기사 입력창 -->
            <div id="wp-content-wrap" class="wp-core-ui wp-editor-wrap tmce-active has-dfw mg-b-5">
                <div id="wp-content-editor-container">
                    <textarea id='content' name='content' style='height: 600px; width:100%'>테스트 입니다.</textarea>
                </div>
                <div style="position:relative;bottom:20px;font-size:12px;padding-top: 1px;text-align: right;">
                    글자수 : <span id='wordNum'>0</span>자 / 페이지 : <span id='pageNum'>0</span>매
                </div>
            </div>
            <!-- 기사 입력창 -->

            <div class="d-flex align-items-center justify-content-start mg-b-5  flex-wrap">
                <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id="bylineBtn" name="bylineBtn">바이라인</button>

                    <!-- 배포된 기사는 출고 후 수정 권한이 있을 경우만 버튼 표출 -->
                    <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id='saveBtn'>기사저장</button>

                <!--button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id='previewBtn'>미리보기</button-->

                <!--button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id="articlePublish">발행</button>

                <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                <ul class="dropdown-menu" style="padding:5px;width:200px;">
                    <li style="font-size:12px;"><span style="margin-left:20px;">전송처</span><span style="float:right;"> 입력 | 수정 | 삭제<span></li>
                    <li>
<b>사이트</b>                    <input type='checkbox' name='publishMedia[]' value="site" title="사이트 입력" alt="사이트 입력" style="float:right;margin-right:69px;" checked disabled >
                    </li>					
                </ul-->

				<div class="mg-x-20">
					<input name="articleType2" type="checkbox" value="자체기사">
					<span>자체기사</span>&nbsp;
					<input name="articleType2" type="checkbox" value="기타">
					<span>기타</span>
				</div>

                <div class="form-group mg-b-0 wd-80">
                    <div class="input-group">
                       <button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id="articlePublish">발행</button>
                        <div class="input-group-append" data-target="#datetimepicker" data-toggle="datetimepicker">
                           <button type="button" class="btn btn-sm btn-info bd-1 tx-11 tx-spacing-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 0.2rem 0 0 0.2rem;"><i class="fas fa-arrow-alt-circle-down"></i></button>
                            <ul class="dropdown-menu" style="padding:5px;width:200px;">
                                <li style="font-size:12px;"><span style="margin-left:20px;">전송처</span><span style="float:right;"> 입력 | 수정 | 삭제<span></span></span></li>
                                <li>  
<b>사이트</b>									<!-- input type='checkbox' name='publishDeleteMedia[]' value="site" style="float:right;margin-right:10px;" alt="사이트 삭제"  title="사이트 삭제"  >  
									<input type='checkbox' name='publishModifyMedia[]' value="site" style="float:right;margin-right:13px;" alt="사이트 수정" title="사이트 수정"   --> 
									<input type='checkbox' name='publishMedia[]' value="site" id="siteInsert" title="사이트 입력" alt="사이트 입력" style="float:right;margin-right:69px;" checked disabled >
								</li>
                            </ul>
                        </div>
                    </div>
                </div>

				<i class="fas fa-desktop articlePreview pd-x-10 tx-16" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="PC 기사보기" style="cursor:pointer;" data-type="pc" id='previewBtn'></i>
				<i class="fas fa-mobile articlePreview pd-x-10 tx-16" aria-hidden="true"  data-toggle="tooltip" data-placement="right" title="모바일 기사보기" style="cursor:pointer;" data-type="mobile" id='previewMBtn'></i>

                <button type="button" id="deleteArticle" class="btn btn-sm btn-danger bd-1 mg-l-5 tx-11 tx-spacing-2"><span class="fa fa-eraser"></span> 삭 제</button>

				<button type="button" class="btn btn-sm btn-info bd-1 mg-l-5 tx-11 tx-spacing-2" id='listBtn' onclick="location.href='/article/list';">목록</button>
            </div>

        </div>
        <div class="col-lg-4">
            <div class="accordion" id="accordionArticle">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">카테고리</button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionArticle">
                        <div class="card-body pd-0">
                            <ul id="categorychecklist" data-wp-lists="list:category" class="selectlist form-no-clear" style="height: 475px;max-height: 100%;overflow-y: scroll;">
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn001000000" type="checkbox" name="category[]" id="in_kwn001000000" onclick="javascript:checkCategory2(this)">정치</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn001000000" value="kwn001000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:20px;">
                                    <label class="selectit"><input value="kwn001001000" type="checkbox" name="category[]" id="in_kwn001001000" onclick="javascript:checkCategory2(this)">도의회</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn001001000" value="kwn001001000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:20px;">
                                    <label class="selectit"><input value="kwn001002000" type="checkbox" name="category[]" id="in_kwn001002000" onclick="javascript:checkCategory2(this)">시군의회</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn001002000" value="kwn001002000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:20px;">
                                    <label class="selectit"><input value="kwn001003000" type="checkbox" name="category[]" id="in_kwn001003000" onclick="javascript:checkCategory2(this)">남북정상회담</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn001003000" value="kwn001003000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn002000000" type="checkbox" name="category[]" id="in_kwn002000000" onclick="javascript:checkCategory2(this)">경제</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn002000000" value="kwn002000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:20px;">
                                    <label class="selectit"><input value="kwn002001000" type="checkbox" name="category[]" id="in_kwn002001000" onclick="javascript:checkCategory2(this)">금융/증권</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn002001000" value="kwn002001000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn003000000" type="checkbox" name="category[]" id="in_kwn003000000" onclick="javascript:checkCategory2(this)">사회</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn003000000" value="kwn003000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn004000000" type="checkbox" name="category[]" id="in_kwn004000000" onclick="javascript:checkCategory2(this)">지역</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn004000000" value="kwn004000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn005000000" type="checkbox" name="category[]" id="in_kwn005000000" onclick="javascript:checkCategory2(this)">교육</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn005000000" value="kwn005000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn006000000" type="checkbox" name="category[]" id="in_kwn006000000" onclick="javascript:checkCategory2(this)">문화</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn006000000" value="kwn006000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn007000000" type="checkbox" name="category[]" id="in_kwn007000000" onclick="javascript:checkCategory2(this)">라이프</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn007000000" value="kwn007000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn008000000" type="checkbox" name="category[]" id="in_kwn008000000" onclick="javascript:checkCategory2(this)">스포츠</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn008000000" value="kwn008000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn009000000" type="checkbox" name="category[]" id="in_kwn009000000" onclick="javascript:checkCategory2(this)">인물</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn009000000" value="kwn009000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn010000000" type="checkbox" name="category[]" id="in_kwn010000000" onclick="javascript:checkCategory2(this)">오피니언</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn010000000" value="kwn010000000"> Primary</label>
                                </li>
                                <li class="popular-category wpseo-term-unchecked" style="padding-left:0px;">
                                    <label class="selectit"><input value="kwn011000000" type="checkbox" name="category[]" id="in_kwn011000000" onclick="javascript:checkCategory2(this)">강원일보TV</label>
                                    <label class="mainCategory" style="display: none;float: right;font-size: 12px;"><input type="radio" name="mainCategory" id="mainCategory_kwn011000000" value="kwn011000000"> Primary</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0 d-flex">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo">기본정보</button>
                            <span class="d-flex align-items-center justify-content-end tx-12 mg-r-2">메인 노출 제외(자동배치)&nbsp;<input type="checkbox" id="mainextYN" name="mainextYN" value="1" style="width:17px;height:17px;vertical-align: bottom;"></span>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionArticle">
                        <div class="card-body pd-5">
                            <div class="input-group input-group-sm mg-b-3">
                                <span class="input-group-addon">기사 ID</span>
                                <input type="text" name="aid" class="form-control" id="aid" value="kwn202110080001" readonly/>
                            </div>
                            <div class="input-group input-group-sm mg-b-3">
                                <span class="input-group-addon">작성일자</span>
                                <input type="text" name="writeDate"  id="writeDate" class="form-control" value="2021-10-08 10:31:53" aria-describedby="basic-addon3" readonly>
                            </div>
                            <div class="input-group input-group-sm mg-b-3">
                                <span class="input-group-addon">수정일자</span>
                                <input type="text" name="modifyDate"  id="modifyDate" class="form-control" value="2021-10-08 10:32:58" aria-describedby="basic-addon3" readonly>
                                <span class="input-group-addon"><input value="Y" type="checkbox" name="doneChangeDate" id="doneChangeDate" alt='수정날짜 변경하지 않기'></span>
                            </div>
                            <div class="input-group input-group-sm mg-b-3">
                                <span class="input-group-addon">최초배포일자</span>
                                <input type="text" name="firstPublishDate" class="form-control" value="2021-10-08 10:32:58" aria-describedby="basic-addon3" >
                            </div>
                            <div class="input-group input-group-sm mg-b-3">
                                <span class="input-group-addon">배포일자</span>
                                <input type="text" name="publishDate" class="form-control" value="2021-10-08 10:32:58" aria-describedby="basic-addon3" readonly>
                            </div>
                            <div class="input-group input-group-sm mg-b-3">
                                <span class="input-group-addon wd-80">기자&nbsp;<i class="fa fa-plus-circle" onclick="javascript:reporterplus();"></i></span>
                                <div class="d-flex flex-column" id="reportersDiv" style="width: calc(100% - 80px);">
                                    <span class="input-group input-group-sm">
                                    <input type="hidden" name="reporter[0][id]" class="form-control" id="reporterId" value="admin" />
                                    <input type="hidden" name="reporter[0][email]" class="form-control" id="reporterEmail" value="kodesinfo@gmail.com" />
                                    <input type="hidden" name="reporter[0][dept]" class="form-control" id="reporterDept" value="" />
                                    <input type="text" name="reporter[0][name]" class="form-control" id="reporterName" value="admin" onkeyup="javascript:reporterSearch(this)" autocomplete="off"/>
                                    <span class="input-group-addon"><i class="fa fa-times reporter-del" aria-hidden="true" style="top: 0px;" onclick="javascript:reporterminus(this)"></i></span></span>
                                </div>
                                </div>
                                <div class="d-flex">
                                    <span class="input-group-addon">tags</span>
                                    <input type="text" value="테스트" data-role="tagsinput" id="tags" name="tags">
                                </div>
                                <p class="text-danger tx-11">태그는 스페이스나 엔터키를 입력하시며 분리되어 입력됩니다.</p>
    
                                <div class="input-group input-group-sm mg-b-3">
                                    <span class="input-group-addon"> 기사뷰 타입</span>
                                    <select name="viewTmp" id="viewTmp" class="form-control">
                                        <option value="">일반 기사</option>
                                        <option value="gallery">포토 갤러리</option>
                                        <option value="video">동영상</option>
                                    </select>
                                </div>
                                <div class="input-group input-group-sm mg-b-3">
                                    <span class="input-group-addon">과거기사코드</span>
                                    <input type="text" id="oldId" name="oldId" class="form-control" aria-describedby="basic-addon3" placeholder="기존 icode" value="">
                                    <input type="text" id="oldId2" name="oldId2" class="form-control" aria-describedby="basic-addon3" placeholder="기존 ID" value="">
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="mb-0 d-flex">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree">시리즈</button>
                            <span class="d-flex align-items-center justify-content-end tx-12 mg-r-2"><a href="/series/editor" target="_blank" class="pd-0-force"><button type="button" id="btn_series" class="btn btn-sm bd bd-1"><i class="fas fa-plus"></i></button></a></span>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionArticle">
                        <div class="card-body pd-0">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon pd-0-force">
                                    <select name="seriasCategory" id="seriasCategory" class="form-control form-control-sm" style="background-color:#fff;border-color:#fff;width:130px">
                                        <option value="">모든 카테고리</option>
                                        <option class="level-0" value="kwn001000000">정치</option>
                                        <option class="level-0" value="kwn002000000">경제</option>
                                        <option class="level-0" value="kwn003000000">사회</option>
                                        <option class="level-0" value="kwn004000000">지역</option>
                                        <option class="level-0" value="kwn005000000">교육</option>
                                        <option class="level-0" value="kwn006000000">문화</option>
                                        <option class="level-0" value="kwn007000000">라이프</option>
                                        <option class="level-0" value="kwn008000000">스포츠</option>
                                        <option class="level-0" value="kwn009000000">인물</option>
                                        <option class="level-0" value="kwn010000000">오피니언</option>
                                        <option class="level-0" value="kwn011000000">강원일보TV</option>
                                    </select>
                                </span>
                                <input type="text" class="form-control" id="seriesWord" placeholder="검색 단어를 입력하세요" style="padding-bottom: 0px;height: calc(1.5em + 0.5rem + 4px);"> 
                                <span class="input-group-btn bd bd-1">
                                    <button class="btn btn-default" id="btn_seriesSearch" type="button"><span class="fa fa-search"></span>검색</button>
                                </span>
                            </div>

                            <div id="category-all" class="tabs-panel" style="height: 475px;max-height: 100%;overflow-y: scroll;">
                                <ul id="seriesList" class="selectlist form-no-clear">
                                    <li class="popular-category wpseo-term-unchecked"  data-description='' data-category="" data-name='시사경제용어'>
                                        <label class="selectit"><input value="kwn_S000003" type="checkbox" name="series[]" id="in_kwn_S000003" data-category="" data-grade=''> 시사경제용어</label>
                                    </li>
                                    <li class="popular-category wpseo-term-unchecked"  data-description='' data-category="" data-name='위기의 강원FC 길을 묻다'>
                                        <label class="selectit"><input value="kwn_S000005" type="checkbox" name="series[]" id="in_kwn_S000005" data-category="" data-grade=''> 위기의 강원FC 길을 묻다</label>
                                    </li>
                                    <li class="popular-category wpseo-term-unchecked"  data-description='' data-category="" data-name='이코노미 플러스'>
                                        <label class="selectit"><input value="kwn_S000004" type="checkbox" name="series[]" id="in_kwn_S000004" data-category="" data-grade=''> 이코노미 플러스</label>
                                    </li>
                                    <li class="popular-category wpseo-term-unchecked"  data-description='' data-category="" data-name='종합3보'>
                                        <label class="selectit"><input value="kwn_S000006" type="checkbox" name="series[]" id="in_kwn_S000006" data-category="" data-grade=''> 종합3보</label>
                                    </li>
                                    <li class="popular-category wpseo-term-unchecked"  data-description='' data-category="" data-name='코로나 19'>
                                        <label class="selectit"><input value="kwn_S000002" type="checkbox" name="series[]" id="in_kwn_S000002" data-category="" data-grade=''> 코로나 19</label>
                                    </li>
                                    <li class="popular-category wpseo-term-unchecked"  data-description='' data-category="" data-name='포토뉴스'>
                                        <label class="selectit"><input value="kwn_S000001" type="checkbox" name="series[]" id="in_kwn_S000001" data-category="" data-grade=''> 포토뉴스</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFile">
                        <h2 class="mb-0 d-flex">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFile">사진 및 파일</button>
                            <span class="d-flex align-items-center justify-content-end tx-12 mg-r-2"><button type="button" id="btn_imgModal" class="btn btn-sm bd bd-1"><i class="fas fa-search"></i></button></span>
                        </h2>
                    </div>
                    <div id="collapseFile" class="collapse" aria-labelledby="headingFile" data-parent="#accordionArticle">
                        <div class="card-body pd-0">
                            <div class="bd bd-1 pd-0" style="height:540px; background-color:#888; overflow:auto;">
                                <div id="dropzone" style="width:100%;height:100%;" id="sortable" class="sortable" style="overflow:auto;">
                                    <div class="image-message boxMessage" style="position: relative;top: 45%;color: #fff;font-size: 20px;width: 60%;text-align: center;margin: auto;">
                                            파일을 끌어오거나, 클릭하시면 첨부가 가능합니다.<br>
                                    </div>
                                    <div class="dropzonePreview">
                                        <div class="panel panel-default dz-preview" style="width:133px; height:170px; float:left; margin:5px;">
                                            <div class="card" style="margin: 5px;">
                                                <div class="card-image text-center">
                                                    <img class='thumbnail dropzoneImg' data-dz-thumbnail />
                                                    <div class="dz-filename" style=' white-space: nowrap; overflow:hidden;'><span data-dz-name></span></div>
                                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                                </div>
                                                <div class="row viewTitle" style="margin:0 1px;overflow:hidden;white-space: nowrap;"></div>
                                                <div class="card-content pd-x-5 justify-content-between">
                                                    <a href="javascript:;" onclick="goEdit(this)" alt="이미지 편집"><i class="fas fa-edit" id="imgEditor"></i></a>
                                                    <a href="javascript:;" data-toggle="popover" class='imgPlace' id='imgPlace' data-placement="bottom" data-html="true" data-content="<div id='imgPlaceTool'><div><span class='pd-r-5 tx-normal tx-black'>캡션</span><div class='toggle-wrapper'><div><div class='toggle toggle-light primary' id='captionYN'></div></div></div></div><div class='text-center tx-20'><span class='fa fa-align-left'></span> <span class='fa fa-align-center pd-x-10'></span> <span class='fa fa-align-right'></span></div></div>"><i class="fas fa-sign-in-alt"></i></span></a>
                                                    <a href="javascript:;" data-toggle="popover" id="watermark" data-placement="bottom" data-selector="true" data-html="true" data-content="<div id='wmPositionTool' style='width:114px;padding:0;margin:0;'><img class='buttom' src='/image/position_1.png'><img src='/image/position_2.png'><img src='/image/position_3.png'><br/><img src='/image/position_4.png'><img src='/image/position_5.png'><img src='/image/position_6.png'><br/><img src='/image/position_7.png'><img src='/image/position_8.png'><img src='/image/position_9.png'><br><img src='/image/position_0.png' title='워터마크 제거' alt='워터마크 제거'style='text-align:center;'></div></div>"><i class="fas fa-tint"></i></a>
													<a href="javascript:;" class="imgCopy" alt="이미지 복사"><i class="fas fa-copy"></i></a>
                                                    <a href="javascript:;" class="imgDown" alt="이미지 다운로드"><i class="fas fa-save"></i></a>
                                                    <a href="javascript:;" data-dz-remove alt="이미지 삭제"><i class="fas fa-trash"></i></a>
                                                    <input type='hidden' id='caption' value='9'>
                                                    <input type='hidden' class='fileId' name='fileId[]'>
                                                    <input type='hidden' class='type' name='type[]'>
                                                    <input type='hidden' class='ext' name='ext[]'>
                                                    <input type='hidden' class='filePath' name='filePath[]'>
                                                    <input type='hidden' class='imgWidth' name='width[]'>
                                                    <input type='hidden' class='imgHeight' name='height[]'>
                                                    <input type='hidden' class='imgsize' name='size[]'>
                                                    <input type='hidden' class='orgName' name='orgName[]'>
                                                    <input type='hidden' class='imgCaption' name='caption[]'>
                                                    <input type='hidden' class='imgWatermark' name='watermarkPlace[]' value="3">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingYoutube">
                        <h2 class="mb-0">
                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseYoutube">Youtube 동영상</button>                     
                        </h2>
                    </div>
                    <div id="collapseYoutube" class="collapse" aria-labelledby="headingYoutube" data-parent="#accordionArticle">
                        <div class="card-body pd-0">
                            <input type="hidden" id="inMovie" name="inMovie" value="">
                            <input type="hidden" id="movieInfo" name="movieInfo" value="">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon">
                                    <div class='toggle-wrapper'>
                                        <div class='toggle toggle-light primary' id='channelYN'></div>
                                    </div>
                                </span>
                                <input type="text" class="form-control" id="youtubeKeyword" placeholder="검색 단어를 입력하세요" style="padding-bottom: 0px;height: calc(1.5em + 0.5rem + 4px);"> 
                                <span class="input-group-btn bd bd-1">
                                    <button class="btn btn-default" id="btn_youtubeSearch" type="button"><span class="fa fa-search"></span>검색</button>
                                </span>
                            </div>
                            <div class="panel-body" style="height:96%; padding: 5px 15px; margin-bottom:5px; background-color: #888;">
                                <div class="row" id="youtubeList" style="overflow:auto; height:495px;padding:5px;">
                                    								
                                </div>
                                <div class='youTubeNavi' style="text-align:center;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingRelation">
                        <h2 class="mb-0 d-flex">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseRelation">관련기사</button>
                            <span class="d-flex align-items-center justify-content-end tx-12 mg-r-2"><button type="button" id="bnt_myModal" class="btn btn-sm bd bd-1" data-toggle="modal" data-target="#relationModal"><i class="fas fa-search"></i></button></span>
                        </h2>
                    </div>
                    <div id="collapseRelation" class="collapse" aria-labelledby="headingRelation" data-parent="#accordionArticle">
                        <div class="card-body">
                            <div style="height:540px;">
                                <input type="hidden" name="relationId" value="">
                                <div class="row" id="relationList" style="overflow:auto; padding:5px;height:100%;">
                                    <table id='relationOkList'>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingHistory">
                        <h2 class="mb-0">  
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseHistory">히스토리</button>
							<span class="d-flex align-items-center justify-content-end tx-12 mg-r-2"></span>
                        </h2>
                    </div>
                    <div id="collapseHistory" class="collapse" aria-labelledby="headingHistory" data-parent="#accordionArticle">
                        <div class="card-body pd-0" style="height:430px;overflow-y: scroll;">
                            <table class="table mg-b-0 tx-black tx-normal w-100p">
                                <thead class="table table-light">
                                    <tr>
                                        <th>수정자</th>
                                        <th>수정일</th>
                                        <th>상태</th>
                                        <th>비고</th>
                                        <th>복구</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>admin</td>
                                        <td>2021-10-08 10:34:44</td>
                                        <td>발행</td>
                                        <td><button type="button" id="bnt_myModal" class="btn btn-sm btn-light active btn-block" onclick="javascript:diff('3');">비교</button><textarea id="diffcontent_3" style="display:none;">테스트 입니다.</textarea></td>
                                        <td><button type="button" class="btn btn-sm btn-light active btn-block" onclick="javascript:restore('3');">복구</button><div id="restorecontent_3" style="display:none;">테스트 입니다.</div></td>
                                    </tr>
                                    <tr>
                                        <td>admin</td>
                                        <td>2021-10-08 10:32:58</td>
                                        <td>발행</td>
                                        <td><button type="button" id="bnt_myModal" class="btn btn-sm btn-light active btn-block" onclick="javascript:diff('2');">비교</button><textarea id="diffcontent_2" style="display:none;">테스트 입니다.</textarea></td>
                                        <td><button type="button" class="btn btn-sm btn-light active btn-block" onclick="javascript:restore('2');">복구</button><div id="restorecontent_2" style="display:none;">테스트 입니다.</div></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="imgSearchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content wd-800 ht-650">
			<div class="modal-header pd-y-10 pd-x-25">
				<h6 class="modal-title wd-600 tx-black" id="myModalLabel">DB 이미지</h6>
				<button type="button" class="close tx-28" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body tx-black tx-normal">
				<form name='frm_imgSearch' id='frm_imgSearch' onsubmit="return false;">
				<div class="d-flex flex-wrap align-items-center justify-content-end ht-xl-40 mg-b-5">
					<select name="category" id="category" class="form-control form-control-sm wd-150 mg-r-5 mg-lg-b-5 mg-b-0">
						<option value="">모든 카테고리</option>
					</select>
					<select name="type" id="type" class="form-control form-control-sm wd-150 mg-r-5 mg-lg-b-5 mg-b-0">
						<option value="">모든파일</option>
						<option value="image" selected>이미지</option>
						<option value="doc">문서</option>
					</select>
					<div class="input-group wd-250 mg-r-5 mg-lg-b-5 mg-b-0" style="height:calc(1.8125rem + 2px);">
						<span class="input-group-addon pd-0 bd-0">
							<select name="searchItem" id="searchItem" class="form-control form-control-sm">
								<option value="caption">캡션</option>
								<option value="createName">업로더</option>
								<option value="fileId">이미지 ID</option>
							</select>
						</span>
						<input type="text" class="form-control form-control-sm" id="keyword" name="keyword" placeholder="" value="">
					</div>
					<button type="button" class="btn btn-info pd-5 bd-0 mg-l-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="btn_imgSearch" name="btn_imgSearch"><i class="fas fa-search"></i>검색</button>
                    <button type="button" class="btn btn-primary pd-5 bd-0 mg-l-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="btn_imgSelectOk" >선택완료</button>
				</div>
				</form>
							
                <div id="imageRow" class="row d-flex justify-content-start pd-x-20"></div>
                <div id="paging"></div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="relationModal" tabindex="-1" role="dialog" aria-labelledby="relationModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content wd-800 ht-650">
			<div class="modal-header pd-y-10 pd-x-25">
				<h6 class="modal-title wd-600 tx-black" id="relationModalLabel">관련기사</h6>
				<button type="button" class="close tx-28" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body tx-black tx-normal" style="overflow-y: scroll;">
				<form name='relationSearchForm' id='relationSearchForm' onsubmit="return false;">
				<div class="d-flex flex-wrap align-items-center justify-content-end ht-xl-40 mg-b-5">
					<select name="category" id="category" class="form-control form-control-sm wd-150 mg-r-5 mg-lg-b-5 mg-b-0">
						<option value="">모든 카테고리</option>
                        <option class="level-0" value="kwn001000000">정치</option>
                        <option class="level-0" value="kwn001001000">&nbsp;&nbsp;도의회</option>
                        <option class="level-0" value="kwn001002000">&nbsp;&nbsp;시군의회</option>
                        <option class="level-0" value="kwn001003000">&nbsp;&nbsp;남북정상회담</option>
                        <option class="level-0" value="kwn002000000">경제</option>
                        <option class="level-0" value="kwn002001000">&nbsp;&nbsp;금융/증권</option>
                        <option class="level-0" value="kwn003000000">사회</option>
                        <option class="level-0" value="kwn004000000">지역</option>
                        <option class="level-0" value="kwn005000000">교육</option>
                        <option class="level-0" value="kwn006000000">문화</option>
                        <option class="level-0" value="kwn007000000">라이프</option>
                        <option class="level-0" value="kwn008000000">스포츠</option>
                        <option class="level-0" value="kwn009000000">인물</option>
                        <option class="level-0" value="kwn010000000">오피니언</option>
                        <option class="level-0" value="kwn011000000">강원일보TV</option>
					</select>
					<div class="input-group wd-250 mg-r-5 mg-lg-b-5 mg-b-0" style="height:calc(1.8125rem + 2px);">
						<span class="input-group-addon pd-0 bd-0">
							<select name="searchItem" id="searchItem" class="form-control form-control-sm">
                                <option value="title">제목</option>
                                <option value="content">본문</option>
                                <option value="report">기자</option>
                                <option value="modifyName">수정</option>
                                <option value="aid">기사ID</option>
							</select>
						</span>
						<input type="text" class="form-control form-control-sm" id="keyword" name="keyword" placeholder="" value="">
					</div>
					<button type="button" class="btn btn-info pd-5 bd-0 mg-l-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="relationSearch" name="relationSearch"><i class="fas fa-search"></i>검색</button>
                    <button type="button" class="btn btn-primary pd-5 bd-0 mg-l-5 mg-t-0 tx-uppercase tx-13 tx-spacing-2" id="relationOk" >선택완료</button>
				</div>
				</form>
							
                <table class='table table-hover table-striped' id='relationRow'></table>
                <div id="paging"></div>
			</div>
		</div>
	</div>
</div>

<div id="workingpopup" class="overlay">
	<div class="overlay-popup">
    <h2><span id="load-staus"></span></h2>
		<div class="loader"></div>
	</div>
</div>

<!-- text differ modal -->
<script src="/js/diff_match_patch.js"></script>
<script>
var dmp = new diff_match_patch();

function launch() {
  var text1 = document.getElementById('text2').value;
  var text2 = document.getElementById('text1').value;
  dmp.Diff_Timeout = 2;
  dmp.Diff_EditCost = 4;

  var ms_start = (new Date()).getTime();
  var d = dmp.diff_main(text1, text2);
  var ms_end = (new Date()).getTime();
   dmp.diff_cleanupSemantic(d);
   dmp.diff_cleanupEfficiency(d);

  var ds = dmp.diff_prettyHtml(d);
  document.getElementById('outputdiv').innerHTML = ds;
}

function diff(aid){
    $('#outputdiv').html('');
    $('#text2').html($('#diffcontent_'+aid).html());
    $("#artDiffModal").modal('show');

    launch();    
}

function restore(aid, lang){
	if(confirm("정말 복구하시겠습니까??")){
		$(tinymce.get("content").getBody()).html($('#restorecontent_'+aid).html());
	}
}
</script>

<div class="modal fade" id="artDiffModal" tabindex="-1" role="dialog" aria-labelledby="artDiffModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header pd-y-10 pd-x-25">
				<h6 class="modal-title wd-600 tx-black" id="artDiffModalLabel">기사비교</h6>
				<button type="button" class="close tx-28" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body tx-black tx-normal">
                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <h4 class="tx-black mg-b-10"><span>[</span> 현재기사 <span>]</span></h4>
                        <textarea id="text1" style="width: 100%" rows=15>테스트 입니다.</textarea>
                    </div>
                    <div class="col-lg-6">
                        <h4 class="tx-black mg-b-10"><span>[</span> 비교기사  <span>]</span></h4>
                        <textarea id="text2" style="width: 100%" rows=15></textarea></td>
                    </div>
                    <!--p><input type="button" onclick="launch()" value="기사 비교"></p-->
                    <div id="outputdiv" class="ht-300 wd-100p overflow-x-hidden overflow-y-scroll"></div>
                </div>
			</div>
		</div>
	</div>
</div>

<script>   
var filter = "win16|win32|win64|mac|macintel";
var isMobile = false;
var changed=true;

var objId="";
var objText = "";
var selectId="";
var cursolPlace=0;

var coid = 'kwn';

$(document).ready(function(){
    setArticle();

    $('.mce-branding').hide();
    $('#datetimepicker1').datetimepicker({
        locale:'ko',
        format: 'LLL',
        sideBySide: true,
        toolbarPlacement: 'bottom',
        allowInputToggle: true,
        buttons :{
			showToday: true,
			showClose: true
		},
		icons: {
			today : 'far fa-calendar-check'
		},
		tooltips: {
			today : '초기화(오늘날짜)',
			close: '확인'
		}
    });

	$("#datetimepicker1").on("change.datetimepicker", ({date, oldDate}) => {
/*		if($('#embago').val()==""){
			$('#isEmbago').prop('checked',false);
		}else{
			$('#isEmbago').prop('checked',true);
		}*/
	});

	$(document).on('keyup','#embago',function(){
		if($('#embago').val()==""){
			$('#isEmbago').prop('checked',false);
		}else{
			$('#isEmbago').prop('checked',true);
		}
	});

    $("#title,#expTitle").keyup(function (){
		getValueByte(this);
	});

    $("#subTitle, #expSubTitle").keyup(function(){
        getMultiLineByte(this);
    });

    $(document).on('click','#goListBtn',function(){
        location.href = "/article/list";
    })

    // 저장
    $(document).on('click',"#saveBtn",function () {
        articleSave();
    });

    // 바이라인
    $(document).on('click','#bylineBtn',function(){
        byline();
    });

    // 데스크 전송
    $(document).on('click',"#deskBtn",function(){
		articleSave('desk');
    });

    // 미리보기
    $(document).on('click',"#previewBtn",function() {
        window.open("", "preview");
        $("#articleForm").attr("target","preview");
        $("#articleForm").attr("action","http://kwn01.kode.co.kr/newsView/kwn0000000000");
        $("#articleForm").submit();
    });

	// 모바일 미리보기
    $(document).on('click',"#previewMBtn",function() {
        window.open("", "preview");
        $("#articleForm").attr("target","preview");
        $("#articleForm").attr("action","http://mkwn01.kode.co.kr/newsView/kwn0000000000");
        $("#articleForm").submit();
    });

    // 삭제
    $(document).on('click','#deleteArticle',function() {
		if(confirm("정말 삭제하시겠습니까?")){
			$.ajax({
				url: '/data/kwn/list/category/headline.json',
				type: 'GET',
				contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
				dataType: 'json',
				success: function (data) {
					var notHeadLine = true;
					var aid = $("#aid").val();
					$(data.list).each(function () {
						if(this.aid == aid){
							notHeadLine = false;
							return true;
						}
					});
					if(notHeadLine){
						$('#action').val('delete');
						$('#articleForm').submit();
					}else{
						alert('해당기사는 해드라인 영역에 배치되어 있으므로 삭제할 수 없습니다.');
					}
				},
				error: function ( jqXHR, textStatus, errorThrown) {
					if(jqXHR.status==404){
						$('#action').val('delete');
						$('#articleForm').submit();
					}
				}
			});
		}
    });

    // 배포
    $(document).on('click','#articlePublish',function () {
        if(formCheck()){
			$('#articlePublish').attr( 'disabled', true );
            $('#action').val('publish');
            $("input[name=content]").val(tinyMCE.get('content').getContent());
			$("#articleForm").attr("target","");
			$("#articleForm").attr("action","/article/proc");

			$("#load-staus").empty().append('기사를 배포중입니다.');
			$('#workingpopup').show();

            $('#articleForm').submit();
        }
        //articleSave('publish');
    });
    
    
	$(':checkbox[name="articleType"]').on({
		click: function(e) {
			if( $(':checkbox[name="articleType"]:checked').length > 1 ){
				$(':checkbox[name="articleType"]').prop('checked',false);
				$(':checkbox[name="articleType"][value="'+$(this).val()+'"]').prop('checked',true);
			}
			$(':checkbox[name="articleType2"]').prop('checked',false);
			$(':checkbox[name="articleType2"][value="'+$(this).val()+'"]').prop('checked',true);
		}
	});

	$(':checkbox[name="articleType2"]').on({
		click: function(e) {
			if( $(':checkbox[name="articleType2"]:checked').length > 1 ){
				$(':checkbox[name="articleType2"]').prop('checked',false);
				$(':checkbox[name="articleType2"][value="'+$(this).val()+'"]').prop('checked',true);
			}
			$(':checkbox[name="articleType"]').prop('checked',false);
			$(':checkbox[name="articleType"][value="'+$(this).val()+'"]').prop('checked',true);
		}
	});

	$("#seriesWord").keyup(function (event){
		findLiTag("#seriesList",$(this).val());
	});

    $('#channelYN').toggles({
        text: {
            on: '채널',
            off: '전체'
        }
    });   
    
    $('#mainPlace').on("change",function(){
		setBannerPlace();
	});
	setBannerPlace('');

    if($('#depth-first input').length == 0 ){
        $('#depth-second input').show();
        $('#depth-second label').show();
    }
});

function setBannerPlace(/*option*/ place){

    if($("#mainPlace option").length == 1 ){
        $("#mainPlace").hide();
        $("#placeNum").hide();
    }else{
        var layoutId = $("#mainPlace").val();
        $("#placeNum").empty();
        if(layoutId!=""){
            $.ajax({
                url: '/data/'+coid+'/layout/'+layoutId+'Info.json',
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

function articleSave(/*option*/flag){
    $('#saveBtn').attr('disabled', true );
	$('#articlePublish').attr( 'disabled', true );
    $('#action').val(flag==undefined?'save':flag);
    $("#content").val(tinyMCE.get('content').getContent());

    if(formCheck()){
        var params = $('#articleForm').serialize();
        var mediaSub=$('#articleForm input[name*="publishMedia"]').serialize();
        params = params.replace(mediaSub,'');

        $.ajax({
            url: '/article/proc/ajax',
            type: 'POST',
            data: params,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            success: function (result) {
                $("#aid").val(result.aid);
                $("#writeDate").val(result.writeDate);
                $("#modifyDate").val(result.modifyDate);
                $('#relationId').val(result.relationId);
                $('#action').val('');

                if(flag == 'auto'){
					$('#tempsave').show();
                    $('#tempsave').animate({'bottom':'0px'}, 'slow');
                    setTimeout(function(){
                        //$('#tempsave').animate({'bottom':'-200px'}, 'slow');
						$('#tempsave').hide();
                    }, 2000);
                    alert('auto');
                }else if(flag == 'desk'){
                    alert('데스크 전송이 완료되었습니다.');
                    location.reload();
				}else if(flag == 'publish'){
                    alert('기사 발행이 완료되었습니다.');
                    location.reload();
				}else{
                    alert('기사저장이 완료되었습니다.');
					location.reload();
                }
            }, error : function(xhr, status, error){
                console.log(xhr, status, error);
            }
        });
    }
    $('#saveBtn').attr( 'disabled', false );
    $('#articlePublish').attr( 'disabled', false );
}

var findLiTag = function (ulObj,keyword){
    $(ulObj+" li").each(function(index){
        if(keyword=="" || $(this).data("description").search(keyword)!=-1 || $(this).data("name").search(keyword)!=-1 ){
            $(this).show();
        }else{
            $(this).hide();
        }
    });
}

$(".dropdown-menu input[type='checkbox']").change(function() {
	var receiver = $(this).val();
	var id =  $(this).attr('id');

    if(!id) return false;
	if(id.indexOf("Insert")>-1){return false;}

	if($(this).is(":checked")){
		if( receiver+"Modify" == id){
			$("[id="+receiver+"Delete]").attr( 'disabled', true );
		}else{
			$("[id="+receiver+"Modify]").attr( 'disabled', true );
		}
	}else{
		$("[id="+receiver+"Delete]").attr( 'disabled', false );
		$("[id="+receiver+"Modify]").attr( 'disabled', false );
	}
});

// 부트스트렙 드롭다운 내부클릭시 닫히지 않도록
$(document).on('click','.dropdown-menu',function(e) {
    e.stopPropagation();
});

// 발행 checkbox 연동 : click
$(document).on('click','.dropdown-menu input[type="checkbox"]',function(){
    if($(this).is(':checked')){
        $('[name="'+$(this).attr('name')+'"][value="'+$(this).val()+'"]').prop('checked',true);
    }else{
        $('[name="'+$(this).attr('name')+'"][value="'+$(this).val()+'"]').prop('checked',false);
    }
});

// set editing article
var setArticle = function () {
    // 선택된 카테고리 세팅
        $("#in_kwn001000000").attr("checked", true);
        $("#int_kwn001000000").attr("checked", true);
        $("#mainCategory_kwn001000000").closest('.mainCategory').show();
            $("#mainCategory_kwn001000000").prop('checked',true);
	$(':checkbox[name="articleType"][value="자체기사"]').prop('checked',true);
	$(':checkbox[name="articleType2"][value="자체기사"]').prop('checked',true);
}

$(document).ready(function(){
    // 체크 된 카테고리가 있고 Primary를 체크하지 않은 경우 첫번째 카테고리를 Primary 체크 함
    if($("[name=mainCategory]:checked").length == 0 && $('[name="category[]"]:checked').length > 0){
        $('#mainCategory_'+$('[name="category[]"]:checked:eq(0)').val()).prop('checked',true);
    }
});

var byline = function(){   
    var byl = '';
    var firstReprterName = $("input[name$='[name]']").val();
    var firstReprterEmail = $("input[name$='[email]']").val();
    var firstReprterDept = $("input[name$='[dept]']").val();

    if("" != ""){
        byl = "";
    }else if(firstReprterName!=''){
        byl = firstReprterName+(firstReprterDept!=""?" "+firstReprterDept:"")+' 기자 '+firstReprterEmail;
    }else{
        byl = "admin 기자 kodesinfo@gmail.com";
    }
    tinymce.execCommand('mceInsertContent', true, byl);
}

// 카테고리 클릭
$('[name="category[]"]').on('click',function(){
    // mainCategory 처리
    if($(this).is(':checked')){
        $('#mainCategory_'+$(this).val()).closest('.mainCategory').show();
        if($('input:checkbox[name="category[]"]:checked').length == 1){
            $('#mainCategory_'+$(this).val()).prop('checked',true);
        }
    }else{
        $('#mainCategory_'+$(this).val()).closest('.mainCategory').hide();
        if($('#mainCategory_'+$(this).val()).is(':checked')){
            $('#mainCategory_'+$(this).val()).prop('checked',false);
            $('#mainCategory_'+$('input:checkbox[name="category[]"]:checked').val()).prop('checked',true);
        }
    }
});

// form check
var formCheck = function () {
    // 제목 체크
    if($('#title').val() == ''){
        alert('제목을 입력하세요.');
        $('#title').focus();
        return false;
    }

    // 카테고리 체크
    var categoryCheck=$('input:checkbox[name="category[]"]:checked').length;
    if(categoryCheck == 0){
        alert("카테고리를 한개이상 선택 하셔야 합니다.");
        return false;
    }
    // 메인 카테고리 체크
    var categoryCheck=$('input:radio[name="mainCategory"]:checked').length;
    if(categoryCheck == 0){
        alert("Primary 카테고리를 선택하세요.");
        return false;
    }
	//자체기사 or 기타 체크
	if( $(':checkbox[name="articleType"]:checked').length == 0 ){
		alert("자체기사인지 기타인지 체크하세요.");
		return false;
	}


    return true;
}

var getValueByte = function (obj){
    let id = $(obj).attr('id');
    let s = $(obj).val();
    let hgByte = 2;
    for(b=i=0;c=s.charCodeAt(i++);b+=c>>11?hgByte:c>>7?2:1);
    $("#"+id+"Byte").text(b);
}

var getMultiLineByte = function (obj){
	var text = $(obj).val().split('\n');
	var hgByte = 2;
	var maxSize = 0;

	text.forEach(function (element){
		for(b=i=0;c=element.charCodeAt(i++);b+=c>>11?hgByte:c>>7?2:1);	
		if(maxSize < b){
			maxSize = b;
		}
	});
	$('#'+$(obj).attr('id')+'Byte').text(maxSize);
}


var countMenuscript = function (content) {
    content = content.replace('/<(p|br)>/ig', '\n');
    content = removeTag(content);

    var returnVal = {
        'charNum': 0,
        'allMsNum': 0,
        'pageNum': 0
    };
    returnVal['charNum'] = content.length;
    var paragraph = content.split('\n');

    // 문단별 글자수 세기
    for (var i in paragraph) {
        var halfChar = paragraph[i].match(/[a-z0-9]+/gi);
        var paragrapCharNum = paragraph[i].length;
        for (var j in halfChar) {
            var hcNum = halfChar[j].length
            var paragrapCharNum = paragrapCharNum - hcNum;
            var msNum = Math.ceil(hcNum / 2);
            paragrapCharNum = paragrapCharNum + msNum;
        }
        if ((paragraph.length - 1) > i) {
            returnVal['allMsNum'] += Math.ceil(paragrapCharNum / 20) * 20;
        } else {
            returnVal['allMsNum'] += paragrapCharNum;
        }
    }
    returnVal['pageNum'] = (returnVal['allMsNum'] / 200).toFixed(1);

    //console.log('글자수 : '+charNum+', 원고지 문자수 : '+allMsNum+', 원고지 매수 : '+pageNum);
    $('#wordNum').text(returnVal['charNum']);
    $('#pageNum').text(returnVal['pageNum']);
}

var removeTag = function (html) {
    return html.replace(/<[/]?[a-z]+[^>]*>/gi, "");
}

/** 에티더 셋팅 **/
if (navigator.platform) {
    isMobile = filter.indexOf(navigator.platform.toLowerCase()) < 0 ? true : false;
}
    
if (isMobile) {
    var tinySet = {
        selector: '#content',
        language_url : '/lib/tinymce/langs/ko_KR.js',
        language: 'ko_KR',
        toolbar: 'bold italic underline strikethrough |alignleft aligncenter alignright',
        menubar: false,
        toolbar_items_size: 'small',
        forced_root_block: false,
        image_caption: true,
        object_resizing: true,
        content_css: "/lib/tinymce/skins/lightgray/content.mobile.min.css",
        min_height: 150,
        max_height: 300,
        max_width: 350
    };
} else {
    var tinySet = {
        selector: '#content',
        language_url : '/lib/tinymce/langs/ko_KR.js',
        language: 'ko_KR',
        plugins: ['advlist autolink lists link charmap print preview anchor table textcolor colorpicker',
            'searchreplace visualblocks code fullscreen image',
            'insertdatetime table contextmenu paste'
        ],
        autolink_pattern: /^(https?:\/\/|ssh:\/\/|ftp:\/\/|file:\/|www\.)(.+)$/i,
        contextmenu: "copy cut paste | link image inserttable | cell row column deletetable",
        toolbar: 'fontselect fontsizeselect forecolor backcolor | bold italic underline strikethrough subscript superscript blockquote | alignleft aligncenter alignright | bullist numlist outdent indent | movieButton table charmap line | code ',
        setup: function(editor) {
            editor.ui.registry.addButton( 'movieButton', {
                icon: 'embed', 
                tooltip: '외부 동영상 입력',
                onAction:() => {
                    editor.windowManager.open({
                        title: '외부동영상 입력',
                        body: {
                            type: 'panel',
                            items: [
                                {
                                    type: 'input',name: 'url', label: '동영상 주소', id: 'url'
                                },
                                {
                                    type: 'input',name: 'script', label: '스크립트', id: 'script'
                                },
                                {
                                    type: 'input',name: 'width', label: '넓이', id: 'width' , value:'800'
                                },
                                {
                                    type: 'input',name: 'height', label: '넓이', id: 'height', value:'450'
                                }
                            ]
                        },
                        buttons: [
                            {
                                type: 'cancel',name: 'closeButton',text: '취소'
                            },
                            {
                                type: 'submit',name: 'submitButton',text: '확인',primary: true
                            }
                        ],
                        onSubmit: function (api) {
                            var data = api.getData();
                            
                            if(data.url != "" ){
                                if( data.url.indexOf("naver")!= -1 ){
                                    data.url=data.url.replace( '/v/', '/embed/' );
                                }else if( data.url.indexOf("kakao")!= -1 ){
                                    data.url=data.url.replace( '/v/', '/embed/player/cliplink/' );
                                }else if( data.url.indexOf("//youtu.be/")!= -1 ){
                                    data.url=data.url.replace( '//youtu.be/', '//www.youtube.com/embed/' );
								}
								var width=640; 
								var height=480;
								if(data.width!="")width=data.width;
								if(data.height!="")height=data.height;
                                editor.insertContent("<figure class='image align-center youtubeWrap'><iframe src='"+ data.url + "' width='"+ width + "' height='"+ height + "' frameborder='no' marginwidth='0' marginheight='0' scrolling='no' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen='allowfullscreen'></iframe><figcaption></figcaption></figure>");
                                api.close();
                            }else if(data.script != "" ){
                                editor.insertContent("<figure class='image align-center'>"+data.script+"<figcaption></figcaption></figure>");
                                api.close();
                            }
                        }
                    });
                } 
            });

            editor.ui.registry.addButton( 'line', {
                icon: 'more-drawer', 
                tooltip: '라인',
                onAction:function(){
					editor.insertContent("<hr class='line'></hr>");
				}
			});
            
            editor.on('init', function (evt) {
                var content = editor.getContent();
                content = content.replace('/<(p|br)>/ig', '\n');
                content = removeTag(content);
                countMenuscript(content);

				$('button[title="Fonts"]').width('80');
				$('button[title="폰트 사이즈"]').width('48');
            });

            editor.on('keydown', function (evt) {
                var content = editor.getContent();
                content = content.replace('/<(p|br)>/ig', '\n');
                content = removeTag(content);
                countMenuscript(content);
            });
        },
        menubar: false,
        toolbar_items_size: 'small',
        forced_root_block: false,
        image_caption: true,
        object_resizing: true,
        content_css: "/lib/tinymce/skins/lightgray/content.min.css?v=20200905001",
        draggable_modal: true,
        min_height: 300,
        max_height: 600,
        font_formats: '굴림=Gulim,GulimChe,Arial;돋움=DotumChe, AppleGothic;바탕=Batang,BatangChe,Verdana;궁서=궁서, Gungsuh, GungSeo',
        charmap_append: [[0x00B7,'·'],[0x2026,'…'],
                        [0x25C7,'◇'],[0x25C6,'◆'],[0x25B3,'△'],[0x25B2,'▲'],[0x25B7,'▷'],[0x25B6,'▶'],
                        [0x339D, '㎝'],[0x339C, '㎜'],[0x339E, '㎞'],[0x339B, '㎛'],[0x339A, '㎚'],
                        [0x33A0, '㎠'],[0x33A1, '㎡'],[0x33A2, '㎢'],[0x33A3, '㎣'],[0x33A4, '㎥'],[0x33A5, '㎦'],
                        [0x338D, '㎍'],[0x338E, '㎎'],[0x338F, '㎏'],
                        [0x3395, '㎕'],[0x3396, '㎖'],[0x3397, '㎗'],[0x3398, '㎘']
        ],
        table_default_attributes: {
            'padding' : '0', 'margin' : '0', 'border': '1px solid'
        },
        table_default_styles: {
            width: '100%'
        },
        allow_script_urls: true,
        valid_elements: "*[*]",
        extended_valid_elements: 'script[language|type|src]',
        paste_preprocess: function(plugin, args){

            var newText = args.content.replace(/[<]br[\/]*[>]/ig,"\n");
            newText = newText.replace(/[<][\/]*p[>]/ig,"\n\n");
            newText = newText.replace(/\n{2,}/ig,"\n\n");
            newText = newText.replace(/(<([^>]+)>)/ig,"");
            newText = newText.replace(/\n/g, "<br/>");
            args.content = newText;
                                
            //문단별 글자수 세기
            var content = args.content;
            content = content.replace('/<(p|br)>/ig', '\n');
            content = removeTag(content);
            countMenuscript(content);
        }
    };
}
tinymce.init(tinySet);
/** 에티더 셋팅 **/

/** dropzone 셋팅 **/
var drop = $('.dropzonePreview').html();
$('.dropzonePreview').remove();

var imgDropzone = "";

$("div#dropzone").dropzone({
    url: "/file/upload",
    params: {
        coid: "kwn",
        display : "N"
    },
    previewTemplate: drop,
    thumbnailWidth: 120,
    thumbnailHeight: 120,
    init: function () {
        imgDropzone = this;
        $("#watermark,#imgPlace").popover({
            trigger: "click"
        });
    },
	sending: function(){
		$("#load-staus").empty().append('파일을 업로드중입니다.');
		$('#workingpopup').show();
	},
    success: function (file) {
        uploadInfo = JSON.parse(file.xhr.responseText);
        console.log(uploadInfo);
        $(file.previewElement).attr("fileId", uploadInfo['fileId']);
        $(file.previewElement).find('.fileId').val(uploadInfo['fileId']);
        $(file.previewElement).find('.filePath').val(uploadInfo['filePath']);
        $(file.previewElement).find('.imgWidth').val(uploadInfo['width']);
        $(file.previewElement).find('.imgHeight').val(uploadInfo['height']);
        $(file.previewElement).find('.imgsize').val(uploadInfo['size']);
        $(file.previewElement).find('.orgName').val(uploadInfo['orgName']);
        $(file.previewElement).find('.imgCaption').val(uploadInfo['caption']);
        $(file.previewElement).find('.imgWatermark').val(0);
        $(file.previewElement).find('.type').val(uploadInfo['type']);
        $(file.previewElement).find('.ext').val(uploadInfo['ext']);
        if(uploadInfo['type']=="doc"){
            this.emit('thumbnail', file, "/image/"+uploadInfo['ext']+".png");
        }
        $(".image-message").hide();
        $("#watermark,#imgPlace").popover({
            trigger: "click"
        });
    },
    error: function(jqXHR, textStatus, errorThrown){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    complete:function(file){
        uploadInfo = JSON.parse(file.xhr.responseText);
        $("#"+uploadInfo['fileId']+" .dz-progress").hide();
		$('#workingpopup').hide();
    }
});

//  dropzone 이미지 드래그 이동 세팅
$(".sortable").sortable();

// 이미지 info 정보 획득
var getImageInfo = function (obj) {
    var imgFullPath = obj.parent().parent().find("input[name='filePath[]']").val();
    var imgFileName = imgFullPath.match(/[^\/]+$/i)[0];
    var fileId = obj.parent().parent().find('.fileId').val();
    var width = obj.parent().parent().find('.imgWidth').val();
    var height = obj.parent().parent().find('.imgHeight').val();
    var size = obj.parent().parent().find('.imgsize').val();
    var caption = obj.parent().parent().find('.imgCaption').val();
    var watermark = obj.parent().parent().find('.imgWatermark').val() == "" ? 0 : obj.parent().parent().find('.imgWatermark').val();
    return {
        'fileId': fileId,
        'imgFullPath': imgFullPath,
        'imgFileName': imgFileName,
        'width': width,
        'height': height,
        'size': size,
        'caption': caption,
        'watermark': watermark
    };
}

// 이미지 본문 위치
var imgInfo;
$(document).on("click", ".imgPlace", function(e){
    var temp = $(e.target);
    imgInfo = getImageInfo(temp);

    $('#captionYN').toggles({
        text: {
            on: '적용',
            off: '미적용'
        }
    });
});

$(document).on("click", ".popover #imgPlaceTool .fa" , function(e){
    var place = $(e.target).attr('class');
    var align = place.match(/(left|center|right)/i);
    imgInfo["watermark"] = (imgInfo["watermark"]?imgInfo["watermark"]:"0");
    var captionToggle = $('#captionYN').data('toggles');
    captionYN = captionToggle.active;

    const regex = /gif$/i;
    if(regex.exec(imgInfo['imgFileName'])){
        var src = imgInfo["imgFullPath"];
    }else{
        var src = imgInfo["imgFullPath"].replace(/(.+)[.]([a-z]+)$/g,"$1."+(imgInfo["width"]<800 && imgInfo["width"]!="" ?imgInfo["width"]:"800")+"x." + imgInfo["watermark"] + ".$2");
    }

    tinymce.execCommand('mceInsertContent', true, "<figure class='image align-" + align[0] +
        "'><img contenteditable='true' src='" + src + "'/><figcaption>" +(captionYN == true ?  ' ▲ '+imgInfo["caption"] : '') +
        "</figcaption></figure>");
	$('div[fileId="'+imgInfo['fileId']+'"] #imgPlace').popover('hide')
});

// 워터마크 팝업 오픈 시 처리
$(document).on('click','#watermark',function(){
    var imgWatermark = $(this).closest(".card-content").find('.imgWatermark').val();
    $('#wmPositionTool img[src="/image/position_'+imgWatermark+'.png"]').css('border-color', 'red');
});

// 워터마크 기록
$(document).on("click", '#wmPositionTool img', function(e){
    var popoverId = $(this).closest('.popover').attr('id');
    var src = $(this).attr('src');
    var place = src.match(/[0-9]/i);
    $("#dropzone").find("[aria-describedby="+popoverId+"]").closest(".card-content").find('.imgWatermark').val(place[0]);
    $('#' + popoverId ).popover('hide');
});
  
/** dropzone 셋팅 **/


// 이미지 편집기 오픈
var goEdit = function (obj) {
    window.open("", "imageEdit", "width=1400,height=800");
    var imgInfo = getImageInfo($(obj));
    window.open('/image/editor?fileId=' + imgInfo['fileId'] + "&ref=article", "imageEdit");
}

// 이미지 다운로드
$(document).on("click", ".imgDown",function (){
    var imgInfo=getImageInfo($(this));
    location.href="/download.php?file=."+imgInfo.imgFullPath;
});

var imageDelete = function (fileId, filePath) {
    if (confirm('해당 파일을 삭제하시겠습니까')) {
        $.ajax({
            url: '/image/delete/ajax',
            method: 'POST',
            data: {
                'fileId': fileId,
                'filePath': filePath
            }
        }).done(function (data) {
            alert('삭제');
        });
    }
}

// 이미지 복사
$(document).on("click", ".imgCopy",function (){
    var imgInfo=getImageInfo($(this));

	var params = {"fileName":imgInfo.imgFileName,"filePath":imgInfo.imgFullPath};

	$.ajax({
            url: '/file/copy/ajax',
            type: 'POST',
            data: params,
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            dataType: 'json',
            success: function (result) {
				mockFile = {
					"fileId": result.fileId,
					"thumb": result.sfilePath,
					"orgName": result.orgName,
					"caption": result.caption,
					"width": result.width,
					"height": result.height,
					"size": result.size,
					"filePath": result.filePath,
					"type": result.type,
					"ext": result.ext,
					"watermarkPlace": 0,
				};
				imgDropzone.emit('addedfile', mockFile);
				$(mockFile.previewElement).attr("fileId", mockFile['fileId']);
				$(mockFile.previewElement).find('.filePath').val(mockFile['filePath']);
				$(mockFile.previewElement).find('.fileId').val(mockFile['fileId']);
				$(mockFile.previewElement).find('.imgWidth').val(mockFile['width']);
				$(mockFile.previewElement).find('.imgHeight').val(mockFile['height']);
				$(mockFile.previewElement).find('.imgsize').val(mockFile['size']);
				$(mockFile.previewElement).find('.orgName').val(mockFile['orgName']);
				$(mockFile.previewElement).find('.viewTitle').text(mockFile['orgName']);
				$(mockFile.previewElement).find('.imgCaption').val(mockFile['caption']);
				$(mockFile.previewElement).find('.imgWatermark').val(mockFile['watermarkPlace']);
				$(mockFile.previewElement).find('.type').val(mockFile['type']);
				$(mockFile.previewElement).find('.ext').val(mockFile['ext']);
				$(mockFile.previewElement).find('.card-image').append('<span class="img-copy">Copy</span>');

				imgDropzone.emit('thumbnail', mockFile, mockFile['thumb']);
				$("#watermark,#imgPlace").popover({
					trigger: "click"
				});
		
				$(mockFile.previewElement).find('.thumbnail').attr('src',result['filePath'].replace(/([.][a-z]+)$/gm,'.120x120.0$1'));

				var temp = $("#dropzone [fileId="+ mockFile['fileId']+"]").clone();
				$("#dropzone [fileId="+ mockFile['fileId']+"]").remove();
				$("#dropzone").prepend(temp);
			}
	});


});


/** 기자 정보 **/
var reporterplus = function(){
    var tmpIdx = ++/\[([0-9]+)\]/.exec($("input[name$='[name]']").last().attr('name'))[1];
    var h = tmpIdx*33+10;
    $('#reportersDiv').append('<span class="input-group input-group-sm"><input type="hidden" name="reporter['+tmpIdx+'][id]" class="form-control" id="reporterId" value="" /><input type="hidden" name="reporter['+tmpIdx+'][email]" class="form-control" id="reporterEmail" value=""><input type="hidden" name="reporter['+tmpIdx+'][dept]" class="form-control" id="reporterDept" value=""><input type="text" name="reporter['+tmpIdx+'][name]" class="form-control" id="reporterName" onkeyup="javascript:reporterSearch(this);" onfocusout="javascript:reporterhide(this);return false;" autocomplete="off"/><span class="input-group-addon"><i class="fa fa-times reporter-del" aria-hidden="true" style="top: '+h+'px;" onclick="javascript:reporterminus(this)"></i></span></span>');
}

var reporterminus = function(obj){
    var tidx =	$("input[name$='[name]']").length;
    if(tidx > 1 ){
        $(obj).parent().parent().remove();
        $('#reportersDiv .reporter-del').each(function(i){
            $(this).css('top',i*33+10);
        });
    }else{
        alert('기자는 1명이상이어야 합니다.');
    }
}

var temp;
var reporterSearch = function(obj){
    var reporterName = $(obj).val();
    var dwidth = Number($(obj).width())+26;
    var dtop = Number($(obj).parent().find('input').offset().top)+30;

    if( event.keyCode != 38 &&  event.keyCode != 40 ){
        $.ajax({
            type : 'POST',
            url : '/user/search/ajax',
            type: 'GET',
            data: {userName: reporterName},
            contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
            success : function(result) {
                var data = JSON.parse(result);
                    
                var rhtml = '<div style="position: absolute;z-index: 999;background-color: #fff;border: 1px solid;width:'+dwidth+'px;top:'+dtop+'px;">'
                rhtml+='<ul style="margin-bottom:0;padding:1px;list-style: none;">';
                temp = data;
                if(data[0] != ""){
                    for(var i=0;i < data.length;i++){
                        rhtml+='<li class="rptRecom" style="padding:1px 2px 1px 0;" onclick="javascript:reportInput(\''+$(obj).attr('name')+'\',\''+data[i].userName+'\',\''+data[i].userId+'\',\''+data[i].email+'\',\''+data[i].dept+'\',this);">'+data[i].userName+'('+data[i].userId+')</li>';
                    }
                }
                rhtml+='</ul></div>';
                $(obj).parent().find('div').remove();
                $(obj).parent().append(rhtml);
                $('input[name="'+$(obj).attr('name').replace('name','id')+'"]').val();
               
            }, error : function(xhr, status, error){
                console.log(xhr, status, error);
            }
        });
    }
}

var reportInput = function(obj,userName,userId,userEmail,dept,thi){
    $('input[name="'+obj+'"]').val(userName);
    $('input[name="'+obj.replace('name','id')+'"]').val(userId);
    $('input[name="'+obj.replace('name','email')+'"]').val(userEmail);
    dept=(dept=='undefined' || dept==""?"":dept);
    $('input[name="'+obj.replace('name','dept')+'"]').val(dept);

    $(thi).parent().parent().remove();
}

var reporterhide = function(obj){
    setTimeout(function(){
        $(obj).parent().find('div').hide();
    }, 500);
}
/** 기자 정보 **/

/** modal event **/
$(document).on('click', "#btn_imgModal", function (){
    $("#imgSearchModal").modal('show');
    imageSearch($("#frm_imgSearch #category").val(), $("#frm_imgSearch #type").val(),$("#frm_imgSearch #searchItem").val(), $("#frm_imgSearch #keyword").val(), 1, 'imageRow' );
});

$(document).on('click', "#btn_imgSearch", function (){
    imageSearch($("#frm_imgSearch #category").val(), $("#frm_imgSearch #type").val(),$("#frm_imgSearch #searchItem").val(), $("#frm_imgSearch #keyword").val(), 1, 'imageRow' );
});

var imageSearch = function(category, type, searchItem, keyword, page, listObjId){
    params = "category="+category+"&type="+type+"&searchItem="+searchItem+"&keyword="+keyword+"&noapp=20&returnType=ajax&page="+page;
    $("#"+listObjId).empty();
    $.ajax({
        url: '/image/list/ajax',
        type: 'GET',
        data: params,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        dataType: 'json',
        success: function (data) {
            $(data.list.imageList).each(function () {
                htmlCaption=(typeof this.caption !== 'undefined' && this.caption != null ?convertSpecialChar(this.caption):"");
                $("#"+listObjId).append(
                    "<div class='mg-5 search-imgcard' style='position: relative; width:140px;height:100px;display: flex;background-image: url("+this.fileListPath+");background-color: white;background-repeat: no-repeat;background-position: center;' title='"+htmlCaption+"'/>"+
                    "<input type='checkbox' class='imgCheckbox' name='fileId[]' value='"+this.fileId+"'>"+
                    (htmlCaption==""?"":
                    "<div class='caption' style='width: 100%;white-space: normal;line-height: 15px;overflow: hidden;position: absolute;bottom: 0;height: 30px;color: #fff;background-color: rgba(10, 10, 10, 0.5);padding-left:5px;'>"+htmlCaption+"</div>")+
                    "<input type='hidden' id='src_"+this.fileId+"' value='"+this.filePath+"'>"+
                    "<input type='hidden' id='thumbnail_"+this.fileId+"' value='"+this.fileSListPath+"'>"+
                    "<input type='hidden' id='caption_"+this.fileId+"' value='"+htmlCaption+"'>"+
                    "<input type='hidden' id='width_"+this.fileId+"' value='"+this.width+"'>"+
                    "<input type='hidden' id='height_"+this.fileId+"' value='"+this.height+"'>"+
                    "<input type='hidden' id='size_"+this.fileId+"' value='"+this.size+"'>"+
                    "<input type='hidden' id='watermarkPlace_"+this.fileId+"' value='"+this.watermarkPlace+"'>"+
                    "<input type='hidden' id='type_"+this.fileId+"' value='"+this.type+"'>"+
                    "<input type='hidden' id='ext_"+this.fileId+"' value='"+this.ext+"'>"+
                    "</div>"
                );
            });

            var paging ='';
            paging +='<div class="ht-60 d-flex align-items-center justify-content-end">';
            paging +=' <nav aria-label="Page navigation">';
            paging +='    <ul class="pagination pagination-basic mg-b-0">';
            if(data.list.page.prevPage > 1){
            paging +='       <li class="page-item">';
            paging +='         <a class="page-link" href=\'javascript:imageSearch("'+category+'" ,"'+type+'","'+searchItem+'", "'+keyword+'", '+data.list.page.prevPage+',"'+listObjId+'");\' aria-label="Previous">';
            paging +='          <i class="fa fa-angle-left"></i>';
            paging +='        </a>';
            paging +='      </li>';
            }	  
            $(data.list.page.navibar).each(function() {
                paging +='      <li class="page-item '+(page==this.page?'active':'')+'"><a class="page-link" href=\'javascript:imageSearch("'+category+'", "'+type+'", "'+searchItem+'", "'+keyword+'", '+this.page+',"'+listObjId+'");\'>'+this.page+'</a></li>';
            });
            if(data.list.page.nextPage > 1){
            paging +='      <li class="page-item">';
            paging +='        <a class="page-link" href=\'javascript:imageSearch("'+category+'", "'+type+'", "'+searchItem+'", "'+keyword+'", '+data.list.page.nextPage+',"'+listObjId+'");\' aria-label="Next">';
            paging +='          <i class="fa fa-angle-right"></i>';
            paging +='        </a>';
            paging +='      </li>';
            }

            paging +='    </ul>';
            paging +='  </nav>';
            paging +='</div>';

            $("#"+listObjId).parent().find('#paging').empty().append(paging);
        }
    });		
}

$(document).on('click','.search-imgcard', function(e){
    $(e.target).parent().addClass('bd-1');
});

$("#btn_imgSelectOk").click(function(){
    $("#imageRow input:checkbox:checked").each(function(){
        var fileId = $(this).val();
        var filePath = $("#src_"+fileId).val();
        var thumb = $("#thumbnail_"+fileId).val();
        var caption = $("#caption_"+fileId).val();
        var width = $("#width_"+fileId).val();
        var height = $("#height_"+fileId).val();
        var size = $("#size_"+fileId).val();
        var type = $("#type_"+fileId).val();
        var ext = $("#ext_"+fileId).val();
        var watermarkPlace = $("#watermarkPlace_"+fileId).val();
		if(watermarkPlace=="undefined")watermarkPlace="0";

        mockFile = {
            "fileId": fileId,
            "thumb": thumb,
            "caption": caption,
            "width": width,
            "height": height,
            "size": size,
            "filePath": filePath,
            "type": type,
            "ext": ext,
            "watermarkPlace": watermarkPlace,
        };

        imgDropzone.emit('addedfile', mockFile);
        $(mockFile.previewElement).attr("fileId", mockFile['fileId']);
        $(mockFile.previewElement).find('.filePath').val(mockFile['filePath']);
        $(mockFile.previewElement).find('.fileId').val(mockFile['fileId']);
        $(mockFile.previewElement).find('.imgWidth').val(mockFile['width']);
        $(mockFile.previewElement).find('.imgHeight').val(mockFile['height']);
        $(mockFile.previewElement).find('.imgsize').val(mockFile['size']);
        $(mockFile.previewElement).find('.imgCaption').val(mockFile['caption']);
        $(mockFile.previewElement).find('.type').val(mockFile['type']);
        $(mockFile.previewElement).find('.ext').val(mockFile['ext']);
        $(mockFile.previewElement).find('.imgWatermark').val(mockFile['watermarkPlace']);

        imgDropzone.emit('thumbnail', mockFile, mockFile['thumb']);
    });
    $("#watermark,#imgPlace").popover({
            trigger: "click"
        });
//		alert('관련 이미지가 선택되었습니다.');
    $("#imgSearchModal").modal('hide');
    $(".image-message").hide();
});

// 2. 관련기사
$("#relationSearch").click(function(){
    articleSearch($("#relationSearchForm #category").val(), $("#relationSearchForm #searchItem").val(), $("#relationSearchForm #keyword").val(), 1, 'relationRow' );
});

$('#relationModal').on('shown.bs.modal', function () {
    $("#relationRow").empty();
    $(".tablenav-pages").remove();
});

$('#relationModal #keyword').keyup(function(e){
    if(e.keyCode == 13){
        articleSearch($("#relationSearchForm #category").val(), $("#relationSearchForm #searchItem").val(), $("#relationSearchForm #keyword").val(), 1, 'relationRow' );
    }
});

var articleSearch = function (category, searchItem, keyword, page, listObjId){
    params = "category="+category+"&searchItem="+searchItem+"&keyword="+keyword+"&serviceType=publish&returnType=ajax&noapp=10&searchType=relation&page="+page;
    $("#"+listObjId).empty();
    $.ajax({
        url: '/article/list/ajax',
        type: 'GET',
        data: params,
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        dataType: 'json',
        success: function (data) {
            var thisPage = parseInt(data.list.thisPage);
            var lastPage = parseInt(data.list.lastPage);
            category = category.trim();

            $(data.list.articleList).each(function() {
                htmlTitle=convertSpecialChar(this.title);
                $("#"+listObjId).append(
                    "<tr>" +
                    "<td> <input type='checkbox' id='aid[]' value='"+this.aid+"'></td>"+
                    "<td> "+this.title+" <input type='hidden' id='at_"+this.aid+"' value='"+htmlTitle+"'></td>" +
                    "<td> "+this.reporter[0].name+"<input type='hidden' id='rp_"+this.aid+"' value='"+this.repoterName+"'></td>"+
                    "</tr>"
                );
            });

            var paging ='';
            paging +='<div class="ht-60 d-flex align-items-center justify-content-end">';
            paging +=' <nav aria-label="Page navigation">';
            paging +='    <ul class="pagination pagination-basic mg-b-0">';
            if(data.list.page.prevPage > 1){
            paging +='       <li class="page-item">';
            paging +='         <a class="page-link" href=\'javascript:articleSearch("'+category+'", "'+searchItem+'", "'+keyword+'", '+data.list.page.prevPage+',"'+listObjId+'");\' aria-label="Previous">';
            paging +='          <i class="fa fa-angle-left"></i>';
            paging +='        </a>';
            paging +='      </li>';
            }
            $(data.list.page.navibar).each(function() {
                paging +='      <li class="page-item '+(page==this.page?'active':'')+'"><a class="page-link" href=\'javascript:articleSearch("'+category+'", "'+searchItem+'", "'+keyword+'", '+this.page+',"'+listObjId+'");\'>'+this.page+'</a></li>';
            });
            if(data.list.page.nextPage > 1){
            paging +='      <li class="page-item">';
            paging +='        <a class="page-link" href=\'javascript:articleSearch("'+category+'", "'+searchItem+'", "'+keyword+'", '+data.list.page.nextPage+',"'+listObjId+'");\' aria-label="Next">';
            paging +='          <i class="fa fa-angle-right"></i>';
            paging +='        </a>';
            paging +='      </li>';
            }

            paging +='    </ul>';
            paging +='  </nav>';
            paging +='</div>';

            $("#"+listObjId).parent().find('#paging').empty().append(paging);
        }, error : function(xhr, status, error){
            console.log(xhr, status, error);
        }
    });
}

var convertSpecialChar = function (str){
    return str.replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;").replace(/'/g, "&apos;");
}

$("#relationOk").click(function(){
    $("#relationRow input:checkbox:checked").each(function(){
        var aid = $(this).val();
        var title = $("#at_"+aid).val();
        $("#relationOkList").append(
            "<tr style='height:20px;'>" +
            "<td> <input type='checkbox' id='relationAid[]' name='relationAid[]' value='"+aid+"' checked></td>"+
            "<td> "+title+"</td>" +
            "</tr>"
        );
    });
    $(".relation-message").hide();
    alert('관련기사가 선택되었습니다.');
    $("#relationModal").modal('hide');
});
/** modal event **/


/** Youtube Search **/
$("#btn_youtubeSearch").click(function () {
    getYouTubeList('');
});

$("#youtubeKeyword").keyup(function(e){
    if(e.keyCode == 13){
        getYouTubeList('');
    }
});

var getYouTubeList = function (pageToken) {
    var searchKey = encodeURIComponent($("#youtubeKeyword").val());
    var channelId = '';
    var apiKey = "AIzaSyBHtZYCCXmqlM8AXn6zO20GwwQQzNYzt8U";
    var params = "part=snippet&maxResults=20&order=date&q=" + searchKey + "&key=" + apiKey + (pageToken == "" ? "" : "&pageToken=" + pageToken )
                    + ($('#channelYN').data('toggles').active==true? "&channelId="+channelId : "");
    // 내 채널 검색

    $("#youtubeList").empty();
    $(".youTubeNavi").empty();

    $.ajax({
        url: 'https://www.googleapis.com/youtube/v3/search',
        type: 'GET',
        data: params,
        dataType: "json",
        success: function (data) {
            $(data.items).each(function () {
                $("#youtubeList").append(
                    "<div class='card' style='width:150px; height:150px; margin: 5px; margin-bottom:10px; position:relative;'>" +
                    "<button type='button' onclick='youtubePlace(this)' style='position:absolute; left:5px;top:3px;z-index:50' ><i class='fas fa-sign-in-alt'></i></button><span><label style='position:absolute;left:40px;top:3px;z-index:50;color:#fff'>캡션없이<input type='checkbox' class='captionYN'></label></span><span class='badge'  style='position:absolute; margin:30px 0 0 10px; z-index:60;max-width:120px; overflow:hidden; color: #fff;' >"+this.snippet.channelTitle+"</span>" +
                    "<div class='card-image'>" +
                    "<img class='thumbnail' width='150px' src='" + this.snippet.thumbnails.default.url + "' />" +
                    "<div st+yle='overflow:hidden; height:40px;'>" + this.snippet.title +"</div>" +
                    "<input type='hidden' name='youtubeId[]' value='" + this.id.videoId + "'>" +
                    "<input type='hidden' name='youtubeThumbnail[]' value='" + this.snippet.thumbnails.default.url + "'>" +
                    " <input type='hidden' name='youtubeTitle[]' value='" + this.snippet.title + "'>" +
                    "</div></div>");
            }).promise().done(function () {
                if (data.prevPageToken) {
                    $(".youTubeNavi").append("<a href='javascript:getYouTubeList(\"" + data.prevPageToken + "\");' style='color:#fff;margin-right:40px;'>< 이전</a>");
                }
                if (data.nextPageToken) {
                    $(".youTubeNavi").append("<a href='javascript:getYouTubeList(\"" + data.nextPageToken + "\");' style='color:#fff'>다음 ></a>");
                }
            });
        },
        error: function (xhr, textStatus) {
            console.log(xhr.responseText);
            alert('검색 에러  T..T');
            return;
        }
    });
}

var youtubePlace = function (obj) {
    var movieInfo = $("#movieInfo").val();
    var pObj = $(obj).parent();
    var youtubeId = pObj.find("input[name*='youtubeId']").val();
    var youtubeThumbnail = pObj.find("input[name*='youtubeThumbnail']").val();
    var youtubeTitle = pObj.find("input[name*='youtubeTitle']").val();
    var captionYN=pObj.find(".captionYN").is(":checked");

    $("#inMovie").val(1);
    $("#movieInfo").val(movieInfo+(movieInfo==""?"":",")+"youtube|"+youtubeId);
    tinymce.execCommand('mceInsertContent', false,
        "<figure class='image youtubeWrap align-center'><iframe contenteditable='true' width='800px' height=430px' src='https://www.youtube.com/embed/" +
        youtubeId + "?ecver=1' frameborder='0' allowfullscreen></iframe><figcaption>"+(captionYN?"":"▲ "+youtubeTitle)+"</figcaption></figure>");
}
/** Youtube Search **/

var useArticle = function (){
    $.ajax({
        url: '/article/use',
        type: 'POST',
        contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
        dataType: 'json',
        data: {
            "aid":$('#aid').val(),
            'userId':'admin',
            'userName':'admin',
            'startDate':'2021-10-12 11:10:38',
        }
    });
}

var checkCategory = function(obj){
    var categoryId = $(obj).val();
    var categoryChecke = $(obj).is(":checked");
    $("#in_"+categoryId).prop('checked', categoryChecke);
}

var selectCategory = function(pid,flag){
    if(flag!=''){
        $('.'+pid+'_child').each(function(){
            $(this).toggle();
        });

        if( !$('.'+pid+'_child').is(':visible') ){
            $('.'+pid+'_child').each(function(){
                var cid = $(this).attr('data-id');
                $('.'+cid+'_child').each(function(){
                    $(this).hide();
                });
            });
        }
    }
}

var checkCategory2 = function(obj){
    var categoryId = $(obj).val();
    var categoryChecke = $(obj).is(":checked");
    $("#int_"+categoryId).prop('checked', categoryChecke);

    if( !$('#int_'+categoryId).is(':visible') ){
        var tmp = $('#int_'+categoryId).attr('class');

        $('.'+tmp).each(function(){
            $(this).toggle();
        });
    }
}

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

// 이미지 클릭시 에티터 안에 삽입
$(document).on('dblclick', '.dropzoneImg', function(e){
    var temp = $(e.target);
    imgInfo = getImageInfo(temp);

    const regex = /gif$/i;
    if(regex.exec(imgInfo['imgFileName'])){
        var src = imgInfo["imgFullPath"];
    }else{
        var src = imgInfo["imgFullPath"].replace(/(.+)[.]([a-z]+)$/g,"$1."+(imgInfo["width"]<800?imgInfo["width"]:"800")+"x.9.$2");
    }

    tinymce.execCommand('mceInsertContent', true, "<figure class='image align-center'><img contenteditable='true' src='" + src + "'/><figcaption>" +imgInfo["caption"] + "</figcaption></figure>");
});

$("#btnGraph").click(function (){
	var width = 1200;
	var height = 700;
	var popupX = (window.screen.width / 2) - (width / 2);
	var popupY= (window.screen.height / 2) - (height / 2);

	var popup = window.open('http://hk.kode.co.kr/chart', 'graphWindow', 'width='+width+'px,height='+height+'px,scrollbars=yes,left='+ popupX + ', top='+ popupY);
});
</script>
</body>
</html>