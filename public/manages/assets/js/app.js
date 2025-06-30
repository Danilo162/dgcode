$(function () {
	"use strict";
	/* perfect scrol bar */
	//new PerfectScrollbar('.header-message-list');
	//new PerfectScrollbar('.header-notifications-list');

  let  r_custom_thme = $("#r_custom_theme").val()
	// search bar
	$(".mobile-search-icon").on("click", function () {
		$(".search-bar").addClass("full-search-bar");
		$(".page-wrapper").addClass("search-overlay");
	});
	$(".search-close").on("click", function () {
		$(".search-bar").removeClass("full-search-bar");
		$(".page-wrapper").removeClass("search-overlay");
	});
	$(".mobile-toggle-menu").on("click", function () {
		$(".wrapper").addClass("toggled");
	});

    const sidebarState = getCookie("sidebarState");

    if (sidebarState === "toggled") {
        // Restaurer l'état "toggled" si le cookie l'indique
        $(".wrapper").addClass("toggled");
        $(".sidebar-wrapper").hover(function () {
            $(".wrapper").addClass("sidebar-hovered");
        }, function () {
            $(".wrapper").removeClass("sidebar-hovered");
        });
    } else {
        // Si le cookie indique "not-toggled" ou est absent, restaurer l'état "non toggled"
        $(".wrapper").removeClass("toggled");
    }

    // Appliquer les événements hover à chaque fois que la page est chargée
    $(".toggle-icon").click(function () {
        if ($(".wrapper").hasClass("toggled")) {
            // Supprime la classe "toggled"
            $(".wrapper").removeClass("toggled");
            $(".sidebar-wrapper").unbind("hover");

            // Enregistre l'état "non toggled" dans le cookie
            setCookie("sidebarState", "not-toggled", 7); // Cookie valide 7 jours
        } else {
            // Ajoute la classe "toggled"
            $(".wrapper").addClass("toggled");
            $(".sidebar-wrapper").hover(function () {
                $(".wrapper").addClass("sidebar-hovered");
            }, function () {
                $(".wrapper").removeClass("sidebar-hovered");
            });

            // Enregistre l'état "toggled" dans le cookie
            setCookie("sidebarState", "toggled", 7); // Cookie valide 7 jours
        }
    });
    if ($("html").hasClass("light-theme")) {
        // Récupérer le mode thème à partir du cookie
        const themeMode = getCookie("themeMode");

        if (themeMode === "light-theme") {
            // Si le cookie indique le mode clair, appliquez-le
            $(".dark-mode-icon i").attr("class", "bx bx-moon");
            $("html").attr("class", "light-theme");
        } else {
            // Si le cookie indique le mode sombre (ou aucun cookie), appliquez-le
            $(".dark-mode-icon i").attr("class", "bx bx-sun");
            $("html").attr("class", "dark-theme");
        }
        $(".dark-mode-icon").show();
    }else {
        // Afficher l'icône nav-link dark-mode-icon si le mode clair est activé

        $(".dark-mode-icon").hide();
    }
    // toggle menu button
/*	$(".toggle-icon").click(function () {
		if ($(".wrapper").hasClass("toggled")) {

			// unpin sidebar when hovered
			$(".wrapper").removeClass("toggled");
			$(".sidebar-wrapper").unbind("hover");
          //  sendSidebarState('not-toggled');
		} else {

			$(".wrapper").addClass("toggled");
			$(".sidebar-wrapper").hover(function () {
				$(".wrapper").addClass("sidebar-hovered");
			},
                function () {
				$(".wrapper").removeClass("sidebar-hovered");
			});
         //   sendSidebarState('toggled');
		}
	});*/

    // Fonction pour créer un cookie
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

// Fonction pour lire un cookie
    function getCookie(name) {
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

// Fonction pour effacer un cookie
    function eraseCookie(name) {
        document.cookie = name + '=; Max-Age=-99999999;';
    }


    /* $(".toggle-icon").click(function () {
         // Vérifie si la classe "toggled" est déjà présente
         if ($(".wrapper").hasClass("toggled")) {
             // Supprime la classe "toggled"
             $(".wrapper").removeClass("toggled");
             $(".sidebar-wrapper").unbind("hover");

             // Envoie l'état de la sidebar via fetch (non toggled)
             sendSidebarState('not-toggled');
         } else {
             // Ajoute la classe "toggled"
             $(".wrapper").addClass("toggled");

             // Applique le survol avec hover
             $(".sidebar-wrapper").hover(
                 function () {
                     $(".wrapper").addClass("sidebar-hovered");
                 },
                 function () {
                     $(".wrapper").removeClass("sidebar-hovered");
                 }
             );

             // Envoie l'état de la sidebar via fetch (toggled)
             sendSidebarState('toggled');
         }
     })*/;

    // dark mode
	/*$(".dark-mode").on("click", function() {
		if($(".dark-mode-icon i").attr("class") == 'bx bx-sun') {
			$(".dark-mode-icon i").attr("class", "bx bx-moon");
			$("html").attr("class", "light-theme")
		} else {
			$(".dark-mode-icon i").attr("class", "bx bx-sun");
			$("html").attr("class", "dark-theme")
		}

	}),*/
    // Fonction pour basculer entre les thèmes et sauvegarder dans un cookie
    $(".dark-mode-icon").click(function () {
        if ($(".dark-mode-icon i").attr("class") == 'bx bx-sun') {
            // Appliquer le thème clair
            $(".dark-mode-icon i").attr("class", "bx bx-moon");
            $("html").attr("class", "light-theme");

            // Enregistrer le thème dans un cookie
            setCookie("themeMode", "light-theme", 7); // Cookie valide 7 jours
        } else {
            // Appliquer le thème sombre
            $(".dark-mode-icon i").attr("class", "bx bx-sun");
            $("html").attr("class", "dark-theme");

            // Enregistrer le thème dans un cookie
            setCookie("themeMode", "dark-theme", 7); // Cookie valide 7 jours
        }
    });
	/* Back To Top */
	$(document).ready(function () {
		$(window).on("scroll", function () {
			if ($(this).scrollTop() > 300) {
				$('.back-to-top').fadeIn();
			} else {
				$('.back-to-top').fadeOut();
			}
		});
		$('.back-to-top').on("click", function () {
			$("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
		});
	});
	// === sidebar menu activation js
	$(function () {
		for (var i = window.location, o = $(".metismenu li a").filter(function () {
			return this.href == i;
		}).addClass("").parent().addClass("mm-active");;) {
			if (!o.is("li")) break;
			o = o.parent("").addClass("mm-show").parent("").addClass("mm-active");
		}
	});
	// metismenu
	$(function () {
		$('#menu').metisMenu();
	});
	// chat toggle
	$(".chat-toggle-btn").on("click", function () {
		$(".chat-wrapper").toggleClass("chat-toggled");
	});
	$(".chat-toggle-btn-mobile").on("click", function () {
		$(".chat-wrapper").removeClass("chat-toggled");
	});
	// email toggle
	$(".email-toggle-btn").on("click", function () {
		$(".email-wrapper").toggleClass("email-toggled");
	});
	$(".email-toggle-btn-mobile").on("click", function () {
		$(".email-wrapper").removeClass("email-toggled");
	});
	// compose mail
	$(".compose-mail-btn").on("click", function () {
		$(".compose-mail-popup").show();
	});
	$(".compose-mail-close").on("click", function () {
		$(".compose-mail-popup").hide();
	});
	/*switcher*/
	$(".switcher-btn").on("click", function () {
		$(".switcher-wrapper").toggleClass("switcher-toggled");
	});
	$(".close-switcher").on("click", function () {
		$(".switcher-wrapper").removeClass("switcher-toggled");
	});

/*	$("#lightmode").on("click", function () {
		$('html').attr('class', 'light-theme');
	});
	$("#darkmode").on("click", function () {
		$('html').attr('class', 'dark-theme');
	});
	$("#semidark").on("click", function () {
		$('html').attr('class', 'semi-dark');
	});
	$("#minimaltheme").on("click", function () {
		$('html').attr('class', 'minimal-theme');
	});*/

// Assignation des événements avec les classes correspondantes
    $("#lightmode").on("click", function () {
        changeTheme('light-theme', 'theme'); // Enregistre light-theme
    });
    $("#darkmode").on("click", function () {
        changeTheme('dark-theme', 'theme'); // Enregistre dark-theme
    });
    $("#semidark").on("click", function () {
        changeTheme('semi-dark', 'theme'); // Enregistre semi-dark
    });
    $("#minimaltheme").on("click", function () {
        changeTheme('minimal-theme', 'theme'); // Enregistre minimal-theme
    });
    // Fonction de changement de thème avec enregistrement via fetch
    function changeTheme(themeClass, type) {
        // Appliquer la classe sur l'élément HTML
        $('html').attr('class', themeClass);

        // Envoi de la classe au backend Laravel via fetch
        fetch(r_custom_thme, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Pour inclure le token CSRF
            },
            body: JSON.stringify({ colorClass: themeClass, type: type })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message); // Message de succès
                    location.reload(); // Recharger la page après le succès
                } else {
                    console.error(data.message); // Gérer les erreurs
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
    // Fonction pour envoyer l'état de la sidebar via fetch
    function sendSidebarState(state) {
        fetch(r_custom_thme, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Pour inclure le token CSRF
            },
            body: JSON.stringify({ colorClass: state, type: 'sidebar-state' }) // Envoie l'état toggled ou not-toggled
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                   // location.reload();
                  //  console.log(data.message); // Affiche le message de succès
                } else {
                    //console.error(data.message); // Gère les erreurs
                }
            })
            .catch(error => console.error('Erreur:', error));
    }
	/*$("#headercolor1").on("click", function () {
		$("html").addClass("color-header headercolor1");
		$("html").removeClass("headercolor2 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
	});

	$("#headercolor2").on("click", function () {
		$("html").addClass("color-header headercolor2");
		$("html").removeClass("headercolor1 headercolor3 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
	});
	$("#headercolor3").on("click", function () {
		$("html").addClass("color-header headercolor3");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor8");
	});
	$("#headercolor4").on("click", function () {
		$("html").addClass("color-header headercolor4");
		$("html").removeClass("headercolor1 headercolor2 headercolor3 headercolor5 headercolor6 headercolor7 headercolor8");
	});
	$("#headercolor5").on("click", function () {
		$("html").addClass("color-header headercolor5");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor3 headercolor6 headercolor7 headercolor8");
	});
	$("#headercolor6").on("click", function () {
		$("html").addClass("color-header headercolor6");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor3 headercolor7 headercolor8");
	});
	$("#headercolor7").on("click", function () {
		$("html").addClass("color-header headercolor7");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor3 headercolor8");
	});
	$("#headercolor8").on("click", function () {
		$("html").addClass("color-header headercolor8");
		$("html").removeClass("headercolor1 headercolor2 headercolor4 headercolor5 headercolor6 headercolor7 headercolor3");
	});*/

    $("[id^=headercolor]").on("click", function () {
        var selectedClass = $(this).attr("id");
        // Envoi de la classe au backend Laravel via fetch
        fetch(r_custom_thme, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Pour inclure le token CSRF
            },
            body: JSON.stringify({ colorClass: selectedClass,type:'header' })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message); // Message de succès
                    location.reload(); // Recharger la page après le succès
                } else {
                    console.error(data.message); // Gérer les erreurs
                }
            })
            .catch(error => console.error('Erreur:', error));

        $("html").removeClass(function (index, className) {
            return (className.match(/(^|\s)headercolor\d+/g) || []).join(' ');
        }).addClass("color-header " + selectedClass);
    });


   /*// sidebar colors


    $('#sidebarcolor1').click(theme1);
    $('#sidebarcolor2').click(theme2);
    $('#sidebarcolor3').click(theme3);
    $('#sidebarcolor4').click(theme4);
    $('#sidebarcolor5').click(theme5);
    $('#sidebarcolor6').click(theme6);
    $('#sidebarcolor7').click(theme7);
    $('#sidebarcolor8').click(theme8);

    function theme1() {
      $('html').attr('class', 'color-sidebar sidebarcolor1');
    }

    function theme2() {
      $('html').attr('class', 'color-sidebar sidebarcolor2');
    }

    function theme3() {
      $('html').attr('class', 'color-sidebar sidebarcolor3');
    }

    function theme4() {
      $('html').attr('class', 'color-sidebar sidebarcolor4');
    }

	function theme5() {
      $('html').attr('class', 'color-sidebar sidebarcolor5');
    }

	function theme6() {
      $('html').attr('class', 'color-sidebar sidebarcolor6');
    }

    function theme7() {
      $('html').attr('class', 'color-sidebar sidebarcolor7');
    }

    function theme8() {
      $('html').attr('class', 'color-sidebar sidebarcolor8');
    }

*/

 /*   $("[id^=sidebarcolor]").on("click", function () {
        var selectedClass = $(this).attr("id");
        $('html').attr('class', 'color-sidebar ' + selectedClass);
    });

*/

    $("[id^=sidebarcolor]").on("click", function () {
        var selectedClass = $(this).attr("id");
        $('html').attr('class', 'color-sidebar ' + selectedClass);

        // Envoi de la classe au backend Laravel via fetch
        fetch(r_custom_thme, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Pour inclure le token CSRF
            },
            body: JSON.stringify({ colorClass: selectedClass,type:'sidebar' })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message); // Message de succès
                    location.reload(); // Recharger la page après le succès
                } else {
                    console.error(data.message); // Gérer les erreurs
                }
            })
            .catch(error => console.error('Erreur:', error));
    });














});
