$(document).ready(function () {
  // Khởi tạo plugin validation
  var validator = $("#Validation_Login").validate({
    rules: {
      username: {
        required: true,
        email: true, // Đã sửa thành true để kiểm tra email
      },
      password: {
        required: true,
        minlength: 2,
      },
    },
    messages: {
      username: {
        required: "Hãy nhập tên đăng nhập",
        email: "Tên đăng nhập phải là một địa chỉ email hợp lệ",
      },
      password: {
        required: "Hãy nhập mật khẩu",
        minlength: "Mật khẩu ít nhất 2 ký tự",
      },
    },
    submitHandler: function (form) {
      form.submit();
    },
  });
});
