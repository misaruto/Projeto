window.onload = function() {
	var alert = document.getElementById("alert");
	var recaptcha = document.forms["loginForm"]["g-recaptcha-response"];
	recaptcha.required = true;
	recaptcha.oninvalid = function(e) {
    // fazer algo, no caso to dando um alert
    alert.textContent = "Select the captcha first";
}
}

$( "#loginForm" ).submit(function(event) {
	event.preventDefault();
	var captcha = $("#g-recaptcha-response").val();
	$("#loginContainer").hide();
	$("#loader").show();

	$.ajax({
            url: '?page=verifyLogin&action=verify', //o arquivo para o qual deseja fazer a requisição
            type: "POST", //metodo de envio
            data: {
            username:$('#username').val(), //input de onde deseja pegar a informação
            password:$('#password').val(), //input de onde deseja pegar a informação
            'g-recaptcha-response':$('#g-recaptcha-response').val() //input de onde deseja pegar a informação
        },
        success: function(resposta) {
        	console.log(resposta);
        	if (resposta == 1) {
        		window.location.assign('?page=home');
        	}
        	else{
        		$("#loginContainer").show();
        		$("#loader").hide();
        	}
        }
    });
});	

