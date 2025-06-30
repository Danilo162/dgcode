function readURL(input, preview, ismodal) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var file = input.files[0];
        var fsize = file.size; // Taille du fichier en octets
        var ftype = file.type; // Type MIME du fichier

        // Vérification de la taille maximale de 240 Ko
        if (fsize > 240000) {
            $("#" + preview).val("");
            alert("Taille supérieure à 240 Ko");
            return false;
        }

        // Vérification du format JPEG
        if (ftype !== "image/jpeg") {
            $("#" + preview).val("");
            alert("Le fichier doit être au format JPEG");
            return false;
        }

        // Vérification des dimensions (600x600 pixels)
        reader.onload = function(e) {
            var img = new Image();
            img.src = e.target.result;

            img.onload = function() {
                var width = img.width;
                var height = img.height;

                if (width !== 600 || height !== 600) {
                    $("#" + preview).val("");
                    alert("Les dimensions de l'image doivent être de 600x600 pixels");
                    return false;
                } else {
                    // Affichage de l'image si toutes les conditions sont remplies
                    $('#' + preview).attr('src', e.target.result);
                    if($("#photo_base64").length > 0){
                        $("#photo_base64").val(e.target.result);
                    }
                }
            };
        };

        reader.readAsDataURL(file);
    }
}
