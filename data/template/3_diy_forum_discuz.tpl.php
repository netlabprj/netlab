<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('discuz');?><?php include template('common/header'); ?><style id="diy_style" type="text/css"></style>
<style>.bm{ background:#ffffff; padding:10px;}.bm_c{padding:10px;}</style>
<div id="pt" class="cl">
<?php if(empty($gid) && $announcements) { ?>
<div class="y" style="display:none">
<div id="an">
<dl class="cl">
<dt class="z xw1">公告:&nbsp;</dt>
<dd>
<div id="anc"><ul id="ancl"><?php echo $announcements;?></ul></div>
</dd>
</dl>
</div>
<script type="text/javascript">announcement();</script>
</div>
<?php } ?>
<div class="z">
<a href="forum.php"><?php echo $_G['setting']['navs']['2']['navname'];?></a><em>&raquo;</em>所有版块</div>
<div class="z"><?php if(!empty($_G['setting']['pluginhooks']['index_status_extra'])) echo $_G['setting']['pluginhooks']['index_status_extra'];?></div>
</div>

<?php if(empty($gid)) { ?>

<div class="wp">
<!--[diy=diy1]--><div id="diy1" class="area"></div><!--[/diy]-->
</div>
<?php } ?>

<div id="ct" class="wp cl<?php if($_G['setting']['forumallowside']) { ?> ct2<?php } ?>">
<?php if(empty($gid)) { ?>
<div class="xm_tp">
<div id="chart" class="kym_bm bw0 cl">
<div class="chart">
 <ul>
                    <li>今日发帖数<em><?php echo $todayposts;?></em></li>
                    <li>昨日发帖数<em><?php echo $postdata['0'];?></em></li>
                    <li>总帖数<em><?php echo $posts;?></em></li>
                    <li>会员总数<em><?php echo $_G['cache']['userstats']['totalmembers'];?></em></li>
                </ul>
</div>
<div class="y">

<?php if($_G['cache']['userstats']['newsetuser']) { ?>欢迎新会员: <em><a href="home.php?mod=space&amp;username=<?php echo rawurlencode($_G['cache']['userstats']['newsetuser']); ?>" target="_blank" class="xi2"><?php echo $_G['cache']['userstats']['newsetuser'];?></a></em><?php } ?><span class="pipe">|</span>
<?php if(!empty($_G['setting']['pluginhooks']['index_nav_extra'])) echo $_G['setting']['pluginhooks']['index_nav_extra'];?>
<?php if($_G['uid']) { ?><a href="forum.php?mod=guide&amp;view=my" title="我的帖子" class="xi2">我的帖子</a><?php } if(!empty($_G['setting']['search']['forum']['status'])) { if($_G['uid']) { ?><span class="pipe">|</span><?php } ?><a href="forum.php?mod=guide&amp;view=new" title="最新回复" class="xi2">最新回复</a><?php } ?>
</div>
</div>
<?php } ?>
<!--[diy=diy_chart]--><div id="diy_chart" class="area"></div><!--[/diy]-->
<div class="mn" style="overflow:hidden;margin-bottom: 20px; margin-left:62px; width:1200px;">
<?php if(!empty($_G['setting']['grid']['showgrid'])) { ?>
<!-- index four grid -->

<div class="fl bm">
<div class="bm bmw cl">
<div id="category_grid" class="bm_c" >
<table cellspacing="0" cellpadding="0"><tr>
<?php if(!$_G['setting']['grid']['gridtype']) { ?>
<td valign="top" class="category_l1">
<div class="newimgbox">
<h4><span class="tit_newimg"></span>最新图片</h4>
<div class="module cl slidebox_grid" style="width:218px">
<script type="text/javascript">
var slideSpeed = 5000;
var slideImgsize = [218,200];
var slideBorderColor = '<?php echo $_G['style']['specialborder'];?>';
var slideBgColor = '<?php echo $_G['style']['commonbg'];?>';
var slideImgs = new Array();
var slideImgLinks = new Array();
var slideImgTexts = new Array();
var slideSwitchColor = '<?php echo $_G['style']['tabletext'];?>';
var slideSwitchbgColor = '<?php echo $_G['style']['commonbg'];?>';
var slideSwitchHiColor = '<?php echo $_G['style']['specialborder'];?>';<?php $k = 1;?><?php if(is_array($grids['slide'])) foreach($grids['slide'] as $stid => $svalue) { ?>slideImgs[<?php echo $k; ?>] = '<?php echo $svalue['image'];?>';
slideImgLinks[<?php echo $k; ?>] = '<?php echo $svalue['url'];?>';
slideImgTexts[<?php echo $k; ?>] = '<?php echo $svalue['subject'];?>';<?php $k++;?><?php } ?>
</script>
<script src="<?php echo $_G['setting']['jspath'];?>forum_slide.js?<?php echo VERHASH;?>" type="text/javascript"></script>
</div>
</div>
</td>
<?php } ?>
<td valign="top" class="category_l2">
<div class="subjectbox">
<h4><span class="tit_subject"></span>最新主题</h4>
        <ul class="category_newlist">
        <?php if(is_array($grids['newthread'])) foreach($grids['newthread'] as $thread) { ?>        	<?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
<li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?> tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>
<?php } ?>
         </ul>
         </div>
</td>
<td valign="top" class="category_l3">
<div class="replaybox">
<h4><span class="tit_replay"></span>最新回复</h4>
        <ul class="category_newlist">
        <?php if(is_array($grids['newreply'])) foreach($grids['newreply'] as $thread) { ?>        	<?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
<li><a href="forum.php?mod=redirect&amp;tid=<?php echo $thread['tid'];?>&amp;goto=lastpost#lastpost"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?>tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>
<?php } ?>
         </ul>
         </div>
</td>
<td valign="top" class="category_l3">
<div class="hottiebox">
<h4><span class="tit_hottie"></span>热帖</h4>
        <ul class="category_newlist">
        <?php if(is_array($grids['hot'])) foreach($grids['hot'] as $thread) { ?>        	<?php if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
<li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?> tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>
<?php } ?>
         </ul>
         </div>
</td>
<?php if($_G['setting']['grid']['gridtype']) { ?>
<td valign="top" class="category_l4">
<div class="goodtiebox">
<h4><span class="tit_goodtie"></span>精华帖子</h4>
<ul class="category_newlist"><?php if(is_array($grids['digest'])) foreach($grids['digest'] as $thread) { if(!$thread['forumstick'] && $thread['closed'] > 1 && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { $thread[tid]=$thread[closed];?><?php } ?>
<li><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>&amp;extra=<?php echo $extra;?>"<?php if($thread['highlight']) { ?> <?php echo $thread['highlight'];?><?php } if($_G['setting']['grid']['showtips']) { ?> tip="标题: <strong><?php echo $thread['oldsubject'];?></strong><br/>作者: <?php echo $thread['author'];?> (<?php echo $thread['dateline'];?>)<br/>查看/回复: <?php echo $thread['views'];?>/<?php echo $thread['replies'];?>" onmouseover="showTip(this)"<?php } else { ?> title="<?php echo $thread['oldsubject'];?>"<?php } if($_G['setting']['grid']['targetblank']) { ?> target="_blank"<?php } ?>><?php echo $thread['subject'];?></a></li>
<?php } ?>
 </ul>
 	</div>
</td>
<?php } ?>
</table>
</div>
</div>
</div>
<!-- index four grid end -->
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_top'])) echo $_G['setting']['pluginhooks']['index_top'];?>
<?php if(!empty($_G['cache']['heats']['message'])) { ?>
<div class="bm">
<div class="bm_h cl">
<h2><?php echo $_G['setting']['navs']['2']['navname'];?>热点</h2>
</div>
<div class="bm_c cl">
<div class="heat z"><?php if(is_array($_G['cache']['heats']['message'])) foreach($_G['cache']['heats']['message'] as $data) { ?><dl class="xld">
<dt><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>
<a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></dt>
<dd><?php echo $data['message'];?></dd>
</dl>
<?php } ?>
</div>
<ul class="xl xl1 heatl"><?php if(is_array($_G['cache']['heats']['subject'])) foreach($_G['cache']['heats']['subject'] as $data) { ?><li><?php if($_G['adminid'] == 1) { ?><a class="d" href="forum.php?mod=misc&amp;action=removeindexheats&amp;tid=<?php echo $data['tid'];?>" onclick="return removeindexheats()">delete</a><?php } ?>&middot; <a href="forum.php?mod=viewthread&amp;tid=<?php echo $data['tid'];?>" target="_blank" class="xi2"><?php echo $data['subject'];?></a></li>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>
<div id="sd" class="sd xm_sd">
<div class="xm_bm post_new">
<div class="bm_cc">
<a class="post_btn" href="forum.php?mod=misc&amp;action=nav&amp;special=0&amp;" onclick="showWindow('nav', this.href);return false;">
<img alt="发新帖" src="template/kym_xiaomi/style/images/pn_post_big.png">
</a>
</div>
</div>
<div class="xm_bm xm_bm_top">
<div class="bm_h">
<h2>精彩推荐</h2>
<a target="_blank" href="#">更多></a>
<a target="_blank" href="#">更多></a>
</div>
<div class="bm_c">
<ul>
<!--[diy=diy_jc]--><div id="diy_jc" class="area"></div><!--[/diy]-->

</ul>
</div>
</div>
<div class="xm_bm xm_bm_news">
<div class="bm_h">
<h2>热点动态</h2>
<a target="_blank" href="#">更多></a>
</div>
<div class="bm_c">
<ul>
<!--[diy=diy_dt]--><div id="diy_dt" class="area"></div><!--[/diy]-->

</ul>
</div>
</div>
<div id="xm_store" class="xm_bm xm_bm_gal xm_bm_store">
<div class="bm_h">
<h2>精品专区</h2>
</div>
<div class="bm_c">
<!--[diy=diy_jiaoc]--><div id="diy_jiaoc" class="area"></div><!--[/diy]-->
</div>
</div>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['index_catlist_top'])) echo $_G['setting']['pluginhooks']['index_catlist_top'];?>
<div class="fl"  style="width:745px; margin-right:15px;">
<?php if(!empty($collectiondata['follows'])) { $forumscount = count($collectiondata['follows']);?><?php $forumcolumns = 4;?><?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?><div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
<div class="bm_h cl">
<span class="o">
<img id="category_-1_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-1'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-1');" />
</span>
<h2><a href="forum.php?mod=collection&amp;op=my">我订阅的专辑</a></h2>
</div>
<div id="category_-1" class="bm_c" style="<?php echo $collapse['category_-1']; ?>">
<table cellspacing="0" cellpadding="0" class="fl_tb">
<tr><?php $ctorderid = 0;?><?php if(is_array($collectiondata['follows'])) foreach($collectiondata['follows'] as $key => $colletion) { if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
</tr>
<?php if($ctorderid < $forumscount) { ?>
<tr class="fl_row">
<?php } } ?>
<td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
<div class="fl_icn_g">
<a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo IMGDIR;?>/forum<?php if($followcollections[$key]['lastvisit'] < $colletion['lastupdate']) { ?>_new<?php } ?>.gif" alt="<?php echo $colletion['name'];?>" /></a>
</div>
<dl>
<dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
<dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
<dd>
<?php if($colletion['lastpost']) { if($forumcolumns < 3) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
<?php } } else { ?>
从未
<?php } ?>
</dd>
<?php if(!empty($_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_followcollection_extra'][$colletion[ctid]];?>
</dl>
</td><?php $ctorderid++;?><?php } if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
</tr>
</table>

</div>
</div>

<?php } if(empty($gid) && !empty($forum_favlist)) { $forumscount = count($forum_favlist);?><?php $forumcolumns = $forumscount > 3 ? ($forumscount == 4 ? 4 : 5) : 1;?><?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?><div class="xm_bm xm_gd<?php if($forumcolumns) { ?> flg<?php } ?> cl">
<div class="bm_h cl">
<span class="o">
<img id="category_0_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_0'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_0');" />
</span>
<h2><a href="home.php?mod=space&amp;do=favorite&amp;type=forum">我收藏的版块</a></h2>
</div>
<div id="category_0" class="bm_c" style="<?php echo $collapse['category_0']; ?>">
<table cellspacing="0" cellpadding="0" class="fl_tb">
<tr><?php $favorderid = 0;?><?php if(is_array($forum_favlist)) foreach($forum_favlist as $key => $favorite) { if($favforumlist[$favorite['id']]) { $forum=$favforumlist[$favorite[id]];?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php if($forumcolumns>1) { if($favorderid && ($favorderid % $forumcolumns == 0)) { ?>
</tr>
<?php if($favorderid < $forumscount) { ?>
<tr class="fl_row">
<?php } } ?>
<td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
<div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
</div>
<dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
<dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>
<?php if(empty($forum['redirect'])) { ?><dd><em>主题: <?php echo dnumber($forum['threads']); ?></em>, <em>帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
<dd>
<?php if($forum['permission'] == 1) { ?>
私密版块
<?php } else { if($forum['redirect']) { ?>
<a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
<?php } elseif(is_array($forum['lastpost'])) { if($forumcolumns < 3) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo $forum['lastpost']['dateline'];?></a>
<?php } } else { ?>
从未
<?php } } ?>
</dd>
<?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
</dl>
</td><?php $favorderid++;?><?php } else { ?>
<td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
</td>
<td>
<h2><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
<?php if($forum['description']) { ?><p class="xg2"><?php echo $forum['description'];?></p><?php } if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_favforum_extra'][$forum[fid]];?>
</td>
<td class="fl_i">
<?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
</td>
<td class="fl_by">
<div>
<?php if($forum['permission'] == 1) { ?>
私密版块
<?php } else { if($forum['redirect']) { ?>
<a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
<?php } elseif(is_array($forum['lastpost'])) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
从未
<?php } } ?>
</div>
</td>
</tr>
<tr class="fl_row">

<?php } } } if(($columnspad = $favorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
</tr>
</table>

</div>
</div><?php echo adshow("intercat/bm a_c/-1");?><?php } if(is_array($catlist)) foreach($catlist as $key => $cat) { ?><?php if(!empty($_G['setting']['pluginhooks']['index_catlist'][$cat[fid]])) echo $_G['setting']['pluginhooks']['index_catlist'][$cat[fid]];?>
<div class="xm_bm xm_gd<?php if($cat['forumcolumns']) { ?> flg<?php } ?> cl">
<div class="bm_h cl">
<span class="o">
<img id="category_<?php echo $cat['fid'];?>_img" src="<?php echo IMGDIR;?>/<?php echo $cat['collapseimg'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_<?php echo $cat['fid'];?>');" />
</span>
<?php if($cat['moderators']) { ?><span class="y">分区版主: <?php echo $cat['moderators'];?></span><?php } $caturl = !empty($cat['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$cat['domain'].'.'.$_G['setting']['domain']['root']['forum'] : '';?><h2><a href="<?php if(!empty($caturl)) { ?><?php echo $caturl;?><?php } else { ?>forum.php?gid=<?php echo $cat['fid'];?><?php } ?>" style="<?php if($cat['extra']['namecolor']) { ?>color: <?php echo $cat['extra']['namecolor'];?>;<?php } ?>"><?php echo $cat['name'];?></a></h2>
</div>
<div id="category_<?php echo $cat['fid'];?>" class="bm_c" style="<?php echo $collapse['category_'.$cat['fid']]; ?>">
<table cellspacing="0" cellpadding="0" class="fl_tb kym_foromlist_shu">
<tr><?php if(is_array($cat['forums'])) foreach($cat['forums'] as $forumid) { $forum=$forumlist[$forumid];?><?php $forumurl = !empty($forum['domain']) && !empty($_G['setting']['domain']['root']['forum']) ? 'http://'.$forum['domain'].'.'.$_G['setting']['domain']['root']['forum'] : 'forum.php?mod=forumdisplay&fid='.$forum['fid'];?><?php if($cat['forumcolumns']) { if($forum['orderid'] && ($forum['orderid'] % $cat['forumcolumns'] == 0)) { ?>
</tr>
<?php if($forum['orderid'] < $cat['forumscount']) { ?>
<tr class="fl_row">
<?php } } ?>

<!--横排美化开始-->

<td class="fl_g" width="<?php echo $cat['forumcolwidth'];?>">
<div class="fl_g_inner">
<div class="fl_icn_g"<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
</div>
<dl<?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="margin-left: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
<dt><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></dt>

<dd style="color:#434A54;width: 240px; overflow: hidden; white-space: nowrap; font-size:12px;"><?php if($forum['description']) { ?><?php echo $forum['description'];?><?php } else { ?>暂没版块简介<?php } ?></dd>

<?php if(empty($forum['redirect'])) { ?><dd><em style="color:#999999;font-size:12px;">主题: <?php echo dnumber($forum['threads']); ?>,&nbsp;</em><em style="color:#999999;font-size:12px;">帖数: <?php echo dnumber($forum['posts']); ?></em></dd><?php } ?>
<dd style="color:#999999;font-size:12px; display:none">
<?php if($forum['permission'] == 1) { ?>
私密版块
<?php } else { if($forum['redirect']) { ?>
<a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
<?php } elseif(is_array($forum['lastpost'])) { if($cat['forumcolumns'] < 3) { } else { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo $forum['lastpost']['dateline'];?></a>
<?php } } else { ?>
从未
<?php } } ?>
</dd>
<?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
</dl>
</div>
</td>
<?php } else { ?>
<td class="fl_icn" <?php if(!empty($forum['extra']['iconwidth']) && !empty($forum['icon'])) { ?> style="width: <?php echo $forum['extra']['iconwidth'];?>px;"<?php } ?>>
<?php if($forum['icon']) { ?>
<?php echo $forum['icon'];?>
<?php } else { ?>
<a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } ?>><img src="<?php echo IMGDIR;?>/forum<?php if($forum['folder']) { ?>_new<?php } ?>.gif" alt="<?php echo $forum['name'];?>" /></a>
<?php } ?>
</td>
<td>
<h2 class="namecolorshu"><a href="<?php echo $forumurl;?>"<?php if($forum['redirect']) { ?> target="_blank"<?php } if($forum['extra']['namecolor']) { ?> style="color: <?php echo $forum['extra']['namecolor'];?>;"<?php } ?>><?php echo $forum['name'];?></a><?php if($forum['todayposts'] && !$forum['redirect']) { ?><em class="xw0 xi1" title="今日"> (<?php echo $forum['todayposts'];?>)</em><?php } ?></h2>
<?php if($forum['description']) { ?><p style="color:#434A54;overflow: hidden; white-space: nowrap; font-size:12px;"><?php echo $forum['description'];?></p><?php } if($forum['subforums']) { ?><p>子版块: <?php echo $forum['subforums'];?></p><?php } if($forum['moderators']) { ?><p>版主: <span class="xi2"><?php echo $forum['moderators'];?></span></p><?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]])) echo $_G['setting']['pluginhooks']['index_forum_extra'][$forum[fid]];?>
</td>
<td class="fl_i">
<?php if(empty($forum['redirect'])) { ?><span class="xi2"><?php echo dnumber($forum['threads']); ?></span><span class="xg1"> / <?php echo dnumber($forum['posts']); ?></span><?php } ?>
</td>
<td class="fl_by">
<div>
<?php if($forum['permission'] == 1) { ?>
私密版块
<?php } else { if($forum['redirect']) { ?>
<a href="<?php echo $forumurl;?>" class="xi2">链接到外部地址</a>
<?php } elseif(is_array($forum['lastpost'])) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $forum['lastpost']['tid'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($forum['lastpost']['subject'], 30); ?></a> <cite><?php echo $forum['lastpost']['dateline'];?> <?php if($forum['lastpost']['author']) { ?><?php echo $forum['lastpost']['author'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
从未
<?php } } ?>
</div>
</td>
</tr>
<tr class="fl_row">
<?php } } ?>
<?php echo $cat['endrows'];?>
</tr>
</table>
</div>
</div><?php echo adshow("intercat/bm a_c/$cat[fid]");?><?php } if(!empty($collectiondata['data'])) { $forumscount = count($collectiondata['data']);?><?php $forumcolumns = 4;?><?php $forumcolwidth = (floor(100 / $forumcolumns) - 0.1).'%';?><div class="bm bmw <?php if($forumcolumns) { ?> flg<?php } ?> cl">
<div class="bm_h cl">
<span class="o">
<img id="category_-2_img" src="<?php echo IMGDIR;?>/<?php echo $collapse['collapseimg_-2'];?>" title="收起/展开" alt="收起/展开" onclick="toggle_collapse('category_-2');" />
</span>
<h2><a href="forum.php?mod=collection">淘专辑推荐</a></h2>
</div>
<div id="category_-2" class="bm_c" style="<?php echo $collapse['category_-2']; ?>">
<table cellspacing="0" cellpadding="0" class="fl_tb">
<tr><?php $ctorderid = 0;?><?php if(is_array($collectiondata['data'])) foreach($collectiondata['data'] as $key => $colletion) { if($ctorderid && ($ctorderid % $forumcolumns == 0)) { ?>
</tr>
<?php if($ctorderid < $forumscount) { ?>
<tr class="fl_row">
<?php } } ?>
<td class="fl_g"<?php if($forumcolwidth) { ?> width="<?php echo $forumcolwidth;?>"<?php } ?>>
<div class="fl_icn_g">
<a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>" target="_blank"><img src="<?php echo IMGDIR;?>/forum.gif" alt="<?php echo $colletion['name'];?>" /></a>
</div>
<dl>
<dt><a href="forum.php?mod=collection&amp;action=view&amp;ctid=<?php echo $colletion['ctid'];?>"><?php echo $colletion['name'];?></a></dt>
<dd><em>主题: <?php echo dnumber($colletion['threadnum']); ?></em>, <em>评论: <?php echo dnumber($colletion['commentnum']); ?></em></dd>
<dd>
<?php if($colletion['lastpost']) { if($forumcolumns < 3) { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost" class="xi2"><?php echo cutstr($colletion['lastsubject'], 30); ?></a> <cite><?php echo dgmdate($colletion[lastposttime]);?> <?php if($colletion['lastposter']) { ?><?php echo $colletion['lastposter'];?><?php } else { ?><?php echo $_G['setting']['anonymoustext'];?><?php } ?></cite>
<?php } else { ?>
<a href="forum.php?mod=redirect&amp;tid=<?php echo $colletion['lastpost'];?>&amp;goto=lastpost#lastpost">最后发表: <?php echo dgmdate($colletion[lastposttime]);?></a>
<?php } } else { ?>
从未
<?php } ?>
</dd>
<?php if(!empty($_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]])) echo $_G['setting']['pluginhooks']['index_datacollection_extra'][$colletion[ctid]];?>
</dl>
</td><?php $ctorderid++;?><?php } if(($columnspad = $ctorderid % $forumcolumns) > 0) { echo str_repeat('<td class="fl_g"'.($forumcolwidth ? " width=\"$forumcolwidth\"" : '').'></td>', $forumcolumns - $columnspad);; } ?>
</tr>
</table>

</div>
</div>

<?php } ?>

</div>

<?php if(!empty($_G['setting']['pluginhooks']['index_middle'])) echo $_G['setting']['pluginhooks']['index_middle'];?>




<?php if(!empty($_G['setting']['pluginhooks']['index_bottom'])) echo $_G['setting']['pluginhooks']['index_bottom'];?>

</div>
</div>
<?php if($_G['group']['radminid'] == 1) { helper_manyou::checkupdate();?><?php } if(empty($_G['setting']['disfixednv_forumindex']) ) { ?><script>fixed_top_nv();</script><?php } ?>
<div class="xm_bm kym_flei">
<div class="bm_h cl">
<h2><a style="" href="#">友情联接</a></h2>
</div>
<div class="kym_youq">
<!--[diy=diyyouq]--><div id="diyyouq" class="area"></div><!--[/diy]-->
</div>
</div><?php include template('common/footer'); ?>