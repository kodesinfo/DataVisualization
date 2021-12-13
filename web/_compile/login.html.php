<?php /* Template_ 2.2.8 2021/11/01 10:55:46 /webSiteSource/hkChart/web/_template/login.html 000003787 */ ?>
<!DOCTYPE html>
<html lang="ko-KR">
<head>
<meta name='robots' content='noindex,follow' />
<meta name="viewport" content="width=device-width" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>로그인</title>
<script src="/js/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="/css/bracket.css">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[ HK CMS ]</span></div>
        <div class="tx-center mg-b-60">Kode[s] Mojaik </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="ID 입력" id="userId" name="userId" required autofocus>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password 입력" required>
          <!--a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a-->
        </div>
        <button type="button" class="btn btn-info btn-block" id="btn_signin">Sign In</button>
		<div style="margin-top:20px;display: flex;align-items: flex-end;justify-content: center;font-size:10px;">제작지원 : <img src="/image/kpf_icon.png"></div>
      </div>
    </div>
<script type="text/javascript">    
    $(document).ready(function(){
        $("#btn_signin").click(function(){
            $.ajax({
                url: "/login/check/ajax",
                data:{userId:$('#userId').val(),password:$("#password").val()},
                method : "POST"
            }).done(function(obj){
                var data = JSON.parse(obj);
                console.log(data);
                if(!data){
                    alert('로그인 정보가 맞지 않습니다');
                }else if(data.id==null){
                    alert('로그인 정보가 맞지 않습니다');
                }else{
                    if($("#rememberId").prop( "checked" )){
                        setCookie("id",data.id,30);
                    }
                    location.href=data.moveTo;
                }
            });
        });
    
        $( "#password" ).keypress(function( event ) {
            if ( event.which == 13 ) {
                $("#btn_signin").click();
            }
        });
    });
    
    if(getCookie('userId')!=""){
        var userId = getCookie('userId');
        $('#userId').val(userId);
        $("#rememberId").prop( "checked","checked" );
        setUserInfo(userId);
    }
    
    function setCookie(a,b,c){
        var d=new Date();
        d.setTime(d.getTime()+(c*60*60*1000));
        var e="expires="+d.toUTCString();
        document.cookie=a+"="+b+";	"+e+";path=/";
    }
    
    function getCookie(a){
        var b=a+"=";
        var d=decodeURIComponent(document.cookie);
        var e=d.split(';');
        for(var i=0;	i<e.length;	i++)		{
            var c=e[i];
            while(c.charAt(0)==' '){
                c=c.substring(1)
            }
            if(c.indexOf(b)==0){
                return c.substring(b.length,c.length)
            }
        }
        return"";
    }
    
    function getParameterValue(name){
        var val = $(location)[0].search;
        var regexp = new RegExp(name+"=([^&]+)");
        var returnVal = regexp.exec(val);
        returnVal=(!returnVal)?"/api/list":decodeURIComponent(returnVal[1]);
        //returnVal=(!returnVal)?"/article/list":decodeURIComponent(returnVal[1]);
        return returnVal;
    }    
    </script>
</body>
</html>