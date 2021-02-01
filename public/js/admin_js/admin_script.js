$(document).ready(function() {
  $("#current_password").keyup(function() {
    const current_password = $(this).val();
    // alert(current_password);

    $.ajax({
      method:'POST',
      url: "/admin/check-current-password",
      data: {current_password},
      success: function(res) {
        if (res === 'false') {
          $('#current_password').removeClass('is-valid').addClass('is-invalid');
          $('#current_password_error').addClass('invalid-feedback').removeClass('valid-feedback').html("<strong>Password is incorrect!</strong>");
          // document.getElementById("change_password_submit").disabled = true;
        } else if (res === 'true') {
          $('#current_password').addClass('is-valid').removeClass('is-invalid');
          $('#current_password_error').addClass('valid-feedback').removeClass('invalid-feedback').html("<strong>Password is correct.</strong>");
          // document.getElementById("change_password_submit").disabled = false;
        }
      },
      error: function() {
        alert('error');
      }
    })
  })
})