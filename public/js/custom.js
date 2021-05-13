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
            method:'POST',
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
    });
});

$(function () {

    $('#commentPost').parsley().on('field:validated', function() {
      var ok = $('.parsley-error').length === 0;
      $('.sent-message').toggleClass('hidden', !ok);
      $('.error-message').toggleClass('hidden', ok);
    })
    .on('form:submit', function() {
        var _token = $("input[name='_token']").val();
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var comment = $("textarea#comment").val();
        var post_id = $("input[name='post_id']").val();

        $.ajax({
            url: "/comment-submit",
            method:'POST',
            data: {_token:_token, name:name,email:email, post_id:post_id,comment:comment},
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
                $('#commentPost')[0].reset();                
            }
        });
        return false;
    });
});
