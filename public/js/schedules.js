$(document).ready(function(){
  $("#btnSubmitCadastroSchedules").click(function(event){
    event.preventDefault();
    var dados = $("#formCadastroSchedules").serializeArray();
    console.log(dados);
    $.ajax({
      type: "POST",
      url: "http://127.0.0.1/Projeto/horarios/cadastrar",
      data: dados,
      success: function(resposta){
      console.log(resposta);
       if (resposta == 1) {
        alert("Cadastrado com sucesso");
        $("#formCadastroSchedules").each( function(){
          this.reset();
        });
      }
      else{
        alert("Algo deu errado");
      }

    }
  });
  });
});