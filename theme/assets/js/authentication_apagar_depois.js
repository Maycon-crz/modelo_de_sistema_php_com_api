
class Authentication{
    constructor(){
        this.login();
        this.userRegistration();
		this.forgotMyPassword();
        this.confirmPasswordRecovery();
	}
    login(){        
		$("#userLoginForm").submit(function(event){				
			event.preventDefault();
			let userLoginForm = $("#userLoginForm").serialize();
			var action = $(this).attr("action");
			alert(action);
			var loadingGif = document.querySelector(".loadingGif");
			loadingGif.innerHTML = "<div class='spinner-border text-success' role='status'><span class='sr-only'></span></div>";
			$.ajax({
				url: action,
				type: 'POST',
				data: userLoginForm,
				dataType: 'json',
				success: function(retorno){
					loadingGif.innerHTML = "";
					if(retorno === "Senha certa pronto para logar!"){
					}else{ alert(retorno); }
				}
			});
		});
	}
    userRegistration(){
		// $("#formCadastroUsu").submit(function(ev){			
		// 	ev.preventDefault();
		// 	var formCadastroUsu = $("#formCadastroUsu");
		// 	formCadastroUsu = formCadastroUsu.serialize();
		// 	var loadingGif = document.querySelector(".loadingGif");
		// 	loadingGif.innerHTML = "<div class='spinner-border text-success' role='status'><span class='sr-only'>...</span></div>";
		// 	$.ajax({
		// 		url: 'source/Models/LoginCadastro.php',
		// 		type: 'post',
		// 		data: formCadastroUsu,
		// 		dataType: 'json',
		// 		success: function(retorno){
		// 			loadingGif.innerHTML = "";
		// 			if(retorno === "Cadastrado com sucesso!"){
		// 				alert(retorno);
		// 				window.location.href = "index.php";
		// 			}else{ alert(retorno); }		
		// 		}
		// 	});
		// });
	}
    forgotMyPassword(){
		// var esqueciMinhaSenha = document.getElementById("esqueciMinhaSenha");
		// if(esqueciMinhaSenha){
		// 	esqueciMinhaSenha.addEventListener("click", function(){			
		// 		var emailEsqueciMinhaSenha = document.querySelector('input[name="emaiLogin"]').value;			
		// 		if(emailEsqueciMinhaSenha != ""){
		// 			var loadingGif = document.querySelector(".loadingGif");
		// 			$.ajax({
		// 				url: 'source/Models/RecuperacaoDeSenha.php',
		// 				type: 'post',
		// 				data: {"emailEsqueciMinhaSenha": emailEsqueciMinhaSenha},
		// 				dataType: 'json',
		// 				success: function(retorno){
		// 					loadingGif.innerHTML = "";
		// 					alert(retorno);
		// 				}
		// 			});
		// 		}else{ alert("Digite seu E-mail no campo de login por favor"); }
		// 	});
		// }
	}
    confirmPasswordRecovery(){
		// var formRecuperacaoDeSenha = document.getElementById("formRecuperacaoDeSenha");		
		// if(formRecuperacaoDeSenha){
		// 	formRecuperacaoDeSenha.addEventListener("submit", function(ev){			
		// 		ev.preventDefault();
		// 		// var loadingGif = document.querySelector(".loadingGif");
		// 		var confirmarRecuperacaoDeSenha_Email = document.getElementById("recuperasenhaemail").value;
		// 		var confirmarRecuperacaoDeSenhaNova_Senha = document.getElementById("recuperanovasenha").value;
		// 		var confirmarRecuperacaoDeSenha_rash = document.getElementById("recuperanovasenharash").value;
		// 		$.ajax({
		// 			url: 'source/Models/RecuperacaoDeSenha.php',
		// 			type: 'post',
		// 			data: {
		// 				"confirmarRecuperacaoDeSenha_Email": confirmarRecuperacaoDeSenha_Email,
		// 				"confirmarRecuperacaoDeSenhaNova_Senha": confirmarRecuperacaoDeSenhaNova_Senha,
		// 				"confirmarRecuperacaoDeSenha_rash": confirmarRecuperacaoDeSenha_rash
		// 			},
		// 			dataType: 'json',
		// 			success: function(retorno){
		// 				alert(retorno);
		// 				if(retorno == "Senha recuperada com sucesso!"){
		// 					window.location.href = "index.php";
		// 				}						
		// 			}
		// 		});
		// 	});
		// }
	}
}

let startAuthentication = new Authentication();
