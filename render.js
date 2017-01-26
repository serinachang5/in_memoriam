$(document).ready(function(){
	$("#container2").hide(0);
    buttonListen();
});

function buttonListen() {
    // add event handler for matching elements and click
    $("#button a").on("click", function() {
		$("#container2").show();
   		$('html, body').animate({
        	scrollTop: $("#container2").offset().top
    		}, 1000);
   		$("#container").fadeOut(1000).hide(0);
	});

}