(function($) {
  
  "use strict";  
            
    
  $(window).on("load", function() {
      
  $('.page-scroll').on('click', function() {  
  $('html, body').animate({scrollTop: $(this.hash).offset().top - 50}, 1000);
    return false;
    });      
  /*Page Loader active
    ========================================================*/
    $('#preloader').fadeOut('slow', function() {
      $(this).remove();        
    });
  });
      /* WOW Scroll Spy
    ========================================================*/
     var wow = new WOW({
      //disabled for mobile
        mobile: false
    });
    wow.init();

    /* Back Top Link active
    ========================================================*/
      var offset = 200;
      var duration = 500;
      $(window).scroll(function() {
        if ($(this).scrollTop() > offset) {
          $('.back-to-top').fadeIn(400);
        } else {
          $('.back-to-top').fadeOut(400);
        }
      });

      $('.back-to-top').on('click',function(event) {
        event.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 600);
        return false;
      });
}(jQuery));

var timelineSwiper = new Swiper ('.timeline .swiper-container', {
  direction: 'vertical',
  loop: false,
  speed: 1600,
  pagination: '.swiper-pagination',
  paginationBulletRender: function (swiper, index, className) {
    var year = document.querySelectorAll('.swiper-slide')[index].getAttribute('data-year');
    return '<span class="' + className + '">' + year + '</span>';
  },
  paginationClickable: true,
  nextButton: '.swiper-button-next',
  prevButton: '.swiper-button-prev',
  breakpoints: {
    768: {
      direction: 'horizontal',
    }
  }
});

$("#myform").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        error();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});

var lockModal = $("#lock-modal");
var form = $("#myform");

function submitForm() {
    
    $( "#submit" ).addClass( "onclic");
    lockModal.css("display", "block");
    form.children("input").each(function() {
      $(this).attr("readonly", true);
    });
    form.children("button").each(function() {
      $(this).attr("readonly", true);
    });     

    var name = $("input[name=name]").val();
    var email = $("input[name=email]").val();
    var job = $("input[name=job]").val();
    var company = $("input[name=company]").val();
    var phonenumber = $("input[name=phonenumber]").val();

    $.ajax({
    type: "POST",
    url: "php/mailer.php",
    data: "name=" + name + "&email=" + email + "&job=" + job + "&phonenumber=" + phonenumber + "&company=" + company,
    success : function(text){
        if (text == "success"){
            validate();
        } else {
            error();
            submitMSG(false,text);
        }
    }
});
}  
      
function validate() {
      submitMSG(true, "Form Submitted!")     
      lockModal.css("display", "none");
      form.children("input").each(function() {
          $(this).attr("readonly", false);
      });
      form.children("button").each(function() {
          $(this).attr("readonly", false);
      }); 
      $("#myform")[0].reset();
      $( "#submit" ).removeClass( "onclic" );
      $( "#submit" ).addClass( "validate");
      callback();
}     

function error() {
      lockModal.css("display", "none");
      form.children("input").each(function() {
          $(this).attr("readonly", false);
      });
      form.children("button").each(function() {
          $(this).attr("readonly", false);
      });       
      $( "#submit" ).removeClass( "onclic" );
      $( "#submit" ).addClass( "error").one(function () {$(this).removeClass("error")})
      $("#submit").addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
        $(this).removeClass('shake animated');
    });
    callback();
}

function callback() {
    setTimeout(function() {
        $( "#submit" ).removeClass("error");
      }, 2000 );       
} 

function submitMSG(valid, msg){
    if(valid){
        var msgClasses = "h4 pt-3 text-center tada animated text-success";
    } else {
        var msgClasses = "h4 pt-3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}