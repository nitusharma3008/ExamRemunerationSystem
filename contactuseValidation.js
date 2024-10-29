$(document).ready(function () {
  $("form").validate({
    rules: {
      name: {
        required: true,
        minlength: 3,
      },
      email: {
        required: true,
        email: true,
      },
      phone: {
        required: true,
        digits: true,
        minlength: 10,
        maxlength: 15,
      },
      message: {
        required: true,
        minlength: 10,
      },
    },
    messages: {
      name: {
        required: "Please enter your name",
        minlength: "Your name must be at least 3 characters long",
      },
      email: {
        required: "Please enter your email",
        email: "Please enter a valid email address",
      },
      phone: {
        required: "Please enter your phone number",
        digits: "Please enter only digits",
        minlength: "Your phone number must be at least 10 characters long",
        maxlength: "Your phone number must not exceed 15 characters",
      },
      message: {
        required: "Please enter your message",
        minlength: "Your message must be at least 10 characters long",
      },
    },
    errorElement: "div",
    errorClass: "text-danger",
    highlight: function (element, errorClass, validClass) {
      $(element).addClass("is-invalid");
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass("is-invalid");
    },
  });
});
