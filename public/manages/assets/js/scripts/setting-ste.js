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
          /*  if(step==1) {
              //  window.location.reload();
            }*/
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


    const avatarPreview = document.getElementById("avatarPreview");
    const fileInput = document.getElementById("fileInput");
    const uploadButton = document.getElementById("uploadButton");
    const saveButton = document.getElementById("saveButton");
    const routePicture = document.getElementById("r_picture")?.value;
    let cropper;
    uploadButton.addEventListener("click", () => fileInput.click());
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

                if (cropper) cropper.destroy();

                cropper = new Cropper(avatarPreview, {
                    aspectRatio: 380 / 65,
                    viewMode: 2,
                    dragMode: "move",
                    scalable: true,
                    zoomable: true,
                    movable: true,
                    cropBoxResizable: true,
                    cropBoxMovable: true,
                });

                saveButton.classList.remove("d-none");
            };

            reader.readAsDataURL(file);
        }
    });

    saveButton.addEventListener("click", async () => {
        if (!cropper) {
            alert("Veuillez rogner l'image avant de l'enregistrer.");
            return;
        }

        // Générer un canvas avec les dimensions spécifiées
        const canvas = cropper.getCroppedCanvas({
            width: 380,
            height: 65,
        });

        if (!canvas) {
            alert("Erreur lors de la génération de l'image recadrée.");
            return;
        }

        // Convertir le canvas en base64
        const base64Image = canvas.toDataURL("image/png");

        try {
            saveButton.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Enregistrement...';
            const response = await fetch(routePicture, {
                method: "POST",
                body: JSON.stringify({ picture: base64Image }),
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')?.getAttribute("content"),
                },
            });

            const result = await response.json();
            if (response.ok && result.success) {
                alert(result.message);
                window.location.reload();
            } else {
                alert(result.message || "Une erreur est survenue.");
            }
        } catch (error) {
            console.error("Erreur :", error);
            alert("Impossible d'enregistrer le logo.");
        } finally {
            saveButton.innerHTML = "Enregistrer la photo";
        }
    });


/*    FAVICON*/

    const uploadFaviconButton = document.getElementById('uploadFaviconButton');
    const saveFaviconButton = document.getElementById('saveFaviconButton');
    const faviconFileInput = document.getElementById('faviconFileInput');
    const avatarPreviewFavicon = document.getElementById('avatarPreview_favicon');

    let faviconCropper = null; // Déclaration de la variable faviconCropper

    // Vérifier si l'élément existe avant d'ajouter l'événement
    if (uploadFaviconButton) {
        uploadFaviconButton.addEventListener('click', () => faviconFileInput.click());
    }

    faviconFileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageUrl = e.target.result;
                avatarPreviewFavicon.src = imageUrl;

                // Initialiser le rognage
                if (faviconCropper) {
                    faviconCropper.destroy();
                }
                faviconCropper = new Cropper(avatarPreviewFavicon, {
                    aspectRatio: 1,  // Aspect ratio de 1:1 pour un carré
                    viewMode: 1,  // Ne permet pas de sortir de la zone de rognage
                    responsive: true,
                    autoCropArea: 1,  // Utilise toute la zone disponible
                    minCropBoxWidth: 200,
                    minCropBoxHeight: 200,
                    zoomable: true,  // Activer le zoom sur l'image
                    scalable: true,  // Permet d'échelle l'image
                    movable: true,  // Permet de déplacer l'image à l'intérieur du cadre de rognage
                });

                // Montrer le bouton d'enregistrement après le rognage
                saveFaviconButton.classList.remove('d-none');
            };
            reader.readAsDataURL(file);
        }
    });

    saveFaviconButton.addEventListener('click', () => {
        if (!faviconCropper) {
            alert("Veuillez choisir une image à rogner.");
            return;
        }

        const canvas = faviconCropper.getCroppedCanvas({
            width: 200,
            height: 200
        });
        const base64Image = canvas.toDataURL("image/png");
        canvas.toBlob((blob) => {
            const formData = new FormData();
            formData.append('picture', base64Image);

            fetch(document.getElementById('faviconRoute').value, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();  // Recharge la page après l'enregistrement
                    } else {
                        alert(data.message || "Une erreur est survenue.");
                    }
                })
                .catch(error => {
                    console.error("Erreur lors de l'enregistrement de l'image:", error);
                    alert("Impossible d'enregistrer l'image.");
                });
        });
    });
});

