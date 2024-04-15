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

//Clic sur le bouton contact dans les articles "Photographies" et la modale s'affiche
// Lorsqu'on click sur le bouton "Contact" sur la page d'une photo, on ouvre la modale et on remplit automatiquement de la référence en fonction de la photo
document.addEventListener("DOMContentLoaded", function () {

    // Si on se trouve sur la page single-photo.php seulement
    let urlActuelle = window.location.href;

    if (urlActuelle.match(/photographies/)) {
        const nav = document.querySelector("nav");
        const boutonContactPhoto = document.querySelector(".ContactezNous");
        const modaleBis = document.querySelector(".modale");
        const refARemplir = document.querySelector(".refPhotoForm input");
        const refADupliquer = document.getElementById("ref");

        boutonContactPhoto.addEventListener("click", function () {
            nav.classList.add("active");
            refARemplir.value = refADupliquer.textContent;
            modaleBis.style.display = "block";
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    }
});

// Overlay

// Flèches de navigation sur single-photo.php
document.addEventListener("DOMContentLoaded", function () {

	// Si on se trouve sur la page single-photo.php seulement
		let urlActuelle = window.location.href;
		if (urlActuelle.match(/photographies/)) {
		const flechePrecedente = document.querySelector('.flecheG');
		const flecheSuivante = document.querySelector('.flecheD');
		const zoneVignetteGauche = document.querySelector('.conteneur-vignette-precedent');
		const zoneVignetteDroite = document.querySelector('.conteneur-vignette-suivant');
	
		flechePrecedente.addEventListener('mouseenter', function() {
			zoneVignetteGauche.style.display = "flex";
		});
	
		flechePrecedente.addEventListener('mouseleave', function() {
			zoneVignetteGauche.style.display = "none";
		});
	
		flecheSuivante.addEventListener('mouseenter', function() {
			zoneVignetteDroite.style.display = "flex";
		});
	
		flecheSuivante.addEventListener('mouseleave', function() {
			zoneVignetteDroite.style.display = "none";
		});
	}
	
	overlay();
	});
	
	/////////////////////////////////////////////////////////////////////////
	
	// Overlay des photos de photo-bloc.php
	
	function overlay() {
		// Apparition de l'overlay au survol
		const autresPhotos = document.querySelectorAll('.autres-photos');
	
		autresPhotos.forEach(element => {
			const overlay = element.querySelector('.survol-photo');
			const oeil = element.querySelector('.oeil');
			const divLienPhoto = element.querySelector('.lien-photo');
			const lienPhoto = divLienPhoto.innerHTML;
	
			// Début du survol
			element.addEventListener('mouseenter', function() {
				overlay.style.display = 'block';
			});
			// Fin du survol
			element.addEventListener('mouseleave', function() {
				overlay.style.display = 'none';
			});
	
			//////////////////////////
	
			// Clic sur l'oeil pour redirection de page
			oeil.addEventListener('click', function() {
				// Redirection vers la page de la photo
				window.location.href = lienPhoto;
			});
		});
	
		lightbox();
	}
	// Burger Menu
	document.addEventListener("DOMContentLoaded", function () {
		const menuBurger = document.querySelector(".burger-open");
		const nav = document.querySelector("nav");
	
		function changeImageSrc(element, imageName) {
			let currentSrc = element.getAttribute("src");
			let srcArray = currentSrc.split("/");
			srcArray[srcArray.length - 1] = imageName;
			let newSrc = srcArray.join("/");
			element.setAttribute("src", newSrc);
		}
	
		menuBurger.addEventListener("click", function () {
				if (nav.style.display === "flex") {
					nav.style.display = "none";
					changeImageSrc(menuBurger, "burger-open.png");
	
				} else {
					nav.style.display = "flex";
					changeImageSrc(menuBurger, "burger-close.png");
				}
			});
	});