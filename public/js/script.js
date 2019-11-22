$(document).ready(function() {
    $("#btnSubmitLogin").click(function(event) {
     event.preventDefault();
     var captcha = $("#g-recaptcha-response").val();
     $("#loginContainer").hide();
     $("#loader").show();
     var usr = $('#username').val();
     console.log(usr);
     $.ajax({
            url:'http://127.0.0.1/Projeto/login/verify', //o arquivo para o qual deseja fazer a requisição
            type: "POST", //metodo de envio
            data: {
            username:$('#username').val(), //input de onde deseja pegar a informação
            password:$('#password').val(), //input de onde deseja pegar a informação
            'g-recaptcha-response':$('#g-recaptcha-response').val() //input de onde deseja pegar a informação
        },
        success: function(resposta) {
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
});

$(document).ready(function(){
    $("#btnSubmitCadastroSchedules").click(function(event){
        event.preventDefault();
        alert("oi");
        var dados = $("#formCadastroSchedules").serializeArray();
        console.log(dados);
        $.ajax({
            type: "POST",
            url: "http://127.0.0.1/Projeto/horarios/cadastrar",
            data: dados,
            success: function(resposta){
                if (resposta) {
                    alert("Cadastrado com sucesso");
                }
                else{
                    alert(resposta);
                }
            }
        });
    });
});