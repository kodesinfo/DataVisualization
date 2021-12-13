<?php /* Template_ 2.2.8 2021/10/28 16:55:34 /webSiteSource/hkChart/web/_template/testEdit.html 000041805 */ ?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<title>한경CMS | 한국경제신문</title>

<link href="https://wcms.hankyung.com/css/bootstrap.min.css?v=20191230_1" rel="stylesheet">
<link href="https://wcms.hankyung.com/css/jquery-ui.min.css" rel="stylesheet">

<script src="https://wcms.hankyung.com/js/jquery.min.js"></script>
<script src="https://wcms.hankyung.com/js/bootstrap.min.js"></script>

<script src="https://wcms.hankyung.com/js/jquery-ui.min.js"></script>
<script src="https://wcms.hankyung.com/js/common.js?v=20200428_2"></script>
<script src="https://wcms.hankyung.com/js/jquery.cookie.js"></script>

<link href="https://wcms.hankyung.com/css/menu.css?v=20191230_1" rel="stylesheet">
<link href="https://wcms.hankyung.com/css/searchbar.css?v=20911227_1" rel="stylesheet">

<script>
var wss_uri = 'wss://testcms.hankyung.com:36379';
</script>

<script type="text/javascript" src="https://wcms.hankyung.com/js/websocket/html5Websocket.js?v=20200226"></script>

<script type="text/javascript" src="https://wcms.hankyung.com/js/jquery.notify.min.js"></script>
<link href="https://wcms.hankyung.com/css/ui.notify.css" rel="stylesheet">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<script>
// 로그아웃
function logout(){
	send('B010:' + $(".user_info").data("userid"));
	location.href = '/logout';
}

function logoutWithoutSend(){
	location.href = '/logout';
}

$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>

</head>

<body>
<!-- 2018-09-20 상단 GNB S -->
<nav class="navbar" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#CMS_navbar" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="javascript:void(0);">한경CMS</a>
		</div>

		<div class="collapse navbar-collapse" id="CMS_navbar">
			<ul class="nav navbar-nav">
				<audio id="recevider" src="/js/websocket/rmi.mp3" preload="auto" type="audio/mp3"></audio>
			</ul>

			<!-- 메뉴바 우측: 외부 링크 아이콘, 사용자 프로필 갱신, 로그아웃 -->
			<ul class="nav navbar-nav navbar-right navbar-logout">
				<li class="dropdown user_info" data-userid="kodes" data-username="임성묵">
					<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
                        <strong>임성묵</strong>
                    </a>
				</li>
			</ul>
			<!-- // 메뉴바 우측: 외부 링크 아이콘, 사용자 프로필 갱신, 로그아웃 -->
		</div>
	</div>
</nav>
<!-- // 2018-09-20 상단 GNB E -->

<!-- 2018-09-20 콘텐츠 컨테이너 S -->
<div class="container-fluid">
<link rel="stylesheet" href="https://wcms.hankyung.com/css/smoothness/jquery-ui-1.9.2.custom.css" >
<link rel="stylesheet" href="https://wcms.hankyung.com/css/common.css" />
<link rel="stylesheet" href="https://wcms.hankyung.com/css/news/news.write.css?v=20200526_1" />
<link rel="stylesheet" href="https://wcms.hankyung.com/css/bootstrap-select.min.css" />
<link rel="stylesheet" href="https://wcms.hankyung.com/css/datatables.min.css">

<!-- 공통 스크립트 -->
<script type="text/javascript" src="https://wcms.hankyung.com/js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/jquery-ui-1.9.2.custom.js"></script>
<script src="https://wcms.hankyung.com//js/jquery.cookie.js"></script>
<script src="https://wcms.hankyung.com//js/datatables.min.js"></script>

<!-- 에디터 스크립트 -->
<script type="text/javascript" src="https://wcms.hankyung.com/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/editor/dialog/video.js?v=20200317_1"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/editor/dialog/subHeadLineStyle.js?v=20210430_1"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/editor/ckeditor.init.js?v=20200724_2"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/editor/htmltitle.init.js?v=20200221_1"></script>

<script type="text/javascript" src="https://wcms.hankyung.com/js/jquery.ui.datepicker-ko.js"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/news/news.write.js?v=20210727_2"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/SimpleDateFormat-1.0.js"></script>
<script type="text/javascript" src="https://wcms.hankyung.com/js/bootstrap-select.min.js"></script>

<style>
tr {vertical-align:center;}
        #save_btn, #list_btn, #write_new, #open_btn {padding:4px 10px; font-size:12px;}

        #newsTagAdd .tag_name {color:#337ab7; cursor:pointer; text-decoration:none;}
        #newsTagAdd .tag_name:hover {text-decoration:underline;}

        #viewExitModal {
            display:none;
            background-color:#000000;
            bottom:0;
            left:0;
            position:fixed;
            right:0;
            top:0;
            z-index:1040;
            opacity:0.8;
        }
        #viewExitButton {
            display:none;
            position:fixed;
            z-index:1050;
            top:40%;
            left:50%;
            margin-left:-165px;
            width:inherit;
            background-color:#ffffff;
            border-radius:3px;
            padding:10px;

        }
        #viewExitButton .txt {
            margin-top:15px;
            font-size:12px;
        }
        #viewExitButton .button {
            text-align:center;
            margin-top:15px;
        }

        .trans_I, .trans_U {color:red;}
        .trans_D {color:blue;}
        .embargo_Y {color:red;}

        .paper-drug {display:none;}

        .bootstrap-select>.dropdown-toggle {height:35px;}

        .cke_dialog_ui_input_text input[type=text] {
            height:auto;
            margin-bottom:0px;
        }

        #add_tagName {width:150px;}

        /* 태그 즐겨찾기 레이어 및 버튼 */
        .btn.btnTagFavorite {padding:3px 5px; background:none; line-height:1}
        .btnTagFavorite .glyphicon {color:#c0c0c0; font-size:17px}
        .btnTagFavorite.on .glyphicon {color:#64b660}

        .btn.btnFavoriteTagAdding {padding:3px 6px; background:none; border:none; line-height:1}
        .btnFavoriteTagAdding .glyphicon {color:#c0c0c0; font-size:15px}
        .btnFavoriteTagAdding.on .glyphicon {color:#4a86e8}

        .metainfo .side_table .form-control,
        .metainfo .side_table .btn {vertical-align:middle;}
        .metainfo .side_table input.btn {min-height:34px}
        .tag-cont-wrap {position:relative}
        .tag-favorite-layer {display:block; position:absolute; z-index:999; width:290px; height:380px; border:1px solid #e3e3e3; border-radius:4px; background-color:#fff; box-shadow:0 0 5px 2px rgba(0,0,0,0.1);}
        .tag-favorite-layer .row {margin:0}
        .tag-favorite-content {width:100%; margin:0; height:330px; overflow-x:hidden; overflow-y:auto}
        .tag-favorite-content .col-sm-12 {padding:0}
        .tag-favorite-content .tag-favorite-table {width:100% !important; margin:0 !important}
        .tag-favorite-content .tag-favorite-table td {width:auto !important; vertical-align:middle !important; padding-top:8px !important}
        .tag-favorite-content .tag-favorite-table .text-right {padding-right:10px}
        .tag-favorite-btngroup {position:absolute; left:0; right:0; bottom:0; height:50px; padding-top:11px; border-top:1px solid #ddd; background-color:#fff; border-radius:0 0 4px 4px; text-align:center}

        /* 태그 추가 목록 */
        .tag-group .tag_name,
        .tag-group .glyphicon-remove,
        .tag-group img {display:inline-block; vertical-align:middle; min-height:15px}
        .tag-group .glyphicon-remove {cursor:pointer}
        .tag-cont-wrap .tag-group .in-bl {position:relative; margin-right:25px} /* 향후 변경 .tag-group .in-bl {position:relative; margin-right:25px !important}*/
        .tag-favorite-check {display:none; position:absolute; top:0; left:-20px; width:20px; text-align:center}
        .tag-favorite-check label {display:inline-block; margin:0; color:#c0c0c0; font-size:17px; line-height:1; cursor:pointer}
        .tag-favorite-check input[type='checkbox'] {position:absolute; width:1px; height:1px; margin:-1px; padding:0; border:none; overflow:hidden; clip:rect(0 0 0 0); color:transparent}
        .tag-favorite-check input[type='checkbox']:checked + label {color:#64b660}
        .tag-group .in-bl:hover .tag-favorite-check {display:block}

        /* 제목 가이드라인 25자 파이어폭스 대응 */
        @-moz-document url-prefix() {
          #titleBar {
            top: 77px;
          }
        }

        input[name="pagenum"] {width: 80px; display:inline;}
        #volno {width: 190px; display:inline;}
</style>
<div class="container-fluid">
	<form method="post" id="hiddenForm">
		<input type="hidden" name="hTitle" id="hTitle" value="">
		<input type="hidden" name="hContent" id="hContent" value="">
	</form>
       <!-- 2018-09-27 상단 버튼 그룹 S -->
        <table class="basic_table">
            <tr>
                <td>
                    <button id="save_btn" class="btn btn-primary btn-sm" type="button">
                        <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> 저장
                    </button>
                    <button id="list_btn" class="btn btn-primary btn-sm" type="button">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> 목록
                    </button>
                </td>
            </tr>
        </table>
        <!-- // 2018-09-27 상단 버튼 그룹 E-->
        <!-- 2018-09-27 제목 부제목 입력 그룹 S -->
        <div class="well">
            <table class="basic_table title">
                <tr>
                    <td class="table-title">
                        <label for="">제목</label>
                    </td>
                    <td>
                        <!-- 2018-09-28 제목 입력 및 부동산 관련정보 부분 S -->
                        <div>
                            <div class="titleArea">
                                <input type="hidden" class="" style="width: 90%;" name="title" id="title" value="">
                                <textarea id="htmltitle" name="htmltitle" class="htmltitle" type="text">네이버 3분기 또 '사상 최대 실적'…콘텐츠·커머스 돋보였다</textarea>
                            </div>
                            <div class="titleBtnGroup">
                                <div id="titleCharacterDialog" style="display: none; right: 10px;">
                                    <div class="dialog-content"><ul class="item-list">
	<li><a href="#">&alpha;</a></li>
	<li><a href="#">&beta;</a></li>
	<li><a href="#">&gamma;</a></li>
	<li><a href="#">&delta;</a></li>
	<li><a href="#">&epsilon;</a></li>
	<li><a href="#">&zeta;</a></li>
	<li><a href="#">&eta;</a></li>
	<li><a href="#">&theta;</a></li>
	<li><a href="#">&iota;</a></li>
	<li><a href="#">&kappa;</a></li>
	<li><a href="#">&lambda;</a></li>
	<li><a href="#">&mu;</a></li>
	<li><a href="#">&nu;</a></li>
	<li><a href="#">&xi;</a></li>
	<li><a href="#">&omicron;</a></li>
	<li><a href="#">&pi;</a></li>
	<li><a href="#">&rho;</a></li>
	<li><a href="#">&sigma;</a></li>
	<li><a href="#">&sigma;</a></li>
	<li><a href="#">&tau;</a></li>
	<li><a href="#">&upsilon;</a></li>
	<li><a href="#">&phi;</a></li>
	<li><a href="#">&chi;</a></li>
	<li><a href="#">&psi;</a></li>
	<li><a href="#">&omega;</a></li>
	<li><a href="#">、</a></li>
	<li><a href="#">。</a></li>
</ul></div>
                                </div>

                            </div>
                        </div>
                        <!-- // 2018-09-28 제목 입력 및 부동산 관련정보 부분 E -->

                        <div style="float:left; padding: 5px 0px 0px 5px; display:  none ;" id="etcimage_div">
                            <a target="_blank" id="etcimage_url" download="" href="">
                                <span id="etcimage_name"></span>
                            </a>
                            <i class="icon-remove" id-button-etcimage-del ></i>
                        </div>
                    </td>
                </tr>
                <tr>
                    <!-- 2018-09-28 부제목 입력 그룹 S -->
                    <td class="table-title">
                        <label for="">부제목</label>
                    </td>
                    <td>
                        <a href="#" id="subtitle_btn">부제목 보기</a>
                        <div id="subtitle_div">
                            <textarea rows="3" name="subtitle" id="subtitle" class="form-control" style="width:91%;resize:none;">                            </textarea>
                        </div>
                    </td>
                    <!-- // 2018-09-28 부제목 입력 그룹 E -->
                </tr>
            </table>
        </div>
        <!-- 2018-09-27 제목 부제목 입력 그룹 E -->

        <div class="well">
            <!-- 2018-09-27 우측 메타정보 및 이미지 입력 그룹 S -->
            <table class="basic_table contents">
                <tr>
                    <td colspan="2">
                        <div class="buttonGroup">
                        <!--  -->
                            <button type="button" class="btn btn-primary" id="add_chart">차트추가</button>
							<button type="button" class="btn btn-primary" id="preview">미리보기</button>

							
                            <!-- 2019-12-13 글자 색, 배경 색 추가 -->
                            <div class="btn-group btn_etcdrug" style="display:none;">
                                <button type="button" class="btn btn-default" id="text_color_btn">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </button>
                            </div>
                            <!-- // 2019-12-13 글자 색, 배경 색 추가 -->


                        <!--  -->
                            <!-- 2018-11-01 원고지 매수 S -->
                            <span id="counter">
                                <span id="counts1"></span>자 / <span id="counts2"></span>매
                            </span>
                            <!-- 2018-11-01 원고지 매수 E -->
                    
                                </div>

                            </span>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
<style>
#special_character_area {display:none; border:1px solid #CCCCCC; padding:5px;background-color:#F5F5F5;}
#special_character_area ul {list-style:none outside none; width:100%; overflow:hidden; margin:0; display:none; font-family:'한경본문고딕', '한경본문고딕 BG'; padding:0;}
#special_character_area #sign0 {display:block;}
#special_character_area ul li {float:left; width:25px; height:25px; text-align:center; font-size:16px;}
#special_character_area ul li a {height:23px; width:23px; display:block; border:solid 1px #F5F5F5;}
#special_character_area ul li a:hover {border:solid 1px #CCCCCC; text-decoration:none;}
</style>

<div class="" id="special_character_area">
	<ul class="item-list" id="sign0">
		<!-- 기본약물 -->
		<li><a href="#">·</a></li>
		<li><a href="#">…</a></li>

		<li><a href="#">‘</a></li>
		<li><a href="#">’</a></li>
		<li><a href="#">“</a></li>
		<li><a href="#">”</a></li>

		<li><a href="#">〃</a></li>

		<li><a href="#">℃</a></li>
		<li><a href="#">㈜</a></li>
		<li><a href="#">％</a></li>
		<li><a href="#">ｍ</a></li>
		<li><a href="#">ℓ</a></li>
		<li><a href="#">㎥</a></li>
		<li><a href="#">㎜</a></li>
		<li><a href="#">㎝</a></li>
		<li><a href="#">㎞</a></li>
		<li><a href="#">㎠</a></li>
		<li><a href="#">㎡</a></li>
		<li><a href="#">㎢</a></li>
		<li><a href="#">㎎</a></li>
		<li><a href="#">㎏</a></li>

		<li><a href="#">※</a></li>
		<li><a href="#">＋</a></li>
		<li><a href="#">－</a></li>
		<li><a href="#">±</a></li>
		<li><a href="#">×</a></li>
		<li><a href="#">÷</a></li>

		<li><a href="#">↑</a></li>
		<li><a href="#">→</a></li>
		<li><a href="#">↓</a></li>
		<li><a href="#">←</a></li>

		<li><a href="#">▲</a></li>
		<li><a href="#">▶</a></li>
		<li><a href="#">▼</a></li>
		<li><a href="#">◀</a></li>
	</ul>
</div>

                        <!-- 2018-09-27 본문 편집기 S-->
                        <textarea name="textcontent" id="textcontent">
							
<div class="articleimage" itemprop="articleimage"><img src="https://img.hankyung.com/photo/202110/01.27824770.1.jpg" alt="한성숙 네이버 대표 [사진=연합뉴스]"></div>
네이버가 콘텐츠 사업 호조 등에 힘입어 올 3분기에 사상 최고 실적을 기록했다.<br /><br />
네이버는 3분기 연결 기준 매출 1조7273억원, 영업이익 3498억원을 올렸다고 21일 밝혔다. 매출과 영업익은 전년 동기 대비 각각 26.9%, 19.9% 증가했다. 2분기에 비해서도 각각 3.8%와 4.2% 증가하며 모두 사상 최대치를 경신했다.<br /><br />
전 사업 부문이 고르게 성장했다. 콘텐츠 사업 매출은 1841억원으로 전년 동기보다 60.2% 늘었다. 글로벌 콘텐츠를 확대한 웹툰은 79%의 매출 증가세를 보였고 스노우도 글로벌에서 카메라 서비스와 제페토가 성장하면서 매출이 2배 이상 뛰었다.<br /><br />
커머스 매출은 쇼핑라이브, 브랜드스토어, 스마트스토어 성장에 힘입어 33.2% 증가한 3803억원을 기록했다. 브랜드스토어는 550여 개로 확대되며 거래액이 3배 이상 확대됐고 쇼핑라이브도 100만뷰 이상 초대형 라이브, 분기 100억 매출 브랜드가 등장하며 거래액이 13배 급증했다.
<br /><br />
강경주 한경닷컴 기자 qurasoha@hankyung.com

                        </textarea>
                        <!-- 2018-09-27 본문 편집기 E-->
                    </td>
                        <td style="vertical-align:top;">
                            <!-- 2018-09-27 메타정보 입력 그룹 S -->
                            <div class="metainfo">
                                <table class="side_table">
                                    <tr>
                                        <td>
                                            <label for="">매체</label>
                                        </td>
                                        <td>
                                            닷컴뉴스
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">기자입력</label>
                                        </td>
                                        <td>
                                            <input type="text" id="reportername" name="reportername" class="form-control" value="임성묵" />
                                            <input type="button" id="reporter_add_btn" class="btn btn-default" value="확인" />
                                            <span id="reporter_area">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label for="deptid">부서</label>
                                        </td>
                                        <td>
                                            <select class="selectpicker width120 form-control" name="deptid" id="deptid" data-value="331" data-live-search="true" data-width="120px" data-dropup-auto="false">
                                            <option value="">전체</option>
                                               <option value="79" >뉴스국</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <!-- 2019-04-09 부서입력 E -->
                                    <tr>
                                        <td>
                                            <label><a id="content-code-pop-btn" class="popupLabel">분류</a></label>
                                        </td>
                                        <td>
                                            <span >
                                            <input type="text" class="codeInput cidInfo form-control" id="cid0" name="contentscodes[]" value="" autocomplete="off">
                                            <span></span>
                                            <i class="icon-remove code-remove-btn" value="cid0"></i>
                                            </span>
                                            <span style='display:none;'>
                                            <input type="text" class="codeInput cidInfo form-control" id="cid1" name="contentscodes[]" value="" autocomplete="off">
                                            <span ></span>
                                            <i class="icon-remove code-remove-btn" value="cid1"></i>
                                            </span>
                                            <span style='display:none;'>
                                            <input type="text" class="codeInput cidInfo form-control" id="cid2" name="contentscodes[]" value="" autocomplete="off">
                                            <span></span>
                                            <i class="icon-remove code-remove-btn" value="cid2"></i>
                                            </span>
                                            <span style='display:none;'>
                                            <input type="text" class="codeInput cidInfo form-control" id="cid3" name="contentscodes[]" value="" autocomplete="off">
                                            <span></span>
                                            <i class="icon-remove code-remove-btn" value="cid3"></i>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">해시태그</label>
                                        </td>
                                        <td id="newsTagAdd">
                                            <input id="add_tagName" type="text" class="form-control" placaeholder="추가할 태그를 입력하세요." name="keyword" value="" id-input-tag id-autocomplete-input="tagadd" autocomplete="off" />
                                            <input id="btnAddTag" type="button" class="btn btn-default" id-button-add value="추가" />
                                            <input type="button" class="btn btn-default" id-button-news-tag-extract value="태그추출" />
                                            <p style="display:none"><span>태그는 쉼표로 구분되며 최대 20개까지 입력 가능. 허용 특수문자 ! @ $ % [ ] &lt; &gt; ? · &amp; -</span></p>
                                            <br />
                                            <span id-area-tag class="tag-group">
                                            </span>
                                        </td>
                                    </tr>



                                    <tr>
                                        <td>
                                            <label for=""><a class="popupLabel" id="relation_extract_btn">관련기사</a></label>
                                        </td>
                                        <td>
                                            <span id="relation">
                                            <input type="text" id="relation_title" name="relation_title" class="form-control" value="" disabled/>
                                            <div id="relationList" class="hidden">
                                                <ul>
                                                </ul>
                                            </div>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">등급</label>
                                        </td>
                                        <td>
                                            <select id="imp" name="imp" class="form-control" data-value="">
                                                <option value="0">일반</option>
                                                <option value="1">중요</option>
                                                <option value="2">특급</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="" class="infotitle embargo_N">엠바고</label>
                                        </td>
                                        <td>
                                            <input type="text" name="embargodate" id="embargodate" value="" class="form-control datetimepicker" style="display:inline;width:90%"/>
                                            <i class="icon-remove" id="embargo-clear-btn"></i>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">웹게재일</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control datepicker"  name="postdate" id="postdate" value=""/>
                                        </td>
                                    </tr>
                                    <tr class="never_show">
                                        <td>
                                            <label for="">작성일</label>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control datepicker" name="createdate" id="createdate" value=""/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for=""><span class="infotitle">등록일</span></label>
                                        </td>
                                        <td>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for=""><span class="infotitle" data-webreleasedate="">최초전송일</span></label>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="">상태</label>
                                        </td>
                                        <td>
                                            
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>
                                            <label for="">종목매칭</label>
                                        </td>
                                        <td>
                                            <input type="button" id="companyMatch" class="btn btn-default" value="매칭" />
                                            <input type="button" id="companyAllCheck" class="btn btn-default" value="모두선택" />
                                            <ul id="codeList" class="form-inline" style="margin-top : 15px;">
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">
                                                기사 이미지 타입
                                            </label>
                                        </td>
                                        <td>
                                            <div class="imgRadioBtnGroup">
                                                <label for="chkStandard">
                                                    <input type="radio" id="chkStandard" name="photokind" value="4" checked/> 표준
                                                </label>
                                                <label for="chkPhoto">
                                                    <input type="radio" id="chkPhoto" name="photokind" value="0"/> 포토
                                                </label>
                                                <label for="chkSlide">
                                                    <input type="radio" id="chkSlide" name="photokind" value="3" /> 슬라이드
                                                </label>
                                                <label for="chkVideo">
                                                    <input type="radio" id="chkVideo" name="photokind" value="5"/> 동영상
                                                </label>
                                                <label for="chkAudio">
                                                    <input type="radio" id="chkAudio" name="photokind" value="a"/> 오디오
                                                </label>
                                                <br />
                                                <label for="chkGif">
                                                    <input type="radio" id="chkGif" name="photokind" value="g"/> GIF
                                                </label>
                                                <label for="chkData">
                                                    <input type="radio" id="chkData" name="photokind" value="d"/> 데이터
                                                </label>
                                                <label for="chkCard">
                                                    <input type="radio" id="chkCard" name="photokind" value="6"/> 카드뉴스
                                                </label>
                                                <label for="chkGraph">
                                                    <input type="radio" id="chkGraph" name="photokind" value="1"/> 그래프
                                                </label>
                                                <label for="chkPoll">
                                                    <input type="radio" id="chkPoll" name="photokind" value="7"/> 폴
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- 2018-09-27 메타정보 입력 그룹 E -->
                            <!-- 2018-09-27 이미지 정보 입력 그룹 S -->
                            <div class="imageinfo">
                                <table class="side_table">
                                    <tr>
                                        <td colspan="2">
                                            <div style="float:right">
                                                <input type="button" id="img_delete_btn" class="btn btn-default" value="모두삭제" />
                                                <input type="button" id="img_popup_btn" class="btn btn-default" value="이미지 추가"/>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <!-- 2018-10-01 이미지 미리보기 영역 S -->
                                            <div class="imgbox">
                                                <ul id="sortable" class="ui-sortable">
                                                </ul>
                                            </div>
                                            <!-- 2018-10-01 이미지 미리보기 영역 E -->
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- 2018-09-27 이미지 정보 입력 그룹 E-->
                            <!-- 2018-09-28 파일 정보 입력 그룹 S -->
                            <div class="fileinfo">
                                <table class="side_table">
                                    <tr>
                                        <td colspan="2">
                                            <div style="float:right">
                                            <ul>
                                                <li style="display:inline-block">
                                                    <button type="button" id="select-file" class="btn btn-default">파일선택 ▼</button>
                                                    <ul id="select-file-list">
                                                        <li class="btn btn-default"><label for="file-upload" style="font-weight:normal; cursor: pointer; width: 100%;">일반</label></li>
                                                        <li class="btn btn-default"><label for="audio-upload" style="font-weight:normal; cursor: pointer; width: 100%;">오디오</label></li>
                                                    </ul>
                                                    <input type="file" id="file-upload" name="files[]" multiple/>
                                                    <input type="file" id="audio-upload" name="files[]" multiple />
                                                </li>
                                                <li style="display:inline-block">
                                                    <button type="button" id="upload-file" class="btn btn-default">업로드 ▼</button>
                                                    <ul id="upload-file-list">
                                                        <li class="btn btn-default"><span class="btnFileUpload">일반파일</span></li>
                                                        <li class="btn btn-default"><span class="btnAudioUpload">오디오파일</span></li>
                                                    </ul>
                                                </li>
                                                <li style="display:inline-block">
                                                    <input type="button" class="btnUploadCancleAll btn btn-default" value="전체취소"/>
                                                </li>
                                            </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div>
                                                <table class="filePreview">
                                                </table>
                                                <table class="audioPreview">
                                                </table>
                                                <table class="fileDownload">
                                                </table>
                                                <table class="audioDownload">
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!-- 2018-09-28 파일 정보 입력 그룹 E-->
                        </td>
                    </tr>
                </table>
                <!--  관련기사 영역 -->

            </div>
            <!-- 2018-09-27 우측 메타정보 및 이미지 입력 그룹 E -->

        <div id="viewExitButton">
            <h5><b>페이지를 이동하시겠습니까?</b></h5>
            <div class="button">
                <button class="btn btn-default btn_second_save" type="button" value="save">저장 후 목록</button>
                <button class="btn btn-default btn_second_list" type="button" value="list">목록</button>
                <button class="btn btn-default btn_second_cancle" type="button" value="esc">취소</button>
            </div>
            <div class="txt">목록은 변경사항을 저장하지 않고 기사 목록을 표시합니다.</div>
        </div>
        <div id="viewExitModal"></div>

                <input type="file" name="addImage" id="addImage" style="display:none;" accept="image/jpeg,image/png,image/gif"/>

<style>
#progressModal{
	display: none;
	background-color: #000000;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    top: 0;
    z-index: 1060;
    opacity: 0.8;
}

#progressModal img{
	display:block;
	position: fixed;
	top:50%;
	left:50%;
	margin: -64px 0 0 -64px;
}
</style>

<div id="progressModal">
	<img src="/img/loading.gif">
</div>
</div>
<!-- // 2018-09-20 콘텐츠 컨테이너 E -->

<script type="text/javascript">

var type;

//팝업창 변수
var isPopup = false;

// 편집자 이름
var editorName = "임성묵";
var editorDept = "IT Labs부";


// chart 팝업 데이터 연동
window.onmessage = function(e){
	if(e.origin === "https://indicator.hankyung.com"){
		setEditInserHtml(e.data);
	}
}

// 겸직정보 세팅
var subUse = "";
var subEmail = "";
var subMediaid = "";
var defaltEmail = "mook@kode.co.kr";

$(window).on("load", function(){
    //새글 작성 시 byline 자동삽입
    type = 'auto';
    //setTimeout(setByline, 200);
    CKEDITOR.instances.textcontent.on( 'instanceReady', function(e){});
});


// [편집기] -> 본문 텍스트 삽입
function setEditInserHtml(text){
    CKEDITOR.instances.textcontent.insertHtml(text);
}

$('#preview').on("click",function(){
	window.open('', 'preview_pc', "");

	$('#hTitle').val($('#title').val());

	if(CKEDITOR.instances.htmltitle){
		var htmltitle = CKEDITOR.instances.htmltitle.getData();
		$('#hTitle').val(htmltitle);
	}

	var html = CKEDITOR.instances.textcontent.getData();

	$('#hContent').val(html);
	$("#hiddenForm").attr("action", "https://indicator.hankyung.com/preView");
	$("#hiddenForm").attr("target", "preview_pc");
	$('#hiddenForm').submit();

	$("#hiddenForm").attr("action", "");
	$("#hiddenForm").attr("target", "");
});

</script>
</body>
</html>