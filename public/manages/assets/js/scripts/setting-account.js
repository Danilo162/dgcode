$(document).ready(function () {
    let csrfToken = $('meta[name="csrf-token"]').attr('content');

    $(document).on('submit', 'form.form_load', function (e) {
        e.preventDefault();

        const form = e.target;
        var formData = new FormData(form);
        refreshErrors("form_load", 1)
        l_show_spinner();

        // Post data using the Fetch API
        fetch(form.action, {
            method: 'POST',
            body: formData
        })
            // We turn the response into text as we expect HTML
            .then((result) => result.text())
            // Let's turn it into an HTML document
            .then((response) => {
                l_hide_spinner();
                let responseParse = JSON.parse(response);
                let re_message = responseParse.message;
                let success = responseParse.success;
                let step = responseParse.step;


                if (success) {
                    toastS(re_message)
            if(step==1) {
                window.location.reload();
            }
                } else {
                    let errors = responseParse.errors

                    setErrors(errors)
                    toastE(re_message)
                }

                // displayDisbursements(1,$('#expense_id').val());
            })
            .catch(err => {
                l_hide_spinner();
                console.log(err);
            });
    });
        // Masque général par défaut
    $('#phone').mask('0000000000000000', {placeholder: "________________"});
        // Gérer les changements dans la liste des pays
        $('#pays').on('change', function () {
            const selectedOption = $(this).find(':selected'); // Option sélectionnée
            const countryCode = selectedOption.data('indice'); // Indice téléphonique (avec le +)
            if (countryCode) {
                // Supprimer le masque existant
                $('#phone').unmask();
                // Calcule la longueur de l'indice téléphonique (+1 pour le "+")
                const countryCodeLength = countryCode.length;
                // Crée dynamiquement le masque en fonction de la longueur de l'indice
                const maskPattern = `${countryCode} ${'0'.repeat(10)}`;
                // Appliquer le nouveau masque
                $('#phone').mask(maskPattern, {
                    placeholder: `${countryCode} ${'_' * 10}` // Placeholder adapté
                });
                // Préremplir le champ avec l'indice téléphonique
                $('#phone').val(`${countryCode} `);
            } else {
                // Réinitialiser le champ si aucun pays n'est sélectionné
                $('#phone').unmask();
                $('#phone').mask('0000000000000000', {placeholder: "________________"});
                $('#phone').val('');
            }
        });

        if( $( '#categorie').length>0 ) {
            $('#categorie').select2({
                theme: 'bootstrap-5',
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Selectionner  ...'
                },
            }).on('change', function () {
                // Vider le champ des compétences lorsque la catégorie change
                $('#competences').val(null).trigger('change');
            });
        }
        if( $( '#pays').length>0 ) {
            $('#pays').select2({
                theme: 'bootstrap-5',
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Selectionner  ...'
                },
            })
        }

    if ($('#competences').length > 0) {
        let ref = $('#ref').val(); // Assurez-vous d'avoir un champ caché ou une variable contenant l'ID du client

        // Charger les compétences existantes
        $.ajax({
            url: $("#id_cmpt_sea_save").val(), // L'URL de l'endpoint backend
            type: 'GET',
            data: { ref: ref },
            success: function (savedCompetences) {
                // Ajouter les options à Select2
                savedCompetences.forEach(function (competence) {
                    let option = new Option(competence.text, competence.id, true, true);
                    $('#competences').append(option);
                });

                // Initialiser Select2
                $("#competences").select2({
                    ajax: {
                        url: $("#id_cmpt_sea").val(),
                        dataType: 'json',
                        delay: 250,
                        data: function (params) {
                            return {
                                q: params.term, // terme recherché
                                page: params.page,
                                categorie: $("#categorie").val(),
                                _token: $('meta[name="csrf-token"]').attr('content'),
                            };
                        },
                        processResults: function (data, params) {
                            params.page = params.page || 1;
                            return {
                                results: data.items,
                                pagination: {
                                    more: (params.page * 10) < data.total_count,
                                },
                            };
                        },
                        cache: false,
                    },
                    allowClear: true,
                    theme: 'classic',
                    placeholder: {
                        id: '-1', // valeur de l'option
                        text: "Sélectionner une compétence...",
                    },
                    language: "fr",
                    cache: false,
                    width: '100%',
                });
            },
            error: function () {
                console.error("Impossible de charger les compétences enregistrées.");
            },
        });
    }

        const avatarPreview = document.getElementById("avatarPreview");
        const fileInput = document.getElementById("fileInput");
        const uploadButton = document.getElementById("uploadButton");
        const saveButton = document.getElementById("saveButton");
        const routePicture = document.getElementById("r_picture")?.value;
      //  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");
        let cropper;

        if (!avatarPreview || !fileInput || !uploadButton || !saveButton || !routePicture) {
            console.error("Un ou plusieurs éléments requis sont manquants dans le DOM.");
            return;
        }

        // Ouvrir la boîte de dialogue de téléchargement
        uploadButton.addEventListener("click", () => {
            console.log("Bouton 'Nouvelle photo' cliqué");
            fileInput.click();
        });

        // Prévisualisation de l'image téléchargée
        fileInput.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                if (!file.type.startsWith("image/")) {
                    alert("Veuillez sélectionner un fichier image valide.");
                    return;
                }

                const reader = new FileReader();
                reader.onload = () => {
                    avatarPreview.src = reader.result;

                    if (cropper) {
                        cropper.destroy();
                    }

                    cropper = new Cropper(avatarPreview, {
                        aspectRatio: 1,
                        viewMode: 2,
                        dragMode: "move",
                        scalable: true,
                        zoomable: true,
                        movable: true,
                        cropBoxResizable: false,
                        cropBoxMovable: true,
                        responsive: true,
                        preview: ".avatar-container",
                    });

                    saveButton.classList.remove("d-none");
                };

                reader.readAsDataURL(file);
            }
        });
        const disableButtons = (disable = true) => {
            document.querySelectorAll("button").forEach((btn) => {
                if (btn.id !== "uploadButton") { // Exclut "Nouvelle photo"
                    btn.disabled = disable;
                }
            });
        };

        saveButton.addEventListener("click", async () => {
            try {
                if (!cropper) {
                    alert("Recadrez l'image avant de l'enregistrer.");
                    return;
                }

                const canvas = cropper.getCroppedCanvas({
                    width: 300,
                    height: 300,
                });

                if (!canvas) {
                    alert("Impossible de générer l'image recadrée. Réessayez.");
                    return;
                }

                const blob = await new Promise((resolve) => canvas.toBlob(resolve, "image/jpeg"));
                const formData = new FormData();
                formData.append("picture", blob);

                if (!csrfToken) {
                    alert("Jeton CSRF manquant. Vérifiez la configuration.");
                    return;
                }

                saveButton.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Enregistrement...';
                disableButtons(true);

                const response = await fetch(routePicture, {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                    },
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    toastS(result.message);
                    avatarPreview.src = canvas.toDataURL("image/jpeg");
                    cropper.destroy();
                    cropper = null;
                    saveButton.classList.add("d-none");
                    window.location.reload();
                } else {
                    toastE(result.message || "Une erreur est survenue.");
                }
            } catch (error) {
                console.error("Erreur :", error);
                alert("Une erreur est survenue. Veuillez réessayer.");
            } finally {
                saveButton.innerHTML = "Enregistrer la photo";
                disableButtons(false);
            }
        });



    const passwordInput = document.getElementById("nouveau_mot_de_passe");
    const confirmPasswordInput = document.getElementById("confirmer_nouveau_mot_de_passe");
    const form = passwordInput.closest("form");

    // Vérification du format du mot de passe
    const validatePassword = (password) => {
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\W).{6,}$/;
        return regex.test(password);
    };

    // Affichage d'un message d'erreur
    const displayError = (input, message) => {
        const errorElement = input.nextElementSibling || document.createElement("small");
        errorElement.className = "text-danger";
        errorElement.textContent = message;
        input.after(errorElement);
    };

    // Suppression du message d'erreur
    const removeError = (input) => {
        const errorElement = input.nextElementSibling;
        if (errorElement && errorElement.classList.contains("text-danger")) {
            errorElement.remove();
        }
    };

    // Événement sur le champ de mot de passe
    passwordInput.addEventListener("input", function () {
        const password = passwordInput.value;

        if (!validatePassword(password)) {
            displayError(passwordInput, "Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 caractère spécial et au moins 6 caractères.");
        } else {
            removeError(passwordInput);
        }
    });

    // Vérification des mots de passe correspondants
    confirmPasswordInput.addEventListener("input", function () {
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            displayError(confirmPasswordInput, "Les mots de passe ne correspondent pas.");
        } else {
            removeError(confirmPasswordInput);
        }
    });
});

