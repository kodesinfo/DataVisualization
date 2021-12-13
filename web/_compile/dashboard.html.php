<?php /* Template_ 2.2.8 2021/07/13 01:32:08 /webSiteSource/hk/web/_template/dashboard.html 000008507 */ ?>
<?php $this->print_("top",$TPL_SCP,1);?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script>
window.onload = function(){
    var labels = new Array();
    var d1 = new Array();
    var d2 = new Array();

<?php if(is_array($TPL_R1=$TPL_VAR["list"]["datetime_dash"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
<?php if($TPL_V1["hour"]!="합계"){?>
    labels.push('<?php echo $TPL_V1["hour"]?>');
    d1.push('<?php echo str_replace(',','',$TPL_V1["today"])?>');
    d2.push('<?php echo str_replace(',','',$TPL_V1["monthavr"])?>');
<?php }?>
<?php }}?>

    var data = {
        labels : labels,
        datasets : [
            {
                label: "최근 한달간 평균",
                backgroundColor:"rgba(229,133,0)",
                borderColor:"rgba(229,133,0)",
                data: d2,
                fill:false,
                type:'line'
            },
            {
                label: "시간별 페이지뷰",
                backgroundColor:"rgba(23,155,0)",
                borderColor:"rgba(23,155,0)",
                data: d1
            }
        ]
    };
    new Chart(makeCanvas('chart-hour'),{type: 'bar',data: data});

    //window.setTimeout('window.location.reload()',60000);
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
			<div class="col-lg-12 pd-x-0 mg-b-10">
                <div class="card bd-0 col-sm-4 col-lg-2 ft-left">
                    <div class="card-header tx-primary tx-bold">활성 사용자</div>
                    <div class="card-body bd bd-t-1 rounded-bottom bg-primary">
                        <div class="row">
                            <div class="col-lg-3"><i class="fas fa-users tx-3em tx-white"></i></div>
                            <div class="col-lg-9 text-right tx-white">
                                <div class="huge tx-3em"><?php echo $TPL_VAR["list"]["realtime"]["num"]?>명</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bd-0 col-lg-2 col-md-4 ft-left">
                    <div class="card-header tx-primary tx-bold">네이버 사용자</div>
                    <div class="card-body bd bd-t-1 rounded-bottom panel-naver">
                        <div class="row">
                            <div class="col-lg-3"><img src="/image/naver.png" class="fa" style="height: 3em;"></div>
                            <div class="col-lg-9 text-right tx-white">
                                <div class="huge tx-3em"><?php echo $TPL_VAR["list"]["realtime"]["naver"]?>명</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bd-0 col-lg-2 col-sm-4 ft-left">
                    <div class="card-header tx-primary tx-bold">구글 사용자</div>
                    <div class="card-body bd bd-t-1 rounded-bottom bg-primary">
                        <div class="row">
                            <div class="col-lg-3"><i class="fab fa-google tx-3em tx-white"></i></div>
                            <div class="col-lg-9 text-right tx-white">
                                <div class="huge tx-3em"><?php echo $TPL_VAR["list"]["realtime"]["google"]?>명</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bd-0 col-lg-2 ft-left">
                    <div class="card-header tx-primary tx-bold">Facebook 사용자</div>
                    <div class="card-body bd bd-t-1 rounded-bottom panel-facebook">
                        <div class="row">
                            <div class="col-lg-3"><i class="fab fa-facebook-f tx-3em tx-white"></i></div>
                            <div class="col-lg-9 text-right tx-white">
                                <div class="huge tx-3em"><?php echo $TPL_VAR["list"]["realtime"]["facebook"]?>명</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bd-0 col-lg-2 ft-left">
                    <div class="card-header tx-primary tx-bold">다음 사용자</div>
                    <div class="card-body bd bd-t-1 rounded-bottom panel-kakao">
                        <div class="row">
                            <div class="col-lg-3"><i class="fas fa-comments tx-3em tx-white"></i></div>
                            <div class="col-lg-9 text-right tx-white">
                                <div class="huge tx-3em"><?php echo $TPL_VAR["list"]["realtime"]["daum"]?>명</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bd-0 col-lg-2 ft-left">
                    <div class="card-header tx-primary tx-bold">트위터 사용자</div>
                    <div class="card-body bd bd-t-1 rounded-bottom panel-twitter">
                        <div class="row">
                            <div class="col-lg-3"><i class="fab fa-twitter tx-3em tx-white"></i></div>
                            <div class="col-lg-9 text-right tx-white">
                                <div class="huge tx-3em"><?php echo $TPL_VAR["list"]["realtime"]["twitter"]?>명</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-lg-12">
                <div class="card bd-1">
                    <div class="card-header tx-primary tx-bold"><h4 class="panel-title">페이지뷰 <span style="margin-left:50px;font-size:12px;">※ 5분 지연 데이터 입니다.</span></h4></div>
                    <div class="card-body bd bd-t-1 rounded-bottom">
                        <div class="box-body">
                                <div class="Chartjs"><figure class="Chartjs-figure" id="chart-hour" style="height:250px;"></figure></div>
                                <div class="table-responsive">
                                    <table width="100%" class="table">
                                        <thead>
                                            <tr>
                                                <th>시간</th>
                                                <th>페이지뷰</th>
                                                <th>한달평균</th>
                                                <th>대비%</th>
                                                <th>하루전</th>
                                                <th>하루전비교</th>
                                                <th>일주일전</th>
                                                <th>일주일전비교</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-hour">
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["datetime_dash"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?>
                                        <tr><th><?php echo $TPL_V1["hour"]?></th><th class="num-format"><?php echo $TPL_V1["today"]?></th><th class="num-format"><?php echo $TPL_V1["monthavr"]?></th><th><?php echo $TPL_V1["rate1"]?></th><th class="num-format"><?php echo $TPL_V1["yesterday"]?></th><th><?php echo $TPL_V1["rate2"]?></th><th class="num-format"><?php echo $TPL_V1["servenago"]?></th><th><?php echo $TPL_V1["rate3"]?></th></tr>
<?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- ########## END: MAIN PANEL ########## -->
</body>
</html>