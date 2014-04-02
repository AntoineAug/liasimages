function clickIE4() {
	if (event.button == 2) {
		return false;
	}
}

function clickNS4(e) {
	if (document.layers || document.getElementById && !document.all) {
		if (e.which == 2 || e.which == 3) {
			return false;
		}
	}
}

if (document.layers) {
	document.captureEvents(Event.MOUSEDOWN);
	document.onmousedown = clickNS4;
} else if (document.all && !document.getElementById) {
	document.onmousedown = clickIE4;
}

document.oncontextmenu = new Function("return false");

$(function() {

   $("#gallery").mousewheel(function(event, delta) {

	  this.scrollLeft -= (delta * 150);

	  event.preventDefault();

   });

});

var contact_empty_form = "Le formulaire n'est pas correctement rempli.";
var contact_wrong_captcha = "Le code de sécurité est mauvais.";
var contact_mail_sent = "L'email a bien été envoyé !";

$(document).ready(function()
{
	$("#gallery, #single_image").fadeIn(1200);

	function tailleGallerie() {
		var hauteurEcran = $(window).height() - 150;
		$("#contactForm,#legal").css("display", "none");
		$("#legal").fadeIn(1500);
		$("#contactForm").fadeIn(2500);
		$("#gallery, #gallery ul li, #single_image").css({ 'height': hauteurEcran + "px" });
		$("#gallery ul li img").attr('height', hauteurEcran);
	}

	tailleGallerie();
	
	$(window).resize(function(){
		tailleGallerie();
	});


	$("#contactForm").submit(function(event)
	{
		event.preventDefault();

		$('#notification').html('');
		$('#notification').html('<div class="alert">Chargement...</div>').slideDown();

		// Get variables
		var sujet = $("#inputSujet").val();
		var nom = $("#inputNom").val();
		var email = $("#inputEmail").val();
		var message = $("#textareaMessage").val();
		var copie = $("#checkboxCopie").val();

		$.post("/ajax/sendmail.php", {
			sujet: sujet,
			nom: nom,
			email: email,
			message: message,
			copie: copie
		},

		function(data)
		{
			// Empty form
			if(data == 1)
			{
				div_response = '<div class="alert">' + contact_empty_form + '</div>';
			}
			// Wrong captcha
			else if(data == 2)
			{
				div_response = '<div class="alert">' + contact_wrong_captcha + '</div>';

				// Focus the wrong input
				$("#inputCaptcha").val('').focus();
			}
			// Mail sent
			else if(data == 3)
			{
				div_response = '<div class="alert alert-success">' + contact_mail_sent + '</div>';

				$("#contactForm").fadeOut(4000);
			}
			// Unknow error
			else if(data == 4)
			{
				div_response = '<div class="alert">Error</div>';
			}

			$('#notification').html(div_response).delay(3000).slideUp();
		});

		return false;
	});
});
