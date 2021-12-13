<?php /* Template_ 2.2.8 2021/11/29 11:42:08 /webSiteSource/hkChart/web/_template/include/left.html 000002380 */ ?>
<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a class="nav-link" href=""><span>[</span>KODE[S]<span>]</span></a></div>
    <div class="br-sideleft overflow-y-auto">
        <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
		
		<a href="/api/list" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fa fa-book icon"></i>
            <span class="menu-item-label">API</span>
			<i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
		<ul class="br-menu-sub nav flex-column">
			<li class="nav-item"><a href="/api/list" class="nav-link">API리스트</a></li>
			<li class="nav-item"><a href="/api/editor" class="nav-link">API등록</a></li>
			<li class="nav-item"><a href="/api/group" class="nav-link">그룹관리</a></li>
		</ul>
		<a href="/api/allowDomain" class="br-menu-link">
          <div class="br-menu-item">
            <i class="fas fa-cog"></i>
            <span class="menu-item-label">설정관리</span>
			<i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
		<ul class="br-menu-sub nav flex-column">
			<li class="nav-item"><a href="/api/allowDomain" class="nav-link">Domain 허용</a></li>
		</ul>

		<a href="/testEdit" class="br-menu-link" target="testEdit">
          <div class="br-menu-item">
            <i class="fas fa-edit"></i>
            <span class="menu-item-label">테스트 에디터</span>
			<i class="menu-item-arrow fa fa-angle-down"></i>
          </div>
        </a>
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