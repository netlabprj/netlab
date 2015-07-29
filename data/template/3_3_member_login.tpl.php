<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');
0
|| checktplrefresh('./template/kym_xiaomi/member/login.htm', './template/default/common/seccheck.htm', 1436858840, '3', './data/template/3_3_member_login.tpl.php', './template/kym_xiaomi', 'member/login')
|| checktplrefresh('./template/kym_xiaomi/member/login.htm', './template/kym_xiaomi/munelist/pass.htm', 1436858840, '3', './data/template/3_3_member_login.tpl.php', './template/kym_xiaomi', 'member/login')
;?><?php include template('common/header'); ?><style>.rfm{margin-bottom: 10px; }</style><?php $loginhash = 'L'.random(4);?><?php if(empty($_GET['infloat'])) { ?>

<div id="pt" class="bm cl">
<?php if(empty($gid) && $announcements) { ?>
<div class="y">
<div id="an">
<dl class="cl">
<dt class="z xw1">!announcements!:&nbsp;</dt>
<dd>
<div id="anc"><ul id="ancl"><?php echo $announcements;?></ul></div>
</dd>
</dl>
</div>
<script type="text/javascript">announcement();</script>
</div>
<?php } ?>
<div class="z">
<a href="./" class="nvhm" title="首页"><?php echo $_G['setting']['bbname'];?></a><em>&raquo;</em><a href="forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a><em>&raquo;</em>登陆
</div>
</div>
<div id="ct" class="ptm wp w cl">
<div class="nfl" id="main_succeed" style="display: none">
<div class="f_c altw">
<div class="alert_right">
<p id="succeedmessage"></p>
<p id="succeedlocation" class="alert_btnleft"></p>
<p class="alert_btnleft"><a id="succeedmessage_href">如果您的浏览器没有自动跳转，请点击此链接</a></p>
</div>
</div>
</div>

<div class="mn" id="main_message" style="background:none;">
<div class="bm" style=" background:none; border:none;">

<div class="bm_h bbs" style="display:none">
<span class="y">
<?php if(!empty($_G['setting']['pluginhooks']['logging_side_top'])) echo $_G['setting']['pluginhooks']['logging_side_top'];?>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2">没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a></a>
</span>
<?php if(!$secchecklogin2) { ?>
<h3 class="xs2">登录</h3>
<?php } else { ?>
<h3 class="xs2">请输入验证码后继续登录</h3>
<?php } ?>
</div>
<div>
<?php } if(!empty($_GET['infloat'])) { ?><style>.kym_loginlogo{display:none;}#wrapper{ display:none;}.kym_lostpw{ margin-bottom:10px;} </style><?php } else { } ?>
<div id="main_messaqge_<?php echo $loginhash;?>"<?php if($auth) { ?> style="width: auto; "<?php } ?>>
<div id="layer_login_<?php echo $loginhash;?>" style="width:650px;">
<h3 class="flb">
<em id="returnmessage_<?php echo $loginhash;?>" class="kym_return">
<?php if(!empty($_GET['infloat'])) { if(!empty($_GET['guestmessage'])) { ?>您需要先登录才能继续本操作<?php } elseif($auth) { ?>请补充下面的登录信息<?php } else { ?>登陆与注�?!--<?php } ?>--><?php } ?>
</em>
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>', 0, 1);" title="关闭">关闭</a><?php } ?></span>
</h3>
<?php if(!empty($_G['setting']['pluginhooks']['logging_top'])) echo $_G['setting']['pluginhooks']['logging_top'];?>
<form method="post" autocomplete="off" name="login" id="loginform_<?php echo $loginhash;?>" class="cl" onsubmit="<?php if($this->setting['pwdsafety']) { ?>pwmd5('password3_<?php echo $loginhash;?>');<?php } ?>pwdclear = 1;ajaxpost('loginform_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=logging&amp;action=login&amp;loginsubmit=yes<?php if(!empty($_GET['handlekey'])) { ?>&amp;handlekey=<?php echo $_GET['handlekey'];?><?php } if(isset($_GET['frommessage'])) { ?>&amp;frommessage<?php } ?>&amp;loginhash=<?php echo $loginhash;?>">
<div class="c cl">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />
<?php if($auth) { ?>
<input type="hidden" name="auth" value="<?php echo $auth;?>" />
<?php } if($invite) { ?>
<div class="rfm">
<table>
<tr>
<th>推荐人</th>
<td><a href="home.php?mod=space&amp;uid=<?php echo $invite['uid'];?>" target="_blank"><?php echo $invite['username'];?></a></td>
</tr>
</table>
</div>
<?php } if(!$auth) { ?>
<div class="kym_loginlogo">
 	
</div>

<div class="rfm" style="margin-top:40px;">
<table>
<tr>
<?php if(!empty($_GET['infloat'])) { ?><th style="width: 75px;"><?php } else { ?><th style="width: 155px;"><?php } ?></th>

<td class="kym_td" ><em class="inbg"></em><input type="text" name="username" id="username_<?php echo $loginhash;?>" autocomplete="off" size="30" class="kym_fre" tabindex="1" placeholder="邮箱/用户�?UID" value="<?php echo $username;?>" /></td>

</tr>
</table>
</div>
<div class="rfm">
<table>
<tr>
<th style="display:none"><label for="password3_<?php echo $loginhash;?>" >密码:</label></th>
<?php if(!empty($_GET['infloat'])) { ?><th style="width: 75px;"><?php } else { ?><th style="width: 155px;"><?php } ?></th>
<td class="kym_td"><em class="inbgpass"></em><input type="password" id="password3_<?php echo $loginhash;?>" name="password" onfocus="clearpwd()" size="30" class="kym_fre" placeholder="密码"tabindex="1" /></td>

</tr>
</table>
</div>
<?php } if(empty($_GET['auth']) || $questionexist) { ?>
<div class="rfm xiaoyu_select">
<table>
<tr>
<th style="display:none">安全提问:</th>
<?php if(!empty($_GET['infloat'])) { ?><th style="width: 75px;"><?php } else { ?><th style="width: 155px;"><?php } ?></th>
<td style="margin:0px; padding:0px 0 0px 2px;"><select id="loginquestionid_<?php echo $loginhash;?>" width="213" name="questionid" <?php if(!$questionexist) { ?> onchange="if($('loginquestionid_<?php echo $loginhash;?>').value > 0) {$('loginanswer_row_<?php echo $loginhash;?>').style.display='';} else {$('loginanswer_row_<?php echo $loginhash;?>').style.display='none';}"<?php } ?>>
<option value="0"><?php if($questionexist) { ?>安全提问<?php } else { ?>安全提问(未设置请忽略)<?php } ?></option>
<option value="1">母亲的名字</option>
<option value="2">爷爷的名字</option>
<option value="3">父亲出生的城市</option>
<option value="4">您其中一位老师的名字</option>
<option value="5">您个人计算机的型号</option>
<option value="6">您最喜欢的餐馆名称</option>
<option value="7">驾驶执照最后四位数字</option>
</select></td>
</tr>
</table>
</div>
<style>.xiaoyu_select select{ width:320px; background:#ffffff; border-radius:6px; padding:10px 5px;  }</style>
<div class="rfm" id="loginanswer_row_<?php echo $loginhash;?>" <?php if(!$questionexist) { ?> style="display:none"<?php } ?>>
<table>
<tr>
<th style="display:none">答案:</th>
<?php if(!empty($_GET['infloat'])) { ?><th style="width: 75px;"><?php } else { ?><th style="width: 155px;"><?php } ?></th>
<td style="padding-left:0px;"><input type="text" name="answer" id="loginanswer_<?php echo $loginhash;?>" autocomplete="off" size="30" class="kym_asklist" placeholder="问题答案"tabindex="1" /></td>
</tr>
</table>
</div>
<?php } if($seccodecheck) { ?><?php
$sectpl = <<<EOF
<div class="rfm"><table><tr>
EOF;
 if(!empty($_GET['infloat'])) { 
$sectpl .= <<<EOF
<th style="width: 75px;">
EOF;
 } else { 
$sectpl .= <<<EOF
<th style="width: 155px;">
EOF;
 } 
$sectpl .= <<<EOF
<sec>: </th><td><sec><br /><sec></td></tr></table></div>
EOF;
?><?php $sechash = !isset($sechash) ? 'S'.($_G['inajax'] ? 'A' : '').$_G['sid'] : $sechash.random(3);
$sectpl = str_replace("'", "\'", $sectpl);?><?php if($secqaacheck) { ?>
<span id="secqaa_q<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updatesecqaa('q<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } if($seccodecheck) { ?>
<span id="seccode_c<?php echo $sechash;?>"></span>		
<script type="text/javascript" reload="1">updateseccode('c<?php echo $sechash;?>', '<?php echo $sectpl;?>', '<?php echo $_G['basescript'];?>::<?php echo CURMODULE;?>');</script>
<?php } } ?>

<?php if(!empty($_G['setting']['pluginhooks']['logging_input'])) echo $_G['setting']['pluginhooks']['logging_input'];?>

<?php if(!empty($_GET['infloat'])) { ?>
<div class="rfm <?php if(!empty($_GET['infloat'])) { ?> bw0<?php } ?>">
<table>
<tr>
<?php if(!empty($_GET['infloat'])) { ?><th style="width: 75px;"><?php } else { ?><th style="width: 155px;"><?php } ?></th>
<td style="padding-right: 176px;"><label for="cookietime_<?php echo $loginhash;?>"><input type="checkbox" class="pc" name="cookietime" id="cookietime_<?php echo $loginhash;?>" tabindex="1" value="2592000" <?php echo $cookietimecheck;?> />自动登录</label></td>
<td class="tipcol" style="float:right"><a href="javascript:;" onclick="display('layer_login_<?php echo $loginhash;?>');display('layer_lostpw_<?php echo $loginhash;?>');" title="找回密码">忘记密码?</a></td>
</tr>
</table>
</div>
<?php } ?>
<div class="rfm">
<table width="100%">
<tr>
<?php if(!empty($_GET['infloat'])) { ?>
<th style="width: 75px;"></th>
<td style="width:210px; "><button class="kym_login_pnwid" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>立即登陆</strong></button></td>
<td><a class="kym_login_zcwid" href="member.php?mod=<?php echo $_G['setting']['regname'];?>">免费注册</a></td>
<?php } else { ?>
<th style="width: 155px;"></th>
<td style=" padding:0px 0 0 2px;"><button class="kym_login_pn" type="submit" name="loginsubmit" value="true" tabindex="1"><strong>立即登陆</strong></button></td><?php } ?>


<td style="display:none;">
<?php if($this->setting['sitemessage']['login'] && empty($_GET['infloat'])) { ?><a href="javascript:;" id="custominfo_login_<?php echo $loginhash;?>" class="y">&nbsp;<img src="<?php echo IMGDIR;?>/info_small.gif" alt="帮助" class="vm" /></a><?php } if(!$this->setting['bbclosed'] && empty($_GET['infloat'])) { ?><a href="javascript:;" onclick="ajaxget('member.php?mod=clearcookies&formhash=<?php echo FORMHASH;?>', 'returnmessage_<?php echo $loginhash;?>', 'returnmessage_<?php echo $loginhash;?>');return false;" title="清除痕迹" class="y">清除痕迹</a><?php } ?>
</td>

</tr>
</table>
</div>
<?php if(!empty($_GET['infloat'])) { } else { ?>
<div class="rfm <?php if(!empty($_GET['infloat'])) { ?> bw0<?php } ?>">
<table >
<tr>
<?php if(!empty($_GET['infloat'])) { ?><th style="width: 75px;"><?php } else { ?><th style="width: 155px;"><?php } ?></th>
<td style="padding:0 176px 0 2px; "><label for="cookietime_<?php echo $loginhash;?>"><input type="checkbox" class="pc" name="cookietime" id="cookietime_<?php echo $loginhash;?>" tabindex="1" value="2592000" <?php echo $cookietimecheck;?> />自动登录</label></td>
<td class="tipcol" style="float:right; padding-top:0px; padding-bottom:0px;"><a href="javascript:;" onclick="display('layer_login_<?php echo $loginhash;?>');display('layer_lostpw_<?php echo $loginhash;?>');" title="找回密码">忘记密码?</a></td>
</tr>
</table>
</div>

<div class="rfm" style="text-align:center; margin-bottom:50px; margin-left:-50px;">
<a class="kym_tipcol" href="member.php?mod=<?php echo $_G['setting']['regname'];?>">免费注册账户</a>

</div><?php } if(!empty($_G['setting']['pluginhooks']['logging_method'])) { ?>
<div class="rfm bw0 <?php if(empty($_GET['infloat'])) { ?> mbw<?php } ?>">
<hr class="l" />
<table>
<tr>
<th>快捷登录:</th>
<td><?php if(!empty($_G['setting']['pluginhooks']['logging_method'])) echo $_G['setting']['pluginhooks']['logging_method'];?></td>
</tr>
</table>
</div>
<?php } ?>
</div>
</form>
</div>
<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } ?>
<div id="layer_lostpw_<?php echo $loginhash;?>" style="display: none;">
<h3 class="flb">
<em id="returnmessage3_<?php echo $loginhash;?>" style="color:#656D78;">找回密码</em>
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a><?php } ?></span>
</h3><div id="wrapper">
<div class="forgetStep clearfix">
    	<div class="current">
        	<h4>01</h4>
            <p>输入账户名</p>
        </div>
        <em></em>
        <div>
        	<h4>02</h4>
            <p>验证身份</p>
        </div>
        <em></em>
        <div>
        	<h4>03</h4>
            <p>重置密码</p>
        </div>
        <em></em>
        <div>
        	<h4>04</h4>
            <p>完成</p>
        </div>
    </div>
</div>
<form method="post" autocomplete="off" id="lostpwform_<?php echo $loginhash;?>" class="cl" onsubmit="ajaxpost('lostpwform_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">
<div class="c cl">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="lostpwform" />
<div class="rfm">
<table>
<tr>
<th><span class="rq">*</span><label for="lostpw_email">Email:</label></th>
<td><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" class="kym_lostpw" /></td>
</tr>
</table>
</div>
<div class="rfm">
<table>
<tr>
<th><label for="lostpw_username">用户名:</label></th>
<td><input type="text" name="username" id="lostpw_username" size="30" value=""  tabindex="1" class="kym_lostpw" /></td>
</tr>
</table>
</div>

<div class="rfm mbw bw0">
<table>
<tr>
<th></th>
<td><button class="kym_lostnet" type="submit" name="lostpwsubmit" value="true" tabindex="100"><span>下一�?/span></button></td>
</tr>
</table>
</div>
<div class="rfm"><p class="kym_ask" style=" text-align:center; width:600px; margin-bottom:20px;"><a target="_blank" href="misc.php?mod=faq"><span style="padding:0 6px;background:#FD843F; border-radius:5px; color:#FFFFFF; height:19px; font-size:14px; margin-right:5px;">?</span>常见问题</a></p>
</div>
</div>
</form>

</div>
</div>

<div id="layer_message_<?php echo $loginhash;?>"<?php if(empty($_GET['infloat'])) { ?> class="f_c blr nfl"<?php } ?> style="display: none;">
<h3 class="flb" id="layer_header_<?php echo $loginhash;?>">
<?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?>
<em>用户登录</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a></span>
<?php } ?>
</h3>

<script type="text/javascript" reload="1">
<?php if(!isset($_GET['viewlostpw'])) { ?>
var pwdclear = 0;
function initinput_login() {
document.body.focus();
<?php if(!$auth) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
$('loginform_<?php echo $loginhash;?>').username.focus();
}
<?php if(!$this->setting['autoidselect']) { ?>
simulateSelect('loginfield_<?php echo $loginhash;?>');
<?php } } elseif($seccodecheck && !(empty($_GET['auth']) || $questionexist)) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
safescript('seccodefocus', function() {$('loginform_<?php echo $loginhash;?>').seccodeverify.focus()}, 500, 10);
}			
<?php } ?>
}
initinput_login();
<?php if($this->setting['sitemessage']['login']) { ?>
showPrompt('custominfo_login_<?php echo $loginhash;?>', 'mouseover', '<?php echo trim($this->setting['sitemessage']['login'][array_rand($this->setting['sitemessage']['login'])]); ?>', <?php echo $this->setting['sitemessage']['time'];?>);
<?php } ?>

function clearpwd() {
if(pwdclear) {
$('password3_<?php echo $loginhash;?>').value = '';
}
pwdclear = 0;
}
<?php } else { ?>
display('layer_login_<?php echo $loginhash;?>');
display('layer_lostpw_<?php echo $loginhash;?>');
$('lostpw_email').focus();
<?php } ?>
</script><?php updatesession();?><?php if(empty($_GET['infloat'])) { ?>
</div></div></div></div>
</div>
<?php } include template('common/footer'); ?>