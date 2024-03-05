// Gestion de la modale de contact
document.addEventListener("DOMContentLoaded", function () { 
	const boutonContact = document.querySelector(".menu-item-20 a");
	const lamodale = document.querySelector(".modale");
	const boutonFermeture = document.querySelector(".button_modale");
	const conteneurModale = document.getElementById("modale");
	
	boutonContact.addEventListener("click", function() {
	    // Gestion de la fermeture de la modale - En cliquant à nouveau sur Contact
	    if (lamodale.style.display === "block") {
	        lamodale.style.display = "none";
	    }
	    else {
	        lamodale.style.display = "block";
	    }
	});
	
	// Fermeture de la modale lorsqu'on clic sur la croix
	boutonFermeture.addEventListener("click", function() {
	    lamodale.style.display = "none";
	});
	
	// Fermeture de la modale lorsqu'on clic hors de la modale - facultatif
	// window.addEventListener('click', (event) => {
	//     if (event.target === conteneurModale) {
	//         lamodale.style.display = "none";
	//     }
	//});
});