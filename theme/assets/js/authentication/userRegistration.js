class UserRegistration{
    constructor(session){        
        if (session.checkCookieSession("createsessioncookie") === false){session.createSession();}
        this.startUserRegistration(session);
    }
    startUserRegistration(session){        
		$("#userRegistrationForm").submit(function(ev){
			ev.preventDefault();
			var appKey = session.checkCookieSession("createsessioncookie");
			if(appKey !== false){
				var action = $(this).attr("action");                
				var dataString = $("#userRegistrationForm").serialize()+"&app_key="+appKey+"&front_end=web";
				var loadingGif = document.querySelector(".loadingGif");
				loadingGif.innerHTML = "<div class='spinner-border text-success' role='status'><span class='sr-only'>...</span></div>";				
				$.ajax({
					url: action+"/api/user_registration",
					type: 'POST',
					data: dataString,
					dataType: 'json',
					success: function(response){
						loadingGif.innerHTML = "";
                        console.log(response);
						if(response.status === "success"){
							if (typeof response.data.msg === 'undefined' || response.data.msg === null){
								alert(response.data);
							}else{ alert(response.data.msg); }
							window.location.href = action+"/user";
						}else{
							const triangle = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svgIcons"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480H40c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24V296c0 13.3 10.7 24 24 24s24-10.7 24-24V184c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>';
							$("#smgErrorRegistrationUser").html(triangle+(response.data == "Erro de autenticação" ? response.data+" tente novamente" : response.data));
							if(response.data == "Erro de autenticação"){ session.createSession(); }
						}
					}
				});
			}else{ alert("Erro de autenticação!") }
		});
	}
}
let startUserRegistration = new UserRegistration(new Session());