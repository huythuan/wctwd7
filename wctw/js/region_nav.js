
jQuery(document).ready(function($){
	if($.browser.msie && $.browser.version=="6.0"){
		//do nothing
	}else{
	
		var pathArray = window.location.pathname.split( '/' );
		var secondLevelLocation = pathArray[1];
		// tilte of default nav (top nav and page nav)	
		 $('#top_navigation .tinynav-wrapper option[value="-null-"]').text("ABOUT US");
		if (secondLevelLocation == 'issues' || secondLevelLocation == 'about-us' || secondLevelLocation == 'contact' || secondLevelLocation == 'media_kits'){
	    	$('#top_navigation .tinynav-wrapper option[value="-null-"]').text(secondLevelLocation);
	        $('#page_navigation .tinynav-wrapper option[value="-null-"]').text("MENU");
	    }else{
				if(secondLevelLocation == ''){
					$('#page_navigation .tinynav-wrapper option[value="-null-"]').text("MENU");
				}else{
					$('#page_navigation .tinynav-wrapper option[value="-null-"]').text(secondLevelLocation);
				}
	    }
		//filter region nav					
		if (secondLevelLocation == 'wineries' || secondLevelLocation == 'regions' || secondLevelLocation == 'dining') {	
			var region = getUrlVars()["region"];				
			var $region_filters = $('#region_filters');
			$region_filters.append($('.view-filters').html());
			$('#filter_slider').append($('.active_region').text());		
			//alphabet filter			
			var alphabet_filter = $("<div id='alphabet_filter'>");
			var alphabet = "abcdefghijklmnopqrstuvwxyz".split("");
				for (var i=0; i<26; i++){
				if (typeof region == 'undefined'){
					if (pathArray[2] == alphabet[i]){
					alphabet_filter.append($("<a class ='active_alphabet' href='/" + secondLevelLocation +"/"+ alphabet[i] +"'> " +"|&nbsp" + alphabet[i] +"</a>"));					
				    }else{
					alphabet_filter.append($("<a href='/" + secondLevelLocation +"/"+ alphabet[i] +"'> "+"|&nbsp" + alphabet[i] +"</a>"));
			    	}
			      }
				else{
					if (pathArray[2] == alphabet[i]){
					alphabet_filter.append($("<a class ='active_alphabet' href='/" + secondLevelLocation +"/"+ alphabet[i] +"?region="+region  +"'> " +"|&nbsp" + alphabet[i] +"</a>"));					
				    }else{
					alphabet_filter.append($("<a href='/" + secondLevelLocation +"/"+ alphabet[i] +"?region="+region +"'> "+"|&nbsp" + alphabet[i] +"</a>"));
			    	}
				}
				}			
				alphabet_filter.append = $("</div>");
				alphabet_filter.insertAfter( "#region_list" )
				//$region_filters.prepend(alphabet_filter);	
			$('#filter_slider').append($('.active_alphabet').text());
			$('#edit-region-wrapper').remove();	
			$('.view-filters').remove();			
			//toggle the filter
			   
				var title = getUrlVars()["title"];
			    var region_for_maps = getUrlVars()["field_map_region_tid"];
				if ((typeof region != 'undefined') ||(typeof region_for_maps != 'undefined') || (typeof title != 'undefined') || (typeof pathArray[2] != 'undefined') ) {
				   $region_filters.hide();
					$("#filter_slider").children("span").addClass("hide");
					$("#filter_slider").children("span").removeClass("show");
						$region_filters.css("margin-bottom", "1em");
						$("#filter_slider").click(function(){
							$region_filters.slideToggle("slow");
						}).toggle(function(){
							$("#filter_slider").children("span").addClass("show");
							$("#filter_slider").children("span").removeClass("hide");
						}, function(){
							$("#filter_slider").children("span").addClass("hide");
							$("#filter_slider").children("span").removeClass("show");
						});
				}else{
				   $region_filters.show();
					$("#region_filters").css("margin-bottom", "1em");
					$("#filter_slider").click(function(){
						$region_filters.slideToggle("slow");
					}).toggle(function(){
						$("#filter_slider").children("span").addClass("hide");
						$("#filter_slider").children("span").removeClass("show");
					}, function(){
						$("#filter_slider").children("span").addClass("show");
						$("#filter_slider").children("span").removeClass("hide");
					});
		     	}
			
		}else if (secondLevelLocation == 'deals' || secondLevelLocation == 'maps') {
				var $region_filters = $('#region_filters');
				$region_filters.append($('.view-filters').html());
				$('#filter_slider').append($('.active_region').text());			
				$('#edit-region-wrapper').remove();	
				$('.view-filters').remove();			
				//toggle the filter
				    var region = getUrlVars()["region"];
					var title = getUrlVars()["title"];
				    var region_for_maps = getUrlVars()["field_map_region_tid"];
					if ((typeof region != 'undefined') ||(typeof region_for_maps != 'undefined') || (typeof title != 'undefined') ) {
					   $region_filters.hide();
						$("#filter_slider").children("span").addClass("hide");
						$("#filter_slider").children("span").removeClass("show");
							$region_filters.css("margin-bottom", "1em");
							$("#filter_slider").click(function(){
								$region_filters.slideToggle("slow");
							}).toggle(function(){
								$("#filter_slider").children("span").addClass("show");
								$("#filter_slider").children("span").removeClass("hide");
							}, function(){
								$("#filter_slider").children("span").addClass("hide");
								$("#filter_slider").children("span").removeClass("show");
							});
					}else{
					   $region_filters.show();
						$("#region_filters").css("margin-bottom", "1em");
						$("#filter_slider").click(function(){
							$region_filters.slideToggle("slow");
						}).toggle(function(){
							$("#filter_slider").children("span").addClass("hide");
							$("#filter_slider").children("span").removeClass("show");
						}, function(){
							$("#filter_slider").children("span").addClass("show");
							$("#filter_slider").children("span").removeClass("hide");
						});
			     	}
		}else if(secondLevelLocation == 'events'){
			return false;			
		}else{
			$('.view-header').append("<h2 class='filter_slider'><span class='show'></span>Filter by</h2>");	
			$(".view-filters").show();
			$("#filter_slider").click(function(){
				$(".view-filters").slideToggle("slow");
			}).toggle(function(){
				$("#filter_slider").children("span").addClass("hide");
				$("#filter_slider").children("span").removeClass("show");
			}, function(){
				$("#filter_slider").children("span").addClass("show");
				$("#filter_slider").children("span").removeClass("hide");
			});
		}	
      }
});

// Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
