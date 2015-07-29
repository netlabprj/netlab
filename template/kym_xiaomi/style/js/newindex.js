
/*--portfolioMenu---*/
var mOnclick=0;
jq(".portfolioMenu a").click(
   function() {
	  jq(".menuBg").css("display","none");
	  jq(this).children().css("display","block");
	  jq(".menuBg").removeAttr("title");
	  jq(this).children().attr("title","menuBgOn");
	  mOnclick = 1;
	   });
jq(".portfolioMenu a").hover(
  function () {	 
	jq(this).children().stop(false,true);
    jq(this).children().fadeIn("normal");
  },
  function () {
 var menuBgStatus=(jq(this).children().attr("title"))
 if (mOnclick != 1 && menuBgStatus != "menuBgOn"){
 jq(this).children().stop(false,true);
 jq(this).children().fadeOut("normal");}
 else 
  {
	  mOnclick=0; 
	  }	
	
	
  });

/*------focus-------*/
jq("#focusBar").hover(
	function () {
		jq("#focusBar .arrL").stop(false,true);
		jq("#focusBar .arrR").stop(false,true);
		jq("#focusBar .arrL").animate({ left: 0}, { duration: 500 });
		jq("#focusBar .arrR").animate({ right: 0}, { duration: 500 });
	}, function () {
		jq("#focusBar .arrL").stop(false,true);
		jq("#focusBar .arrR").stop(false,true);
		jq("#focusBar .arrL").animate({ left: -52}, { duration: 500 });
		jq("#focusBar .arrR").animate({ right: -52}, { duration: 500 });
	}
);

var timerFID;

function nextPage() {
	changeFocus(true);
}
function prePage() {
	changeFocus(false);
}

var currentFocusI=1;
var changeingFocus = false;
function changeFocus(dir) {
	if(jq("#focusBar li").length <= 1) return;
	if(changeingFocus) return;
	changeingFocus = true;
	
	jq("#focusIndex"+nextI).stop(false,true);
	jq("#focusIndex"+nextI+" .focusL").stop(false,true);
	jq("#focusIndex"+nextI+" .focusR").stop(false,true);
	
	var nextI = dir?currentFocusI+1:currentFocusI-1;
	nextI = nextI>jq("#focusBar li").length?1:(nextI<1?jq("#focusBar li").length:nextI);
	//var focusWidth = jq(window).width()>1000?1000:jq(window).width();
	jq("#focusIndex"+currentFocusI).css("width",jq(window).width());
	jq("#focusIndex"+nextI).css("width",jq(window).width());
	if(dir) {
		jq("#focusIndex"+nextI).css("left",jq(window).width());
		jq("#focusIndex"+nextI+" .focusL").css("left",jq(window).width()/2);
		jq("#focusIndex"+nextI+" .focusR").css("left",jq(window).width()/2);
		jq("#focusIndex"+currentFocusI).show();
		jq("#focusIndex"+nextI).show();
		
		jq("#focusIndex"+currentFocusI+" .focusL").animate({left: -(jq(window).width()/2+1000)},300,'easeInExpo');
		jq("#focusIndex"+currentFocusI+" .focusR").animate({left: -(jq(window).width()/2+1000)},500,'easeInExpo',function(){
				jq("#focusIndex"+nextI+" .focusL").animate({left: -500},1000,'easeInOutCirc');
				jq("#focusIndex"+nextI+" .focusR").animate({left: -500},1200,'easeInOutCirc');
				
				jq("#focusIndex"+currentFocusI).animate({left: -jq(window).width()},1000,'easeOutExpo');
				jq("#focusIndex"+nextI).animate({left: 0},1000,'easeOutExpo',function(){
						jq("#focusIndex"+currentFocusI).hide();
						currentFocusI = nextI;
						changeingFocus = false;
				});
		});
	} else {
		jq("#focusIndex"+nextI).css("left",-jq(window).width());
		jq("#focusIndex"+nextI+" .focusL").css("left",-(jq(window).width()/2+1000));
		jq("#focusIndex"+nextI+" .focusR").css("left",-(jq(window).width()/2+1000));
		jq("#focusIndex"+currentFocusI).show();
		jq("#focusIndex"+nextI).show();
		
		jq("#focusIndex"+currentFocusI+" .focusR").animate({left: jq(window).width()/2},300,'easeInExpo');
		jq("#focusIndex"+currentFocusI+" .focusL").animate({left: jq(window).width()/2},500,'easeInExpo',function(){
				jq("#focusIndex"+nextI+" .focusL").animate({left: -500},1200,'easeInOutCirc');
				jq("#focusIndex"+nextI+" .focusR").animate({left: -500},1000,'easeInOutCirc');
				
				jq("#focusIndex"+currentFocusI).animate({left: jq(window).width()},1000,'easeOutExpo');
				jq("#focusIndex"+nextI).animate({left: 0},1000,'easeOutExpo',function(){
						jq("#focusIndex"+currentFocusI).hide();
						currentFocusI = nextI;
						changeingFocus = false;
				});
		});
	}
}
function starFocustAm(){
	timerFID = setInterval("timer_tickF()",12000);
}
function stopFocusAm(){
	clearInterval(timerFID);
}
function timer_tickF() {
	changeFocus(true);
}


//services
jq(".serBox").hover(
  function () {
	 jq(this).children().stop(false,true);
	 jq(this).children(".serBoxOn").fadeIn("slow");
     jq(this).children(".pic1").animate({right: -110},400);
     jq(this).children(".pic2").animate({left: 105},400);
     jq(this).children(".txt1").animate({left: -240},400);
     jq(this).children(".txt2").animate({right: 40},400);	 
	 }, 
  function () {
	 jq(this).children().stop(false,true);
	 jq(this).children(".serBoxOn").fadeOut("slow");
	 jq(this).children(".pic1").animate({right:105},400);
     jq(this).children(".pic2").animate({left: -110},400);
     jq(this).children(".txt1").animate({left: 40},400);
     jq(this).children(".txt2").animate({right: -240},400);	
  }
);


function serFocus(i) {
	jq(".servicesPop").slideDown("normal");
	changeflash(i);
	}
function closeSerPop() {jq(".servicesPop").slideUp("fast");}	


var currentindex=1;
function changeflash(i) {	
currentindex=i;
for (j=1;j<=6;j++){
	if (j==i) 
	{jq("#flash"+j).fadeIn("normal");
	jq("#flash"+j).css("display","block");
	jq("#f"+j).removeClass();
	jq("#f"+j).addClass("no");
	}
	else
	{jq("#flash"+j).css("display","none");
	jq("#f"+j).removeClass();
	jq("#f"+j).addClass("no");}
}}
//function startAm(){
//timerID = setInterval("timer_tick()",7000);
//}
//function stopAm(){
//clearInterval(timerID);
//}
function timer_tick() {


    currentindex=currentindex>=3?1:currentindex+1;
	changeflash(currentindex);}
//jq(document).ready(function(){
//jq(".flash_bar div").mouseover(function(){stopAm();}).mouseout(function(){startAm();});
//startAm();
//});
	
//about
jq(".aboutListBox").hover(
  function () {
    jq(this).toggleClass("aboutListBoxON");
  },
  function () {
    jq(this).toggleClass("aboutListBoxON");
  }
);

 
//tab
var curPortflioi = "page81";
var nn;
var curNumi=1;
var jj=0;
function showPagei(idi,nn,i){
	for(var j=1;j<=nn;j++){
		if(j==idi) {
			jq("#box"+i+j).removeClass ();	
			jq("#box"+i+j).addClass ("tab1");
			for(var k=1;k<10;k++){
				jq("#page1"+k).hide();
				jq("#page2"+k).hide();
				jq("#page3"+k).hide();
				jq("#page8"+k).hide();
			}
			jq("#page"+i+j).fadeIn(400);
			if(i==8) {
				curPortflioi = "page"+i+j;
			}
			if(i==1) {
				curPortflioi = "page"+i+j;
			}
			if(i==2) {
				curPortflioi = "page"+i+j;
			}
			if(i==3) {
				curPortflioi = "page"+i+j;
			}
		} else {
			jq("#box"+i+j).removeClass ();	
			jq("#box"+i+j).addClass ("tab2");	
			//jq("#page"+i+j).fadeOut("fast");
			jq("#page"+i+j).hide();

		}
	}
	
}

var zpShowed = false;
function zpConClose() {
	jq(".fullScreen").stop(false,true);
	jq(".zpConFullScreen").stop(false,true);
	jq("#indexDiv").show();
	jq(".conHeaderTop").hide();
	jq(".zpConFullScreen").animate({left: jq(window).width()},1000,'easeOutExpo',function(){jq(".zpConFullScreen").hide();zpShowed = false;});
}
jq(document).keyup(function(e) {
	if(jq(".zpConFullScreen").is(":hidden") || jq(".fullScreen").is(":visible")) return;
	switch(e.which) {
		case 27:
			zpConClose();
			jq("html,body").animate({scrollTop:jq("#Portfolios").offset().top},0);
			break;
		case 37:
			jq(".zpBtArrL").trigger("click");
			break;
		case 39:
			jq(".zpBtArrR").trigger("click");
			break;
	}
});
function zpConShow(url) {
	window.open(url);
	// jq(".zp_box").children().stop(false,true);
	// jq(".zp_box").children(".pop_tit").slideUp("fast");
	// jq(".fullScreen").stop(false,true);
	// jq(".zpConFullScreen").stop(false,true);
	// jq(".fullScreen").css("left",jq(window).width());
	// jq(".fullScreen").show();
	// jq(".fullScreen").animate({left: 0},1000,'easeOutExpo',function(){getZPCon(url);});
}

function getZPCon(url){
	window.location.href=url;
}


 
function getZPCon_bak(url){
	jq(".zpConFullScreen").css("left",0);
	jq("#indexDiv").hide();
	jq(".zpConFullScreen").html("");
	jq(window).scrollTop(0);
	$.ajax({url: url,
		success:function(data){
			var bodyStartStr = '<body style="padding-top:40px;">';
			var zpConHtml = data.substring(data.indexOf(bodyStartStr)+bodyStartStr.length,data.indexOf('</body>'));
			jq(".zpConFullScreen").html(zpConHtml);
			jq(".zpConFullScreen").show();
			if($.browser.msie &&  9 > $.browser.version) {
				jq("#toppicDiv img").load(function(){jq(".fullScreen").hide();});
				//jq(window).scrollTop(0);
			} else {
				jq("#toppicDiv img").load(function(){jq(".fullScreen").fadeOut(1000);});
				//jq(".fullScreen").fadeOut(1000);//, function(){jq(window).scrollTop(0);});
			}
			jq(".zpBtNew").hide();
			jq("#conHeader .fl a").hover(
			  function () {
				  jq(this).children().stop(false,true);
				  jq(this).children().fadeIn("normal");  
			  }, function () {
				  jq(this).children().stop(false,true);
				  jq(this).children().fadeOut("normal");
			});
			/*
			if($.cookie("view_keyup_tip_ed") != 'Y') {
				jq('<div style="width:200px; height:30px; overflow:hidden; clear:both; background:#333; position: fixed; z-index:190; top:50px;">操控体验<a href="#" name="rmlink">X</a></div>').css({left:jq("#conHeader").offset().left}).appendTo(jq(".zpConFullScreen"));
				//$.cookie('view_keyup_tip_ed', 'Y', {expires: 30});
			}
			*/
		}
	});
}
function zpConShow1(url) {
	jq(".zpConFullScreen").stop(false,true);
	jq(".fullScreen").stop(false,true);
	jq(".fullScreen").css("left",jq(window).width());
	//jq(".fullScreen").html("");
	jq(".fullScreen").show();
	jq(".fullScreen").animate({left: 0},500,'easeOutExpo',function(){getZPCon(url);});
}
function zpConShow2(url) {
	jq(".zpConFullScreen").stop(false,true);
	jq(".fullScreen").stop(false,true);
	jq(".fullScreen").css("left",-jq(window).width());
	//jq(".fullScreen").html("");
	jq(".fullScreen").show();
	jq(".fullScreen").animate({left: 0},500,'easeOutExpo',function(){getZPCon(url);});
}
/*
function zpConShow2(url) {
	jq(".zpConFullScreen").stop(false,true);
	jq(".fullScreen").stop(false,true);
	jq(".fullScreen").css("top",jq(window).scrollTop());
	jq(".fullScreen").css("width",jq(window).width());
	jq(".fullScreen").css("height",jq(window).height());
	jq(".fullScreen").css("left",-jq(window).width());
	jq(".fullScreen").html("");
	jq(".fullScreen").show();
	$.ajax({url: url,
		success:function(data){
			var bodyStartStr = '<body style="padding-top:40px;">';
			var zpConHtml = data.substring(data.indexOf(bodyStartStr)+bodyStartStr.length,data.indexOf('</body>'));
			jq(".fullScreen").html(zpConHtml);
			jq(".wrapTl").each(function(){
				var bgStyleCon = jq(this).attr('bgStyleCon');
				if(bgStyleCon) {
					 if(bgStyleCon.indexOf('#') == 0) {
						 jq(this).attr('style','background:'+bgStyleCon);
					 } else {
						 jq(this).attr('style','background:url('+bgStyleCon+') repeat center center');
					 }
				}
			});
		}
	});
	jq(".fullScreen").animate({left: 0},1000,'easeOutExpo',function(){
			jq(".zpConFullScreen").html(jq(".fullScreen").html());
			jq(".fullScreen").hide();
			jq(".wrapTl").each(function(){
				var bgStyleCon = jq(this).attr('bgStyleCon');
				if(bgStyleCon) {
					 if(bgStyleCon.indexOf('#') == 0) {
						 jq(this).attr('style','background:'+bgStyleCon);
					 } else {
						 jq(this).attr('style','background:url('+bgStyleCon+') repeat center center');
					 }
				}
			});
			jq(".zpBtNew").hide();
			jq("#conHeader .fl a").hover(
			  function () {
				  jq(this).children().stop(false,true);
				  jq(this).children().fadeIn("normal");  
			  }, function () {
				  jq(this).children().stop(false,true);
				  jq(this).children().fadeOut("normal");
			});
	});
}
*/

jq('.conHeaderTop a.zpBtArrL').live('click',function(){
		var url = jq(this).attr('href');
		if(!url) return;
		if(url=='javascript:void(0);') return;
		jq(this).attr('href','javascript:void(0);');
		zpConShow1(url);
});
jq('.conHeaderTop a.zpBtArrR').live('click',function(){
		var url = jq(this).attr('href');
		if(!url) return;
		if(url=='javascript:void(0);') return;
		jq(this).attr('href','javascript:void(0);');
		zpConShow2(url);
});
jq('.conHeaderTop a.zpBt1').live('click',function(){
	zpConClose();
});

function sendXQ(){
	if((document.bot_form.message.value)=="" || document.bot_form.message.value=="填写详细需求"){
        window.alert ('内容必须填写');
        document.bot_form.message.focus();
        return false;
    }
	var qqstr = document.bot_form.qq.value;
	if (qqstr=="" || qqstr=="您的QQ"){
        window.alert ('QQ号码必须填写');
        document.bot_form.qq.focus();
        return false;
    }

    if (document.bot_form.name.value=="" || document.bot_form.name.value=="填写姓名"){
        window.alert ('姓名必须填写');
        document.bot_form.name.focus();
        return false;} 
    var telstr = document.bot_form.tel.value;
    if (telstr=="" || telstr=="联系电话"){
        window.alert ('电话必须填写');
        document.bot_form.tel.focus();
        return false;
    }else{
        if(telstr.substring(0,2)=="13"||telstr.substring(0,2)=="14"||telstr.substring(0,2)=="15"||telstr.substring(0,2)=="18"){
            if(CheckTEL(telstr)==false){
               alert("电话格式错误，填写手机或固话，\n\n手机正确格式如：13800138000\n\n固话正确格式如：020-88888888");
                document.bot_form.tel.focus();
                return false;
            }}else{
            if(CheckTeltel(telstr)==false){
                alert("电话格式错误，填写固话或手机\n\n固话正确格式如：020-88888888\n\n手机正确格式如：13800138000");
                document.bot_form.tel.focus();
                return false;}}}

    var emailstr = document.bot_form.email.value;
    if (emailstr=="" || emailstr=="电子邮箱"){
        window.alert ('电子邮箱必须填写');
        document.bot_form.email.focus();
        return false;
    }else{
        if(Checkemail(emailstr)==false){
           alert("电子邮箱格式错误，电子邮箱正确格式如：562828385@qq.com");
            document.bot_form.tel.focus();
            return false;
        }

    document.bot_form.submit("http://#/index.php?s=Custo/do_message");	
}
//验证手机号码
function CheckTEL(tel){ 
  if (tel.search(/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/) != -1){ 
    return true; 
  }else{ 
    return false;
  }}
//验证电话号码
function CheckTeltel(teltel){ 
  if (teltel.search(/^(([0\+]\d{2,3}-)?(0\d{2,3})-)?(\d{7,8})(-(\d{3,}))?$/) != -1){ 
    return true;  
  }else{ 
    return false;
   }}
//验证邮箱格式
function Checkemail(emailstr){ 
  if (emailstr.search(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/) != -1){ 
    return true;  
  }else{ 
    return false;
   }}
}
//Showtit
/*
jq(".zp_box").hover (
function () {
	jq(this).children().stop(false,true);
	jq(this).children(".pop_tit").slideDown("fast");
	},
function () {
	jq(this).children().stop(false,true);
	jq(this).children(".pop_tit").slideUp("fast");
	}					
	)
	*/
jq(".zp_box").live('mouseenter',function(){
	jq(this).children().stop(false,true);
	jq(this).children(".pop_tit").slideDown("fast");
}).live('mouseleave',function(){
	jq(this).children().stop(false,true);
	jq(this).children(".pop_tit").slideUp("fast");
});

jq('.pages a').live('click',function(){
		var url = jq(this).attr('href');
		if(!url) return;
		if(url=='javascript:void(0);') return;
		jq(this).attr('href','javascript:void(0);');
		gotopage(url);
});

function gotopage(pageurl){
	jq("#"+curPortflioi).load(pageurl+"?"+Math.random());
}

jq(".aboutPicB li").hover (
function () {
	jq(this).children().stop(false,true);
	jq(this).children(".picFc").fadeTo("normal",0.8);
	},
function () {
	jq(this).children().stop(false,true);
	jq(this).children(".picFc").fadeTo("normal",0);
	}
);




//tab
function showPagej(idi,nn,i){
	for(var j=1;j<=nn;j++){
		if(j==idi) {
			jq("#box"+i+j).removeClass ();	
			jq("#box"+i+j).addClass ("tab1");
			jq("#page"+i+j).fadeIn(400);
			if(i==8) {
				curPortflioi = "page"+i+j;
			}
		} else {
			jq("#box"+i+j).removeClass ();	
			jq("#box"+i+j).addClass ("tab2");	
			//jq("#page"+i+j).fadeOut("fast");
			jq("#page"+i+j).hide();

		}
	}
	
}

