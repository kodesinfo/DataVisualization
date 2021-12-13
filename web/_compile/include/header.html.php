<?php /* Template_ 2.2.8 2021/11/01 11:01:23 /webSiteSource/hkChart/web/_template/include/header.html 000001640 */ ?>
<!-- ########## START: HEAD PANEL ########## -->
    <div class="br-header">
      <div class="br-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- br-header-left -->
      <div class="br-header-right">
	  	<div style="margin-top:20px;display: flex;align-items: flex-end;justify-content: center;font-size:10px;">제작지원 : <img src="/image/kpf_icon.png"></div>
		<nav class="nav">
          <div class="dropdown">
            <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
              <span class="logged-name hidden-md-down"><?php echo $_SESSION['userName']?></span>
              <img src="http://via.placeholder.com/64x64" class="wd-32 rounded-circle" alt="">
              <span class="square-10 bg-success"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
				<li><a href="/login/out"><i class="icon ion-power"></i> Log Out</a></li>
				<li><a href="/user/modify"><i class="icon ion-power"></i> 개인정보 변경</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
      </div><!-- br-header-right -->
    </div><!-- br-header -->
    <!-- ########## END: HEAD PANEL ########## -->