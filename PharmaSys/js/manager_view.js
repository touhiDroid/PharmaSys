
$( document ).ready(function() {
	var name="";
	$("#my_profile").click(function(){
		
		name = "Touhid";
	});
	$("#d_body").html("<span style='float: left;'>Name: "+name+"</span>");
});