<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('test_iframe1');?><?php include template('common/header'); ?><div id="pt" class="bm cl">
    <div class="z">
        <a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>?</em>
        <a href="forum.php"><?php echo $_G['setting']['bbname'];?></a><em>?</em>
        <a href="javascript:;"><?php echo $navtitle;?></a>
    </div>
</div>


<div id="ct" class="wp cl">
    <div class="mn bm cl">
        <div class="bm_c">
<style type="text/css"> 
 		.kuang
  		{ width:100%; height:860px;overflow:hidden; position:relative; }
  		</style> 
<div class="kuang">
<iframe id="frame_content" style="position:absolute;width:100%;height:900px;top:-60px;" scrolling="no" frameborder="0" marginheight="0" marginwidth="0" onload="javascript:SetWinHeight(this);" src="http://10.100.26.134:8080/idmp_test/index.jsp" >
 </iframe>		
</div>	
        </div>
    </div>
</div><?php include template('common/footer'); ?>