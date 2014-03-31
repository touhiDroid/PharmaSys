jQuery(function($) {

	$("#btn_sign_in").click(function() {
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(); // function show popup
			}, 500); // .5 second
	return false;
	});

	$("#btn_sign_in_f").click(function() {
		disablePopup();  // function close pop up
	});

	$("a.topopup").click(function() {
			loading(); // loading
			setTimeout(function(){ // then show popup, deley in .5 second
				loadPopup(); // function show popup
			}, 500); // .5 second
	return false;
	});

	/* event for close the popup */
	$("div.close").hover(
					function() {
						$('span.ecs_tooltip').show();
					},
					function () {
    					$('span.ecs_tooltip').hide();
  					}
				);

	$("div.close").click(function() {
		disablePopup();  // function close pop up
	});

	$(this).keyup(function(event) {
		if (event.which == 27) { // 27 is 'ESC' in the keyboard
			disablePopup();  // function close pop up
		}
	});

        $("div#backgroundPopup").click(function() {
		disablePopup();  // function close pop up
	});

	$('a.livebox').click(function() {
		alert('Hello World!');
	return false;
	});

	 /************** start: functions. **************/
	function loading() {
		$("div.loader").show();
	}
	function closeloading() {
		$("div.loader").fadeOut('normal');
	}

	var popupStatus = 0; // set value

	function loadPopup() {
		if(popupStatus == 0) { // if value is 0, show popup
			closeloading(); // fadeout loading
			$("#toPopup").fadeIn(0500); // fadein popup div
			$("#backgroundPopup").css("opacity", "0.7"); // css opacity, supports IE7, IE8
			$("#backgroundPopup").fadeIn(0001);
			popupStatus = 1; // and set value to 1
		}
	}

	function disablePopup() {
		if(popupStatus == 1) { // if value is 1, close popup
			$("#toPopup").fadeOut("normal");
			$("#backgroundPopup").fadeOut("normal");
			popupStatus = 0;  // and set value to 0
		}
	}
	/************** end: functions. **************/
}); // jQuery End

$( document ).ready(function() {
	/*$( "#show_news" ).click(function() {
		var newsHead=$("#news_head").val();
		var newsBody=$("#news_body").val();
		var newsCat=$("#news_category :selected").text();
		var imgPath=$("news_image").src;
		$("#news_view").html("");
	});*/
	
	
	var fn = $('#form_signin');
	var ln = $('#loader'); // loder.gif image
	$( "#btn_sign_in_f" ).click(function() {
		//alert("clicked");
		fn.ajaxForm({
			beforeSend: function(){
				//alert("beforeSend");
				ln.show();
			},
			success: function(e){
				if(e=="Successfully signed in!"){
					window.location = 'http://localhost/_DatabaseProject/PharmaSys/views/manager_view.php';
				}
				else
					alert(""+e);
				//loadProfile();
				/*var nh=$('#news_head').val();
	    		var nb=$('#news_body').val();
	    		var nc=$('#news_category :selected').text();
				ln.hide();
				fn.resetForm();
				$("#news_view").html(
						"<div class='title'><span id='SP2'>"+e+" as below:</span></div>"
    					+"<div class='title'><span id='SP3'>"+nh+"</span></div>"
	    				+"<img class='img_centered' src='uploads/_Alhamdulillah_NewsUp.jpg' /></br></br>"
	    				+"<span class='title_line' >Category : "+nc+"</span>"
	    				+"<p class='news_body_show'>"+nb+"</p>"
					);*/
				//alert(e);
			},
			error: function(e){
				alert("Error in the signin.php. Check Touhid.");
			}
		});
	});

});

/*function loadProfile(){
	$("#div_shower").html(
		"

		"
		);
}*/