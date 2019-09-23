

$(document).ready(function(){


$('.toggle').click(function(){
$('header').toggleClass('active');
if($('header').hasClass('active')){
  $('.main-menu').fadeIn();
}
else{
  $('.main-menu').fadeOut();
}


});

    $('.slider').slick({
        dots: true,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        fade: true,
        cssEase: 'linear',
        arrows: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 480,
            settings: {
              infinite: true,
              dots: true
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });

      $('.counter').counterUp({
        delay: 10,
        time: 1500
    });

    if($('body').hasClass('index')){
      document.getElementById("default-tab").click();
    }



});

function openTab(evt, vuelo) {
  // Declare all variables
  var i, tabcontent, tab;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tab" and remove the class "active"
  tab = document.getElementsByClassName("tab");
  for (i = 0; i < tab.length; i++) {
    tab[i].className = tab[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(vuelo).style.animation= "fadeIn 1.5s";
  document.getElementById(vuelo).style.display = "block";
  
  evt.currentTarget.className += " active";
};


var coll = document.getElementsByClassName("collapse-head");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
};

// Code to open the modal
var modalBtns = document.querySelectorAll('.modal-open');

modalBtns.forEach(function(btn) {
  btn.onclick=function(){
    var modal = btn.getAttribute("data-modal");
    document.getElementById(modal).style.display='block';
    $('body').addClass('no-scroll');
  };
});

var closeModal=document.querySelectorAll('.close-butt');
closeModal.forEach(function(btn) {

  btn.onclick=function(){
    var modal=(btn.closest('.modal-bio').style.display="none");
    $('body').removeClass('no-scroll');
  };
});

window.onclick=function(e){
  if(e.target.className==='modal-bio'){
    e.target.style.display="none";
    $('body').removeClass('no-scroll');
  }
};

function showLogin(){
  $('.form-signup').hide();
  $('.login-form').fadeIn(1000);
};
function showSignUp(){
  $('.login-form').hide();
  $('.form-signup').fadeIn(1000);
};