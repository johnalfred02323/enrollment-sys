$(document).ready(function() {
    $('#form').validate({
        rules: {
            name: "required",
            subject: "required",            
            email: {
                required: true,
                email: true
            }
        },
        errorElement: "span" ,                            
        messages: {
            name: "Please Enter your Full Name",
            email: "Please Enter valid Email Address",
            subject: "Please Enter your Subject",
        },
        submitHandler: function(form) {
            var dataparam = $('#form').serialize();

            $.ajax({
                type: 'POST',
                async: true,
                url: 'http://localhost/grcfinals/asset/email/send.php',
                data: dataparam,
                datatype: 'json',
                cache: true,
                global: false,
                beforeSend: function() { 
                    $('#loader').show();
                },
                success: function(data) {
                    if(data == 'success'){
                        // console.log(data);
                        // alertify.success('Thank you for Contacting Us.');
                    } else {
                        $('.no-config').show();
                        // console.log(data);
                        $('#contactusmodal').modal('hide');
                        alertify.success('Thank you for Contacting Us.');
                    }

                },
                complete: function() { 
                    $('#loader').hide();
                }
            });
        }                
    });
});