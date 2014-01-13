jQuery(document).ready(function($){
	var $calendar_toggle = $("#calendar_toggle");
		if($.browser.msie && $.browser.version=="7.0"){
			$calendar_toggle.show();
			$("#slider").click(function(){
				$calendar_toggle.slideToggle("slow"); 
			}).toggle(function(){
				$(this).children("h2").addClass("hide");
				$(this).children("h2").removeClass("show");
			}, function(){
				$(this).children("h2").addClass("show");
				$(this).children("h2").removeClass("hide");
			});
		}else{
					
					$calendar_toggle.hide();					
					$("#slider").click(function(){
						$calendar_toggle.slideToggle("slow"); 
					}).toggle(function(){
						$(this).children("h2").addClass("show");
						$(this).children("h2").removeClass("hide");
					}, function(){
						$(this).children("h2").addClass("hide");
						$(this).children("h2").removeClass("show");
					});
					var $filter_toggle = $("#filter_toggle");
					$filter_toggle.hide();
					$("#filter_slider").click(function(){
						$filter_toggle.slideToggle("slow");
					}).toggle(function(){
						$filter_toggle.children("h2").children("span").addClass("show");
						$filter_toggle.children("h2").children("span").removeClass("hide");
					}, function(){
						$filter_toggle.children("h2").children("span").addClass("hide");
						$filter_toggle.children("h2").children("span").removeClass("show");
					});
			}
});