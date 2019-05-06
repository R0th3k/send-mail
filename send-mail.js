var URLdomain = 'dev.hektor.mx/send';
var nameForm = '#form';

jQuery(nameForm).on('submit', function (e) {  
    if (grecaptcha.getResponse() == '') {
        swal('', 'No eres un robot, pero debemos de estar seguros de eso, por favor palomea el recuadro de verificacion en el formulario.', 'error');
    } else {
        jQuery.ajax({
            url: 'https://'+URLdomain+'/send.php',
            data: jQuery(this).serialize(),
            type: 'POST',
            success: function (data) {
            nameForm.reset();
            window.location='https://'+URLdomain+'/gracias.html';
            },
            error: function (data) {
                swal('', 'Ops. El mensaje no fue enviado :(', 'error');
            }
        });
    }
    grecaptcha.reset();
    e.preventDefault();
}); 

  console.log('https://' + URLdomain + '/send.php');
