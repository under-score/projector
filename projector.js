var black="";
var loaded="";
var speed=300;
var isv3 = false;
var isv3admin = false;
var keycode = 0;
var bool32 = false;
var bool33 = false;

function worker() {
	$.ajax({
    	cache: false,
    	type: 'GET',
		url: 'http://localhost:80/status.php',
		data: {"field":""},
		dataType: 'jsonp',
		success: function(data) {

			// respond to keycodes
			if (data.keycode!=keycode) {
       			$.ajax({
             		cache: false,
             		url: 'http://localhost:80/status.php',
             		data: {"keycode":"0"}
           		});
			    video = document.getElementById('video');
				if (video) {
					switch (data.keycode) {
						case "32":
							bool32=!bool32;
							bool32 ? video.pause() : video.play(); 
                       		break;
                    	case "33":
							bool33=!bool33;
							video.muted = bool33; 
                       		break;

					 	default:
    						console.log('default');
					}					
				}
			}

 			// erster Durchgang nicht iframe
	   		if (data.black=="false" && black=="") {
	   			black=data.black;
		   		if ( $('#if').length ==0 ) {
    	    		$('#black').fadeOut(speed, function() {
        	    		return;
        			});
        		}
    		}
    			
    		// erster Durchgang mit iframe
    	   	if (data.black=="false" && loaded=="true") {
	   			black=data.black;
    	       	$('#black').fadeOut(speed, function() {
        	    	return;
        		});
    		}

			// jeder Durchgang schwarz aus
         	if (data.black=="false" && black=="true") {
            	$('#black').fadeOut(speed, function() {
            		black="false";
        		});	
         	}
         	
			// jeder Durchgang schwarz an        			   		
	     	if (data.black=="true" && black=="false") {
        		$('#black').fadeIn(speed, function() {
        			black="true";
        		});
         	}
         		
			// Seiten Umschalter
			if ( data.refresh=="true" ) {	
       			$.ajax({
             		cache: false,
             		url: 'http://localhost:80/status.php',
             		data: {"refresh":"false"}
           		});
				if (isv3) {
					window.location = 'http://localhost:80/'  + data.output + '.php';
				}
	        	$('#black').fadeIn(speed, function() {
		       		window.location = 'http://localhost:80/'  + data.output + '.php';
	        	});
			}
				
  	    }
	});	
}

$( document).ready(function() {

	// black div
	var style = document.createElement('style');
	style.type = 'text/css';
	style.innerHTML = '.black { position:absolute; top:0; left:0; margin:0; padding:0; background: none repeat scroll 0 0 black; width:100%; height:100%; z-index: 99; }';
	document.body.appendChild(style);
	
	var blackDiv = document.createElement('div');
	blackDiv.id = 'black';
	blackDiv.classList.add('black');

    document.body.appendChild(blackDiv);

	worker();
	setInterval(worker,500);
});