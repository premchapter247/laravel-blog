$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});

// $(function () {
 
//   $('#services').submit(function(event) {
//       event.preventDefault();
//       // var _token = $("input[name='_token']").val();
//       // var serviceTitle = $("#serviceTitle").val();
//       // var content = $("#editor").val();
//       var formData = new FormData('#services')[0];
//       // let formData = jQuery(this).serializeArray();
//       console.log(formData);return false;
//    //   var content = $("#editor").val();
//      // console.log(serviceTitle);
//      // console.log(content); return false;
//       $.ajax({
//           url: "/store-service",
//           type:'POST',
//           // processData: false,
//           data: {_token:_token, serviceTitle:serviceTitle,content:content},
//           beforeSend:function(){
//               $('.loading').css('display','block');  
//           }, 
//           success: function(data) {
//               console.log(data.success);
//           },
//           complete: function() { 
//               $('.loading').css('display','none');
//               $('.sent-message').css('display','block');
//               setTimeout(function(){ 
//                   $('.sent-message').slideUp("slow").fadeOut(4000); 
//               }, 4000);
//               $('#submitContactForm')[0].reset();                
//           }
//       });
//       return false;
//   });
// });

