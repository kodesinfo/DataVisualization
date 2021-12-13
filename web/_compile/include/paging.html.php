<?php /* Template_ 2.2.8 2021/07/13 01:32:08 /webSiteSource/hkChart/web/_template/include/paging.html 000001819 */ ?>
<div class="col-sm-6 ht-60 d-flex align-items-center tx-black tx-normal pd-l-20"><span><?php echo $TPL_VAR["list"]["totNum"]?></span> 건</div>
<div class="col-sm-6 ht-60 d-flex align-items-center justify-content-end">
  <nav aria-label="Page navigation">
    <ul class="pagination pagination-basic mg-b-0">
      <!--li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <i class="fa fa-angle-right"></i>
        </a>
      </li-->
<?php if($TPL_VAR["list"]["page"]["prevPage"]){?>
      <li class="page-item">
        <a class="page-link" href="<?php echo $_GET["_url"]?>?<?php echo preg_replace('/(&page=[0-9]+)|(_url=[^&]+&)/i','',$_SERVER["QUERY_STRING"])?>&page=<?php echo $TPL_VAR["list"]["page"]["prevPage"]?>" aria-label="Previous">
          <i class="fa fa-angle-left"></i>
        </a>
      </li>
<?php }?>
<?php if(is_array($TPL_R1=$TPL_VAR["list"]["page"]["navibar"])&&!empty($TPL_R1)){foreach($TPL_R1 as $TPL_V1){?><?php if($TPL_V1["page"]> 0){?>
      <li class="page-item <?php echo $TPL_V1["class"]?>"><a class="page-link" href="<?php echo $_GET["_url"]?>?<?php echo preg_replace('/(&page=[0-9]+)|(_url=[^&]+&)/i','',$_SERVER["QUERY_STRING"])?>&page=<?php echo $TPL_V1["page"]?>"><?php echo $TPL_V1["page"]?></a></li>
<?php }?><?php }}?>
<?php if($TPL_VAR["list"]["page"]["nextPage"]){?>
      <li class="page-item">
        <a class="page-link" href="<?php echo $_GET["_url"]?>?<?php echo preg_replace('/(&page=[0-9]+)|(_url=[^&]+&)/i','',$_SERVER["QUERY_STRING"])?>&page=<?php echo $TPL_VAR["list"]["page"]["nextPage"]?>" aria-label="Next">
          <i class="fa fa-angle-right"></i>
        </a>
      </li>
<?php }?>
    </ul>
  </nav>
</div>