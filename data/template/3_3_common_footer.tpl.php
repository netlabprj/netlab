<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
	</div></div>
<?php if(empty($topic) || ($topic['usefooter'])) { $focusid = getfocus_rand($_G[basescript]);?><?php if($focusid !== null) { $focus = $_G['cache']['focus']['data'][$focusid];?><?php $focusnum = count($_G['setting']['focus'][$_G[basescript]]);?><div class="focus" id="sitefocus">
<div class="bm">
<div class="bm_h cl">
<a href="javascript:;" onclick="setcookie('nofocus_<?php echo $_G['basescript'];?>', 1, <?php echo $_G['cache']['focus']['cookie'];?>*3600);$('sitefocus').style.display='none'" class="y" title="关闭">关闭</a>
<h2>
<?php if($_G['cache']['focus']['title']) { ?><?php echo $_G['cache']['focus']['title'];?><?php } else { ?>站长推荐<?php } ?>
<span id="focus_ctrl" class="fctrl"><img src="<?php echo IMGDIR;?>/pic_nv_prev.gif" alt="上一条" title="上一条" id="focusprev" class="cur1" onclick="showfocus('prev');" /> <em><span id="focuscur"></span>/<?php echo $focusnum;?></em> <img src="<?php echo IMGDIR;?>/pic_nv_next.gif" alt="下一条" title="下一条" id="focusnext" class="cur1" onclick="showfocus('next')" /></span>
</h2>
</div>
<div class="bm_c" id="focus_con">
</div>
</div>
</div><?php $focusi = 0;?><?php if(is_array($_G['setting']['focus'][$_G['basescript']])) foreach($_G['setting']['focus'][$_G['basescript']] as $id) { ?><div class="bm_c" style="display: none" id="focus_<?php echo $focusi;?>">
<dl class="xld cl bbda">
<dt><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2" target="_blank"><?php echo $_G['cache']['focus']['data'][$id]['subject'];?></a></dt>
<?php if($_G['cache']['focus']['data'][$id]['image']) { ?>
<dd class="m"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" target="_blank"><img src="<?php echo $_G['cache']['focus']['data'][$id]['image'];?>" alt="<?php echo $_G['cache']['focus']['data'][$id]['subject'];?>" /></a></dd>
<?php } ?>
<dd><?php echo $_G['cache']['focus']['data'][$id]['summary'];?></dd>
</dl>
<p class="ptn cl"><a href="<?php echo $_G['cache']['focus']['data'][$id]['url'];?>" class="xi2 y" target="_blank">查看 &raquo;</a></p>
</div><?php $focusi ++;?><?php } ?>
<script type="text/javascript">
var focusnum = <?php echo $focusnum;?>;
if(focusnum < 2) {
$('focus_ctrl').style.display = 'none';
}
if(!$('focuscur').innerHTML) {
var randomnum = parseInt(Math.round(Math.random() * focusnum));
$('focuscur').innerHTML = Math.max(1, randomnum);
}
showfocus();
var focusautoshow = window.setInterval('showfocus(\'next\', 1);', 5000);
</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<div class="focus patch" id="patch_notice"></div>
<?php } ?><?php echo adshow("footerbanner/wp a_f/1");?><?php echo adshow("footerbanner/wp a_f/2");?><?php echo adshow("footerbanner/wp a_f/3");?><?php echo adshow("float/a_fl/1");?><?php echo adshow("float/a_fr/2");?><?php echo adshow("couplebanner/a_fl a_cb/1");?><?php echo adshow("couplebanner/a_fr a_cb/2");?><?php echo adshow("cornerbanner/a_cn");?><?php if(!empty($_G['setting']['pluginhooks']['global_footer'])) echo $_G['setting']['pluginhooks']['global_footer'];?>

<!--<!-- munelist/footlist --><div class="xm_footer"  id="ft">
     <div class="container1" style="width:1200px;height:;background-color:#303030;text-align:center;padding-top:20px;padding-bottom:20px;" >
 <div class="plan_system" style="height:;line-height:;font-size:12px;color:white;";>
 <a href="http://10.100.26.132/nmss.php" style="color:white">移动网规划系统</a>|
 <a href="http://10.100.26.132/nmss.php" style="color:white">本地网传输及宽带规划系统</a>|
 <a href="http://10.100.26.132/nmss.php" style="color:white">数据网规划系统</a>|
 <a href="http://10.100.26.132/nmss.php" style="color:white">骨干传输网规划系统</a>|
 <a href="http://10.100.26.132/nmss.php" style="color:white">核心网规划系统</a>
 </div>
  <div class="right" style="height:;line-height:;font-size:12px;color:white;text-align:center";>
 <span style="color:white">中讯邮电咨询设计院&nbsp;&nbsp;&nbsp;&nbsp;版权所有</span>
 </div> 
 </div> 
<div class="wetchat_icon" style="width:1200px;height:;background-color:#FFFFFF;text-align:center;padding-top:20px;padding-bottom:20px;">
<div style="float:left;margin-left:260px">
<img src="http://login.lanxin.cn/pc/qcode/decode.do?width=124&amp;height=124&amp;content=http%3A%2F%2Flogin.lanxin.cn%2Fd%2F" style="width:130px;height:130px;">
<div>iOS版蓝信</div>	
</div>

<div style="float:left;margin-left:160px">
<img src="http://login.lanxin.cn/pc/qcode/decode.do?width=124&amp;height=124&amp;content=http%3A%2F%2Flogin.lanxin.cn%2Fd%2F" style="width:130px;height:130px;">
<div>Android版蓝信</div>	
</div>

<div style="float:left;margin-left:160px">
<iframe scrolling="no" frameborder="0" style="height:192px;width:172px;" src="http://api.lanxin.cn/lop/oauth2/show?response_type=code&amp;scope=snsapi_userinfo&amp;display=small&amp;state={bb8388a4-7796-22be-741f-49d9ea101dc3}&amp;appid=netlabDev&amp;redirect_uri=http%3A%2F%2F10.100.26.132%2Flanxin.php%3Fmod%3Dhome%26ac%3Dsso"></iframe>
<div></div>	
</div>
</div>
 
</div>      
    </div>
</div><?php updatesession();?><?php if($_G['uid'] && $_G['group']['allowinvisible']) { ?>
<script type="text/javascript">
var invisiblestatus = '<?php if($_G['session']['invisible']) { ?>隐身<?php } else { ?>在线<?php } ?>';
var loginstatusobj = $('loginstatusid');
if(loginstatusobj != undefined && loginstatusobj != null) loginstatusobj.innerHTML = invisiblestatus;
</script>
<?php } ?>
</div></div>
<?php } ?>
</div></div>
<?php if(!$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry']) { if($_G['uid'] && !isset($_G['cookie']['checkpm'])) { ?>
<script src="home.php?mod=spacecp&ac=pm&op=checknewpm&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && helper_access::check_module('follow') && !isset($_G['cookie']['checkfollow'])) { ?>
<script src="home.php?mod=spacecp&ac=follow&op=checkfeed&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if(!isset($_G['cookie']['sendmail'])) { ?>
<script src="home.php?mod=misc&ac=sendmail&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && !isset($_G['cookie']['checkpatch'])) { ?>
<script src="misc.php?mod=patch&action=checkpatch&rand=<?php echo $_G['timestamp'];?>" type="text/javascript"></script>
<?php } } if($_GET['diy'] == 'yes') { if(check_diy_perm($topic) && (empty($do) || $do != 'index')) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>portal_diy<?php if(!check_diy_perm($topic, 'layout')) { ?>_data<?php } ?>.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } if($space['self'] && CURMODULE == 'space' && $do == 'index') { ?>
<script src="<?php echo $_G['setting']['jspath'];?>common_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo $_G['setting']['jspath'];?>space_diy.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php } } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && $_G['setting']['showpatchnotice'] == 1) { ?>
<script type="text/javascript">patchNotice();</script>
<?php } if($_G['uid'] && $_G['member']['allowadmincp'] == 1 && empty($_G['cookie']['pluginnotice'])) { ?>
<div class="focus plugin" id="plugin_notice"></div>
<script type="text/javascript">pluginNotice();</script>
<?php } if(!$_G['setting']['bbclosed'] && !$_G['member']['freeze'] && !$_G['member']['groupexpiry'] && $_G['setting']['disableipnotice'] != 1 && $_G['uid'] && !empty($_G['cookie']['lip'])) { ?>
<div class="focus plugin" id="ip_notice"></div>
<script type="text/javascript">ipNotice();</script>
<?php } if($_G['member']['newprompt'] && (empty($_G['cookie']['promptstate_'.$_G['uid']]) || $_G['cookie']['promptstate_'.$_G['uid']] != $_G['member']['newprompt']) && $_GET['do'] != 'notice') { ?>
<script type="text/javascript">noticeTitle();</script>
<?php } if(($_G['member']['newpm'] || $_G['member']['newprompt']) && empty($_G['cookie']['ignore_notice'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>html5notification.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var h5n = new Html5notification();
if(h5n.issupport()) {
<?php if($_G['member']['newpm'] && $_GET['do'] != 'pm') { ?>
h5n.shownotification('pm', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=pm', '<?php echo avatar($_G[uid],small,true);?>', '新的短消息', '有新的短消息，快去看看吧');
<?php } if($_G['member']['newprompt'] && $_GET['do'] != 'notice') { if(is_array($_G['member']['category_num'])) foreach($_G['member']['category_num'] as $key => $val) { $noticetitle = lang('template', 'notice_'.$key);?>h5n.shownotification('notice_<?php echo $key;?>', '<?php echo $_G['siteurl'];?>home.php?mod=space&do=notice&view=<?php echo $key;?>', '<?php echo avatar($_G[uid],small,true);?>', '<?php echo $noticetitle;?> (<?php echo $val;?>)', '有新的提醒，快去看看吧');
<?php } } ?>
}
</script>
<?php } ?>


<style>#topcontrol{z-index:9999999}#anony-reg{position:fixed;left:0;bottom:0px;_position:absolute; text-align:center;right:0; z-index:99999; display:none;}</style>

<!--<script type="text/javascript">
jq(function(){
jq(window).scroll(function(){

var distanceTop = jq('.xm_footer').offset().top - jq(window).height();

if(jq(window).scrollTop() > distanceTop){
jq("#anony-reg").show();

}else{ 
jq("#anony-reg").hide();
}

});

jq('#anony-reg .close').bind('click',function(){
jq(this).parent("#anony-reg").stop(true).hide();
});
});
</script> --><?php userappprompt();?><div class="vcode_main f16 color6"><p>打开微信扫一扫</p><img src="<?php echo $_G['style']['styleimgdir'];?>/ercode.png"></div>
<!--
<script>
jq(function() {
jq(".navdiv").hover(
  function () {
 jq("#mn_daxue_menu").addClass("on");
  },
  function () {
 jq("#mn_daxue_menu").removeClass("on");
  }
);
});</script> -->
<script>
        if (jq('#sitefocus').length > 0) {
            jq('div.go_top').css('bottom', 222);
            jq('#sitefocus').find('.xiaoyu_focus_colse').click(function () {
                setTimeout(function () {
                    jq('div.go_top').css('bottom', 10);
                }, 500);
            })
        }
        jq('.go_down_btn').click(function () {
            var t = jq('#map,#xiaoyu_forum,.xm_footer').offset().top;
            jq('html,body').animate({scrollTop:t}, 500);
        });
        jq('.go_top_btn').click(function(){
            jq('html,body').animate({scrollTop: 0},500);
        });
        jq(window).bind('scroll resize', function () {
            var w = jq(window);
            if (w.scrollTop() >= w.height()) {
                jq('a.go_top_btn').css('display', 'block');
                jq('a.go_down_btn').hide();
            }
            else {
                jq('a.go_down_btn').css('display', 'block');
                jq('a.go_top_btn').hide();
            }
        })
        jq(".vcode").hover(function () {
            var posL = jq(this).offset().left, posT = jq(this).offset().top;
            jq(".vcode_main").show().css({left:posL - 200, top:posT - 160});
        }, function () {
            jq(".vcode_main").hide();
        })
</script>
<?php if(isset($_G['makehtml'])) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>html2dynamic.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var html_lostmodify = <?php echo TIMESTAMP;?>;
htmlGetUserStatus();
<?php if(isset($_G['htmlcheckupdate'])) { ?>
htmlCheckUpdate();
<?php } ?>
</script>
<?php } output();?></body>
</html>

