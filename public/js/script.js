$( "#loginForm" ).submit(function(event) {
	event.preventDefault();
	var captcha = $("#g-recaptcha-response").val();
	$("#loginContainer").hide();
	$("#loader").show();
    var usr = $('#username').val();
	$.ajax({
            url:'login/verify', //o arquivo para o qual deseja fazer a requisição
            type: "GET", //metodo de envio
            data: {
            username:$('#username').val(), //input de onde deseja pegar a informação
            password:$('#password').val(), //input de onde deseja pegar a informação
            'g-recaptcha-response':$('#g-recaptcha-response').val() //input de onde deseja pegar a informação
        },
        success: function(resposta) {
        	console.log(resposta);
        	if (resposta) {
        		window.location.assign('home');
        	}
        	else{
                grecaptcha.reset();
                $('#loginForm').trigger("reset");
        		$("#loginContainer").show();
        		$("#loader").hide();
                $('#username').val(usr);
                $("#alert").show();
                $("#alert").text("Usuarios ou senha incorretos");
        	}
        }
    });
});	

