$(function () {
  $('.search-filters-filters_panel_component__filterHeader').on('click', function() {
    var index = $('.search-filters-filters_panel_component__filterHeader').index(this)
    $($('.search-filters-filters_panel_component__filterBody')[index]).toggleClass('d-none')
    if ($($('.search-filters-filters_panel_component__filterBody')[index]).hasClass('d-none')) {
        $(this).children('.search-filters-filters_panel_component__chevron').css('transform', 'rotate(-90deg)')
    } else {
        $(this).children('.search-filters-filters_panel_component__chevron').css('transform', 'rotate(90deg)')
    }
  })

  $('[data-bs-toggle="popover"]').popover({
      placement: 'top',
      container: '.container',
      html: true,
  })
})

//Problem: Hints are shown even when form is valid
//Solution: Hide and show them at appropriate times
var $password = $("#password");
var $confirmPassword = $("#confirm_password");

//Hide hints
$("form span").hide();

function isPasswordValid() {
  return $password.val().length > 8;
}

function arePasswordsMatching() {
  return $password.val() === $confirmPassword.val();
}

function canSubmit() {
  return isPasswordValid() && arePasswordsMatching();
}

function passwordEvent(){
    //Find out if password is valid  
    if(isPasswordValid()) {
      //Hide hint if valid
      $password.next().hide();
    } else {
      //else show hint
      $password.next().show();
    }
}

function confirmPasswordEvent() {
  //Find out if password and confirmation match
  if(arePasswordsMatching()) {
    //Hide hint if match
    $confirmPassword.next().hide();
  } else {
    //else show hint 
    $confirmPassword.next().show();
  }
}

function enableSubmitEvent() {
  $("#submit").prop("disabled", !canSubmit());
}

//When event happens on password input
$password.focus(passwordEvent).keyup(passwordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

//When event happens on confirmation input
$confirmPassword.focus(confirmPasswordEvent).keyup(confirmPasswordEvent).keyup(enableSubmitEvent);

enableSubmitEvent();
