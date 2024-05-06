$(document).ready(function () {
  var validator = $("#Validation_Register").validate({
    rules: {
      surname: {
        required: true,
      },
      name: {
        required: true,
      },
      user_name: {
        required: true,
        email: true,
      },
      number_phone: {
        required: true,
        number: 10,
      },

      password: {
        required: true,
        minlength: 2,
      },
      re_password: {
        required: true,
        minlength: 2,
      },
    },
    messages: {
      surname: {
        required: "Hãy nhập họ",
      },
      name: {
        required: "Hãy nhập tên",
      },

      user_name: {
        required: "Hãy nhập tên đăng nhập",
        email: "Tên đăng nhập phải là một địa chỉ email hợp lệ",
      },
      number_phone: {
        required: "Hãy nhập số điện thoại liên lạc",
        number: "Số điện thoại gồm 10 chữ số",
      },
      password: {
        required: "Hãy nhập mật khẩu",
        minlength: "Mật khẩu ít nhất 2 ký tự",
      },
      re_password: {
        required: "Hãy nhập lại mật khẩu",
        minlength: "Mật khẩu phải khớp với mật khẩu phía trên",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
