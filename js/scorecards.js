$( document ).on( "pageinit", "scorecards.html", function( event ) {
		alert("Init script running...");
		getScorecards();
	});
  	
	function getScorecards() {
		alert("Launching...");
		$.ajax({
			url: "http://cz-stuff.com/ccjquery/php/getcards.php",
			type: "GET",
			
			dataType:"json",
			
			success: function( json ) {
				console.log(json);
				if (json == "No cards found.") {
					var noCardsString = "<li class='ui-li-has-icon' data-icon='gear'><a href='javascript:createScoreCard()' class='ui-link-inherit'>No cards found. Create One?</a></li>"
					$('#scorekeeperlist').append(noCardsString);
					$('#scorekeeperlist').listview('refresh');
				}
			
			},
			error: function ( xhr, status) {
				console.log( xhr.HTML ) ;
			},
			complete: function ( xhr, status) {
			}
		})
  
	}
	