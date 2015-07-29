jq(function() {
	jq("#kym_hovernav").hover(
	  function () {
		 jq(this).addClass("on");
		jq(".searchBt").addClass("searchOn");
	  },
	  function () {
		 jq(this).removeClass("on");
		jq(".searchBt").removeClass("searchOn");
	  }
	);
});

