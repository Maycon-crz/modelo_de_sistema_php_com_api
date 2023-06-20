class LogOut{
	constructor(session){
		this.exit(session);
	}
	exit(session){		
		document.getElementById("buttonLogOut").addEventListener("click", function(ev){
			ev.preventDefault();
			var appKey = session.checkCookieSession("createsessioncookie");
			if(appKey != false){
				var urlSite = $("#urlSite").val();				
				var loadingGif = document.querySelector(".loadingGif");
				loadingGif.innerHTML = "<div class='spinner-border text-success' role='status'><span class='sr-only'></span></div>";
				$.ajax({
					url: urlSite+"/apiv1/login",
					type: "POST",
					data: {"logout": "exit", "app_key": appKey, "system": "web"},
					dataType: "json",
					success: function(retorno){
						loadingGif.innerHTML = "";
						if(retorno.status == "success" || retorno.data == "Erro de autenticação!"){
							document.location.reload(true);
						}
					}
				});
			}
		});		
	}
}
let startSession = new Session();
let startLogOut = new LogOut(startSession);