// $('#submitContactForm').submit(function(event){
//     jQuery('#form_register').parsley();
//     event.preventDefault();
// });

$(function () {
    $('#submitContactForm').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.sent-message').toggleClass('hidden', !ok);
      $('.error-message').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
        // event.preventDefault();
        var _token = $("input[name='_token']").val();
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var subject = $("input[name='subject']").val();
        var message = $("textarea#message").val();

        $.ajax({
            url: "/contact-form-submit",
            type:'POST',
            data: {_token:_token, name:name,email:email, subject:subject,message:message},
            beforeSend:function(){
                $('.loading').css('display','block');
                
            }, 
            success: function(data) {
                console.log(data.success);
            },
            complete: function() { 
                $('.loading').css('display','none');
                $('.sent-message').css('display','block');
                setTimeout(function(){ 
                    $('.sent-message').slideUp("slow").fadeOut(4000); 
                }, 4000);
                $('#submitContactForm')[0].reset();
                                
            }
        });
        return false;
        // Don't submit form for this demo
    });
  });

