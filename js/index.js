
var playercount = 0;
function showHint(str) {
	
	var string = str.toLowerCase();
	
	if (str.length==0) { 
  		$('#username').innerHTML="";
  		return;
  	}
	$.ajax({
			url: "http://cz-stuff.com/ccjquery/php/getplayers.php",
			data: {
				str: string
			},
			type: "GET",
			
			dataType:"json",
			
			success: function( json ) {
				if(playercount > 0) {
				$('#playerlist').empty();
				$('#playerlist').listview('refresh');
				}
				
				console.log(json);
				if (json == "no suggestion") return;
				var playerList = new Array;
				for (var i = 0; i < json.length; i++) {
					playerList[i] = json[i];
					var player = playerList[i];
					addPlayerToList(player);
					playercount++;
				}
				$('#playerlist').listview('refresh');
			},
			error: function ( xhr, status) {
			},
			complete: function ( xhr, status) {
			}
		});

function addPlayerToList(player) {
	$('#playerlist').append('<li class="ui-li-has-icon" data-icon="check"><a href="javascript:addPlayerToWeek(\'' + player['id'] + '\')" class="ui-link-inherit">' + player['name'] +  ' Player ID: #' + player['id'] + '</a></li>');
}



}

