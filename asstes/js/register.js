$(document).ready(function () {
  $("#formValidation").validate({
    rules: {
      fullname: {
        required: true,
        minlength: 3,
      },
      username: {
        required: true,
        minlength: 3,
      },
      phoneno: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 10,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 6,
      },
      cpassword: {
        required: true,
        equalTo: "[name='password']",
      },
    },
    messages: {
      fullname: {
        required: "Please enter your full name",
        minlength: "Full name must be at least 3 characters long",
      },
      username: {
        required: "Please enter a username",
        minlength: "Username must be at least 3 characters long",
      },
      phoneno: {
        required: "Please enter your phone number",
        digits: "Please enter only digits",
        minlength: "Phone number must be 10 digits long",
        maxlength: "Phone number must be 10 digits long",
      },
      email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
      password: {
        required: "Please provide a password",
        minlength: "Password must be at least 6 characters long",
      },
      cpassword: {
        required: "Please confirm your password",
        equalTo: "Passwords do not match",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
