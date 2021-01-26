require('./bootstrap');

$('.valor').mask('#.##0,00', {reverse: true});

$(document).ready(function(){

    function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('.input-img').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $(".input-file").change(function() {
        readURL(this);
    });
});


