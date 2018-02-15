$(document).ready(function() {
	$("#search").click(function(){
		callAjax();
	});
});


function callAjax(){
	$.ajax({
		url: "babynames.php",
		type: "post",
		data: {"year":$("#year").val(),"gender":$("#gender").val()},
		success: function(data){
			$("#result").html(data);
		},
		error: function(){
			alert("error");
		}
	});
}


