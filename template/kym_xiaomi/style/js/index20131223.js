
jq(function(){

//分类切换
var navTimer;
var navindex;
jq(".firstscreen .navlist li").hover(function(){
	jq(".firstscreen .navlist li").removeClass("on");
	jq(".firstscreen .navbox").hide();
	clearTimeout(navTimer);
	jq(this).addClass("on");
	navindex=jq(".firstscreen .navlist li").index(this);
	var navli=jq(this).offset()
	var navTop=navli.top;
	var winBottom=jq(window).height()+jq(document).scrollTop()
	var contrastHeight=winBottom-navTop;
	var navHeight=jq(".firstscreen .navbox").eq(navindex).height();
	if(jq(window).height()-35>navHeight)
	{
		if(contrastHeight>navHeight)
		{		
			jq(".firstscreen .navcontent").stop(true).animate({"top":navTop-138+"px"},200);
		}
		else
		{
			jq(".firstscreen .navcontent").stop(true).animate({"top":winBottom-navHeight-145+"px"},200);					
		}
	}
	else
	{	
		jq(".firstscreen .navcontent").stop(true).animate({"top":navTop-138+"px"},200);					
	}
	jq(".firstscreen .navbox").eq(navindex).show();
	},function(){	
	navTimer=setTimeout(function(){
		jq(".firstscreen .navlist li").eq(navindex).removeClass("on");
		jq(".firstscreen .navbox").hide();
	},100);	
});
jq(".firstscreen .navbox").hover(function(){
	clearTimeout(navTimer);
	},function(){
	jq(this).hide();
	jq(".firstscreen .navlist li").eq(navindex).removeClass("on");
});

//讲师阵容	
jq('.lecturer_list li').hover(function(){
	jq('.lecturer_list li:first-child').find(".jsinfo").css({"right":"auto","left":"0px"});
	jq('.lecturer_list').eq(2).find(".jsinfo").css({"top":"auto","bottom":"0px"});
	jq(this).addClass('active');
	jq(this).find('.jsinfo').delay(250).fadeIn(200);
},function(){
	jq(this).removeClass('active');
	jq(this).find('.jsinfo').stop(true,true).hide(100);
});

//热门课程排行榜
jq('.column_list_t li').mouseover(function(){
  var index=jq(".column_list_t li").index(this); 
  jq(".column_list_t li").removeClass("on");
  jq(this).addClass("on");
  jq(".ph_list_c").hide();
  jq(".ph_list_c").eq(index).show();
});

jq('.ph_list_t li').mouseover(function(){
  var index=jq(this).parent(".ph_list_t").find("li").index(this); 
  jq(this).parent(".ph_list_t").find("li").removeClass("on");
  jq(this).addClass("on");
  jq(this).parents(".ph_list_c").find(".ph_list").hide();
  jq(this).parents(".ph_list_c").find(".ph_list").eq(index).show();
});




//课程换一换
var getwid = jQuery('#bypic .cklistbox').eq(0).width();
(function($){
    var arartta2= window['arartta2'] = function(o){
        return new das2(o);
    }
    das2 = function(o){
        this.obj = jq('#'+o.obj);
        this.bnt = jq('#'+o.bnt);
        this.showLi = this.obj.find('li');
        this.current = 0;
        this.picNum = o.picNum;
        this.myTimersc = '';
        this.init()
    }
    das2.prototype = {
        chgPic:function(n){
            var _this = this;
                _this.showLi.eq(n).find('img').attr('src',_this.showLi.eq(n).find('img').attr('psrc'));
                _this.showLi.find('.cklistwrap:not(:animated)').animate({left: -(n * getwid) + "px"}, {easing:"easeInOutExpo"}, 1500, function(){});
        },
		chgPic2:function(n){
            var _this = this;
				_this.showLi.find('.cklistwrap').css({left:'0'});
                _this.showLi.eq(n).find('img').attr('src',_this.showLi.eq(n).find('img').attr('psrc'));
                _this.showLi.find('.cklistwrap:not(:animated)').animate({left: -(n * getwid) + "px"}, {easing:"easeInOutExpo"}, 1500, function(){});
        },
        rotate:function(){
            var _this = this;
            _this.bnt.find('em').css({
                    '-webkit-transform':'rotate(0deg)',
                    '-moz-transform':'rotate(0deg)'
                });
                var tt = 0;
                var getBnts = _this.bnt.find('em');
                clearInterval(_this.myTimersc);
                _this.myTimersc = setInterval(function(){
                    tt += 10;
                    if (tt >= 180) {
                        clearInterval(_this.myTimersc);
                    }
                    rotateElement(getBnts,tt);
                },25)
        },
        init:function(){
            var _this = this;
			_this.showLi.find('.cklistwrap').each(function(){
				var liStr=jq(this).find('.cklistbox').eq(0).html();
				jq(this).append('<div class="cklistbox">'+liStr+'</div>');
			})
            this.bnt.bind("click",function(){
                _this.current++;
                if (_this.current > 3) {
                    _this.current = 1 ;
					_this.chgPic2(_this.current);
                }else{
                _this.chgPic(_this.current);
				}
                //按钮转动
                _this.rotate();
            })
            this.bnt.mouseenter(function () {
                _this.rotate();
            });
        }
    }
})(jQuery)

arartta2({
    bnt:'bybnt',
    picNum:6,
    obj:'bypic'
});
arartta2({
    bnt:'hjbnt',
    picNum:6,
    obj:'hjpic'
});
arartta2({
    bnt:'zsbnt',
    picNum:6,
    obj:'zspic'
});
		
});

function rotateElement(element,angle){
    var rotate = 'rotate('+angle+'deg)';
    if(element.css('MozTransform')!=undefined)
        element.css('MozTransform',rotate);
    else if(element.css('WebkitTransform')!=undefined)
        element.css('WebkitTransform',rotate);
}
