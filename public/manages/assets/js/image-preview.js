function imagePreviewOl (input,preview) {
    // $('#'+input).change(function(){
let e = $('#'+input);
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#'+preview).attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);

    // });

}
function imagePreview (input,preview,ismodal=null) {


    const input_ = document.getElementById(input);
        readURL(input_,preview,ismodal=null);

}

function readURL(input,preview,ismodal) {
   // console.log(input)

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var fsize = input.files[0].size; //get file size
        //Allowed file size is less than 10  MB (1048576)
//console.log(input.files[0])

        if (fsize > 10048576) {
            $("#"+preview).val("");
            alert("Taille superieure à 10 MO")
          //  $(".errorimage").html("<blank><b class='text-red fsize-0'>Image trop grande ( taille maximun inferieure ou égale à 1 MO)</b></blank>");
            // $('#blah').attr('src', $("#homUrl").val()+"/public/info/error.png");
            return false

        }else {
          //  console.log(input,preview,input.files)
           // console.log(preview)
            reader.onload = function(e) {
              // console.log(e.target.result)
                $('#'+preview).attr('src', e.target.result);
               // console.log(preview)
                $("#photo_base64").val("")
                if($("#photo_base64").length>0){
                    $("#photo_base64").val(e.target.result)
                }
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
}
function launcherFileInput(input) {

    $("#"+input).click();
}