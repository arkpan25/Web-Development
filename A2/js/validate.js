


function validateUsername() {
	$("span").remove("#span-username");
	if($("#username").val().length < 1)
		//$("#username").after("<span id='span-username' class='info'>Please input username.</span>");
		;
	else if(!(/^[a-zA-Z0-9]+$/.test($("#username").val())))
		$("#username").after("<span id='span-username' class='info'>username should be only numbers or albhabetics.</span>");
	else
		$("#username").after("<span id='span-username' class='info'>OK</span>");
}

function validatePassword() {
	$("span").remove("#span-password");
	if($("#password").val().length < 1)
		//$("#username").after("<span id='span-username' class='info'>Please input username.</span>");
		;
	else if($("#password").val().length < 8)
		$("#password").after("<span id='span-password' class='info'>Password should be at least 8 characters.</span>");
	else
		$("#password").after("<span id='span-password' class='info'>OK</span>");
}

function validateEmail() {
	$("span").remove("#span-email");
	if($("#email").val().length < 1)
		//$("#username").after("<span id='span-username' class='info'>Please input username.</span>");
		;
	else if(!(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($("#email").val())))
		$("#email").after("<span id='span-email' class='info'>Please input valid email address!</span>");
	else
		$("#email").after("<span id='span-email' class='info'>OK</span>");
}


$(document).ready(function() {
	// your js code goes here...

	// validate username
	$("#username").blur(function(){
		$("span").remove("#span-username");
		if($("#username").val().length < 1)
			;
		else if(!(/^[a-zA-Z0-9]+$/.test($("#username").val()))) {
			$("#username").after("<span id='span-username' class='error'>Error</span>");
		}
		else {
			$("#username").after("<span id='span-username' class='ok'>OK</span>");
		}
	});
	$("#username").focus(function(){validateUsername();});
	$("#username").change(function(){validateUsername();});
	$("#username").keyup(function(){validateUsername();});

	


	// password validation
	$("#password").blur(function(){
		$("span").remove("#span-password");
        if($("#password").val().length < 1)
			// $("#password").after("<span id='span-password' class='info'>Please input password.</span>");
			;
		else if($("#password").val().length < 8)
			$("#password").after("<span id='span-password' class='error'>Error</span>");
		else
			$("#password").after("<span id='span-password' class='ok'>OK</span>");
	});
	$("#password").focus(function(){validatePassword();});
	$("#password").change(function(){validatePassword();});
	$("#password").keyup(function(){validatePassword();});



	// email validation
	$("#email").blur(function(){
		$("span").remove("#span-email");
		if($("#email").val().length < 1)
			;
		else if(!(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test($("#email").val())))
			$("#email").after("<span id='span-email' class='error'>Error</span>");
		else
			$("#email").after("<span id='span-email' class='ok'>OK</span>");
	});
	$("#email").focus(function(){validateEmail();});
	$("#email").change(function(){validateEmail();});
	$("#email").keyup(function(){validateEmail();});


});
